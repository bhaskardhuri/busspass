<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{
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
$eid=$_GET['editid'];
$sql="update tblpass set FullName=:fname,ContactNumber=:cnum,Email=:email,DepartmentName=:dname,ClassName=:cname,Address=:add,InstituteName=:iname,AdharCard=:ano,Month=:mon where ID=:eid";
$query=$dbh->prepare($sql);

$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':cnum',$cnum,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':dname',$dname,PDO::PARAM_STR);
$query->bindParam(':cname',$cname,PDO::PARAM_STR);
$query->bindParam(':add',$add,PDO::PARAM_STR);
$query->bindParam(':iname',$iname,PDO::PARAM_STR);
$query->bindParam(':ano',$ano,PDO::PARAM_STR);
$query->bindParam(':mon',$mon,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();

  
         echo '<script>alert("Pass Detail has been updated")</script>';
 

  

}
?>

<!DOCTYPE html>
<html>

<head>
    
    <title>Bus Pass Management System | Edit Pass</title>
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
      <?php include_once('includes/header.php');?>
        <!-- end navbar top -->

        <!-- navbar side -->
        <?php include_once('includes/sidebar.php');?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Update detail</h1>
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
                                    <?php
$eid=$_GET['editid'];
$sql="SELECT * from  tblpass where ID=$eid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?> 
  <p colspan="6" style="font-size:20px;color:blue;text-align: center;">
 Pass ID: <?php  echo ($row->PassNumber);?></p>
    <div class="form-group"> <label for="exampleInputEmail1">Full Name</label> <input type="text" name="fullname" value="<?php  echo $row->FullName;?>" class="form-control" required='true'> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Photo</label> <img src="images/<?php echo $row->ProfileImage;?>" width="50" height="50" value="<?php  echo $row->ProfileImage;?>">
<a href="changeimage.php?editid=<?php echo $row->ID;?>"> &nbsp; Edit Image</a> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Contact Number</label> <input type="text" name="cnumber" value="<?php  echo $row->ContactNumber;?>" class="form-control" required='true' maxlength="10" pattern="[0-9]+"> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Email Address</label> <input type="email" name="email" value="<?php  echo $row->Email;?>" class="form-control" required='true'> </div>
    <div class="form-group"> <label for="exampleInputEmail1">department Name</label><select type="text" name="dname" value="<?php  echo $row->DepartmentName;?>" class="form-control" required='true'>
	<option value="">Department</option>
			<option value="Computer">Computer</option>
			<option value="Mechanical">Mechanical</option>
			<option value="Civil">Civil</option>
			<option value="Electrical">Electrical</option>
			</select>
</div>
 <div class="form-group"> <label for="exampleInputEmail1">Class Name</label> <select type='text' name='cname' value="<?php  echo $row->ClassName;?>" class="form-control" required='true'>
			<option value="">class</option>
			<option value="FY">FY</option>
			<option value="SY">SY</option>
			<option value="TY">TY</option> </select></div>
    <div class="form-group"> <label for="exampleInputEmail1">Address</label> <input type="text" name="add" value="<?php  echo $row->Address;?>" class="form-control" required='true'> </div>
     <div class="form-group"> <label for="exampleInputEmail1">Institute Name</label><input type="text" name="iname" value="<?php  echo $row->InstituteName;?> " class="form-control" required='true'>
<div class="form-group"> <label for="exampleInputEmail1">Aadhar card</label> <input type="tel" name="ano" value="<?php  echo $row->AdharCard;?>" class="form-control" required='true'> </div>
<div class="form-group"> <label for="exampleInputEmail1">Month</label> <select type='text' name='mon' value="<?php  echo $row->Month;?>" class="form-control" required='true'>
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
			
			</select></div>
<div class="form-group"> <label for="exampleInputEmail1">Pass Creation Date</label> <input type="text" value="<?php  echo $row->PasscreationDate;?>" class="form-control" readonly='true'> </div>
<?php $cnt=$cnt+1;}} ?> 
     <p style="padding-left: 450px"><button type="submit" class="btn btn-primary" name="submit" id="submit">Update</button></p> </form>
                                </div>
                                
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
<?php }  ?>