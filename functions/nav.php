<nav class="navbar navbar-expand-md bg-light navbar-light">
        <div class="container">
  <a class="navbar-brand" href="home.php"><b>SIS</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
    	<?php if(isset($_SESSION['login_user_id'])) { ?>
      <li class="nav-item">
        <a class="nav-link " href="home.php"><i class="fas fa-home"></i> Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="attendance.php"><i class="fas fa-question-circle"></i> Atendance</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="results.php"><i class="fas fa-pen"></i>Results</a>
      </li>    
    </ul>
    <ul class="nav navbar-right ml-auto"> 
        <li class="nav-item">
    <div class="dropdown">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
         <?php echo $_SESSION['login_email'] ?>
        </button>
         <div class="dropdown-menu">
             <a class="dropdown-item" href="profile.php"><i class="fas fa-user"></i> Profile</a>
             <?php if($_SESSION['user_type'] == 'student'): ?>
               <a class="dropdown-item" href="chooseSubjects.php"><i class="fas fa-user"></i> Choose Subjects</a>
             <?php endif; ?>

             <a class="dropdown-item" href="../main/logout.php"><i class="fas fa-sign-in-alt"></i> Logout</a>
         </div>
    </div>
     </li>
 <?php } ?>
     <?php if (! isset($_SESSION['login_user_id'])) {
     	
      ?>
        <li class="nav-item"><a href="login.php" class="nav-link"><i class="fas fa-sign-in-alt"></i> signin</a></li>
        <li class="nav-item"><a  href="register_layout.php" class="nav-link"><i class="fas fa-user-plus"></i> signup</a></li>
        <?php } ?>
    </ul>
  </div>  
</div>
</nav>