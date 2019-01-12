<!DOCTYPE html>
<html lang="en">
<head>
  <title>Restful API Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  	
<div class="container">
  <div class="row text-center" style="padding-bottom: 50px;">
  	<div class="jumbotron text-center">
		  <h1>Student Record</h1>
	</div>
    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">    	
      	<form class="form-inline" action="" method="POST">
          <div class="form-group">
            <label for="id">Student ID : </label>
            <input type="text" class="form-control" id="id" name="student_id">
          </div>
          <button type="submit" name="submit" class="btn btn-default">Submit</button>
          <a href="index.php"><button type="button" name="reset" class="btn btn-default">Reset</button></a>
        </form>
    </div>
  </div>
  
  <?php
    if(isset($_POST['submit']))
    {
      $name = $_POST['student_id'];      
      $url = "http://localhost/Restfull_API/api.php?name=".$name;      
      $client = curl_init($url);
      curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
      $response = curl_exec($client);      
      $result = json_decode($response, true);      
      ?>
	      <div class="row">
			  	<div class="col-sm-12  col-md-12 col-xs-12 col-lg-12">
			  		<table class="table table-bordered">
					    <thead>
					      <tr>
					        <th>Id</th>
					        <th>Name</th>
					        <th>Age</th>
					        <th>Class</th>
					        <th>Roll No</th>
					        <th>DOB</th>
					        <th>Picture</th>
					      </tr>
					    </thead>
					    <tbody>	      	
					      <tr>
					        <td><?php echo $result['Id']; ?></td>
					        <td><?php echo $result['Name']; ?></td>
					        <td><?php echo $result['Age']; ?></td>
					        <td><?php echo $result['Class']; ?></td>
					        <td><?php echo $result['Roll_No']; ?></td>
					        <td><?php echo $result['DOB']; ?></td>
					        <td><img id="myImg" onclick="lightBox('myImg')" src="<?php echo $result['Picture']; ?>" style="height: 100px; width: 100px;" alt="<?php echo $result['Name']; ?> image"></td>
					      </tr>
						</tbody>
					</table>
			  	</div>
			</div>
	      <?php    
    }else{    
	      $url = "http://localhost/Restfull_API/api.php?name=all";      
	      $client = curl_init($url);
	      curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	      $response = curl_exec($client);      
	      $result = json_decode($response, true); 
	      ?>
	      <div class="row">
			  	<div class="col-sm-12  col-md-12 col-xs-12 col-lg-12" style="overflow: scroll;">
			  		<table class="table table-bordered">
					    <thead>
					      <tr>
					        <th>Id</th>
					        <th>Name</th>
					        <th>Age</th>
					        <th>Class</th>
					        <th>Roll No</th>
					        <th>DOB</th>
					        <th>Picture</th>
					      </tr>
					    </thead>
					    <tbody>
	      <?php     
	      foreach ($result as $key => $value) {
	      	?>	      	
					      <tr>
					        <td><?php echo $value['Id']; ?></td>
					        <td><?php echo $value['Name']; ?></td>
					        <td><?php echo $value['Age']; ?></td>
					        <td><?php echo $value['Class']; ?></td>
					        <td><?php echo $value['Roll_No']; ?></td>
					        <td><?php echo $value['DOB']; ?></td>
					        <td><img id="myImg<?php echo $value['Id']; ?>" onclick="lightBox('myImg<?php echo $value['Id']; ?>')" src="<?php echo $value['Picture']; ?>" style="height: 100px; width: 100px;" alt="<?php echo $value['Name']; ?> image"></td>
					      </tr>
	      	<?php
	      }
	      ?>
	      				</tbody>
					</table>
			  	</div>
			</div>
	     <?php
	      
      }
   ?>
</div>
<div id="myModal" class="modal">
	  <span class="close">&times;</span>
	  <img class="modal-content" id="img01">
	  <div id="caption"></div>
</div>
<script>
	function lightBox(id){
		var modal = document.getElementById('myModal');
		var img = document.getElementById(id);
		var modalImg = document.getElementById("img01");
		var captionText = document.getElementById("caption");
		
		  modal.style.display = "block";
		  modalImg.src = img.src;
		  captionText.innerHTML = img.alt;

		var span = document.getElementsByClassName("close")[0];
		span.onclick = function() { 
		  modal.style.display = "none";
		}
	}

</script>

</body>
</html>
