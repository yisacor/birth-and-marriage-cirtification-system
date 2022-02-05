<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obcsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Verified Application | Online Birth Certificate System</title>
  
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    
	
    <link rel="stylesheet" href="css/meanmenu.min.css">
    
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
    
    <link rel="stylesheet" href="css/normalize.css">
    
    <link rel="stylesheet" href="css/c3.min.css">
    
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="css/responsive.css">
    
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="materialdesign">
  
    <div class="wrapper-pro">
      <?php include_once('includes/sidebar.php');?>
        <?php include_once('includes/header.php');?>
       
    
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list shadow-reset">
                                <div class="row">
                                    
                                    <div class="col-lg-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="dashboard.php">Home|መነሻ</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Verified Application|የተላለፈ ምዝገባ</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    

    
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1>View <span class="table-project-n">Detail of</span> Verified Application|የተላለፈ ምዝገባ ዝርዝር</h1>
                                        <div class="sparkline13-outline-icon">
                                            <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <div id="toolbar">
                                            <select class="form-control">
                                                <option value="">Export Basic|መሰረታዊውን አሳይ</option>
                                                <option value="all">Export All|ሁሉንም አሳይ</option>
                                                <option value="selected">Export Selected|የተመረጡትን አሳይ</option>
                                            </select>
                                        </div>
                                        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="state" data-checkbox="true"></th>
                                                    <th>S.No|የአገልግሎት ቁጥር</th>
                                                    <th>Application Number|የምዝገባ ቁጥር</th>
                                                    <th>Name|ስም</th>
                                                    <th >Mobile Number|ስልክ ቁጥር</th>
                                                    <th>Father's Name|የአባት ስም</th>
                                                    <th>Status|ሁኔታ</th>
                                                    <th data-field="action">Action|ውጤት</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               
                                             
                                              <?php
                                          
$sql="SELECT * from tblapplication where Status='Verified'";

$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo htmlentities($cnt);?></td>
                                                    <td><?php  echo htmlentities($row->ApplicationID);?></td>
                                                    <td><?php  echo htmlentities($row->FullName);?></td>
                                                   <td><?php  echo htmlentities($row->MobileNumber);?></td>
                                                    <td><?php  echo htmlentities($row->NameofFather);?></td>
                                                  <?php if($row->Status==""){ ?>

                     <td><?php echo "Still Pending|በመሰራት ላይ"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row->Status);?>
                  </td>
                  <?php } ?>
                                                    <td class="datatable-ct"><a href="view-application-detail.php?viewid=<?php echo htmlentities ($row->ID);?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                             <?php $cnt=$cnt+1;}} ?>  
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
  <?php include_once('includes/footer.php');?>
   
    
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/jquery.meanmenu.js"></script>
    
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    
    <script src="js/jquery.sticky.js"></script>
    
    <script src="js/jquery.scrollUp.min.js"></script>
    
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    
    <script src="js/main.js"></script>


</body>

</html><?php }  ?>
