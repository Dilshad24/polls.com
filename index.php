<?php
error_reporting(0);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>intern</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="style/bootstrap.min.css">
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#">Poll.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-light" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active result1" href="pages/result.php">Result</a>
      </li>
    </ul>
  </div>
</nav>
<div class="poll-container">
	<div class="pc-child">
		<form action='' method='POST'>
			<p>Who is your favorite author?</p>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Miguel de Cervantes">
			  <label class="form-check-label" for="exampleRadios1">
			    Miguel de Cervantes
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Charles Dickens">
			  <label class="form-check-label" for="exampleRadios2">
			    Charles Dickens
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="J.R.R. Tolkien">
			  <label class="form-check-label" for="exampleRadios3">
			    J.R.R. Tolkien
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="Antoine de Saint-Exuper">
			  <label class="form-check-label" for="exampleRadios4">
			    Antoine de Saint-Exuper
			  </label>
			</div>
			<div class="pc-button">
				<button type='submit' name='submit1' id='sbtn'>Submit</button>
			</div>
		</form>
	</div>

</div>
<?php  
	$db=mysqli_connect('localhost','root','','poll');
	$names=array("Miguel de Cervantes","Charles Dickens","J.R.R. Tolkien","Antoine de Saint-Exuper");
	$option=$_POST['exampleRadios'];
	if($option == 'Miguel de Cervantes'){
		$v=1;
	}
	elseif ($option == 'Charles Dickens'){
		$v=2;
	}
	elseif ($option == 'J.R.R. Tolkien'){
		$v=3;
	}
	elseif ($option == 'Antoine de Saint-Exuper'){
		$v=4;
	}
	$vall=0;
	foreach ($names as $name) {
		if($name == $option){
			$sql = "SELECT namecount FROM name WHERE id=$v";
			$result = $db->query($sql);
			while($row = $result->fetch_assoc()) {
			    $namecount=$row['namecount'];
			    $vall=$namecount+1;
			  }
			break;
		}
	}
	$sqlu = "UPDATE name SET namecount='$vall' WHERE id=$v";
	$db->query($sqlu);
	$db->close();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


