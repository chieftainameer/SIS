<?php  
include '../functions/database.php';
?>
<!DOCTYPE html>
<html>
<head>
	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <title>Timetable</title>

  <!-- Bootstrap core CSS -->
  

  <!-- Custom styles for this template -->
  <link href="../css/navAdmin.css" rel="stylesheet">

</head>
<body>
<?php include 'navAdmin.php'  ?>


<div class="container-fluid">
  <div class="home-card">
    <h3>Add Subjects</h3>
    <div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-6">
            <label>Class:</label>
            <select name="class" id="class" class="form-control">
              <option>Choose Class</option>
              <option>6th</option>
              <option>7th</option>
              <option>8th</option>
              <option>9th</option>
              <option>10</option>
            </select>
          </div>
          <div class="col-md-6">
            <label>Subject Name</label>
            <input type="text" name="subject" id="subject" class="form-control">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <button class="btn btn-primary" onclick="addSubject()">Add Subject</button>
          </div>
          </div>
        </div>
    </div>
  </div>
</div>



<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    function addSubject(){
      let clas = $('#class').val();
      let sub = $('#subject').val();
      if(clas == '' || sub == ''){
        alert("Sorry! Values can't be null");
      }
      else
      {
        $.ajax({
          url:'addSubject.php',
          type:'post',
          data:{'class':clas,'sub':sub},
          dataType:'text',
          success:function(data,status){
            alert(data);
          }
        });
      }
    }
  </script>
</body>
</html>