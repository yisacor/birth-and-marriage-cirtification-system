<?php
session_start();
error_reporting(0);
include('n/includes/dbconnection.php');

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
$_SESSION['obcsuid']=$result->ID;
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
   

    <title>Online birth certificate System||Sign in page</title>

    
    <link href="n/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="n/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="n/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    
    <link rel="stylesheet" href="n/css/csss.css">
  </head>

  <body>




    <div class="am-signin-wrapper">
      <div class="am-signin-box">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <div>
    
              <p>Welcome to<h3> Birth Certificate </h3> </p>
              <p>እንካን ወደ ልደት የምስክር ወረቀት መጡ </p>
              <h2>user</h2>
              <p>ተጠቃሚ</p>
                            
			  <h5><p> <a href="../birth_home.php">Back To Home |ማውጫ</a></p></h5>
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
              <label class="form-control-label">Password|ይልፍ ቃል:</label>
              <input type="password" class="form-control" placeholder="Password|ይልፍ ቃል" name="password" required="true" value="">
			
            </div>
			
<div class="form-group mg-b-0" style="padding-top: 0px"><a href="forgot-password.php">Reset password|ዳግም አስጀምር</a></div>
           

            <button type="submit" class="btn btn-block" name="login">Sign in|ግባ</button>
             <div class="form-group mg-b-20" style="padding-top: 5%"><a href="signup.php">Not registered yet | Click here for registration<br>እንደ አዲስ ይመዘግቡ</br> </a></div>
             <p></p>
          </div>
         </form>
        </div>
		
        <p class="tx-center tx-white-5 tx-12 mg-t-15">2021|Online Birth certificate System|CSE|Adama Science And Technology University</p>
      </div>
    </div>

    <script src="n/lib/jquery/jquery.js"></script>
    <script src="n/lib/popper.js/popper.js"></script>
    <script src="n/lib/bootstrap/bootstrap.js"></script>
    <script src="n/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="n/js/js.js"></script>
  </body>
</html>
