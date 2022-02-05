<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['obcsuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$uid=$_SESSION['obcsuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$sql ="SELECT ID FROM tbluser WHERE ID=:uid and Password=:cpassword";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query-> bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)
{
$con="update tbluser set Password=:newpassword where ID=:uid";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':uid', $uid, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();

echo '<script>alert("Your password successully changed||በትክክል አስገብተዋል")</script>';
 echo "<script>window.location.href ='change-password.php'</script>";
} else {
echo '<script>alert("Your current password is wrong|በትክክል አላስገቡም")</script>';

}



}

  
  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Change Password | Online Birth Certificate System</title>
   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    
    <link rel="stylesheet" href="css/meanmenu.min.css">
    
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/modals.css">
    
    <link rel="stylesheet" href="css/normalize.css">
    
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="css/responsive.css">
    
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   

</script>
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
                                            <li><a href="dashboard.php">Home/መነሻ</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Change Password/የይልፍ ቃል ቀይር</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
    
            <div class="basic-form-area mg-b-15">
                <div class="container-fluid">
                   
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline12-list shadow-reset mg-t-30">
                                <div class="sparkline12-hd">
                                    <div class="main-sparkline12-hd">
                                        <h1>Change Password/የይልፍ ቃል ቀይር</h1>
                                        <div class="sparkline12-outline-icon">
                                            <span class="sparkline12-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline12-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline12-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="all-form-element-inner">
                                                    
                                                    <form method="post" onsubmit="return checkpass();" name="changepassword" method="post">
                                                      
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Current Password/ያሁኑ የይልፍ ቃል:</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                     <input type="password" class="form-control" name="currentpassword" id="currentpassword"required='true'>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">New Password/አዲስ የይልፍ ቃል:</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                     <input type="password" class="form-control" name="newpassword"  class="form-control" required="true">
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Confirm Password/ደግምው ያስገቡ:</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="password" class="form-control"  name="confirmpassword" id="confirmpassword"  required='true'>
                                                                </div>
                                                            </div>
                                                        </div>
                                                 
                                                 
                                                        <div class="form-group-inner">
                                                            <div class="login-btn-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3"></div>
                                                                    <div class="col-lg-9">
                                                                        <div class="login-horizental cancel-wp pull-left">
                                                                            
                                                                            <button class="btn btn-sm btn-primary login-submit-cs" type="submit" name="   submit">Save Change/ለውጡን አስቀምጥ</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
    
    <script src="js/modal-active.js"></script>
    
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    
    <script src="js/main.js"></script>
</body>

</html><?php }  ?>