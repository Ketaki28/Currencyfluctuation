<div class="container mt-md" id="">
          <h2>Add a New Currency</h2>
          </div>
          <div class="container">
          <?php

                             
                            //$attributes = array('id' => 'jobs_form');
                            echo form_open('currencyConvertor/form_validation');

                            echo '<table cellpadding="5" id="signup">';
                            echo '<tr>';
                             echo "<td>" .form_label('Country:') . "</td>";
                              
                                $data_name = array('name'=>'country', 'placeholder'=>'Please specify Country Name');
                                echo "<td>" .form_input($data_name). "</td>";
                                echo '<div class = "error">';
                                echo form_error('country');
                                echo "</div>";
                            echo "</tr>";

                            echo "<tr>";
                                echo "<td>" .form_label('CurrencyName:'). "</td>";
                               
                                $data_currency = array('name'=>'cname', 'placeholder'=>'Please specify Currency Name');
                                echo "<td>".form_input($data_currency)."</td>";
                               echo '<div class = "error">';
                                echo form_error('cname');
                                echo "</div>";
                                echo "</tr>";
                           
                            echo "<tr>";
                                echo "<td>" .form_label('Value:'). "</td>";
                               
                                $data_value = array('name'=>'value', 'placeholder'=>'Please enter Value');
                                echo "<td>".form_input($data_value)."</td>";
                                echo '<div class = "error">';
                                echo form_error('value');
                                echo "</div>";

                            echo '<tr class="form-group">';
                                echo "<td>" .form_label('Date:'). "</td>";
                               
                                $data_date = array('name'=>'date', 'placeholder'=>'Date(yyyy-mm-dd)');
                                echo "<td>".form_input($data_date)."</td>";
                               echo '<div class = "error">';
                                echo form_error('date');
                                echo "</div>";
                                echo "</tr>";
                            
                            echo "</tr>";

                            echo '<tr class="form-check">';
                                echo '<td><input type="submit" class="btn btn-success" name="submit" value="Add Currency"></td>';?>
                                <td><a class="btn btn-warning" href="<?php echo base_url();?>index.php/currencyConvertor/manageCurrency"> Manage Currency</a></td>
                           <?php echo "</tr> </table>";
                             echo form_close();
                    ?>
         </div>


    
    <footer id="footadmin">
            <div class="footer-copyright py-3 text-center bg-dark text-white">
            © 2018 Copyright:
            <a href="index.php"> Currency@Converter.com </a>
        </div>
    </footer>
    </body>
    </html>