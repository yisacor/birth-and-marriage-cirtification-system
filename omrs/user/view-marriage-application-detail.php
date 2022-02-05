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
   

    <title>View Certificate</title>

    
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/highlightjs/github.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="css/csss.css">
    <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>

      
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript">
         function generateBarCode()
            {
                var nric = $('#text').val();
                var url = 'https://api.qrserver.com/v1/create-qr-code/?data=' + nric + '&amp;size=50x50';
                $('#barcode').attr('src', url);
            }        
        </script>
  </head>

  <body>
 <?php include_once('includes/header.php');
include_once('includes/sidebar.php');

 ?>

 

    <div class="am-pagetitle">
      <h5 class="am-title">Marraige Registration|የጋብቻ ምዝገባ</h5>

    </div>
    <div class="am-mainpanel">
      <div class="am-pagebody">

      

        <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4" id="divToPrint">
              <h2 style="text-align: center;color: red"><img src="images/load2.jpg" width="65" height="55" align="left">Certificate of Marriage|የጋብቻ ምስክር ወረቀት <img src="images/load.jpg" width="65" height="50" align="right"></h2>
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


<table class="table table-hover table-bordered mg-b-0" border="1">
              <thead class="bg-info">
                <tr>
                  <th>Certificate Number|የምስክር ወረቀት ቁጥር:</th>
                  <th><?php  echo $row->RegistrationNumber;?></th>
                <input id="text" type="text" 
            value=" <?php  echo $row->RegistrationNumber;?>||<?php  echo $row->HusbandName;?>" style="Width:20%"
            onblur='generateBarCode();' /> 
      <div id="exampl">
      <img id='barcode' 
            src="https://api.qrserver.com/v1/create-qr-code/?data=&amp;size=100x100" 
            alt="" 
            title="APP.number.ID" 
            width="100" 
            height="100" />
      
      
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Issue Date|የተሰጠበት ቀን:</td>
                  <td><?php  echo $row->UpdationDate;?></td>
                </tr>
              </tbody>
            </table>

<table class="table table-hover table-bordered table-primary mg-b-0" style="margin-top:1%" border="1">
              <thead>
                <tr>
                
                  <th colspan="3">1. Husband Details|የባል ዝርዝር</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>Name\ስም</th>
                  <td>Mr|አቶ. <?php  echo $row->HusbandName;?></td>
                  <td rowspan="4" style="text-align:center;"><img src="images/<?php echo $row->HusImage;?>" width="250" height="200"><br />
Photo of husband| የባል ምስል  </td>
                </tr>
<tr>
<th>Resident at| መኖሪያ:</th>  
<td><?php  echo $row->HusbandAdd;?>,<?php  echo $row->HusbandZipcode;?>,<?php  echo $row->HusbandState;?></td>
</tr>

<tr>
<th>Date of Birth|የልደት ቀን:</th>
<td><?php  echo $row->Husbanddob;?></td>  
</tr>

<tr>
<th>Birth Reg Number|የልደት የምዝገባ ቁጥር:</th>
<td><?php  echo $row->Husbandadharno;?></td>  
</tr>
       
              </tbody>
            </table>


<table class="table table-hover table-bordered table-purple mg-b-0" style="margin-top:1%" border="1">
              <thead>
                <tr>
                  <th colspan="3">2 WIFE DETAILS| የሚስት ዝርዝር</th>
                </tr>
              </thead>
              <tbody>
            
             <tr>
               <th>Name| ስም </th>
               <td>Mrs|ወሮ.<?php  echo $row->WifeName;?></td>
               <td rowspan="4" style="text-align:center;"><img src="images/<?php echo $row->WifeImage;?>" width="250" height="200"> <br />
               Photo of Bride|የሚስት ምስል</td>
             </tr>
                <tr>
               <th>Resident at|መኖሪያ:</th>
               <td> <?php  echo $row->WifeAdd;?>,<?php  echo $row->WifeZipcode;?>,<?php  echo $row->WifeState;?></td>
             </tr>
     <tr>
               <th>Date of Birth|የልደት ቀን:</th>
               <td> <?php  echo $row->Wifedob;?></td>
             </tr>

  <tr>
               <th>Birth Reg Number|የልደት የምዝገባ ቁጥር:</th>
               <td> <?php  echo $row->Wifeadharno;?></td>
             </tr>


              </tbody>
            </table>
<p style="margin-top:1%; font-size:16px;"><?php  echo $row->DateofMarriage;?> witness by| ምስክሮች:</p>
<table class="table table-hover table-bordered mg-b-0" border="1" width="100%">
              <thead class="bg-danger">
                <tr>
 <th>#</th>
<th>Witness Name|ምስክሮች ስም</th>
<th>Witness Address|አድረሻ</th>            </tr>
              </thead>
              <tbody>
                <tr>
                  <th>1.</th>
                  <td><?php  echo $row->WitnessNamefirst;?></td>
                  <td><?php  echo $row->WitnessAddressFirst;?></td>
                </tr>
            
<tr>
                  <th>2.</th>
                  <td><?php  echo $row->WitnessNamesec;?></td>
                  <td><?php  echo $row->WitnessAddresssec;?></td>
                </tr>

                <tr>
                  <th>3.</th>
                  <td><?php  echo $row->WitnessAddressthird;?></td>
                  <td><?php  echo $row->WitnessAddressthird;?></td>
                </tr>


              </tbody>
            </table>


<p style="margin-top:1%; font-size:16px;">Has been duly registred on <?php  echo $row->UpdationDate;?> at the office of maariage officer|በአዳማ ወሳኝ ኩነት ቢሮ ተመዝግበዋል</p>
<p style="color#000; font-weight:bold">Name of Husband: የባል ስም<?php  echo $row->HusbandName;?></p>
<p style="color#000; font-weight:bold">Name of Bride|የሚስት ስም: <?php  echo $row->WifeName;?></p>
   <?php }} ?>
              <form>
              <p style="text-align: center;color: blue"><input type="button" value="print" class="btn btn-primary" onclick="PrintDiv();" /></p></form>
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