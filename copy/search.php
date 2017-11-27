<?php
$no=0;
$no1=0;
include_once 'db/sql.php';
$objUser = new User();
$result=$objUser->select();
$result1=$objUser->selectl();
$no=mysqli_num_rows( $result );
if(isset($_POST['submit']))
{
$bloodgroup=$_POST['bloodgroup'];
$location=$_POST['location'];

  $res=$objUser->searchpage($bloodgroup,$location);
  $no1=mysqli_num_rows( $res );

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
            <li class="breadcrumb-item active">Search  Donor</li>
        </ol>
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- Content Row -->
        <form name="donar" method="post">
<div class="row">
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
<div><input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
</div>
</div>
       <!-- /.row -->
</form>

        <div class="row">

            <hr>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                               <tr>

                               <th>Name</th>
                               <th>Location</th>
                             <th>Gender</th>
                               <th>Mobile Number</th>
                              <th>Age</th>
                              <th>Blood Group</th>
                              </tr>
                            </thead>

                            <tbody id="items">
                               <?php
                                 if( $no1==0 ){
                                      echo '<tr><td colspan="4">No Rows Returned</td></tr>';
                                       }else{
                                      while( $row = mysqli_fetch_assoc( $res ) ){

                                       echo " <tr><td>{$row['Name']}</td><td>{$row['Location']}</td><td>{$row['Gender']}</td> <td>{$row['Mob_no']}</td> <td>{$row['Age']}</td> <td>{$row['Blood_Group']}</td> </tr>\n";
                                             }
                                           }
                                        ?>
                            </tbody>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <ul class="pagination" id="myPager"></ul>
                            </div>
                        </div>
                    </div>




        </div>



</div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
