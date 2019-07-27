
  <div class="container mt-md">
    <h2 class="align-center1">Explore the World with Currency Convertor! Log-in to setoff this journey with us!</h2>


    <form method="post" action="login/check">
<div class="error"><?php echo $this->session->flashdata('message'); ?></div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
      </div>
      <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="remember"> Remember me
        </label>
      </div>
      <input type="submit" class="btn btn-black col-md-2" value="SignIn" name="login">
    <a class="btn btn-black col-md-2" href="signup">Register User</a>
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
