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
      <script type="text/javascript" src="<?php echo base_url();?>jss/bootstrap.min.js"></script>
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      	<figure class="logo"><img class="rounded-circle" src="<?php echo base_url();?>images/logo.jpeg" width="55" height="55" alt="logo" id="logo"></figure>
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
        <h2>Selling a Item</h2></div>
       <div class="container">
          <div class="row">
              <div class="col-sm-12">
                  <table class="table container">
    <thead>
      <tr>
        <th scope="col">Choose Any one</th>
        <th scope="col">Name</th>
        <th scope="col">Cost</th>
        <th scope="col">Currency</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $pro1 = 0;
        if(isset($_POST["submit"])){

          echo "<p> Item added to the sell list successfully !</p>";
        }
        if($records){
          foreach ($records as $row){
              echo '<tr>';
              echo '<td><div class="radio">';
              //echo '<input type="radio" name="proId'.$pro1.'" value="'.$row->itemID.'"></div></td>';
              //echo '<input type="hidden" name=" id="proId'.$pro1.'" value="'.$row->itemID.'">';
              echo '<form action = "sellItems" method="post">';
                    echo '<input type="submit" name="submit" value="Sell Item" class="btn btn-warning">  ';
                    echo '<input type="hidden" name="proId'.$pro1.'" id="proId'.$pro1.'" value="'.$row->itemID.'">';
                    echo '<input type="hidden" name="userEmail" id="userEmail" value="'.$userEmail.'">';
                    echo '<input type="hidden" name="userName" id="userName" value="'.$userName.'">';
              echo '</form>';
              echo '<td>';
              echo $row->iName;
              echo '</td>';
              echo '<td>';
              echo $row->cost;
              echo '</td>';
              echo '<td>';
              echo $row->currName;
              echo '</td>';   
              $pro1 = $pro1 + 1;       
          }//end of for
        }else{
          echo '<td> - </td><td>No Items to Sell !</td><td> - </td><td> - </td>';
        }
      
    echo '</tbody>';
  echo '</table>';
              echo '</div>';
          echo '</div>';
       // echo '<form action = "sellItems" method="post">';
       //       echo '<input type="submit" name="submit" value="Sell Items" class="btn btn-warning">  ';
        //echo '</form>';
        ?>
  </div>
  </div>
  <footer id="footadmin">
          <div class="footer-copyright py-3 text-center bg-dark text-white">
          © 2018 Copyright:
          <a href="index.php"> Currency@Converter.com </a>
      </div>
  </footer>
    </body>
    </html>
