<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['omrsaid']==0)) {
  header('location:logout.php');
  } else{


  ?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <title>dashboard</title>

    
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="css/csss.css">
  </head>

  <body>

    <?php include_once('includes/header.php');?>

   <?php include_once('includes/sidebar.php');?>

    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Dashboard|ዳሽ ቦርድ </h5>
       
      </div>

<div class="am-pagebody">
        <div class="row row-sm">
          <div class="col-lg-4">
            <?php 
$sql ="SELECT ID from tblregistration where Status is null ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalnewapp=$query->rowCount();
?>
            <div class="card">
              <div id="rs1" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Total|ጠቅላላ</h6>
                    <p class="tx-12">New Application|አዲስ ምዝገባ</p>
                  </div>
                  <a href="new-marriage-application.php" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a>
                </div>
                <h2 class="mg-b-5 tx-inverse tx-lato"><?php echo htmlentities($totalnewapp);?></h2>
             
              </div>
            </div>
          </div>
          <div class="col-lg-4 mg-t-15 mg-sm-t-20 mg-lg-t-0">
             <?php 
$sql ="SELECT ID from tblregistration where Status='Verified' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalverapp=$query->rowCount();
?>
            <div class="card">
              <div id="rs2" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Total|ጠቅላላ</h6>
                    <p class="tx-12">Verified Application|የተላለፈ ምዝገባ</p>
                  </div>
                  <a href="verified-marriage-application.php" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a>
                </div>
                <h2 class="mg-b-5 tx-inverse tx-lato"><?php echo htmlentities($totalverapp);?></h2>
               
              </div>
            </div>
          </div>
          <div class="col-lg-4 mg-t-15 mg-sm-t-20 mg-lg-t-0">
            <?php 
$sql ="SELECT ID from tblregistration where Status='Rejected' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalrejapp=$query->rowCount();
?>
            <div class="card">
              <div id="rs3" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Total|ጠቅላላ</h6>
                    <p class="tx-12">Rejected Application|ያልተላለፈ ምዝገባ</p>
                  </div>
                  <a href="rejected-marriage-application.php" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a>
                </div>
                <h2 class="mg-b-5 tx-inverse tx-lato"><?php echo htmlentities($totalrejapp);?></h2>
               
              </div>
            </div>
          </div>
</div>
<div class="row row-sm" style="margin-top: 1%">
       <div class="col-lg-4 mg-t-15 mg-sm-t-20 mg-lg-t-0">
            <?php 
$sql ="SELECT ID from tblregistration ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalreg=$query->rowCount();
?>
            <div class="card">
              <div id="rs3" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Total|ጠቅላላ</h6>
                    <p class="tx-12">Total Application|ጠቅላላ ምዝገባ</p>
                  </div>
                  <a href="all-marriage-application.php" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a>
                </div>
                <h2 class="mg-b-5 tx-inverse tx-lato"><?php echo htmlentities($totalreg);?></h2>
               
              </div>
            </div>
          </div>



        </div>



      </div>
     <?php include_once('includes/footer.php');?>
    </div>

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery-toggles/toggles.min.js"></script>
    <script src="lib/d3/d3.js"></script>
    <script src="lib/rickshaw/rickshaw.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAEt_DBLTknLexNbTVwbXyq2HSf2UbRBU8"></script>
    <script src="lib/gmaps/gmaps.js"></script>
    <script src="lib/Flot/jquery.flot.js"></script>
    <script src="lib/Flot/jquery.flot.pie.js"></script>
    <script src="lib/Flot/jquery.flot.resize.js"></script>
    <script src="lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="js/js.js"></script>
    <script src="js/ResizeSensor.js"></script>
    <script src="js/dashboard.js"></script>
  </body>
</html>
<?php }  ?>