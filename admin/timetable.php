<?php  
include '../functions/database.php';
$q = "SELECT DISTINCT class FROM timetable WHERE approved=0";
$c = $con->query($q);
$co = $con->query($q);
// while ($row = $c->fetch_assoc()) {
//   echo $row['class'];
// }




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
<div id="accordion">
  <div class="row justify-content-center">
    <?php 
       while ($row_uni = $c->fetch_assoc())://main while loop
        extract($row_uni); 
        ?>
            <button style="padding: 15px;margin:20px"  class="btn btn-primary btn-lg"
             data-toggle="collapse" data-target="#time-<?php echo $class ?>"><?php echo $class ?></button>
      <?php 
        endwhile; // main  while loop ends here 
      ?>
    </div>
      <?php
      while ($row_sin = $co->fetch_assoc())://main while loop    
      $cls = $row_sin['class'];
     ?>
            <div class="collapse" data-parent="#accordion" id="time-<?php echo $row_sin['class'] ?>">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Teacher</th>
                    <th>Class</th>
                    <th>Subject</th>
                    <th>Time</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $qu = "SELECT * FROM timetable WHERE class='$cls'";
                    $cu = $con->query($qu);
                    if($cu->num_rows > 0){
                      while($r = $cu->fetch_assoc()){
                   ?>
                   <tr>
                     <td><?php echo $r['teacher_name'] ?></td>
                     <td><?php echo $r['class'] ?></td>
                     <td><?php echo $r['subject'] ?></td>
                     <td><?php echo $r['time'] ?></td>
                   </tr>
                  <?php }} ?>
            </tbody>
            </table>
            <div class="row justify-content-center">
            <button class="btn btn-primary" onclick="approveTimeTable('<?php echo $row_sin['class'] ?>')">Approve This</button>
            </div>
            </div>
      <?php 
        endwhile; // main  while loop ends here 
      ?>

   
 
</div>
</div>



<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    function approveTimeTable(clas){
      $.ajax({
        url:'approveTimeTable.php',
        type:'post',
        data:{'class':clas},
        dataType:'text',
        success:function(data,status){
          alert(data);
        },
      });
    }
  </script>
</body>
</html>