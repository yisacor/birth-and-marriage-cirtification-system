<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obcsuid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Manage Application Form | Online Birth Certificate System</title>
  
   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
   
    <link rel="stylesheet" href="css/bootstrap.min.css">
   
    <link rel="stylesheet" href="css/font-awesome.min.css">
   
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
   
    <link rel="stylesheet" href="css/meanmenu.min.css">
   
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   
    <link rel="stylesheet" href="css/animate.css">
   
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
   
    <link rel="stylesheet" href="css/normalize.css">
   
    <link rel="stylesheet" href="css/c3.min.css">
   
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="css/responsive.css">
    
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript">
         function generateBarCode()
            {
                var nric = $('#text').val();
                var url = 'https://api.qrserver.com/v1/create-qr-code/?data=' + nric + '&amp;size=50x50';
                $('#barcode').attr('src', url);
            }        
        </script>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
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
                                            <li><span class="bread-blod">Application Form/የምዝገባ ቅፅ</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1>Certificate Details/የምስክር ወረቀት ዝርዝር</h1>
                                        <div class="sparkline13-outline-icon">
                                            <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div id="exampl">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <h3 align="center">Certificate of Birth/የልደት የምስክር ወረቀት</h3>
                                        <hr />
                                        <p align="left">This is to certify that the following information has been taken from the original record of Birth</p>
                                       
<?php
$vid=$_GET['viewid'];
$sql="SELECT tblapplication.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Address from  tblapplication join  tbluser on tblapplication.UserID=tbluser.ID where tblapplication.ID=:vid and  tblapplication.Status='Verified'";
$query = $dbh -> prepare($sql);
$query-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $row)
{   
$certgendate=$row->UpdationDate;            ?>
<table border="1" class="table table-bordered">


<tr align="center">
<td colspan="4" >
<strong><img src="img/load2.jpg" width="45" height="55" align="left"> Application Number/የምዝገባ ቁጥር:</strong>   <?php  echo $row->ApplicationID;?><img src="img/load.jpg" width="40" height="50" align="right"></br></td></tr>

<th scope>photo/የፖስታ አድራሻ </th>
    <td><?php  echo $row->PostalAdd;?></td>
     <th scope>Place of Birth/የልድት ቀን</th>
    <td><?php  echo $row->PlaceofBirth;?></td>
    
   
  </tr>
   <tr>
   <th scope>Full Name/ ሙሉ ስም</th>
    <td><?php  echo $row->FullName;?></td>
     <th scope>Date of Birth/የልድት ቀን</th>
    <td><?php  echo $row->DateofBirth;?></td>
  </tr>
  <tr>
    <th scope>Name of Father/የአባት ስም</th>
    <td><?php  echo $row->NameofFather;?></td>
    <th scope>Name of Mother</th>
    <td><?php  echo $row->NameofFather;?></td>
  
  </tr>
   <tr>
     <th scope>Gender/ፆታ</th>
    <td><?php  echo $row->Gender;?></td>
    <th scope>Mobile Number/ስልክ ቁጥር</th>
    <td><?php  echo $row->MobileNumber;?></td>
  </tr>
   <tr>
      <th scope>Permanent Address/ቋሚ አድራሻ </th>
    <td><?php  echo $row->PermanentAdd;?></td>
  </tr>
   <tr>
    <th scope>Email/ኢሜል</th>
    <td><?php  echo $row->Email;?></td>
    <th scope>Date of apply/የምዝገባ ቀን</th>
    <td><?php  echo $row->Dateofapply;?></td>
  </tr>
<tr> 
<input id="text" type="text" 
            value=" <?php  echo $row->ApplicationID;?><?php  echo $row->FullName;?>" style="Width:20%"
            onblur='generateBarCode();' /> 
      <div id="exampl">
      <img id='barcode' 
            src="https://api.qrserver.com/v1/create-qr-code/?data=&amp;size=100x100" 
            alt="" 
            title="APP.ID" 
            width="100" 
            height="100" />
        </div>
</tr>
  
  <?php }?>
</table>
          
          <p align="left"><b>Certificate Genration Date/የወጣበት ቀን:</b> <?php echo htmlentities($certgendate);?></p>

          <p> <i class="fa fa-print fa-2x" style="cursor: pointer;"  OnClick="CallPrint(this.value)" ></i></p>                          
      </div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
  <?php include_once('includes/footer.php');?>
   
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/jquery.meanmenu.js"></script>
    
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    
    <script src="js/jquery.sticky.js"></script>
    
    <script src="js/jquery.scrollUp.min.js"></script>
    
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    
    <script src="js/main.js"></script>
  <script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.write(cssLinkTag)
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}


</script>

</body>

</html><?php }  ?>
