<?php  

include '../functions/database.php';
$s_rk_q = "SELECT * FROM students WHERE status=0 LIMIT 0,7";
$s_rk_c = $con->query($s_rk_q);

$p_rk_q = "SELECT * FROM parents WHERE status=0 LIMIT 0,7";
$p_rk_c = $con->query($p_rk_q);

$t_rk_q = "SELECT * FROM teacher WHERE status=0 LIMIT 0,7";
$t_rk_c = $con->query($t_rk_q);

$limit = 7;

$s_q = "SELECT COUNT(*) AS total FROM students WHERE status=0";
$s_r = $con->query($s_q);
$s_res = $s_r->fetch_assoc();
$s_total_rec = $s_res['total'];
$s_pages = ceil($s_total_rec/$limit);

$p_q = "SELECT COUNT(*) AS total FROM parents WHERE status=0";
$p_r = $con->query($p_q);
$p_res = $p_r->fetch_assoc();
$p_total_rec = $p_res['total'];
$p_pages = ceil($p_total_rec/$limit);

$t_q = "SELECT COUNT(*) AS total FROM teacher WHERE status=0";
$t_r = $con->query($t_q);
$t_res = $t_r->fetch_assoc();
$t_total_rec = $t_res['total'];
$t_pages = ceil($t_total_rec/$limit);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Students Approvals</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <link href="../css/navAdmin.css" rel="stylesheet">

</head>
<body>
	<?php include 'navAdmin.php'; ?>
	<div class="container-fluid">
	<div style="margin-top: 30px;">
	  <ul class="nav nav-tabs">
	    <li class="nav-item">
	      <a class="nav-link active" data-toggle="tab" href="#student">Student Approvals</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" data-toggle="tab" href="#parent">Parent Approvals</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" data-toggle="tab" href="#teacher">Teacher Approvals</a>
	    </li>
	  </ul>
	</div>

  <!-- Tab panes -->
	  <div class="tab-content">
	    <div id="student" class="container tab-pane active"><br>
	      <h3>Students</h3>
	      <p>these student requests needs approval by the admin.<p>
	      	<table id="student-table" class="table table-hover" style="max-height:50px;">
	      		<thead>
	      			<tr>
	      				<th>Name</th>
	      				<th>Email</th>
	      				<th>Class</th>
	      				<th>Roll No</th>
	      				<th>Contact No</th>
	      				<th></th>
	      			</tr>
	      		</thead>
	      		<tbody>
	      			<?php if($s_rk_c->num_rows > 0): ?>
		      			<?php while($row = $s_rk_c->fetch_assoc()): 
 							// print_r($s_rk_c->fetch_assoc());
 							//print_r($row);
		      				?>
		      			 	<tr>
		      			 		<td><?= $row['name'] ?></td>
		      			 		<td><?= $row['email'] ?></td>
		      			 		<td><?= $row['class'] ?></td>
		      			 		<td><?= $row['roll_num'] ?></td>
		      			 		<td><?= $row['contact_num'] ?></td>
		      			 		<td><button class="btn btn-primary" onclick='approve("<?php echo $row['roll_num'] ?>","<?php echo $row['class'] ?>","students")'>Approve</button></td>
		      			 	</tr>
		      			<?php endwhile; ?>
		      			<?php else: ?>
		      				<tr>
		      					<td colspan="7">No Data to show</td>
		      				</tr>
		      			<?php endif; ?>
	      			 
	      		</tbody>
	      		<tfoot>
	      			<tr>
		      			<td colspan="7">
			      			<ul class="pagination">
			      				<?php for ($i=0; $i < $s_pages ; $i++): ?>
			      					<li class="page-item"><a  class="page-link text-primary" onclick="paginate('student-table',<?php echo $i ?>,'students')"><?= $i+1 ?></a></li>
			      				<?php endfor; ?>
			      			</ul>
		      		    </td>
	      		    </tr>
	      		</tfoot>
	      	</table>
	    </div>




	    <!-- Parents Table -->
	    <div id="parent" class="container tab-pane fade"><br>
	      <h3>Parents</h3>
	      <p>these parent requests needs approval by the admin.<p>
	      	<table id="parent-table" class="table table-hover" style="max-height:50px;">
	      		<thead>
	      			<tr>
	      				<th>Name</th>
	      				<th>Email</th>
	      				<th>Child's Class</th>
	      				<th>Child's Roll No</th>
	      				<th>Contact No</th>
	      				<th></th>
	      			</tr>
	      		</thead>
	      		<tbody>
	      			<?php if($p_rk_c->num_rows > 0): ?>
		      			<?php while($p_row = $p_rk_c->fetch_assoc()): 
 							// print_r($s_rk_c->fetch_assoc());
 							print_r($row);
		      				?>
		      			 	<tr>
		      			 		<td><?= $p_row['name'] ?></td>
		      			 		<td><?= $p_row['email'] ?></td>
		      			 		<td><?= $p_row['class'] ?></td>
		      			 		<td><?= $p_row['student_roll_num'] ?></td>
		      			 		<td><?= $p_row['contact_num'] ?></td>
		      			 		<td><button class="btn btn-primary" onclick='approve("<?php echo $p_row['student_roll_num'] ?>","<?php echo $p_row['class'] ?>","parents")'>Approve</button></td>
		      			 	</tr>
		      			<?php endwhile; ?>
		      			<?php else: ?>
		      				<tr>
		      					<td colspan="7">No Data to show</td>
		      				</tr>
		      			<?php endif; ?>
	      			 
	      		</tbody>
	      		<tfoot>
	      			<tr>
		      			<td colspan="7">
			      			<ul class="pagination">
			      				<?php for ($i=0; $i < $p_pages ; $i++): ?>
			      					<li class="page-item"><a  class="page-link text-primary" onclick="paginate_parent('parent-table',<?php echo $i ?>,'parents')"><?= $i+1 ?></a></li>
			      				<?php endfor; ?>
			      			</ul>
		      		    </td>
	      		    </tr>
	      		</tfoot>
	      	</table>
	    </div>



	    <!-- Teachers Table -->
	    <div id="teacher" class="container tab-pane fade"><br>
	       <h3>Parents</h3>
	      <p>these parent requests needs approval by the admin.<p>
	      	<table id="teacher-table" class="table table-hover" style="max-height:50px;">
	      		<thead>
	      			<tr>
	      				<th>Name</th>
	      				<th>Email</th>
	      				<th>Class</th>
	      				<th>Qualification</th>
	      				<th>Contact No</th>
	      				<th></th>
	      			</tr>
	      		</thead>
	      		<tbody>
	      			<?php if($t_rk_c->num_rows > 0): ?>
		      			<?php while($t_row = $t_rk_c->fetch_assoc()): 
 							// print_r($s_rk_c->fetch_assoc());
 							//print_r($row);
		      				?>
		      			 	<tr>
		      			 		<td><?= $t_row['name'] ?></td>
		      			 		<td><?= $t_row['email'] ?></td>
		      			 		<td><?= $t_row['class'] ?></td>
		      			 		<td><?= $t_row['qualification'] ?></td>
		      			 		<td><?= $t_row['contact_num'] ?></td>
		      			 		<td><button class="btn btn-primary" onclick='approve("<?php echo $t_row['email'] ?>","<?php echo $t_row['class'] ?>","teachers")'>Approve</button></td>
		      			 	</tr>
		      			<?php endwhile; ?>
		      			<?php else: ?>
		      				<tr>
		      					<td colspan="7">No Data to show</td>
		      				</tr>
		      			<?php endif; ?>
	      			 
	      		</tbody>
	      		<tfoot>
	      			<tr>
		      			<td colspan="7">
			      			<ul class="pagination">
			      				<?php for ($i=0; $i < $t_pages ; $i++): ?>
			      					<li class="page-item"><a  class="page-link text-primary" onclick="paginate_teacher('teacher-table',<?php echo $i ?>,'teacher')"><?= $i+1 ?></a></li>
			      				<?php endfor; ?>
			      			</ul>
		      		    </td>
	      		    </tr>
	      		</tfoot>
	      	</table>
	    </div>
	  </div>
   </div>

  </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    function paginate(tbl,page,dbTable){

    	$.ajax({
    		url:'paginate_parent.php',
    		type:'post',
    		data:{'page':page,'table':dbTable},
    		dataType:'json',
    		success:function(data,status){
    			console.log(data);
    			$(`#${tbl} tbody`).empty();
    			$.each(data,function(d,v){
    				$(`#${tbl} tbody`).append(`<tr>
    					<td>${v.name}</td>
    					<td>${v.email}</td>
    					<td>${v.class}</td>
    					<td>${v.roll_num}</td>
    					<td>${v.contact_num}</td>
    					<td><button class="bt btn-primary" onclick='approve("${v.roll_num}","${v.class}")'>Approve</button></td>
    					</tr>`);
    			});
    			
    		},
    	});
    }

    function paginate_parent(tbl,page,dbTable){

    	$.ajax({
    		url:'paginate.php',
    		type:'post',
    		data:{'page':page,'table':dbTable},
    		dataType:'json',
    		success:function(data,status){
    			console.log(data);
    			$(`#${tbl} tbody`).empty();
    			$.each(data,function(d,v){
    				$(`#${tbl} tbody`).append(`<tr>
    					<td>${v.name}</td>
    					<td>${v.email}</td>
    					<td>${v.class}</td>
    					<td>${v.student_roll_num}</td>
    					<td>${v.contact_num}</td>
    					<td><button class="bt btn-primary" onclick='approve("${v.student_roll_num}","${v.class}")'>Approve</button></td>
    					</tr>`);
    			});
    			
    		},
    	});
    }

    function paginate_teacher(tbl,page,dbTable){

    	$.ajax({
    		url:'paginate_teacher.php',
    		type:'post',
    		data:{'page':page,'table':dbTable},
    		dataType:'json',
    		success:function(data,status){
    			console.log(data);
    			$(`#${tbl} tbody`).empty();
    			$.each(data,function(d,v){
    				$(`#${tbl} tbody`).append(`<tr>
    					<td>${v.name}</td>
    					<td>${v.email}</td>
    					<td>${v.class}</td>
    					<td>${v.qualification}</td>
    					<td>${v.contact_num}</td>
    					<td><button class="bt btn-primary" onclick='approve("${v.email}","${v.class}")'>Approve</button></td>
    					</tr>`);
    			});
    			
    		},
    	});
    }


    function approve(r,c,section){
    	alert("working " + r + " " +c + " "+section);
    	$.ajax({
    		url:'approve.php',
    		type:'post',
    		data:{'roll_or_email':r,'class':c,'section':section},
    		dataType:'text',
    		success:function(data,status){
    			alert(data);
    		}
    	});
    }


  </script>
</body>
</html>