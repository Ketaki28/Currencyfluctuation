<?php 
   class currency_Model extends CI_Model {

   	function __construct() { 
         parent::__construct(); 
    }//end of function

    //show items specific to user  i.e logged in user so that he can decide which items to sell
    //here I have hardcoded john@gmail.com to be looged in user
    public function getItems($userEmail){

    	
      $sql = $this->db->query("Select a.itemID, a.iName, a.cost, a.currName, a.actionType, b.tradeType from item as a, tradeitems as b where a.itemID = b.itemId and  b.tradeType != 'sell' and b.userID = '".$userEmail."'");

    	return $sql;

    }//end of getItems

    //show items specific to other users  i.e other than logged in user so that he can decide which items to buy
    //here I have hardcoded john@gmail.com to be looged in user
    public function getItemsToBuy($userEmail){

    	$sql = $this->db->query("Select a.itemID, a.iName, a.cost, a.currName, a.actionType, b.tradeType from item as a, tradeitems as b where a.itemID = b.itemId and  b.tradeType = 'sell' and userID != '".$userEmail."'");
    	return $sql;

    }//end of getItemsToBuy

    //Update items that user decided to sell
    public function updateItems($userEmail){

    	 $count = 10;
    	 $itemId = 0;
         while($count >= 0 ){
            //echo $count;   
            if(isset($_POST["proId".$count])){
                $itemId = $_POST["proId".$count];            
            }//end of if
            $count = $count - 1;
         }//end of while

         $sql = $this->db->query("UPDATE tradeitems SET tradeType = 'sell' where itemId = $itemId and userID = '".$userEmail."'");
         return $sql;
    }//end of updateItems

    public function get_user($email,$pass)
    {
      $sql = "select email, password,name from person where email='$email' and password='$pass' and userType='end_user'";
      $queryData = $this->db->query($sql);
      if($queryData->num_rows() == 1){
        return $queryData;
    }else{
      return false;
    }
  }//end of get_user


  public function get_admin($email,$pass)
  {
    $sql = "select email, password,name from person where email='$email' and password='$pass' and userType='admin'";
    $queryData = $this->db->query($sql);
    if($queryData->num_rows() == 1){
    return $queryData;
  }
  else {
    return false;
  }
  }

  public function insert_user($data)
    {
      $this->db->insert('person',$data);
    }


    //insert TradeItems to db
    public function insertOrders($userEmail){

        $numberOfRecords =  $_SESSION['numberOfRecords'];
        $prodNumber = 0;
        echo $userEmail;
        $myName = $_POST['myName'];
        $myCredit = $_POST['myCredit'];
        $myMonth = $_POST['myMonth'];
        $myYear = $_POST['myYear'];
        while($numberOfRecords >= 0){

            if(isset($_SESSION['proId'.$prodNumber]))
            {
                echo $_SESSION['proId'.$prodNumber];
                $data = array(
                        'userID' => $userEmail,
                        'itemID' => $_SESSION['proId'.$prodNumber],
                        'tradeType' => 'buy',
                        'Credit' => $myCredit,
                        'Month' => $myMonth,
                        'Name' => $myName,
                        'Year' => $myYear
                        );
                $this->db->insert('tradeitems', $data);
            }//end of if
            $numberOfRecords = $numberOfRecords - 1;
            $prodNumber = $prodNumber + 1;
        }//end of while

    }//end of tradeItems

    //prepares data for chart
    public function prepareDataForCharts(){

        $sql = $this->db->query("select currencyName, value, cDate from currencydetails GROUP BY currencyName ORDER BY cDate DESC");
        return $sql;
        
    }//end of prepareDataForCharts


    public function calculateIntelligence(){
        
        $sql = $this->db->query("select currencyName, value, cDate from currencydetails GROUP BY currencyName order by currencyName ASC");
        $sql1 = $this->db->query("select currencyName, value, cDate from currencydetails order by currencyName ASC");

        $row_1 = $sql->result();
        $row_2 = $sql1->result();
        $dataAnalysis['Number'] = 0;
        $i = 0;
        $increase = 0;
        $decrease = 0;
     
        echo '<div class = "calculateIntelligence container  row text-center" align="center">';
        
        echo '<table class="table table-striped  table-bordered col-md-6" style="width:60%"> ';
            echo '<th class="align-center1">Currency Fluctuation</th>';
        foreach ($row_1 as $row1){
            $flag =1;
            $i = 1;  
            
            foreach ($row_2 as $row2){ 
              if(($row1->currencyName == $row2->currencyName) && ($i == 2)){
                  $change = $row1->value - $row2->value;
                  if($change >= 0.0){
                      echo '<tr>';
                      echo '<td>'.$row1->currencyName." increased by ".$change.' compared with USD</td>';
                      $increase = $increase + 1;
                  }else{
                      echo '<td>'.$row1->currencyName." decreased by ".$change.' compared with USD</td>';
                      $decrease = $decrease + 1;
                  }
                  echo '</tr>';
                }//end of main if
                if(($row1->currencyName == $row2->currencyName)){
                    $i = $i + 1;
                }//end of if

              }
              
              //}//end nested for
            }//end for

            
            if($increase > $decrease ){
              echo '<td><b>Our Advice: It is a good time to sell your items !</b></td>';
            }else{
              if($decrease > $increase){
                echo '<td><b>Our Advice: It is a good time to buy new items !</b></td>';
              }else{
                echo '<td><b>Our Advice: You can either buy or sell items !</b></td>';
              }
            }
            echo '</table>';
            echo '<div class="col-md-6">';
            echo '<p class="text-justify alert alert-success">Here the user gets to know how the rates of different currencies are fluctuating. The currencies are affected dynamically whenever there isa a change in US Dollar. It not only provides the fluctuation rates but also provides intelligence of whether it is right time to invest in the market. Based on the intelligence user can Buy or sell its items.</p>';
            echo '</div>';
            echo '</div>';
        
        }//end funcion calculateIntelligence 
       
  }//end of class

?>