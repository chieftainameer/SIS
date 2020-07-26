<?php  
include '../functions/database.php';
$query = "SELECT * FROM parents WHERE status=1";
$result = $con->query($query);

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

  <title>Approved Parents</title>

  <!-- Bootstrap core CSS -->
  

  <!-- Custom styles for this template -->
  <link href="../css/navAdmin.css" rel="stylesheet">

</head>
<body>
<?php include 'navAdmin.php'  ?>


<div class="container-fluid">
  <div class="home-card">
    <h3>Approved Parents</h3>
    <table class="table table-stiped table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Relation</th>
          <th>Class</th>
          <th>Student Roll Num</th>
          <th>Contact No</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): 
          extract($row);
         ?>
        <tr>
          <td><?= $name ?></td>
          <td><?= $relation ?></td>
          <td><?= $class ?></td>
          <td><?= $student_roll_num ?></td>
          <td><?= $contact_num ?></td>
          <td><button class="btn btn-primary" onclick="deleteData('parents',<?= $id ?>)" >Delete</button></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>



<script>
  function deleteData(table,id){
    //alert(table + id);
    $.ajax({
      url: 'deleteData.php',
      type:'post',
      data:{'table':table,'id':id},
      dataType:'text',
      success:function(data,staus){
        alert(data);
        location.reload();

      },
    });
  }
</script>
</body>
</html>