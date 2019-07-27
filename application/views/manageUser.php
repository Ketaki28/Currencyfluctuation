 <div class="container mt-md" id="">
          <h2>Manage Users</h2>
          </div>
          <div class="container">
            <div class="row">
                <div class="col-sm-12">

    <?php
  
    echo '<form action="editUser" method="post">';

    if (true) {
              echo '<table class="table container">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Choose Any one</th>';
        echo '<th scope="col">Name</th>';
        echo '<th scope="col">Email</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
     foreach ($ty as $i ) {

        echo '<tr>';
        echo '<td><div class="radio">';
        echo '<label><input type="radio" value="'.$i ->email.'" name="optradio"></label>';

        echo '</div></td>';
        echo '<td>'.$i ->name.'</td>';
        echo ' <td>'.$i ->email.'</td>';
        echo ' </tr>';

        
      }
        echo '</tbody>';
        echo '</table>';  
    }
    else{
      echo "No User found";
    }

    // if((isset($_POST['submit'])))
    // {
    //   if (isset($_POST['optradio'])) {
    //     echo $_POST['optradio'];
    //     $emailDelete = $_POST['optradio'];
    //    $sqldel='Delete from person where email="'.$emailDelete.'"';
      
    //    mysqli_query($connection,$sqldel); 
    //       echo "Data Deleted";
    //   }
    // }
    //if((isset($_POST['edit']))){
    //  $_SESSION['selection']=$_POST['optradio'];
    //  header('Location: editUser.php');
    //}
    
    ?>
                </div>
            </div>
            
    </div>
    <div class="container" id="btnclass">
            <a class="btn btn-success"  href="<?php echo base_url();?>index.php/currencyConvertor/newUser" id="">Add User</a>
        
            <input type="submit" name="submit" class="btn btn-danger" value="Delete User">
       
            <input type="submit" name="edit" class="btn btn-primary" value="Edit User" href="<?php echo base_url();?>index.php/currencyConvertor/editUser">
        </form>
    </div>
    </div>
    <footer id="aboutfooter">   
            <div class="footer-copyright py-3 text-center bg-dark text-white">
            © 2018 Copyright:
            <a  href="<?php echo base_url();?>index.php/currencyConvertor/firstpage"> Currency@Converter.com </a>
        </div>
    </footer>
      </body>
      </html>
