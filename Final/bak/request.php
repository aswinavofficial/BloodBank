<?php
$no=0;
$no1=0;
  include_once 'db/sql.php';
  $objUser = new User();
  $result1=$objUser->selectl();
  $result=$objUser->select();
  $no=mysqli_num_rows( $result );
if(isset($_POST['submit']))
  {
$fullname=$_POST['fullname'];
$bloodgroup=$_POST['bloodgroup'];
$location=$_POST['location'];
$mobileno=$_POST['mobileno'];
$hospital=$_POST['hospital'];
$req_date=$_POST['req_date'];
$quantity=$_POST['quantity'];
$address=$_POST['address'];
$info=$_POST['info'];
$id= ($objUser->request($fullname,$bloodgroup,$location,$mobileno,$hospital,$req_date,$quantity,$address,$info));
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
            <li class="breadcrumb-item active">Request Blood</li>
            <li class="breadcrumb-item "><a href="search.php">Search Blood</a></li>
        </ol>
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- Content Row -->
        <form name="donar" action="request.php" method="post">
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Patient Name<span style="color:red">*</span></div>
<div><input type="text" name="fullname" class="form-control" required></div>
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
<div class="font-italic">Location<span style="color:red">*</span> </div>
<div><select name="location" class="form-control" required>
  <?php
    while ($row=mysqli_fetch_assoc($result1) )
         {
    echo "<option value={$row['location']} >".htmlspecialchars($row['location'])."</option>";
     }
      ?>
</select>
</div>
</div>


</div>



<div class="row">


  <div class="col-lg-4 mb-4">
  <div class="font-italic">Contact Number<span style="color:red">*</span></div>
  <div><input type="text" name="mobileno" class="form-control" required></div>
  </div>

  <div class="col-lg-4 mb-4">
  <div class="font-italic">Hospital Name<span style="color:red">*</span></div>
  <div><input type="text" name="hospital" class="form-control" required></div>
  </div>

  <div class="col-lg-4 mb-4">
  <div class="font-italic">When Required<span style="color:red">*</span></div>
  <div><input type="date" name="req_date" class="form-control" required></div>

  </div>


</div>

<div class="row">

  <div class="col-lg-4 mb-4">
  <div class="font-italic">Quantity Required(millilitres)<span style="color:red">*</span></div>
  <div><input type="number" name="quantity" min="200" max="2000" class="form-control" required></div>
  </div>

  <div class="col-lg-4 mb-4">
  <div class="font-italic">Hospital Address<span style="color:red">*</span></div>
  <div><textarea type="textarea" name="address" class="form-control" required></textarea></div>

  </div>

  <div class="col-lg-4 mb-4">
  <div class="font-italic">Other Info</div>
  <div><textarea type="textarea" name="info" class="form-control" ></textarea></div>

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
