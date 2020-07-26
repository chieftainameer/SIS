<<<<<<< HEAD
<div class="d-flex" id="wrapper">
=======
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
      <li class="nav-item">
        <a class="nav-link " href="timetable.php"><i class="fas fa-pen"></i>Time Table</a>
      </li>  
    </ul>
    <ul class="nav navbar-right ml-auto"> 
        <li class="nav-item">
    <div class="dropdown">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
         <?php echo $_SESSION['name'] ?>
        </button>
         <div class="dropdown-menu">
             <a class="dropdown-item" href="profile.php"><i class="fas fa-user"></i> Profile</a>
             <?php if($_SESSION['user_type'] == 'student'): ?>
               <a class="dropdown-item" href="chooseSubjects.php"><i class="fas fa-user"></i> Choose Subjects</a>
             <?php endif; ?>
>>>>>>> cea5e247788ff2bea641a0be1d6fe5e5f94fb975

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading ">School Info System</div>
      <div class="list-group list-group-flush">
        <a href="home.php" class="list-group-item list-group-item-action bg-primary text-white">Home</a>
        <a href="attendance.php" class="list-group-item list-group-item-action bg-primary text-white">Attendance</a>
        <a href="results.php" class="list-group-item list-group-item-action text-white bg-primary">Results</a>
        <a href="timetable.php" class="list-group-item list-group-item-action text-white bg-primary">Time Table</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-primary border-bottom">
        <button class="btn btn-primary" id="menu-toggle">
          <span class="navbar-toggler-icon"></span>
        </button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['name']  ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profile.php">Profile</a>
                
                <?php if($_SESSION['user_type'] == 'student'): ?>
                  <a class="dropdown-item" href="chooseSubjects.php">Choose Subjects</a>
                <?php endif; ?>

                <a class="dropdown-item" href="../main/logout.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

     
