<?php
echo '<html>';
  echo '<head>';
   // <!--Load the AJAX API-->
    echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>';
    echo '<script type="text/javascript">';

      // Load the Visualization API and the corechart package.
      echo 'google.charts.load(\'current\', {\'packages\':[\'corechart\']});';

      // Set a callback to run when the Google Visualization API is loaded.
      echo 'google.charts.setOnLoadCallback(drawChart);';

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      echo 'function drawChart() {';

        // Create the data table.
        echo 'var data = new google.visualization.DataTable();';
        echo 'data.addColumn(\'string\', \'Currency\');';
        echo 'data.addColumn(\'number\', \'Value\');';
        //echo 'data.addRows([';
          //echo '[\'INR\', 65],';
          //echo '[\'GBP\', 0.71],';
          //echo '[\'EURO\', 0.82],';
        //echo ']);';
        echo 'var dataArray = [];';
        
        foreach ($records as $row){

            if($row->currencyName != 'USD'){
                echo 'dataArray.push([\''.$row->currencyName.'\','.$row->value.']);';              
            }//end of if

        }//end of for
        echo 'console.log(dataArray);';
        echo 'data.addRows(dataArray);';
        
        // Set chart options
        echo 'var options = {\'title\':\'Currency Chart with respect to USD: \',';
                       echo '\'width\':700,';
                       echo '\'height\':400};';

        // Instantiate and draw our chart, passing in some options.
        echo 'var chart = new google.visualization.BarChart(document.getElementById(\'chart_div\'));';
        echo 'chart.draw(data, options);';
      echo '}';
    echo '</script>';
  echo '</head>';

  echo '<body>';
    //<!--Div that will hold the pie chart-->
  echo '<div class="container">';
  echo'<div class="row text-justify alert alert-warning"';
    echo'<div class=" "><p>This is a currency chart which displays values dynamically of all the currencies present and also gives a pictorial graph representation of these currencies. the graph kepps changing as the currency of of USD or any other currency fluctuates on daily basis. This helps you in understanding which currency is going strong in the market at this moment</p> </div>';
    echo '<div id="chart_div" class="col-md-6 col-sm-6" style="margin-top:0%;margin-left:20%;"></div>';
    echo '</div>';
    echo'</div>';
    echo '<footer id="aboutfooter">
            <div class="footer-copyright py-3 text-center bg-dark text-white">
            © 2018 Copyright:
            <a href="index.php"> Currency@Converter.com </a>
        </div>
    </footer>';
  echo '</body>';
echo '</html>';

?>