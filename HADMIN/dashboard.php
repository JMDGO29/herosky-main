<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Herosky Admin - Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!--Tab Icon-->
  <link rel="icon" href="dist/img/logo.png">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#log-out" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light ml-3">Herosky Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">ADMIN</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="appointment.php" class="nav-link">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>
                Appointment
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small Box (Stat card) -->
        <div class="row">
          <div class="col-lg-3 col-3">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "appointment";
                       
                    // Create connection by passing these
                    // connection parameters
                    $conn = new mysqli($servername, 
                        $username, $password, $dbname);
                       
                    // SQL query to find total count
                    // of college_data table
                    $sql = "SELECT count(*) FROM book ";
                    $result = $conn->query($sql);
                      
                    // Display data on web page
                    while($row = mysqli_fetch_array($result)) {
                        echo $row['count(*)'];
                    }
                       
                    // Close the connection
                    $conn->close();
                      
                  ?>
                </h3>

                <p>Total Appointment</p>
              </div>
              <div class="icon">
                <i class="fas fa-calendar-alt"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-3">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "appointment";
                       
                    // Create connection by passing these
                    // connection parameters
                    $conn = new mysqli($servername, 
                        $username, $password, $dbname);
                       
                    // SQL query to find total count
                    // of college_data table
                    $sql = "SELECT count(STATUS) FROM book WHERE STATUS='Pending'";
                    $result = $conn->query($sql);
                      
                    // Display data on web page
                    while($row = mysqli_fetch_array($result)) {
                        echo $row['count(STATUS)'];
                    }
                       
                    // Close the connection
                    $conn->close();
                      
                  ?>
                </h3>

                <p>Pending Appointment</p>
              </div>
              <div class="icon">
                <i class="fas fa-calendar-minus"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-3">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "appointment";
                       
                    // Create connection by passing these
                    // connection parameters
                    $conn = new mysqli($servername, 
                        $username, $password, $dbname);
                       
                    // SQL query to find total count
                    // of college_data table
                    $sql = "SELECT count(STATUS) FROM book WHERE STATUS='Approved'";
                    $result = $conn->query($sql);
                      
                    // Display data on web page
                    while($row = mysqli_fetch_array($result)) {
                        echo $row['count(STATUS)'];
                    }
                       
                    // Close the connection
                    $conn->close();
                      
                  ?>
                </h3>

                <p>Approved Appointment</p>
              </div>
              <div class="icon">
                <i class="fas fa-calendar-check"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-3">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "appointment";
                       
                    // Create connection by passing these
                    // connection parameters
                    $conn = new mysqli($servername, 
                        $username, $password, $dbname);
                       
                    // SQL query to find total count
                    // of college_data table
                    $sql = "SELECT count(STATUS) FROM book WHERE STATUS='Cancelled'";
                    $result = $conn->query($sql);
                      
                    // Display data on web page
                    while($row = mysqli_fetch_array($result)) {
                        echo $row['count(STATUS)'];
                    }
                       
                    // Close the connection
                    $conn->close();
                      
                  ?>
                </h3>

                <p>Cancelled Appointment</p>
              </div>
              <div class="icon">
                <i class="fas fa-calendar-times"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          
        </div>
        <!-- /.row -->
      </div>

      <div class="modal fade" id="log-out">
        <div class="modal-dialog modal-md modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-dark">
              <h4 class="modal-title">Log out</h4>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center">
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-primary">
                    <form>
                      <div class="card-body">
                        <h4>Are you sure you want to Log out?</h4>
                        <i class="fas fa-exclamation-triangle fa-3x"></i>
                      </div>
                      <!-- /.card-body -->
                    </form>
                  </div>
                  <!-- /.card -->
                </div>
                <!--/.col -->
              </div>
              <!-- /.row -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
              <a href="login.php"><button type="button" class="btn btn-default">Log out</button></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
