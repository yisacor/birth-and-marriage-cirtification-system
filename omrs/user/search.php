<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['omrsuid']==0)) {
  header('location:logout.php');
  } else{


  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>Online Marriage Registration System || Search Marriage Application</title>

    
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/highlightjs/github.css" rel="stylesheet">
    <link href="lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="css/csss.css">
  </head>

  <body>

<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>

 


    <div class="am-pagetitle">
      <h5 class="am-title">Search Marriage Application|የጋብቻ ምዝግባ ፈልግ</h5>
     
    </div>
    <div class="am-mainpanel">
      <div class="am-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Search Marriage Application|የጋብቻ ምዝግባ ፈልግ</h6>
        <form id="basic-form" method="post" enctype="multipart/form-data">
              
              <div class="row">
                <label class="col-sm-4 form-control-label">Search by Reg Number|በምዝግባ ቁጥር ፈልግ: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="searchdata" value="" class="form-control" required='true'>
                </div>
              </div>
             
             
             <div class="form-layout-footer mg-t-30">
             <p style="text-align: center;"><button class="btn btn-info mg-r-5"  name="search" id="search">Submit|አስገባ</button></p>
                </form>

          <div class="table-wrapper" style="padding-top: 20px">
             <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>  
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">S.No|የአገልግሎት ቁጥር</th>
                
                  <th class="wd-15p">Reg Number|የምዝገባ ቁጥር</th>
                  <th class="wd-20p">Husband Name|የባል ስም</th>
                  
                  <th class="wd-10p">Date of Marriage|የጋብቻ ቀን</th>
                  <th class="wd-10p">Status|ሁኔታ</th>
                  <th class="wd-25p">Action|ዉጤት</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $uid=$_SESSION['omrsuid'];
$sql="SELECT * from tblregistration where RegistrationNumber like '$sdata%' && UserID='$uid'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php  echo htmlentities($row->RegistrationNumber);?></td>
                  <td><?php  echo htmlentities($row->HusbandName);?></td>
                  <td><?php  echo htmlentities($row->DateofMarriage);?></td>
                <?php if($row->Status==""){ ?>

                     <td><?php echo "Still Pending"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row->Status);?>
                  </td>
                  <?php } ?>
                  <td><a href="view-marriage-application-detail.php?viewid=<?php echo htmlentities ($row->ID);?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
             
              </tbody>
              <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this date|በዚህ ቀን ዉስጥ የተመዘገበ የለም</td>

  </tr>
  <?php } }?>
            </table>
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
    <script src="lib/highlightjs/highlight.pack.js"></script>
    <script src="lib/datatables/jquery.dataTables.js"></script>
    <script src="lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>

    <script src="js/js.js"></script>
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/pageገጽ',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
  </body>
</html>
<?php }  ?>
