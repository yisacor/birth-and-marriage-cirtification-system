<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
    $mobno=$_POST['mobno'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID FROM tbluser WHERE MobileNumber=:mobno and Password=:password";
    $query=$dbh->prepare($sql);
    $query->bindParam(':mobno',$mobno,PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['omrsuid']=$result->ID;
}


$_SESSION['login']=$_POST['mobno'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else{
echo "<script>alert('Invalid Details|በትክክል አላስገቡም');</script>";
}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>Online Marriage Registration System||Sign in page</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <!--  CSS -->
    <link rel="stylesheet" href="css/csss.css">
  </head>

  <body>




    <div class="am-signin-wrapper">
      <div class="am-signin-box">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <div>
              <p>Welcome to<h3> Marriage Registration </h3> </p>
       <p>እንካን በደና ወደ ጋብቻ ምዝገባ መጡ</p>        
			 <p>User|ተጠቃሚ</p>
       
              <hr>
              
			  <h5><p><br> <a href="../marriage_home.php">Back To Home|መዉጫ</a></p></h5>
            </div>
          </div>
          <div class="col-lg-7">
            <h5 class="tx-gray-800 mg-b-25">Sign in|ግባ</h5>
 <form class="form-auth-small" action="" method="post">
            <div class="form-group">
              <label class="form-control-label">Mobile Number|ስልክ ቁጥር:</label>
              <input type="text" class="form-control" placeholder="Mobile Number|ስልክ ቁጥር" required="true" name="mobno" maxlength="10" pattern="[0-9]+" >
            </div>

            <div class="form-group">
              <label class="form-control-label">Password|የይለፍ ቃል:</label>
              <input type="password" class="form-control" placeholder="Password|የይለፍ ቃል" name="password" required="true" value="">
            </div>
<div class="form-group mg-b-0" style="padding-top: 0px"><a href="forgot-password.php">Reset password|አሻሽል</a></div>
           

            <button type="submit" class="btn btn-block" name="login">Sign In|ግባ</button>
             <div class="form-group mg-b-20" style="padding-top: 5%"><a href="signup.php">Not registered yet | Click here for registration|እንደ አዲስ ይመዝግቡ </a></div>
          </div>
         </form>
        </div>
		
        <p class="tx-center tx-white-5 tx-12 mg-t-15">2021|Online Marriage Registration System|CSE|Adama Science And Technology University</p>
      </div>
    </div>

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="js/js.js"></script>
  </body>
</html>
