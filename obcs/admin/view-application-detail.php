<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obcsaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {


$vid=$_GET['viewid'];
    $bookingid=$_GET['bookingid'];
    $status=$_POST['status'];
   $remark=$_POST['remark'];
  

$sql= "update tblapplication set Status=:status,Remark=:remark where ID=:vid";
$query=$dbh->prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':remark',$remark,PDO::PARAM_STR);
$query->bindParam(':vid',$vid,PDO::PARAM_STR);

 $query->execute();

  echo '<script>alert("Remark has been updated|በትክክል አስገብተዋል")</script>';
 echo "<script>window.location.href ='all-birth-application.php'</script>";
}


  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Manage Application Form | Online Birth Certificate System</title>
  

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
                                            <li><span class="bread-blod">Application Form|የምዝገባ ቅፅ</span>
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
                                        <h1>View <span class="table-project-n">Detail of</span> Application|ምዝገባ ዝርዝር</h1>
                                        <div class="sparkline13-outline-icon">
                                            <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                       
                                         <?php
                               $vid=$_GET['viewid'];

$sql="SELECT tblapplication.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Address from  tblapplication join  tbluser on tblapplication.UserID=tbluser.ID where tblapplication.ID=:vid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                <table border="1" class="table table-bordered">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 User Details|ተጠቃሚ መግለጫ
</td></tr>
<tr align="center">
<td colspan="4" style="font-size:20px;color:red">
 Application Number|የምዝገባ  ቁጥር :   <?php  echo $row->ApplicationID;?></td></tr>
    <tr>
    <th scope>First Name|ስም</th>
    <td><?php  echo $row->FirstName;?></td>
    <th scope>Last Name|የአባት ስም</th>
    <td><?php  echo $row->LastName;?></td>
  </tr>
  <tr>
    <th scope>Mobile Number|ስልክ ቁጥር </th>
    <td><?php  echo $row->MobileNumber;?></td>
    <th>Address|አድራሻ</th>
    <td><?php  echo $row->Address;?></td>
  </tr>
<tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Application Details|የምዝገባ ዝርዝር</td></tr>
 <tr>
    <th scope>Full Name|ሙሉ ስም</th>
    <td><?php  echo $row->FullName;?></td>
    <th scope>Gender|ፆታ</th>
    <td><?php  echo $row->Gender;?></td>
  </tr>
   <tr>
    <th scope>Date of Birth|የልድት ቀን</th>
    <td><?php  echo $row->DateofBirth;?></td>
    <th scope>Place of Birth| የትውልድ ቦታ</th>
    <td><?php  echo $row->PlaceofBirth;?></td>
  </tr>
  <tr>
    <th scope>Name of Father|የአባት ስም</th>
    <td><?php  echo $row->NameofFather;?></td>
    <th scope>Permanent Address|ቋሚ አድራሻ </th>
    <td><?php  echo $row->PermanentAdd;?></td>
  </tr>
   <tr>
    <th scope>Postal Address|ፖስታ</th>
    <td><?php  echo $row->PostalAdd;?></td>
    <th scope>Mobile Number|ስልክ ቁጥር </th>
    <td><?php  echo $row->MobileNumber;?></td>
  </tr>
   <tr>
    <th scope>Email|ኢሜል</th>
    <td><?php  echo $row->Email;?></td>
    <th scope>Date of apply|የወጣበት ቅን</th>
    <td><?php  echo $row->Dateofapply;?></td>
  </tr>
  <tr>
    
     <th>Order Final Status|ሁኔታ</th>

    <td> <?php  $status=$row->Status;
    
if($row->Status=="Verified")
{
  echo "Your application has been verified| ምዝገባው ተላልፋል";
}

if($row->Status=="Rejected")
{
 echo "Your application has been cancelled|የተሰረዘ ምዝገባ";
}


if($row->Status=="")
{
  echo "Pending|በመሰራት ላይ";
}
 

     ;?></td>
     <th >Admin Remark|የአስተዳደር ውሳኔ</th>
    <?php if($row->Status==""){ ?>

                     <td><?php echo "Your application has still pending|በመሰራት ላይ"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row->Status);?>
                  </td>
                  <?php } ?>
  </tr>
 
  <?php $cnt=$cnt+1;}} ?>
</table>
<?php 

if ($status==""){
?> 
<p align="center"  style="padding-top: 20px">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action|ውሳኔ አስተላልፍ</button></p>  

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action|ውሳኔ አስተላልፍ</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                <form method="post" name="submit">

                                
                               
     <tr>
    <th>Remark| አስተያየት:</th>
    <td>
    <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr> 
   
 
  <tr>
    <th>Status|ውጤት:</th>
    <td>

   <select name="status" class="form-control wd-450" required="true" >
     <option value="Verified" selected="true">Verified|ተላልፉል </option>
     <option value="Rejected">Rejected|አልተላለፈም</option>
   </select></td>
  </tr>
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close|ዝጋ </button>
 <button type="submit" name="submit" class="btn btn-primary">Update|አሻሽል</button>
  
  </form>
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
