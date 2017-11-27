<?php
$no=0;
$no1=0;
$no5=0;
  include_once 'db/sql.php';
  $objUser = new User();
  $result1=$objUser->selectl();
  $result=$objUser->select();
  $result2=$objUser->selectl();
  $result3=$objUser->select();
  $result4=$objUser->select();
  $activity=$objUser->reqnew();
  $no=mysqli_num_rows( $result );
  $no5=mysqli_num_rows( $activity );
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
  <title>Blood Donation System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/modern-business.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Blood Donation System</h2>
  <p>Donate blood, give a smile to someone.</p>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#search">Search Blood</a></li>
    <li><a data-toggle="tab" href="#register1">Become a Donor</a></li>
    <li><a data-toggle="tab" href="#request1">Request Blood</a></li>
    <li><a data-toggle="tab" href="#activity">Requests</a></li>
  </ul>


  <div class="tab-content">
      <div id="search" class="tab-pane fade in active">
  <br/>
        <form name="search"  method="post">
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
  <br/>
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
  <br/>
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


    <div id="register1" class="tab-pane fade">
      <form name="register" action="new.php" method="post">
        <br/>
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Full Name<span style="color:red">*</span></div>
<div><input type="text" name="fullname" class="form-control" required></div>
</div>
<br/>
<div class="col-lg-4 mb-4">
<div class="font-italic">Mobile Number<span style="color:red">*</span></div>
<div><input type="text" name="mobileno" class="form-control" required></div>
</div>
<br/>
<div class="col-lg-4 mb-4">
<div class="font-italic">Age<span style="color:red">*</span></div>
<div><input type="text" name="age" class="form-control" required></div>
</div>

</div>
<br/>

<br/>

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
<br/>
<div class="col-lg-4 mb-4">
<div class="font-italic">Blood Group<span style="color:red">*</span> </div>
<div><select name="bloodgroup" class="form-control" required>
  <?php
    while ($row=mysqli_fetch_assoc($result4) )
         {
    echo "<option value={$row['BloodGroup']} >".htmlspecialchars($row['BloodGroup'])."</option>";
     }
      ?>
</select>
</div>
</div>
<br/>
<div class="col-lg-4 mb-4">
<div class="font-italic">Location<span style="color:red">*</span></div>
<div><input type="text" name="location" class="form-control" required></div>
</div>



</div>
<br/>
<div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
</div>



</div>



      <!-- /.row -->
</form>
    </div>


    <div id="request1" class="tab-pane fade">
<br/>
          <!-- Content Row -->
    <form name="request" action="request.php" method="post">
  <div class="row">
  <div class="col-lg-4 mb-4">
  <div class="font-italic">Patient Name<span style="color:red">*</span></div>
  <div><input type="text" name="fullname" class="form-control" required></div>
  </div>
  <br/>
  <div class="col-lg-4 mb-4">
  <div class="font-italic">Blood Group<span style="color:red">*</span> </div>
  <div><select name="bloodgroup" class="form-control" required>
    <?php
      while ($row=mysqli_fetch_assoc($result3) )
           {
      echo "<option value={$row['BloodGroup']} >".htmlspecialchars($row['BloodGroup'])."</option>";
       }
        ?>
  </select>
  </div>
  </div>
<br/>
  <div class="col-lg-4 mb-4">
  <div class="font-italic">Location<span style="color:red">*</span> </div>
  <div><select name="location" class="form-control" required>
    <?php
      while ($row=mysqli_fetch_assoc($result2) )
           {
      echo "<option value={$row['location']} >".htmlspecialchars($row['location'])."</option>";
       }
        ?>
  </select>
  </div>
  </div>


  </div>



  <div class="row">
<br/>

    <div class="col-lg-4 mb-4">
    <div class="font-italic">Contact Number<span style="color:red">*</span></div>
    <div><input type="text" name="mobileno" class="form-control" required></div>
    </div>
<br/>
    <div class="col-lg-4 mb-4">
    <div class="font-italic">Hospital Name<span style="color:red">*</span></div>
    <div><input type="text" name="hospital" class="form-control" required></div>
    </div>
<br/>
    <div class="col-lg-4 mb-4">
    <div class="font-italic">When Required<span style="color:red">*</span></div>
    <div><input type="date" name="req_date" class="form-control" required></div>

    </div>

<br/>
  </div>

  <div class="row">

    <div class="col-lg-4 mb-4">
    <div class="font-italic">Quantity Required(millilitres)<span style="color:red">*</span></div>
    <div><input type="number" name="quantity" min="200" max="2000" class="form-control" required></div>
    </div>
<br/>
    <div class="col-lg-4 mb-4">
    <div class="font-italic">Hospital Address<span style="color:red">*</span></div>
    <div><textarea type="textarea" name="address" class="form-control" required></textarea></div>

    </div>
<br/>
    <div class="col-lg-4 mb-4">
    <div class="font-italic">Other Info</div>
    <div><textarea type="textarea" name="info" class="form-control" ></textarea></div>

    </div>

  </div>
<br/>
  <div class="row">
  <div class="col-lg-4 mb-4">
  <div><input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
  </div>



  </div>



          <!-- /.row -->
  </form>
          <!-- /.row -->

    </div>

    <div id="activity" class="tab-pane fade">
      <div class="row">

          <hr>
                  <div class="table-responsive">
                      <table class="table table-hover">
                          <thead>
                             <tr>

                             <th>Patient Name</th>
                             <th>Blood Group</th>
                           <th>Location</th>
                             <th>Mobile Number</th>
                            <th>Hospital</th>
                            <th>Required Date</th>
                            <th>Quantity Required(mL)</th>
                            <th>Hospital Address</th>
                            <th>info</th>
                            </tr>
                          </thead>

                          <tbody id="items">
                             <?php
                               if( $no5==0 ){
                                    echo '<tr><td colspan="4">No Rows Returned</td></tr>';
                                     }else{
                                    while( $row = mysqli_fetch_assoc( $activity ) ){

                                     echo " <tr><td>{$row['patient_name']}</td><td>{$row['BloodGroup']}</td><td>{$row['Location']}</td> <td>{$row['mob_no']}</td> <td>{$row['hospital_name']}</td> <td>{$row['req_date']}</td> <td>{$row['Qty']}</td> <td>{$row['hospital_address']}</td>  <td>{$row['info']}</td> </tr>\n";
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


  </div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/tether/tether.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
