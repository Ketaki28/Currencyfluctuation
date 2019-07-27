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
                        <!-- <a class="nav-item nav-link" href="<?php echo base_url();?>index.php/CurrencyConvertor/firstpage"><b><h5>Home</h5></b></a> -->
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
                      //echo $userEmail;
              			        $qty1 = 1;
                                $qty =1;
                                $cost1 = 0;
                                $numberOfRecords = 0; //number of records in session
                                $prodNumber = 0;
                                $currentProduct = "";
                                $totalCost = 0;
                                $num_dbRecords = 0; // number of records in db
                                if(isset($_POST["submit"])){
                                    if(isset($_SESSION['numberOfRecords'])){
                                        $_SESSION['numberOfRecords'] = $_SESSION['numberOfRecords'] + 1;
                                    }else{
                                        $_SESSION['numberOfRecords'] = 1;
                                        //echo $_SESSION['numberOfRecords'];                    
                                    }//end of if
                                    if (isset($_SESSION['dbRecords']))
                                    {
                                        $num_dbRecords = $_SESSION['dbRecords'];
                                       // echo "sahi";
                                    }else{
                                        $num_dbRecords = 10;
                                    }
                                    $num_dbRecords = $num_dbRecords - 1;
                                    //get Number of records in DB
                                    $numberOfRecords = $_SESSION['numberOfRecords'];
                                    //echo "Number of Session Records".$numberOfRecords;
                                    while($num_dbRecords >= 0){
                                        //echo $num_dbRecords;
                                        if(isset($_POST["desc".$prodNumber])){
                                            echo '<tr>';
                                            echo '<td>'.$_POST["desc".$prodNumber] .'</td>';
                                            $_SESSION['cost'.$prodNumber] = $_POST["cost".$prodNumber];
                                            $_SESSION['desc'.$prodNumber] = $_POST["desc".$prodNumber];
                                            $_SESSION['proId'.$prodNumber] = $_POST["proId".$prodNumber];
                                            //$currentProduct = $_POST["desc".$prodNumber];
                                            //kepp track of current product to display other selected products
                                            $_SESSION['currentProduct'] = $_POST["desc".$prodNumber];
                                            if(isset($_SESSION['Qty'.$prodNumber])){
                                                $_SESSION['Qty'.$prodNumber] = $_SESSION['Qty'.$prodNumber] + 1;   
                                            }
                                            else{
                                                $_SESSION['Qty'.$prodNumber] = 1;
                                            }
                                            $qty = $_SESSION['Qty'.$prodNumber];
                                            echo '<td> '.$qty. '</td>';
                                            $cost1 = $_SESSION["cost".$prodNumber] * $qty;
                                            echo '<td>'.$cost1 .'</td>';
                                            echo '</tr>';
                                        }/* end of first*/
                                        $num_dbRecords = $num_dbRecords - 1;
                                        $prodNumber = $prodNumber + 1;
                                    }//end of while

                                    $prodNumber = 0;
                                    while($numberOfRecords >= 0)
                                    {
                                        if(isset($_SESSION['desc'.$prodNumber])){
                                            if($_SESSION['desc'.$prodNumber] != $_SESSION['currentProduct']){
                                                echo '<tr>';
                                                echo '<td>'.$_SESSION['desc'.$prodNumber] .'</td>';
                                                $qty = $_SESSION['Qty'.$prodNumber];
                                                echo '<td> '.$qty. '</td>';
                                                $cost1 = $_SESSION['cost'.$prodNumber] * $qty;
                                                echo '<td>'.$cost1.'</td>';
                                                echo '</tr>';   
                                            }//current product 
                                        }//end of if session
                                        $numberOfRecords = $numberOfRecords - 1;
                                        $prodNumber = $prodNumber + 1;
                                    }//end of while
                                        
                                    //$numberOfRecords = $_SESSION['dbRecords'];
                                    $numberOfRecords = 4;
                                    //echo $numberOfRecords;
                                    $prodNumber = 0;
                                    while($numberOfRecords >= 0){
                                        //echo "in Wbhile";
                                        if(isset($_SESSION['desc'.$prodNumber])){
                                            $totalCost = $totalCost + ($_SESSION['cost'.$prodNumber] * $_SESSION['Qty'.$prodNumber]);
                                        }//end of if
                                        $prodNumber = $prodNumber + 1;
                                        $numberOfRecords = $numberOfRecords - 1;
                                    }//end while
                                    echo '<tr><td></td><td>Total</td><td>$'.$totalCost.'</td></tr>';

                                }else{
                                    if(isset($_SESSION['numberOfRecords'])){
                                        $numberOfProduct = $_SESSION['numberOfRecords'];
                                    }else{
                                        $numberOfProduct = -1;
                                    }
                                $prodNumber = 0;
                                while($numberOfProduct >= 0 ){
                                    if(isset($_SESSION['desc'.$prodNumber])){
                                        echo '<tr>';
                                        echo '<td id = "product">'.$_SESSION['desc'.$prodNumber] .'</td>';
                                        echo '<td id = "qty"> '.$_SESSION['Qty'.$prodNumber].' </td>';
                                        $cost = $_SESSION['Qty'.$prodNumber] * $_SESSION['cost'.$prodNumber]; 
                                        echo '<td id = "price">'.$cost.'</td>';
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
                                echo '<tr><td></td><td>Total</td><td>$'.$total.'</td></tr>';
                            } //end of submit
/************************************************************************/
                            //echo "</table>";
                                # close the connection    
                        ?>

              		</tbody>
              	</table>
              </div>
          </div>
      </div>

     <div class="row mt-3">
      <div class="col-sm-3">
        
      </div>
        <div class="col-sm-2 offset-sm-1">
            <?php echo form_open('currencyConvertor/placeyourorder'); ?>
              <input type="hidden" name="userName" value="<?php echo $userName; ?>" > 
              <input type="hidden" name="userEmail" value="<?php echo $userEmail; ?>" >
            	<input type="submit" name="Place Order" value="Place Order">
            <?php echo form_close(); ?>
        </div>
        <div class="col-sm-1">
            <?php echo form_open('currencyConvertor/buyItemsDisplay'); ?>
                <input type="hidden" name="userName" value="<?php echo $userName; ?>" > 
                <input type="hidden" name="userEmail" value="<?php echo $userEmail; ?>" >
                <input type="submit" name="submit"  value="Continue Shopping">
            <?php echo form_close(); ?> 
        </div>
    </div>

  <footer id="aboutfooter">
          <div class="footer-copyright py-3 text-center bg-dark text-white">
          © 2018 Copyright:
          <a href="index.php"> Currency@Converter.com </a>
      </div>
  </footer>
    </body>
    </html>
