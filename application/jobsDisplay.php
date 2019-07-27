   <?php
                        if(isset($_POST["submit"])){
                            /*echo "submit me";*/
                            $name = trim($_POST["myName"]);
                            $email = trim($_POST["myEmail"]);
                            $experience = trim($_POST["myComments"]);
                            /*echo "fuck you!";*/
                            $errorMsg = "";
                            $code1 = $code2 = $code3 = 0;
                            if($name =="") {
                                 echo "<p> - Error : Name cannot be empty !</p>";
                                 $code = 1;
                            } /* name */
                            if($experience == ""){
                                echo "<p> - Error : Experience cannot be empty !</p>";
                            } /* experience */
                            if($email == ""){
                                echo "<p> - Error : Email cannot be empty !</p>";
                            }else{
                                if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
                                        echo "<p>- Error : invalid Email !</p>";   
                                        $code3 = 1;
                                    }
                            }/* invalid email */
                            try{
                            if($name == "" || $email == "" || $code3 == 1 || $experience == ""){
                                $code1 = 0;
                            }else{
                                    # connect to db
                                    include 'db_connection.php';
                                    $con = OpenCon();
                                    mysqli_autocommit($con,FALSE);

                                    # execute the query
            mysqli_query($con,"INSERT INTO jobs VALUES (DEFAULT,'$name','$email','$experience')");
                                    mysqli_commit($con);
                                    echo "Your Application is Submitted Successfully !";
                                    #close connection
                                    CloseCon($con);

                            }
                        }catch(Exception $e){

                        }
                        } /* is submit */
?>