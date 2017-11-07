<?php
$no=0;
  include_once 'db/sql.php';
  $objUser = new User();
  $result=$objUser->select();
  $no=mysqli_num_rows( $result );
if(isset($_POST['submit']))
  {
    if($_POST['password'] != $_POST['cpassword']){
 $msg = 'Passwords should be same';

 }
$fullname=$_POST['fullname'];
$mobileno=$_POST['mobileno'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$bloodgroup=$_POST['bloodgroup'];
$location=$_POST['location'];
$password=$_POST['password'];

$id= ($objUser->regd($fullname,$mobileno,$age,$gender,$bloodgroup,$location,$password));
if($id)
{
$msg="Your info submitted successfully";
}
else
{
$error="Something went wrong. Please try again";
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blood Donation  System </title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <style>
    .navbar-toggler {
        z-index: 1;
    }

    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
        <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>


</head>

<body>



    <!-- Page Content -->
    <div class="container">



        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Become a Donor</li>
        </ol>
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- Content Row -->
        <form name="donar" action="new.php" method="post">
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Full Name<span style="color:red">*</span></div>
<div><input type="text" name="fullname" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Mobile Number<span style="color:red">*</span></div>
<div><input type="text" name="mobileno" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Age<span style="color:red">*</span></div>
<div><input type="text" name="age" class="form-control" required></div>
</div>

</div>

<div class="row">
  <div class="col-lg-4 mb-4">
  <div class="font-italic">Password<span style="color:red">*</span></div>
  <div><input type="password" name="password" class="form-control" required></div>
  </div>

  <div class="col-lg-4 mb-4">
  <div class="font-italic">Confirm Password<span style="color:red">*</span></div>
  <div><input type="password" name="cpassword" class="form-control " required></div>
  </div>

</div>


<div class="row">
  <div class="col-lg-4 mb-4">
  <div class="font-italic">Gender<span style="color:red">*</span></div>
  <div><select name="gender" class="form-control" required>
  <option value="">Select</option>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
  </select>
  </div>
  </div>

  <div class="col-lg-4 mb-4">
  <div class="font-italic">Blood Group<span style="color:red">*</span> </div>
  <div><select name="bloodgroup" class="form-control" required>
    <?php
      while ($row=mysqli_fetch_assoc($result) )
           {
      echo "<option value={$row['BloodGroup']} >".htmlspecialchars($row['BloodGroup'])."</option>";
       }
        ?>
  </select>
  </div>
  </div>

  <div class="col-lg-4 mb-4">
  <div class="font-italic">Location<span style="color:red">*</span></div>
  <div><input type="text" name="location" class="form-control" required></div>
  </div>



</div>

<div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
</div>



</div>



        <!-- /.row -->
</form>
        <!-- /.row -->
</div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
