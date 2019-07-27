  <?php
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>Currency Conversion</title>
  	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href=" <?php echo base_url(); ?>css/index.css">
  </head>
  <body>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  	<figure class="logo"><img class="rounded-circle" src="<?php echo base_url(); ?>images/logo.jpeg" width="55" height="55" alt="logo" id="logo"></figure>
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
  <div class="col-sm-12 mt-md">
  <?php echo form_open('currencyConvertor/convert'); ?>
      <h3 class="text-center">Currency Convertor</h3>  
     
  <div class="col-sm-10 mt-sm">
        <div class="row form-group">
                <div class="col-sm-12 col-md-2">
                    <label for="basecurrency" class="control-label">
                        <span class="text-danger"></span> Base Currency:
                    </label>
                </div>
            
            
                <div class="col-sm-12 col-md-5">
                    <select required class="form-control" value="<?php echo set_value('basecurrency')?>" name="basecurrency" id="basecurrency">
                        <option value="">Select</option>
                        <?php foreach ($currency as $row) { ?>
                        <option title="<?php echo $row->cName;?>" value="<?php echo $row->cName; ?>" <?php echo set_select('basecurrency', $row->cName, False); ?> ><?php echo $row->cName;?> </option> 
                        <?php } ?>
                    </select>
                    <?php echo form_error('basecurrency');?>
                </div>
            </div>
  </div>

    <div class="col-sm-10 mt-sm">
            <div class="row form-group">
                    <div class="col-sm-12 col-md-2">
                        <label for="foreigncurrency" class="control-label">
                            <span class="text-danger"></span> Foreign Currency:
                        </label>
                    </div>
                
                
                    <div class="col-sm-12 col-md-5">
                        <select required class="form-control" value="<?php echo set_value('foreigncurrency')?>" name="foreigncurrency" id="foreigncurrency">
                            <option value="">Select</option>
                            <?php foreach ($currency as $row) { ?>
                            <option title="<?php echo $row->cName;?>" value="<?php echo $row->cName; ?>" <?php echo set_select('foreigncurrency', $row->cName, False); ?> ><?php echo $row->cName;?> </option> 
                            <?php } ?>
                        </select>
                        <?php echo form_error('foreigncurrency');?>
                    </div>
                </div>
                
    </div>
    
    <div class="col-sm-10 mt-sm">
            <div class="row form-group">
                    <div class="col-sm-12 col-md-2">
                        <label for="amount" class="control-label">
                            <span class="text-danger"></span> Amount:
                        </label>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <input type="number" required class="form-control" value="<?php echo set_value('amount')?>" id="amount" name="amount" />
                        <?php echo form_error('amount');?>
                    </div>
                </div>
    </div>

      
  <div class="col-sm-10">
        <div class="row form-group">
                <div class="col-sm-12 col-md-2"></div>
                    <div class="col-sm-12 col-md-5">
                        <input type="submit" value="Submit" class="btn btn-default">
                    </div> 
                </div>
            </div>
  </div>
     
        <div class="col-sm-10 mt-sm ">
                <div class="row form-group">
                        <div class="col-sm-12 col-md-2">
                            <label for="convertedAmount" class="control-label">
                                <span class="text-danger"></span> convertedAmount:
                            </label>
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <input type="text" disabled  class="form-control" value="<?php echo $convertedAmount?>" id="convertedAmount" name="convertedAmount" />
                            <?php echo form_error('convertedAmount');?>
                        </div>
                    </div>
                </div>  

<?php echo form_close(); ?>            
</div>

  <footer id="footadmin">
          <div class="footer-copyright py-3 text-center bg-dark text-white">
          © 2018 Copyright:
          <a href="index.php"> Currency@Converter.com </a>
      </div>
  </footer>
  </body>
  </html>