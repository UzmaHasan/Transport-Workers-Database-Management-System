<?php
  session_start();

  if($_SESSION['CHECK_VAL']==null)
  {
     //echo $_SESSION['CHECK_VAL'];
     session_destroy();
     header("location:login.php?");
  }

?>






<?php
function selectEmp($query, $id="id") {
    global $con;

    $results = array();
    $sql = OCI_Parse($conn, $query);
    OCI_Execute($sql);
    while ( false!==($row=oci_fetch_assoc($sql)) ) {
        $results[ $row[$id] ] = $row;
    }
    return $results;
}
$id1=$_GET['id'];
$con = oci_connect('final','final','localhost/XE');
if(!$con)
{
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
$flag=0;
$type = oci_parse($con,'select emp_type from employee where emp_id = :nid');
              oci_bind_by_name($type, ':nid',$nid);
              oci_execute($type);
              while($row = oci_fetch_array($type)){
                echo $row[0];
                if($row[0] == 'Driver')
                {
                    $flag=1;;
                }
                else $flag=2;
              }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>TRANSPORT WORKERS' DATABASE MANAGEMENT SYSTEM</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Leave Info</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="allEmp.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Employee Info">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Employee Info</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="education.php?id=<?php echo $id1 ?>">Education</a>
            </li>
            <li>
              <a href="dependents.php?id=<?php echo $id1 ?>">Dependents</a>
            </li>
            <li>
              <a href="accounts.php?id=<?php echo $id1 ?>">Accounts</a>
            </li>
            <li>
              <a href="contact.php?id=<?php echo $id1 ?>">Contact Info</a>
            </li>
            <li>
              <a href="health.php?id=<?php echo $id1 ?>">Health Info</a>
            </li>

            <li>
              <a href="leave.php?id=<?php echo $id1 ?>">Leave Details</a>
            </li>

            <li>
              <a href="overtime.php?id=<?php echo $id1 ?>">Overtime</a>
            </li>
            <li>
              <a href="workerTypeInfo.php?id=<?php echo $id1 ?>">Worker Type Info</a>
            </li>


          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Work Related Info">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Work Related Info</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
          <li>
              <a href="workingSchedule.php?id=<?php echo $id1 ?>">Working Schedule</a>
            </li>
            <li>
              <a href="vehicleRoute.php?id=<?php echo $id1 ?>">Vehicle and Route Info</a>
            </li>
            <li>
              <a href="penaltyFeedback.php?id=<?php echo $id1 ?>">Penalty and Feedback</a>
            </li>
            <li>
              <a href="vehicleDamage.php?id=<?php echo $id1 ?>">Vehicle Damage Info</a>
            </li>
            <li>
              <a href="companyHelp.php?id=<?php echo $id1 ?>">Company Help</a>
            </li>
            <li>
              <a href="totalWorkingDays.php?id=<?php echo $id1 ?>">Total Working Days</a>
            </li>
            <li>
              <a href="vehiclesDriven.php?id=<?php echo $id1 ?>">Vehicles Driven</a>
            </li>

          </ul>
        </li>

        

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">

          
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

<form method="POST" action="">


<div class="container">
<div class="card card-register mx-auto mt-5">
<div class="card-header"><strong>Find The Number Of Leaves Taken</strong></div>
<div class="card-body">

<div class="form-group">
<div class="form-group">
                     <label for="InputFatherName">Start Date</label>
                     <br><input class="form-control" type="date" name="start_date" </br>
                 </div>
              <div class="form-group">
                     <label for="InputFatherName">End Date</label>
                     <br><input class="form-control" type="date" name="end_date" </br>
                 </div>


            <div class="form-row">
              <div class="col-md-5">
              </div>

              <div class="col-md-4">
                <input type="submit" name = "submit" value="FIND">
              </div>

              <div class="col-md-3">
              </div>

</form>


<div class="card mb-3">
        <div class="card-header">

          <i class="fa fa-table"></i> LEAVE INFORMATION OF EMPLOYEE <?php echo $id1 ?> </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

			<tbody>
      <?php
$Start_date = date("d-m-Y",strtotime(@$_POST['start_date']));
$End_date = date("d-m-Y",strtotime(@$_POST['end_date']));
//echo $Start_date;
//echo $End_date;


$nid=$_GET['id'];
$stid = oci_parse($con, "select Emp_id,first_name||' '||middle_name||' '||last_name,start_date,end_date,reason,
granting_person from leave
join leave_taken using (application_no,application_date)
join employee using (emp_id)
where emp_id= :nid");

$stid2 = oci_parse($con, "begin
:leave:=findLeave(to_date(:start_date,'dd-mm-yyyy'),to_date(:end_date,'dd-mm-yyyy'),:nid);
end;");
oci_bind_by_name($stid2, ':start_date', $Start_date);
oci_bind_by_name($stid2, ':end_date', $End_date);
oci_bind_by_name($stid2, ':nid', $nid);
oci_bind_by_name($stid2, ':leave', $msg,80);
oci_bind_by_name($stid, ':nid', $nid);
oci_execute($stid);

//echo var_dump($stid2);
while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  ?>
   <tr><td> <h5>ID :</h5> </td> <td><?php echo $row[0]?></td><td></td><td></td><td></td><td></td><td></td><td></td> </tr>
                <tr><td> <h5>Name :</h5> </td> <td><?php echo $row[1]?></td><td></td><td></td><td></td><td></td><td></td><td></td> </tr>
                <tr><td> <h5>Start Date :</h5> </td> <td><?php echo $row[2]?></td><td></td><td></td><td></td><td></td><td></td><td></td> </tr>

                <tr><td> <h5>End Date :</h5> </td> <td><?php echo $row[3]?></td><td></td><td></td><td></td><td></td><td></td><td></td> </tr>
                <tr><td> <h5>Reason :</h5> </td> <td><?php echo $row[4]?></td><td></td><td></td><td></td><td></td><td></td><td></td> </tr>
                <tr><td> <h5>Granting Person :</h5> </td> <td><?php echo $row[5]?></td><td></td><td></td><td></td><td></td><td></td><td></td> </tr>



   </tr>
<?php
}
if(isset($_POST['submit']))
{
  echo 'Number Of days You Have Taken Leave is: ';
  if(oci_execute($stid2))
  {
    print $msg;
  }
}




oci_free_statement($stid);
oci_close($con);
?>

			</tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>




    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>

</html>
