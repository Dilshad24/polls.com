<?php
error_reporting(0);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Poll Result</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/bootstrap.min.css">
  <link rel="stylesheet" href="../style/style.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      <?php
      $db=mysqli_connect('localhost','root','','poll');
      $sql = "SELECT namecount FROM name";
          $result = $db->query($sql);
          $cart = array();

          while($row = $result->fetch_assoc()) {
              $namecount=$row['namecount'];
              array_push($cart, $namecount);
          }
          $v1=$cart[0];
          $v2=$cart[1];
          $v3=$cart[2];
          $v4=$cart[3];

      echo "
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Miguel de Cervantes',     $v1],
          ['Charles Dickens',      $v2],
          ['J.R.R. Tolkien',  $v3],
          ['Antoine de Saint-Exuper', $v4]
        ]);
      ";
      ?>

        var options = {
          title: 'Poll'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light ">
  <a class="navbar-brand" href="#">Poll.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link home2" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link active text-light" href="#">Result</a>
      </li>
    </ul>
  </div>
</nav>
<div class="resultcontainer">
<div id="piechart"></div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


