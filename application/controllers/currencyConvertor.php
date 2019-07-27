   <?php 

   class CurrencyConvertor extends CI_Controller {  

      
      function __construct() { 
      
         parent::__construct(); 
         $this->load->helper('url'); 
         $this->load->library('session');
         //$this->load->library('cart');
      
      }

      public function home(){

         //$this->load->model('currency_model');
         //$query = $this->currency_model->prepareDataForCharts();
         //$data['records'] = $query->result();
         //$this->load->view('chart',$data);
         //$this->load->view('userHomePage');
         $this->load->model('currency_model');
         //$dataAnalysis['None'] = "None";
         $dataAnalysis = $this->currency_model->calculateIntelligence();
         echo $dataAnalysis['Number'];

      }//end of home

      public function itemsDisplay(){

         $data['userName'] = $_POST['userName'];
         $userName = $_POST['userName'];
         $userEmail = $_POST['userEmail'];
         $data['userEmail'] = $_POST['userEmail'];
      	$this->load->model('currency_model');
      	$query = $this->currency_model->getItems($userEmail);
      	$data['records'] = $query->result();
      	//$this->load->view('chart');
         $this->load->view('sell', $data);
      	
      }//end of itemsDisplay() 

      public function sellItems(){
      	
         $userName = $_POST['userName'];
         $userEmail = $_POST['userEmail'];
         $data['userName'] = $_POST['userName'];
         $data['userEmail'] = $_POST['userEmail'];
         $this->load->model('currency_model');
         $this->currency_model->updateItems($userEmail);
         $this->itemsDisplay();

      }//end of sellItems


      public function buyItemsDisplay(){
         
         $userName = $_POST['userName'];
         $userEmail = $_POST['userEmail'];
         $data['userName'] = $_POST['userName'];
         $data['userEmail'] = $_POST['userEmail'];
         $this->load->model('currency_model');
         $query = $this->currency_model->getItemsToBuy($userEmail);
         $data['records'] = $query->result();
         $this->load->view('buy', $data);

      }

      public function cartDisplay(){

         $userName = $_POST['userName'];
         $data['userName'] = $_POST['userName'];
         $data['userEmail'] = $_POST['userEmail'];
         $this->load->view('cart',$data);
      
      }

      public function placeyourOrder(){

         $userName = $_POST['userName'];
         $data['userName'] = $_POST['userName'];
         $data['userEmail'] = $_POST['userEmail'];
         //echo "Yet To be implemented";
         $this->load->view('orderPage',$data);
         
      }//end of placeyourorder

      public function insertOrderToDb(){

         $this->load->library('form_validation');
         
         $this->form_validation->set_rules('myName', 'Name',  'required|min_length[5]|max_length[100]');
         $this->form_validation->set_rules('myCredit', 'Credit Card Number',  'required|numeric|min_length[10]|max_length[16]');
         $this->form_validation->set_rules('myMonth', 'Month', 'required|numeric|min_length[1]|max_length[2]');
         $this->form_validation->set_rules('myYear', 'Year', 'required|numeric|exact_length[4]');

         if ($this->form_validation->run() == FALSE){

               $userName = $_POST['userName'];
               $data['userName'] = $_POST['userName'];
               $userEmail = $_POST['userEmail'];
               $data['userEmail'] = $_POST['userEmail'];
               $this->load->view('orderPage',$data);

         }else{

               $userName = $_POST['userName'];
               $data['userName'] = $_POST['userName'];
               $userEmail = $_POST['userEmail'];
               $data['userEmail'] = $_POST['userEmail'];
               echo $userName;
               echo $userEmail;
               $this->load->model('currency_model');
               $this->currency_model->insertOrders($userEmail);
               $this->load->view('orderPage',$data);

         }//end of else

      }//end of function insertOrderToDb

      public function firstpage(){

         $this->load->view('templates/header');
         $this->load->view('home');

      }//end of firstpage

      public function main(){

         $this->load->view('templates/header');
         $this->load->view('main');

      }//end of mainpage


      public function manageCurrency(){

         $this->load->view('templates/adminHead');
         $this->load->model('manageCurrencyModel');
         $data['currency']= $this->manageCurrencyModel->getData();
         $this->load->view('manageCurrency',$data);

      }//suraj

       public function deleteCurrency() {
         
            $decision=$_POST['delete'];
            $cnameDelete = $_POST['optradio'];
            $this->load->model('deleteCurrencyModel');
            $this->deleteCurrencyModel->row_delete($cnameDelete);
            $this->manageCurrency();
            //redirect('manageCurrency');
      }

      public function editCurrency(){
         if(isset($_POST['delete'])){
            $this->deleteCurrency();
         }else{
            if(isset($_POST['edit'])){
               $cnameDelete = $_POST['optradio'];
               //$cnameEdit1 = $_POST['currency1'];
               //$cnameEdit2 = $_POST['value1'];
               //$cnameEdit3 = $_POST['date1'];
               
               $this->load->helper('url');
               $this->load->view('templates/adminHead');
               $this->load->view('editCurrency');
               
            }
            
         }
      }
      public function updateCurrency(){
          if(isset($_POST['submitupdate'])){
         
               $cnameDelete1 = $_POST['currency1'];
               $data = array(
               'value' => $this->input->post('value1'),
               'cDate' => $this->input->post('date1'),
               
);
               $this->load->helper('url');
               $this->load->view('templates/adminHead');
               $this->editCurrency();
               $this->load->model('deleteCurrencyModel');
               $this->deleteCurrencyModel->row_edit($cnameDelete1,$data);
               $this->manageCurrency();
            }
      }
      public function addCurrency(){
         $this->load->helper('url');
         $this->load->view('templates/adminHead');
         $this->load->view('addCurrency');

      }
      public function form_validation(){
      $this->load->helper('url');
      $this->load->library('form_validation');
      $this->form_validation->set_rules("country","Country Name",'required|alpha');
      $this->form_validation->set_rules("cname","Currency",'required|alpha');
      $this->form_validation->set_rules("cname","Currency name",'required|alpha');
      $this->form_validation->set_rules("value","Value",'required|numeric');
      $this->form_validation->set_rules("date","Date",'required');

      if($this->form_validation->run())
      {
    
         $this->load->model("addCurrencyModel");
         $data = array(
            "country" =>$this->input->post("country"),
            "cName" =>$this->input->post("cname"),
         );
         $data1 = array(
            "currencyName" =>$this->input->post("cname"),
            "value" =>$this->input->post("value"),
            "cDate" =>$this->input->post("date")
         );
         $this->addCurrencyModel->insert_data($data);
         $this->addCurrencyModel->insert_data1($data1);
         redirect("/currencyConvertor/inserted");
      }
      else{
         $this->addCurrency();
      }     
   }//suraj
      public function inserted(){
         $this->addCurrency();
      }

      public function aboutUs(){
        
        $this->load->view('aboutus');

      }//end of mainpage

      public function updateUser(){
         echo "kutrya";
         if(isset($_POST['editUser'])){
            $unameDelete1=$_POST['E-mail'];
            echo $unameDelete1;
            $data=array(
               'name' => $this->input->POST('name'),
               'contact' => $this->input->POST('contact'),
               'address' => $this->input->POST('addr'),
               'DOB' => $this->input->POST('date')

            );
            $this->load->helper('url');
               $this->load->view('templates/adminHead');
               $this->editUser();
               $this->load->model('deleteUserModel');
               $this->deleteUserModel->row_edit($unameDelete1,$data);
               $this->editUser();
         }
      }

      public function newUser(){
         $this->load->view('templates/adminHead');
         $this->load->model('newUserModel');
          $this->load->view('newUser');
      }
      public function newUserValidation()
      {
         $this->load->library('form_validation');
         $this->form_validation->set_rules("name","Name",'required');
         $this->form_validation->set_rules("email","E-mail",'required|valid_email');
         $this->form_validation->set_rules("password","Password",'required');
         $this->form_validation->set_rules("contact","Contact",'required');
         $this->form_validation->set_rules("addr","Address",'required');
         $this->form_validation->set_rules("date","Date Of Birth",'required');
      if ($this->form_validation->run()) 
         {
      # true
            $this->load->model("newUserModel");
            $type="end_user";
            $data=array( 
             //left side are table column names
               "name" =>$this->input->post("name"),
               "email" =>$this->input->post("email"),
               "password" =>$this->input->post("password"),
               "contact" =>$this->input->post("contact"),
               "address" =>$this->input->post("addr"),
               "DOB" =>$this->input->post("date"),
               "userType" =>$type

            );

            $this->newUserModel->insert_data($data);
            redirect("/CurrencyConvertor/newUser");
         }
      else{
         $this->newUser();
         }
      }//end of newUserValidation class
      public function inserted1(){
         $this->newUser();
      }

      public function manageUser(){
           $this->load->view('templates/adminHead');
           $this->load->model('manageUserModel');
            
            $data['ty']= $this->manageUserModel->getData();
            $this->load->view('manageUser',$data);
      }
      public function editUser(){
         if(isset($_POST['submit'])){
            $this->deleteUser();
         }
         else{
          if (isset($_POST['edit'])){
            $unameDelete = $_POST['optradio'];
             $this->load->view('templates/adminHead');
             $this->load->view('editUser');
}
         }
      }


      public function deleteUser(){
        $userdel=$_POST['submit'];
         $unameDelete = $_POST['optradio'];
      $this->load->model('deleteUserModel');
      $this->deleteUserModel->row_delete($unameDelete);
      $this->manageUser();
      //redirect('manageCurrency');
      }

      public function userHomePageHandler(){

         if(isset($_POST['sellItems'])){

            $this->itemsDisplay();            

         }else{
            if(isset($_POST['convertor'])){
               $this->index();             
            }else{
               if(isset($_POST['buyItems'])){
                  
                  $this->buyItemsDisplay();  

               }//end of this
            }//end else            
         }//end else
      }//end of userHomePage

      public function index(){

            $query = $this->db->get('currency'); 
            $data['currency'] = $query->result();

            $data["convertedAmount"] = 0;
            $this->load->view('myview1.php', $data);
        }//end of index

        public function convert(){
            $this->form_validation->set_rules('basecurrency', 'basecurrency', 'required');
            $this->form_validation->set_rules('foreigncurrency', 'foreigncurrency', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                $query = $this->db->get('currency'); 
                $data['currency'] = $query->result();
    
                $this->load->view('myview1.php', $data);
            }

            else
            {
                $this->load->model('My_model');
                $data = array(
                    'BaseCurrency' => $this->input->post('basecurrency'),
                    'ForeignCurrency' => $this->input->post('foreigncurrency'),
                    'Amount' => $this->input->post('amount'),
                    'convertedAmount'=>0
                );
                $data["convertedAmount"] = $this->My_model->convertlogic($data);     
                $query = $this->db->get('currency'); 
                $data['currency'] = $query->result();                           
               $this->load->view('myview1.php', $data);
            }    
        
        }//end of convert

	}//end of class
?>