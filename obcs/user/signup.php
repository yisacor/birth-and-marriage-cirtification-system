<?php 
session_start();
error_reporting(0);
include('n/includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $mobno=$_POST['mobno'];
    $add=$_POST['address'];
    $password=md5($_POST['password']);
    $ret="select MobileNumber from tbluser where MobileNumber=:mobno";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':mobno', $mobno, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$sql="Insert Into tbluser(FirstName,LastName,MobileNumber,Address,Password)Values(:fname,:lname,:mobno,:add,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
$query->bindParam(':add',$add,PDO::PARAM_STR);

$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script>alert('You have signup  Succesfully|በትክክል አስገብተዋል');</script>";
}
else
{

echo "<script>alert('Something went wrong.Please try again|በትክክል አላስገቡም');</script>";
}
}
 else
{

echo "<script>alert('This Mobile Number already exist. Please try again|በትክክል አላስገቡም');</script>";
}
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>Online Birth certificate System||Sign Up page</title>

    
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
              <p>Registration page for new user</p>
              <p>ለ አዲስ ተጠቃሚ የመመዝገቢ ቅፅ</p>
              

              
              
			  <h5><p><br> <a href="../birth_home.php">Back To Home/ማውጫ</a></p></h5>
            </div>
          </div>
          <div class="col-lg-7">
            <h5 class="tx-gray-800 mg-b-25">User Registration Form/ የምዝገባ ቅፅ</h5>
 <form class="form-auth-small" action="" method="post">
            <div class="form-group">
              <label class="form-control-label">First Name/ስም:</label>
              <input type="text" class="form-control" placeholder ="First Name/ስም" required="true" name="fname" value="" >
            </div>
<div class="form-group">
              <label class="form-control-label">Last Name/የአባት ስም:</label>
              <input type="text" class="form-control" placeholder="Last Name/የአባት ስም" required="true" name="lname" value="" >
            </div>
            <div class="form-group">
              <label class="form-control-label">Mobile Number/ስልክ ቁጥር:</label>
              <input type="text" class="form-control" placeholder="Mobile Number/ስልክ ቁጥር" required="true" name="mobno"  maxlength="10" pattern="[0-9]+" value="" >
            </div>
            <div class="form-group">
              <label class="form-control-label">Address/አድራሻ:</label>
              <input type="text" class="form-control" placeholder="Address/አድራሻ" required="true" name="address" value="" >
            </div>
            <div class="form-group">
              <label class="form-control-label">Password/ይልፍ ቃል:</label>
              <input type="password" class="form-control" placeholder="Password/ይልፍ ቃል" name="password" required="true" value="">
            </div>

           

            <button type="submit" class="btn btn-block" name="submit">Sign Up/ግባ</button>
             <div class="form-group mg-b-20" style="padding-top: 20px"><a href="login.php">Do you have an account ? || signin/ግባ</a></div>
          </div>
         </form>
        </div>
        <p class="tx-center tx-white-5 tx-12 mg-t-15">2021|Online Birth certificate System|CSE|Adama Science And Technology University
</p>
      </div>
    </div>

    <script src="n/lib/jquery/jquery.js"></script>
    <script src="n/lib/popper.js/popper.js"></script>
    <script src="n/lib/bootstrap/bootstrap.js"></script>
    <script src="n/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="n/js/js.js"></script>
  </body>
</html>
