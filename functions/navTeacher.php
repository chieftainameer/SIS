<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading ">School Info System</div>
      <?php if(isset($_SESSION['login_user_id'])): ?>
      <div class="list-group list-group-flush">
        <a href="home.php" class="list-group-item list-group-item-action bg-primary text-white">Home</a>
        <a href="mark_attendance.php" class="list-group-item list-group-item-action bg-primary text-white">Mark  Attendance</a>
        <a href="mark_results.php" class="list-group-item list-group-item-action text-white bg-primary">Mark Results</a>
        <a href="timetable.php" class="list-group-item list-group-item-action text-white bg-primary">Time Table</a>
      </div>
    <?php endif; ?>
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
                <a class="dropdown-item" href="../main/logout.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

     