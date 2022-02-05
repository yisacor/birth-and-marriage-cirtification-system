<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT Email FROM tbladmin WHERE Email=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tbladmin set Password=:newpassword where Email=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed በትክክል አስገብተዋል ');</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid|በትክክል አላስገቡም');</script>"; 
}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>Admin || Forgot Password Page</title>

    
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    
    <link rel="stylesheet" href="css/csss.css">
    <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  |በትክክል አላስገቡም!!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
  </head>

  <body>

    <div class="am-signin-wrapper">
      <div class="am-signin-box">
        <div class="row no-gutters">
         <div class="col-lg-5">
            <div>
              <h3>Marriage Registration</h3>
              <p>የጋብቻ ምዝገባ </p>
              <p>Reset Your Passowrd</p>
              <p>Please fill the following detail to reset the password.</p>
              <p>ዝርዝሩን ይሙሉ</p>

              <hr>
              <p>Already have an account| <br> <a href="login.php">Sign In|ግባ</a></p>
            </div>
          </div>
          <div class="col-lg-7">
            <h5 class="tx-gray-800 mg-b-25">Signin to Your Account|ግባ</h5>
 <form class="form-auth-small" action="" method="post" name="chngpwd" onSubmit="return valid();">
            <div class="form-group">
              <label class="form-control-label">Email|ኢሜል:</label>
              <input type="email" class="form-control" placeholder="Email Address|ኢሜል" required="true" name="email">
            </div>

            <div class="form-group">
              <label class="form-control-label">Mobile Number|ስልክ ቁጥር :</label>
              <input type="text" class="form-control"  name="mobile" placeholder="Mobile Number|ስልክ ቁጥር " required="true">
            </div>
            <div class="form-group">
              <label class="form-control-label">New Password|አዲስ ይልፍ  ቃል :</label>
              <input class="form-control" type="password" name="newpassword|አዲስ ይልፍ  ቃል " placeholder="New Password" required="true"/>
            </div>
            <div class="form-group">
              <label class="form-control-label">Confirm Password:</label>
              <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password|ደግምው ያስገቡ" required="true" />
            </div>

           

            <button type="submit" class="btn btn-block" name="submit">Reset|መቀየር</button>
             
          </div>
         </form>
        </div>
       <p class="tx-center tx-white-5 tx-12 mg-t-15">2021|Online Marriage Registration System|COSC|Unity University</p>
      </div>
    </div>

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="js/js.js"></script>
  </body>
</html>
