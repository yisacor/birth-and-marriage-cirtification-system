<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['omrsaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {


$vid=$_GET['viewid'];
    $status=$_POST['status'];
   $remark=$_POST['remark'];
  

$sql= "update tblregistration set Status=:status,Remark=:remark where ID=:vid";
$query=$dbh->prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':remark',$remark,PDO::PARAM_STR);
$query->bindParam(':vid',$vid,PDO::PARAM_STR);

 $query->execute();

  echo '<script>alert("Remark has been updated|ተሻሽላል")</script>';
 echo "<script>window.location.href ='all-marriage-application.php'</script>";
}


  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>Online Marriage Registration System || View Marriage Application</title>

    
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
   
    <link href="lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">

   
    <link rel="stylesheet" href="css/csss.css">
  </head>

  <body>

<?php include_once('includes/header.php');
include_once('includes/sidebar.php');

 ?>


    <div class="am-pagetitle">
      <h5 class="am-title">View Marriage Application|የጋብቻ ምዝገባ አሳይ</h5>
     
    </div>

    <div class="am-mainpanel">
      <div class="am-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">View Marriage Application|የጋብቻ ምዝገባ አሳይ</h6>
        

          <div class="table-wrapper" style="padding-top: 20px">
            <?php
                               $vid=$_GET['viewid'];

$sql="SELECT tblregistration.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Address from  tblregistration join  tbluser on tblregistration.UserID=tbluser.ID where tblregistration.ID=:vid";
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
<td colspan="8" style="font-size:20px;color:red">
 Registration Number|የምዝገባ ቁጥር:   <?php  echo $row->RegistrationNumber;?></td></tr>
 <tr align="center">
<td colspan="9" style="font-size:20px;color:blue">
 User Details</td></tr>
    <tr>
    <th scope>First Name| ስም</th>
    <td><?php  echo $row->FirstName;?></td>
    <th scope>Last Name|የአባት ስም</th>
    <td><?php  echo $row->LastName;?></td>
    <th scope>Mobile Number|ስልክ ቁጥር </th>
    <td><?php  echo $row->MobileNumber;?></td>
    <th>Address|አድራሻ</th>
    <td colspan="9"><?php  echo $row->Address;?></td>

  </tr>
  
<tr align="center">
<td colspan="9" style="font-size:20px;color:blue">
 Application Details|የምዝገባ ዝርዝር</td></tr>
 <tr>

 <td colspan="9" style="font-size:20px;color:red">
 Date of Marriage|የጋብቻ ቀን: <?php  echo $row->DateofMarriage;?></td></tr>

 <tr>
  <td colspan="9" style="font-size:20px;color:red">
 Husband Details|የባል ዝርዝር</td></tr>
 <tr>
    <th scope>Name|ስም</th>
    <td><?php  echo $row->HusbandName;?></td>
    <th scope>Religion|እምነት</th>
    <td><?php  echo $row->HusbandReligion;?></td>
    <th scope>Date of Birth|የልደት ቀን</th>
    <td><?php  echo $row->Husbanddob;?></td>
    <th scope>Status Before Marriage|ከጋብቻ ብፊት ሁኔታ</th>
    <td><?php  echo $row->HusbandSBM;?></td>
      <td rowspan="2" style="text-align:center;"><img src="../user/images/<?php echo $row->HusImage;?>" width="250" height="200"><br />
Photo of Groom
                  </td>
  </tr>
   <tr>
    <th scope>Address|አድራሻ</th>
    <td><?php  echo $row->HusbandAdd;?></td>
    <th scope>Zipcode| የመታወቂያ ቁጥር</th>
    <td><?php  echo $row->HusbandZipcode;?></td>
    <th scope>State|ክልል</th>
    <td><?php  echo $row->HusbandState;?></td>
    <th scope>Birth reg Number|የልደት ምዝገባ ቁጥር</th>
    <td><?php  echo $row->BirthregNumber;?></td>
  </tr>
  <tr>
  <td colspan="8" style="font-size:20px;color:red">
 Wife Details|የሚስት ዝርዝር</td></tr>
  <tr>
   <th scope>Name|ስም</th>
    <td><?php  echo $row->WifeName;?></td>
    <th scope>Religion|እምነት</th>
    <td><?php  echo $row->WifeReligion;?></td>
    <th scope>Date of Birth|የልደት ቀን</th>
    <td><?php  echo $row->Wifedob;?></td>
    <th scope>Status Before Marriage|ከጋብቻ ብፊት ሁኔታ</th>
    <td><?php  echo $row->WifeSBM;?></td>
      <td rowspan="2" style="text-align:center;"><img src="../user/images/<?php echo $row->WifeImage;?>" width="250" height="200"> <br />
               Photo of Bride</td>
  </tr>
   <tr>
    <th scope>Address|አድራሻ</th>
    <td><?php  echo $row->WifeAdd;?></td>
    <th scope>Zipcode|የመታወቂያ ቁጥር</th>
    <td><?php  echo $row->WifeZipcode;?></td>
    <th scope>State|ክልል</th>
    <td><?php  echo $row->WifeState;?></td>
    <th scope>Birth regNumber|የልደት ምዝገባ ቁጥር</th>
    <td><?php  echo $row->BirthregNumber;?></td>
  </tr>
  <tr>
  <td colspan="8" style="font-size:20px;color:red">
 Witness Details|የምስክር ዝርዝር</td></tr>
   <tr>
    <th colspan="2">S.No|የአገልግሎት ቁጥር</th>
    <th colspan="3">Witness Name|የምስክር ስም</th>
    <th colspan="4">Witness Address|የምስክር አድራሻ</th>
    
  </tr>
  <tr>
    <td colspan="2">1</td>
    <td colspan="3"><?php  echo $row->WitnessNamefirst;?></td>
    
    <td colspan="4"><?php  echo $row->WitnessAddressFirst;?></td>
  </tr>
  <tr>
    <td colspan="2">2</td>
    <td colspan="3"><?php  echo $row->WitnessNamesec;?></td>
    
    <td colspan="4"><?php  echo $row->WitnessAddresssec;?></td>
  </tr>
 <tr>
   <td colspan="2">3</td> 
    <td colspan="2"><?php  echo $row->WitnessNamethird;?></td>
    
    <td colspan="4"><?php  echo $row->WitnessAddressthird;?></td>
  </tr>
  <tr>
    
     <th colspan="2">Order Final Status</th>

    <td colspan="2"> <?php  $status=$row->Status;
    
if($row->Status=="Verified")
{
  echo "Your application has been verified|ተላልፋል";
}

if($row->Status=="Rejected")
{
 echo "Your application has been cancelled|የተሰረዘ";
}


if($row->Status=="")
{
  echo "Pending|በመሰራት ላይ";
}
 

     ;?></td>
     <th colspan="2">Admin Remark</th>
    <?php if($row->Status==""){ ?>

                     <td colspan="4"><?php echo "Your application has still pending|በመሰራት ላይ"; ?></td>
<?php } else { ?>                  <td colspan="4"><?php  echo htmlentities($row->Status);?>
                  </td>
                  <?php } ?>
  </tr>
 
  <?php $cnt=$cnt+1;}} ?>
</table>
<?php 

if ($status==""){
?> 
<p align="center"  style="padding-top: 20px">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action|ውሳኔአስተላልፍ</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                <form method="post" name="submit">

                                
                               
     <tr>
    <th>Remark|አስተያየት :</th>
    <td>
    <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control" required="true"></textarea></td>
  </tr> 
   
 
  <tr>
    <th>Status|ውጤት:</th>
    <td>

   <select name="status" class="form-control" required="true" >
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
            lengthMenu: '_MENU_ items/page|ገፅ',
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
