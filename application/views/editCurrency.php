<?php

$link = mysqli_connect("localhost", "root", "", "currencyfluctuation");
           
          // Check connection
          if($link === false){
              die("ERROR: Could not connect. " . mysqli_connect_error());
          }
?>
     
        <div class="container mt-md" id="">
          <h2>Edit a existing Currency</h2>
          </div>
          <?php 
          $emailsel = "";
          if (isset($_POST['edit'])){
            $emailsel=  $_POST['optradio'];            
          }


          
     $sqldisp='Select currencyName,value, cDate FROM currencydetails  where currencyName ="'.$emailsel.'"';
     $cName = "";
     $value ="" ;
     $cDate = "" ;
     $currency1= "";
     $value1="";
     $date1="";
     $query = mysqli_query($link,$sqldisp);
     $data = $query->fetch_assoc();
      $cName = $data["currencyName"];
      $value = $data["value"];
      $date = $data["cDate"];

      echo '<div class="container">';
    echo    ' <form action="updateCurrency" method="post">';
      echo'  <div class="form-group">';
        echo'  <label for="E-mail">Currency:</label>';
         echo'<input type="varchar" class="form-control" id="E-mail" value="'. $emailsel.'" name="currency1" readonly>';
       echo' </div>';
       echo' <div class="form-group">';
         echo' <label for="contact">Value:</label>';
         echo' <input type="float" class="form-control" id="value" value="'.$value.'" name="value1">';
        echo'</div>';
       echo' <div class="form-group">';
        echo' <label for="address">Date:</label>';
        echo'  <input type="varchar" class="form-control" id="addr"value="'.$date.'" name="date1">';
       echo' </div>';
       echo' <div class="form-check">';
        echo'</div>';
        ?>
        <?php
       

         
        if ((isset($_POST['submitupdate']))) {
            $currency1=$_POST["currency1"];
            $value1=$_POST["value1"];
            $date1=$_POST["date1"];
            $sqledit="UPDATE currencydetails
SET value = '$value1', cDate = '$date1' 
WHERE currencyName= '$currency1'";
 mysqli_query($link,$sqledit);
          echo "Data Updated";
        }
        ?>

         <!-- <div class="container">
        <form action="/action_page.php">
        <div class="form-group">
          <label for="name">Country</label>
          <input type="name" class="form-control" id="" placeholder="Enter Country Name" name="name" readonly>
        </div>
        <div class="form-group">
          <label for="E-mail">Currency</label>
          <input type="E-mail" class="form-control" id="" placeholder="Enter Abbreviation" name="E-mail" readonly>
        </div>
            <div class="form-group">
          <label for="E-mail">Value</label>
          <input type="number" class="form-control" id="" placeholder="Value of Currency" name="E-mail">
        </div>
            <div class="form-group">
          <label class="control-label" for="date">Date</label>
            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
        </div>
        <div class="form-check">
        </div>-->
        <input type="submit" name="submitupdate" class="btn btn-primary" value="Update Currency">
        <a type="submit" class="btn btn-warning" href="<?php echo base_url();?>index.php/currencyConvertor/manageCurrency" class="btn btn-primary" value="Manage Currency">Manage Currency</a>
    </form>
    </div>
    <footer id="footadmin">
            <div class="footer-copyright py-3 text-center bg-dark text-white">
            © 2018 Copyright:
            <a href="index.php"> Currency@Converter.com </a>
        </div>
    </footer>
    </body>
    </html>