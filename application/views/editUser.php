<?php
$connection=mysqli_connect("localhost","root","","currencyfluctuation");

?>

<div class="container mt-md" id="">
        <h2>Edit a existing user</h2>
    </div>
   <?php $emailsel= "";
    if(isset($_POST['edit'])){
      $emailsel=$_POST['optradio'];
      ;
    }  



      $sqldisp='Select name , contact, address,DOB from person where email="'.$emailsel.'"';
      $name ="";
      $contact = "";
     $address ="" ;
     $date = "" ;
      $query = mysqli_query($connection,$sqldisp);
      $data = $query->fetch_assoc();
       $name = $data["name"];
       $contact = $data["contact"];
       $address = $data["address"];
       $date = $data["DOB"];


     


    echo '<div class="container">';
    echo    ' <form action="updateUser" method="post">';
      echo'  <div class="form-group">';
         echo' <label for="name">Name:</label>';
        echo'  <input type="name" class="form-control" id="name" value="'.$name.'" name="name">';
        echo'</div>';
      echo'  <div class="form-group">';
        echo'  <label for="E-mail">E-mail:</label>';
         echo'<input type="E-mail" class="form-control" id="E-mail" placeholder="'. $emailsel.'" name="E-mail" readonly>';
       echo' </div>';
       echo' <div class="form-group">';
         echo' <label for="contact">Contact:</label>';
         echo' <input type="contact" class="form-control" id="contact" value="'.$contact.'" name="contact">';
        echo'</div>';
       echo' <div class="form-group">';
        echo' <label for="address">Address:</label>';
        echo'  <input type="address" class="form-control" id="addr"value="'.$address.'" name="addr">';
       echo' </div>';
        echo'<div class="form-group">';
         echo'   <label class="control-label" for="date">Date of Birth</label>';
           echo' <input class="form-control" id="date" name="date" value="'.$date.'" type="text"/>';
          echo'</div>';
       echo' <div class="form-check">';
        echo'</div>';
        ?>
        <?php
       

         
        if ((isset($_POST['editUser']))) {
           $name=$_POST["name"];
            $contact=$_POST["contact"];
            $addr=$_POST["addr"];
            $date=$_POST["date"];
            $sqledit="UPDATE person SET name = '$name', contact = '$contact', address='$addr', DOB='$date' WHERE email='$emailsel'";
 mysqli_query($connection,$sqledit);
 echo $sqledit;
          echo "Data Updated";
        }
        ?>
        <input type="submit" name="editUser" class="btn btn-primary" value="Edit User">
        <a class="btn btn-warning" href="manageUser.php" id="">Manage User</a>
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