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



            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error);  header( "refresh:1;url=index.php" ); ?> </div><?php }
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg);  header( "refresh:1;url=index.php" ); ?> </div><?php }?>
        <!-- Content Row -->

        <!-- /.row -->
</div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
