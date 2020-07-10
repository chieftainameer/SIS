
<?php  

include '../functions/database.php';
if (isset($_SESSION['login_user_id']) && $_SESSION['user_type'] != 'student') {
  header('Location:../main/login.php');
}
if (!isset($_SESSION['login_user_id'])) {
  header('Location:../main/login.php');
}
$roll = $_SESSION['roll'];
$q = "SELECT * FROM students WHERE roll_num='$roll'";
$c = $con->query($q);
$res = $c->fetch_assoc();
$class = $res['class'];

$query = "SELECT * FROM subjects WHERE class='$class'";
$co = $con->query($query);
$choosen = 0;
$k = "SELECT COUNT(*) AS total FROM choosen WHERE roll_num='$roll'";
$re = $con->query($k);
if ($re->num_rows > 0) {
	$re = $re->fetch_assoc();
	$choosen = $re['total'];
}




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<title>Choose Subjects</title>
	  <style type="text/css">
    body{
    background-color: #e7eae5;
  }
   li.nav-item{
          font-weight: bold;
        }
        li.nav-item:hover{
          background-color: silver;
          border-radius: 50px;
          transition: 1s;
        }
        li.nav-item a:hover{
          color: black;
        }
        .home-card{
          background-color: #f5f5f5;
          padding:30px;
          margin: 5px;
          text-align: center;
        }
        .login{
          margin-top: 20px;
         
        }
        .header-txt{
          margin-bottom: 15px;
          text-align: center;
        }
  </style>
</head>
<body>
  <?php include '../functions/nav.php' ?>
  <div class="container-fluid">
  	<div  class="home-card">
  		<p>Subject Selection Click on the subject to add in your bag</p>
  		<p>You have Choosen <?= $choosen ?> subjects</p>
  	</div>
  	<div class="row justify-content-center">
  		<?php while ($row = $co->fetch_assoc()){ 
  				extract($row);
  			 $q = "SELECT * FROM choosen WHERE subject_name='$subject_name' AND class='$class' AND roll_num='$roll'";
  			 $c = $con->query($q);
  			 if($c->num_rows > 0):
  			 	?>

  			<?php else: ?>
  			<div class="col-md-3 home-card" id="<?php echo $row['subject_name'] ?>" onclick="chooseSubject('<?php echo  $row['subject_name'] ?>','<?php echo $row['class']  ?>','<?php echo $roll; ?>')">
  				<?= $row['subject_name']; ?>
  			</div>
  		<?php endif; ?>
  		<?php } ?>
  	</div>
  </div>

  <script type="text/javascript">
  	function chooseSubject(subject,clas,roll){
  		//alert("working" + subject+" "+clas+" "+roll);
  		$.ajax({
  			url:'subjectSelection.php',
  			type:'post',
  			data:{'subject':subject,'class':clas,'roll':roll},
  			dataType:'json',
  			success:function(data,status){
  				//alert(data[0]);
  				if (data[1] == true) {
  					alert(data[0]);
  					$(`#${subject}`).remove();
  					location.reload();
  				}
  				else
  				{
  					alert(data);
  				}
  			}
  		});

  	}
  </script>
</body>
</html>