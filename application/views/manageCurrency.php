<?php
$link = mysqli_connect("localhost", "root", "root", "currencyfluctuation");
           
          // Check connection
          if($link === false){
              die("ERROR: Could not connect. " . mysqli_connect_error());
          }
?>
<div class="container mt-md"  id="">
          <h2>Manage Currency</h2></div>
         <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    
      <?php
      
          $sql = "SELECT cName,country FROM currency";
          $imagequery_run = $link->query($sql);
          $result = mysqli_query($link,$sql);
          echo '<form action="editCurrency" method="post">';
          
                if ($imagequery_run) 
              {
                  # code...
                
                 // output data of each row
                      echo '<table class="table container">'; 
                      echo '<thead>';
                      echo '<tr>';
                      echo '<th scope="col">Choose Any one</th>';
                      echo '<th scope="col">Currency</th>';
                      echo '<th scope="col">Country</th>';
                      echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
                  
                      foreach ($currency as $c) {
                      
                      echo '<tr>';
                      echo '<td><div class="radio">';
                      echo '<label><input type="radio" value="'.$c ->cName.'" name="optradio"></label>';
                      echo '</div></td>';
                      echo '<td>'.$c ->cName.'</td>';
                      echo '<td>'.$c ->country.'</td>';
                      echo '</tr>';
                          
                      
                  }
                      echo '</tbody>';
                      echo '</table>';
                      echo '</div>';
                      echo '</div>';            
                      echo '</div>';
}
          else
              {
                  echo "No results found";
              }
    
              
   ?>   
    <div class="container" id="btnclass">

            <a class="btn btn-success" href="<?php echo base_url();?>index.php/currencyConvertor/addCurrency" id="">Add Currency</a>
        
            <input  type="submit" name="delete"  class="btn btn-danger" value="Delete currency">
       
            <input type="submit" name="edit" class="btn btn-primary" value="Edit Currency">

    </div>
  </form>
    </div>
    <div>
    <footer id="aboutfooter">
            <div class="footer-copyright py-3 text-center bg-dark text-white">
            © 2018 Copyright:
            <a href="index.php"> Currency@Converter.com </a>
        </div>

    </footer></div>
      </body>
      </html>