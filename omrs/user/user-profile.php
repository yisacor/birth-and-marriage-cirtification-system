<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['omrsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['omrsuid'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];

  $add=$_POST['add'];
  $sql="update tbluser set FirstName=:fname,LastName=:lname,Address=:add where ID=:uid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':fname',$fname,PDO::PARAM_STR);
     $query->bindParam(':lname',$lname,PDO::PARAM_STR);

     $query->bindParam(':add',$add,PDO::PARAM_STR);
     $query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();

        echo '<script>alert("Profile has been updated|በትክክል አስገብተዋል")</script>';
     echo "<script>window.location.href ='user-profile.php'</script>";

  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>Online Marriage Registration System|| User Profile !!</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/highlightjs/github.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">

    <!--  CSS -->
    <link rel="stylesheet" href="css/csss.css">
  </head>

  <body>
 <?php include_once('includes/header.php');
include_once('includes/sidebar.php');

 ?>

 

    <div class="am-pagetitle">
      <h5 class="am-title">User Profile|መግለጫ</h5>

    </div>

    <div class="am-mainpanel">
      <div class="am-pagebody">

      

        <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h6 class="card-body-title">User Profile|መግለጫ</h6>
               <form id="basic-form" method="post">
               <?php
$uid=$_SESSION['omrsuid'];
$sql="SELECT * from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
              <div class="row">
                <label class="col-sm-4 form-control-label">First Name|ስም: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="fname" value="<?php  echo $row->FirstName;?>" required="true" />
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Last Name|የአባት ስም: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="lname" value="<?php  echo $row->LastName;?>" required="true" />
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Mobile Number|የስልክ ቁጥር: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" readonly="true" value="<?php  echo $row->MobileNumber;?>" />
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Address|አድራሻ: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <textarea type="text" class="form-control" name="add" value="" /><?php  echo $row->Address;?></textarea>
                </div>
              </div>
               <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Registration Date|የምዝገባ ቀን: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="text" class="form-control" readonly="true" value="<?php  echo $row->RegDate;?>" />
                </div>
              </div>
              <?php $cnt=$cnt+1;}} ?> 
              <div class="form-layout-footer mg-t-30">
             <p style="text-align: center;"><button class="btn btn-info mg-r-5"  name="submit" id="submit">Update|አሻሽል</button></p>
                </form>
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
    <script src="lib/highlightjs/highlight.pack.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>

    <script src="js/js.js"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      })
    </script>
  </body>
</html>
<?php }  ?>