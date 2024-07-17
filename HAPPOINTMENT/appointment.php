<?php
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, 'appointment');

  if(isset($_POST['updatedata']))
  {
    $userid = $_POST['Updated_list'];

    $bookid = $_POST['BOOK_ID'];
    $userid = $_POST['USER_ID'];
    $status = $_POST['STATUS'];
    $fullname = $_POST['FULLNAME'];
    $address = $_POST['ADDRESS'];
    $number = $_POST['NUMBER'];
    $petname = $_POST['PETNAME'];
    $breed = $_POST['BREED'];
    $birthdate = $_POST['BIRTHDATE'];
    $age = $_POST['AGE'];
    $species = $_POST['SPECIES'];
    $gender = $_POST['GENDER'];
    $genitals = $_POST['GENITALS'];
    $date = $_POST['DATE'];
    
    $query = "UPDATE book
      SET STATUS='$status',
          FULLNAME='$fullname',
          ADDRESS='$address',
          NUMBER='$fullname',
          PETNAME='$petname',
          BREED='$breed',
          BIRTHDATE='$birthdate',
          AGE='$age',
          SPECIES='$species',
          GENDER='$gender',
          GENITALS='$genitals',
          DATE='$date'
      WHERE BOOK_ID= '$bookid'";
    $query_run = mysqli_query($connection, $query);
    
    echo header("Location:appointment.php");
  }
?>

<?php
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection, 'appointment');

  if(isset($_POST['deletedata']))
  {
      $book_id = $_POST['delete_id'];

      $query = "DELETE FROM book WHERE book_id='$book_id'";
      $query_run = mysqli_query($connection, $query);

      echo header("Location:appointment.php");
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Herosky Admin - Appointment</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="appointment.php" class="nav-link active">
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
            <h1>Appointment</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        	<div class="col-12">
        		<div class="card">
              <div class="card-body table-responsive">
              	<?php
	                $connection = mysqli_connect("localhost","root","");
	                $db = mysqli_select_db($connection, 'appointment');

	                $query = "SELECT * FROM book";
	                $query_run = mysqli_query($connection, $query);
                ?>
                <table id="example1" class="table table-bordered table-striped table-hover text-nowrap">
                  <thead>
	                  <tr>
	                  	<th>ACTION</th>
                      <th>BOOK ID</th>
                      <th>USER ID</th>
                      <th>STATUS</th>
	                    <th>FULL NAME</th>
                      <th>ADDRESS</th>
                      <th>CONTACT NUMBER</th>
                      <th>BOOK DATE</th>
	                  </tr>
                  </thead>
                  <tbody>
                  	<?php
                      if($query_run)
                      {
                        foreach($query_run as $row)
                      	{
                    ?>
                    <tr>
                      <td>
                        <a class="btn btn-sm btn-success edit" href="#" data-toggle="modal" data-target="#editmodal"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-sm btn-danger delete" href="#" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash-alt"></i></a>
                      </td>
                          <td><?php echo $row['BOOK_ID']; ?></td>
                          <td><?php echo $row['USER_ID']; ?></td>
                          <td><?php echo $row['STATUS']; ?></td>
                          <td><?php echo $row['FULLNAME']; ?></td>
                          <td><?php echo $row['ADDRESS']; ?></td>
                          <td><?php echo $row['NUMBER']; ?></td>
                          <td class="d-none"><?php echo $row['PETNAME']; ?></td>
                          <td class="d-none"><?php echo $row['BREED']; ?></td>
                          <td class="d-none"><?php echo $row['BIRTHDATE']; ?></td>
                          <td class="d-none"><?php echo $row['AGE']; ?></td>
                          <td class="d-none"><?php echo $row['SPECIES']; ?></td>
                          <td class="d-none"><?php echo $row['GENDER']; ?></td>
                          <td class="d-none"><?php echo $row['GENITALS']; ?></td>
                          <td><?php echo $row['DATE']; ?></td>
                    </tr>
                    <?php           
                    	}	
                       }
                       else 
                       {
                        echo "No Record Found";
                       }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        	</div>
        </div>
      </div>

      <div class="modal fade" id="editmodal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Book Information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST">
            <div class="modal-body">
            <input type="hidden" name="Updated_list" id="Updated_list">
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-primary">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>STATUS</label>
                              <select class="form-control" name="STATUS" id="STATUS" value="">
                                <option>Pending</option>
                                <option>Cancelled</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>BOOK ID</label>
                              <input type="text" class="form-control" name="BOOKID" id="BOOKID" value="">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>USER ID</label>
                              <input type="text" class="form-control" name="USERID" id="USERID" value="">
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                              <label>FULL NAME</label>
                              <input type="text" class="form-control" name="FULLNAME" id="FULLNAME" value="">
                            </div>
                          </div>
                          <div class="col-md-9">
                            <div class="form-group">
                              <label>ADDRESS</label>
                              <input type="text" class="form-control" name="ADDRESS" id="ADDRESS" value="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>CONTACT NUMBER</label>
                              <input type="text" class="form-control" name="NUMBER" id="NUMBER" value="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>PETNAME</label>
                              <input type="text" class="form-control" name="PETNAME" id="PETNAME" value="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>BREED</label>
                              <input type="text" class="form-control" name="BREED" id="BREED" value="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>BIRTHDATE</label>
                              <input type="date" class="form-control" name="BIRTHDATE" id="BIRTHDATE" value="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>AGE</label>
                              <input type="text" class="form-control" name="AGE" id="AGE" value="">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>SPECIES</label>
                              <input type="text" class="form-control" name="SPECIES" id="SPECIES" value="">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>GENDER</label>
                              <input type="text" class="form-control" name="GENDER" id="GENDER" value="">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>GENITALS</label>
                              <input type="text" class="form-control" name="GENITALS" id="GENITALS" value="">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
                </div>
                <!--/.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="deletemodal">
        <div class="modal-dialog modal-md modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Quiz Information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST">
            <div class="modal-body text-center">
            <input type="hidden" name="delete_id" id="delete_id">
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-primary">
                    <form>
                      <div class="card-body">
                        <h4>Are you sure you want to delete this row?</h4>
                        <i class="fas fa-exclamation-triangle fa-3x"></i>
                      </div>
                      <!-- /.card-body -->
                      <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" name="deletedata" class="btn btn-default">Delete</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
                </div>
                <!--/.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

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
              <a href="index.php"><button type="button" class="btn btn-default">Log out</button></a>
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
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": false, 
      "lengthChange": true, 
      "autoWidth": false,
    });
  });
</script>
<script>
  $(document).ready(function () {

      $('.delete').on('click', function () {

          $('#deletemodal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function () {
              return $(this).text();
          }).get();

          console.log(data);

          $('#delete_id').val(data[1]);

      });
  });
</script>
<script>
  $(document).ready(function () {

    $('.edit').on('click', function () {

        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        console.log(data);

        $('#Updated_list').val(data[0]);
        $('#BOOKID').val(data[1]);
        $('#USERID').val(data[2]);
        $('#STATUS').val(data[3]);
        $('#FULLNAME').val(data[4]);
        $('#ADDRESS').val(data[5]);
        $('#NUMBER').val(data[6]);
        $('#PETNAME').val(data[7]);
        $('#BREED').val(data[8]);
        $('#BIRTHDATE').val(data[9]);
        $('#AGE').val(data[10]);
        $('#SPECIES').val(data[11]);
        $('#GENDER').val(data[12]);
        $('#GENITALS').val(data[13]);
        $('#DATE').val(data[14]);
    });
  });
</script>
</body>
</html>
