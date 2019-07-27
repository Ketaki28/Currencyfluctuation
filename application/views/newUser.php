
    <div class="container mt-md" id="">
        <h2>Adding new user</h2>
    </div>

    <div class="container">
        <form method = "post" action="<?php echo base_url();?>index.php/currencyConvertor/newUserValidation">
          <?php
                if($this->uri->segment(2)=="inserted"){
                  echo'<p>Data Inserted</p>';
                }
              ?>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="name" class="form-control" id="name" placeholder="Enter Name" name="name">
          <span><?php echo form_error("name"); ?></span>
        </div>
        <div class="form-group">
          <label for="E-mail">E-mail:</label>
          <input type="E-mail" class="form-control" id="email" placeholder="Enter E-mail" name="email">
          <span><?php echo form_error("email"); ?></span>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
          <span><?php echo form_error("password"); ?></span>
        </div>    
        <div class="form-group">
          <label for="contact">Contact:</label>
          <input type="text" class="form-control" id="contact" placeholder="682-456-7890" name="contact">
          <span><?php echo form_error("contact"); ?></span>
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <input type="address" class="form-control" id="addr" placeholder="E.g. 1002 Greek Row Dr,Apt 212, Arlington, TX-76013" name="addr">
          <span><?php echo form_error("addr"); ?></span>
        </div>
        <div class="form-group"> <!-- Date input -->
            <label class="control-label" for="date">Date of Birth</label>
            <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text" />
            <span><?php echo form_error("date"); ?></span>
          </div>

        <div class="form-check">
        </div>
        <input type="submit" name="submit" onclick="validateuser()" class="btn btn-success"/>
        <a class="btn btn-warning" href="<?php echo base_url();?>index.php/currencyConvertor/manageUser" id="">Manage User</a>
              <?php
                if($this->uri->segment(2)=="inserted1"){
                  echo'<p>Data Inserted</p>';
                }
              ?>
      </form>
    </div>
    <footer id="fNewUser">
            <div class="footer-copyright py-3 text-center bg-dark text-white">
            © 2018 Copyright:
            <a  href="<?php echo base_url();?>index.php/currencyConvertor/firstpage"> Currency@Converter.com </a>
        </div>
    </footer>
      </body>
      </html>