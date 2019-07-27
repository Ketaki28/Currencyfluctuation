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
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
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
          <h2>Welcome  <?php
                        //Noopur - added code to display name of the logged in User  
                        $name = "";
                        $email = "";
                        foreach ($adminName as $row){
                            $name = $row->name;
                            $email = $row->email;
                        }
                        echo $name."!";
                        //echo $email;
                       
                        
                    ?></h2>
          </div>
          <div id="list">
               <div><a class="btn btn-success" href="<?php echo base_url();?>index.php/currencyConvertor/manageUser" id="user"> Users</a></div>
        <div><a class="btn btn-primary" href="<?php echo base_url();?>index.php/currencyConvertor/manageCurrency" id="admin">Currency</a><div>
          </div>
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
