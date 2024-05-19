<?php
include('includes/dbconnection.php');
 if(isset($_POST['submit']))
  {


 $fname=$_POST['fullname'];
$cnum=$_POST['cnumber'];
$email=$_POST['email'];
$dname=$_POST['dname'];
$cname=$_POST['cname'];
$add=$_POST['add'];
$iname=$_POST['iname'];
$ano=$_POST['ano'];
$mon=$_POST['mon'];
$passnum=mt_rand(100000000, 999999999);
$propic=$_FILES["propic"]["name"];
$extension = substr($propic,strlen($propic)-4,strlen($propic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Profile Pics has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$propic=md5($propic).time().$extension;
 move_uploaded_file($_FILES["propic"]["tmp_name"],"admin/images/".$propic);
$sql="insert into tblpass(PassNumber,FullName,ProfileImage,ContactNumber,Email,DepartmentName,ClassName,Address,InstituteName,AdharCard,Month)values(:passnum,:fname,:propic,:cnum,:email,:dname,:cname,:add,:iname,:ano,:mon)";
$query=$dbh->prepare($sql);
$query->bindParam(':passnum',$passnum,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':cnum',$cnum,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':dname',$dname,PDO::PARAM_STR);
$query->bindParam(':cname',$cname,PDO::PARAM_STR);
$query->bindParam(':add',$add,PDO::PARAM_STR);
$query->bindParam(':iname',$iname,PDO::PARAM_STR);
$query->bindParam(':ano',$ano,PDO::PARAM_STR);
$query->bindParam(':mon',$mon,PDO::PARAM_STR);
$query->bindParam(':propic',$propic,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Pass detail has been added.")</script>';
echo "<script>window.location.href ='add-pass.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  

}
}
?>

<!DOCTYPE html>
<html>

<head>
    
    <title>Bus Pass Management System | Add Pass</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />



</head>

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
      <?php include_once('header.php');?>
        <!-- end navbar top -->

        <!-- navbar side --->
	
        <!-- end navbar side -->
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Registration Form</h1>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="post" enctype="multipart/form-data"> 
                                    
    <div class="form-group"> <label for="exampleInputEmail1">Full Name</label> <input type="text" name="fullname" value="" class="form-control" required='true'> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Profile Image</label> <input type="file" name="propic" value="" class="form-control" required='true'> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Contact Number</label> <input type="text" name="cnumber" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+"> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Email Address</label> <input type="email" name="email" value="" class="form-control" required='true'> </div>
    <div class="form-group"> <label for="exampleInputEmail1"> Department Name</label> <select type='text' name="dname" value="" class="form-control" required='true'>
			<option value="">Department</option>
			<option value="Computer">Computer</option>
			<option value="Mechanical">Mechanical</option>
			<option value="Civil">Civil</option>
			<option value="Electrical">Electrical</option>
			</select> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Class Name</label> <select type='text' name='cname' value="" class="form-control" required='true'>
			<option value="">class</option>
			<option value="FY">FY</option>
			<option value="SY">SY</option>
			<option value="TY">TY</option> </select></div>
     <div class="form-group"> <label for="exampleInputEmail1">Address</label><input type="text" name="add" value="" class="form-control" required='true'></div>
     <div class="form-group"> <label for="exampleInputEmail1">Institute  Name</label> <input type="text" name="iname" value="" class="form-control" required='true'> </div>
     <div class="form-group"> <label for="exampleInputEmail1">Adhar Card Number</label> <input type="text" name="ano" value="" class="form-control" required='true' maxlength="12"> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Month</label> <select type='text' name='mon' value="" class="form-control" required='true'>
			<option value="">Choose Month</option>
			<option value="january">january</option>
			<option value="february">February</option>
			<option value="march">March</option>
			<option value="april">April</option>
			<option value="may">May</option>
			<option value="June">June</option>
			<option value="July">July</option>
			<option value="August">August</option>
			<option value="september">September</option>
			<option value="october">October</option>
			<option value="november">November</option>
			<option value="december">December</option>
			
			</select> </div>

     <p style="padding-left: 450px"><button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button></p> </form></div>
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>

</body>

</html>
