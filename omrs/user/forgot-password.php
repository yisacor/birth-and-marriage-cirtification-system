<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT MobileNumber FROM tbluser WHERE MobileNumber=:mobile";
$query= $dbh -> prepare($sql);

$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tbluser set Password=:newpassword where MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);

$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed |በትክክል አስገብተዋል ');</script>";
}
else {
echo "<script>alert(' Mobile no is invalid| በትክክል አላስገቡም ');</script>"; 
}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>User || Forgot Password Page</title>


    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">


    <link rel="stylesheet" href="css/csss.css">
    <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
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
              <br>የጋብቻ ምዝግባ</br> 
              <p>User</p>
              <p>Reset Your Passowrd|የይለፍ ቃል አሻሽል</p>
              <p>Please fill the following detail to reset the password.</p>

              <hr>
              <p>Already have an account| <br> <a href="login.php">Sign In|ግባ</a></p>
            </div>
          </div>
          <div class="col-lg-7">
            <h5 class="tx-gray-800 mg-b-25">Signin to Your Account|ግባ</h5>
 <form class="form-auth-small" action="" method="post" name="chngpwd" onSubmit="return valid();">
            <div class="form-group">
              <label class="form-control-label">Mobile Number|የስልክ ቁጥር  :</label>
              <input type="text" class="form-control" placeholder="Mobile Number|የስልክ ቁጥር  " required="true" name="mobile">
            </div>

            
            <div class="form-group">
              <label class="form-control-label">New Password|አዲስ የይለፍ ቃል:</label>
              <input class="form-control" type="password" name="newpassword|አዲስ የይለፍ ቃል" placeholder="New Password" required="true"/>
            </div>
            <div class="form-group">
              <label class="form-control-label">Confirm Password|የይለፍ ቃል ደግመህ አስገባ:</label>
              <input class="form-control" type="password" name="confirmpassword|የይለፍ ቃል ደግመህ አስገባ" placeholder="Confirm Password|የይለፍ ቃል ደግመህ አስገባ" required="true" />
            </div>

           

            <button type="submit" class="btn btn-block" name="submit">Reset|አሻሽል</button>
             
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
