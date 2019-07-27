<div class="container mt-md">
  <h2 class="heading1">We are excited to have you on-board!Complete this form and be a part of our family!</h2>
  <div class="error"><?php echo $this->session->flashdata('message'); ?></div>
  <form method="post" action="SignUp/signup_user">
<div class="form-group">
      <label for="name">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
      <label for="E-mail">E-mail:</label>
      <input type="E-mail" class="form-control" id="email" placeholder="Enter E-mail" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <div class="form-group">
      <label for="contact">Contact:</label>
      <input type="contact" class="form-control" id="contact" placeholder="Enter Phone Number, Eg: 682-102-2011" name="contact">
    </div>
    <div class="form-group">
      <label for="address">Address:</label>
      <input type="address" class="form-control" id="addr" placeholder="E.g. 1002 Greek Row Dr,Apt 212, Arlington, TX-76013" name="address">
    </div>
    <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">Date</label>
        <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>
      </div>
    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <input type="submit" class="btn btn-black col-md-2" value="Register" name="Register" />
    <input type="submit" class="btn btn-black col-md-2" value="Cancel" name="cancel" onclick="history.back();" />
  </form>
</div>
<footer id="fsignup">
        <div class="footer-copyright py-3 text-center bg-dark text-white">
        © 2018 Copyright:
        <a href="index.php"> Currency@Converter.com </a>
    </div>
</footer>
</body>
</html>
