      <?php
      ?>
      <!DOCTYPE html>
      <html>
      <head>
      	<title>Currency Conversion</title>
      	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/index.css">
      </head>
      <body>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script type="text/javascript" src="<?php echo base_url();?>/js/bootstrap.min.js"></script>
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      	<figure class="logo"><img class="rounded-circle" src="<?php echo base_url();?>/images/logo.jpeg" width="55" height="55" alt="logo" id="logo"></figure>
          <a class="navbar-brand" href="#"><h4 id="heading">Currency Converter</h4></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                  <div class="navbar-nav">
                      
                      <a class="nav-item nav-link" href="<?php echo base_url();?>index.php/CurrencyConvertor/aboutUs"><b><h5>About us</h5></b></a>
                      <a class="nav-item nav-link" href="<?php echo base_url();?>index.php/CurrencyConvertor/main"><b><h5>Logout</h5></b></a>
                  </div>
              </div>
      </nav>
      <div class="container mt-md" id="">
        <h2>Shopping Cart</h2></div>
       <div class="container">
          <div class="row">
              <div class="offset-sm-3 col-sm-6">
              	<table class ="cartTable">
              		<tbody>
              			<tr class="cartTR">
              				<th>Description</th>
              				<th>Quantity</th>
              				<th>Price</th>
              			</tr>
                           <?php
                            //    include 'orderHandler.php';
                            //    include 'validatePlaceYourOrder.php';
                                if(isset($_SESSION['numberOfRecords'])){
                                    $numberOfProduct = $_SESSION['numberOfRecords'];
                                }else{
                                    $numberOfProduct = -1;
                                }
                                $prodNumber = 0;
                                //echo $_SESSION['desc0'];
                                while($numberOfProduct >= 0 ){
                                    if(isset($_SESSION['desc'.$prodNumber])){
                                        echo '<tr>';
                                        echo '<td id = "product">'.$_SESSION['desc'.$prodNumber] .'</td>';
                                        echo '<td id = "qty"> '.$_SESSION['Qty'.$prodNumber].' </td>';
                                        $cost = $_SESSION['Qty'.$prodNumber] * $_SESSION['cost'.$prodNumber]; 
                                        echo '<td id = "price">$'.$cost.'</td>';
                                        echo '</tr>';
                                    }//end of if
                                    $prodNumber = $prodNumber  + 1;
                                    $numberOfProduct = $numberOfProduct - 1;
                                }//end of while
                                $total = 0;
                                $numberOfRecords = 0;
                                if(isset($_SESSION['numberOfRecords'])){
                                    $numberOfRecords = $_SESSION['numberOfRecords'];
                                }else{
                                    $numberOfRecords = -1;
                                }
                                $prodNumber = 0;
                                while($numberOfRecords >= 0){
                                    //echo "in Wbhile";
                                    if(isset($_SESSION['desc'.$prodNumber])){
                                        $total = $total + ($_SESSION['cost'.$prodNumber] * $_SESSION['Qty'.$prodNumber]);
                                    }//end of if
                                    $prodNumber = $prodNumber + 1;
                                    $numberOfRecords = $numberOfRecords - 1;
                                }//end while

                                echo '<tr><td></td><td>Total</td><td>$'.$total.'</td>';

                            ?>
               		</tbody>
              	</table>
              </div>
          </div>
      </div>
                 <?php
                    echo '<div class="row mb-3">';

                        echo '<div class="col-sm-10 offset-sm-1">';
                            //<!--<form method="post" action="">-->
                            
                            if(isset($_POST["submit"])){
                               if($this->form_validation->run() == TRUE){
                                    echo "<p> Your order is placed Successfully ! </p>";
                                }//end of inner if
                            }//end of of submit

                            echo form_open('currencyConvertor/insertItemsToDb');
                        //<fieldset>
                            echo form_fieldset('Fill Details');
                            //<!--<legend>Fill Details:</legend>-->
                           
                           echo '<div class="row">';
                                echo '<div class="col-xs-12 col-md-3 col-lg-2 text-right">';
                                //<label>Name:</label>
                                echo form_label('Name:');
                                echo '</div>';
                                echo '<div class="col-x-12 col-md-5 col-lg-5">';
                                //<input type="text" name="myName" id="myName" placeholder="your first and last name">';
                                $data_name = array('name'=>'myName', 'id'=>'myName', 'placeholder'=>'Please Enter Name');
                                echo form_input($data_name);
                                echo '<div class = "error">';
                                        echo form_error('myName');
                                echo '</div>';
                                echo '</div>';
                            echo '</div>';

                            echo '<div class="row">';
                                echo '<div class="col-xs-12 col-md-3 col-lg-2 text-right">';
                                //<label>E-mail:</label>';
                                echo form_label('Email:');
                                echo '</div>';
                                echo '<div class="col-x-12 col-md-5 col-lg-5">';
                                //<input type="E-mail" name="myEmail" id="myEmail" placeholder="you@yourdomain.com">';
                                $data_email = array('name'=>'myEmail', 'id'=>'myEmail', 'placeholder'=>'xyz@abc.com');
                                echo form_input($data_email);
                                echo '<div class = "error">';
                                        echo form_error('myEmail');
                                echo '</div>';
                                echo '</div>';
                            echo '</div>';

                            echo '<div class="row">';
                                echo '<div class="col-xs-12 col-md-3 col-lg-2 text-right">';
                                //<label>Address:</label>
                                echo form_label('Address:');
                                echo '</div>';
                                echo '<div class="col-x-12 col-md-5 col-lg-5">';
                                //<input type="text" name="myAddress" id="myAddress" placeholder="Enter Address">
                                $data_address = array('name'=>'myAddress', 'id'=>'myAddress', 'placeholder'=>'Enter Address');
                                echo form_input($data_address);
                                echo '<div class = "error">';
                                        echo form_error('myAddress');
                                echo '</div>';
                                echo '</div>';
                            echo '</div>';

                            echo '<div class="row">';
                                echo '<div class="col-xs-12 col-md-3 col-lg-2 text-right">';
                                //<label>City:</label>
                                echo form_label('City:');
                                echo '</div>';
                                echo '<div class="col-x-12 col-md-5 col-lg-5">';
                                //<input type="text" name="myCity" id="myCity" placeholder="Enter City">
                                $data_city = array('name'=>'myCity', 'id'=>'myCity', 'placeholder'=>'Enter City');
                                echo form_input($data_city);
                                echo '<div class = "error">';
                                        echo form_error('myCity');
                                echo '</div>';
                                echo '</div>';
                            echo '</div>';

                            echo '<div class="row">';
                                echo '<div class="col-xs-6 col-md-3 col-lg-2 text-right">';
                                //<label>State:</label>
                                echo form_label('State:');
                                echo '</div>';
                                echo '<div class="col-x-12 col-md-5 col-lg-5">';
                                //<input type="text" name="myState" id="myState" placeholder="Enter State">
                                $data_state = array('name'=>'myState', 'id'=>'myState', 'placeholder'=>'Enter State');
                                echo form_input($data_state);
                                echo '<div class = "error">';
                                        echo form_error('myState');
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-xs-12 col-md-3 col-lg-1 text-right">';
                                //<label>Zip:</label>
                                echo form_label('Zip:');
                                echo '</div>';
                                echo '<div class="col-x-12 col-md-5 col-lg-3">';
                                //<input type="text" name="myZip" id="myZip" placeholder="Enter Zip">
                                $data_zip = array('name'=>'myZip', 'id'=>'myZip', 'placeholder'=>'Enter Zip');
                                echo form_input($data_zip);
                                echo '<div class = "error">';
                                        echo form_error('myZip');
                                echo '</div>';
                                echo '</div>';
                            echo '</div>';

                            echo '<div class="row">';
                                echo '<div class="col-xs-12 col-md-3 col-lg-2 text-right">';
                                //<label>Credit Card:</label>
                                echo form_label('Credit Card:');
                                echo '</div>';
                                echo '<div class="col-x-12 col-md-5 col-lg-5">';
                                //<input type="text" name="myCredit" id="myCredit" placeholder="Credit Card Number">
                                $data_credit = array('name'=>'myCredit', 'id'=>'myCredit', 'placeholder'=>'Enter Credit Card Number');
                                echo form_input($data_credit);
                                echo '<div class = "error">';
                                        echo form_error('myCredit');
                                echo '</div>';
                                echo '</div>';
                            echo '</div>';

                            echo '<div class="row">';
                                echo '<div class="col-xs-12 col-md-3 col-lg-2 text-right">';
                                //<label>Expire Month:</label>
                                echo form_label('Month:');
                                echo '</div>';
                                echo '<div class="col-x-12 col-md-5 col-lg-5">';
                                //<input type="text" name="myMonth" id="myMonth" placeholder="Enter Month">
                                $data_month = array('name'=>'myMonth', 'id'=>'myMonth', 'placeholder'=>'Enter the Month');
                                echo form_input($data_month);
                                echo '<div class = "error">';
                                        echo form_error('myMonth');
                                echo '</div>';                                
                                echo '</div>';
                                echo '<div class="col-xs-12 col-md-3 col-lg-1 text-right">';
                                //<label>Year:</label>
                                echo form_label('Year:');
                                echo '</div>';
                                echo '<div class="col-x-12 col-md-5 col-lg-3">';
                                //<input type="text" name="myYear" id="myYear" placeholder="Enter Year">
                                $data_year = array('name'=>'myYear', 'id'=>'myYear', 'placeholder'=>'Enter the Year');
                                echo form_input($data_year);
                                echo '<div class = "error">';
                                        echo form_error('myYear');
                                echo '</div>';
                                echo '</div>';
                            echo '</div>';

                           //<!-- <input id = "orderButton" type="submit" name="Place Order" value="Order Now" onclick="insertOrdersToDb()">-->
                            echo '<input id = "orderButton" type="submit" name="submit" value="Order Now">';
                        //</fieldset>
                           echo form_fieldset_close();
                    //</form>
                           echo form_close();
            ?>

  <footer>
          <div class="footer-copyright py-3 text-center bg-dark text-white" id="footadmin">
          © 2018 Copyright:
          <a href="index.php"> Currency@Converter.com </a>
      </div>
  </footer>
    </body>
    </html>
