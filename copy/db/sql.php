<?php

if (!isset($_SESSION))
    session_start();
include_once 'dbconnect.php';

class User {

    var $dbObj;

    public function __construct() {
        $this->dbObj = new db();
    }

    public function insert($user_name, $password, $name, $address, $contact_no, $about) {
        $password = hash('sha256', $password);
        $sql = " INSERT INTO user"
                . " (user_name,password,name,address,contact_no,about)"
                . " VALUES('$user_name','$password','$name','$address','$contact_no','$about')";
        return $this->dbObj->ExecuteQuery($sql, 2);
    }

   public function  regd($fullname,$mobileno,$age,$gender,$bloodgroup,$location,$password)
   {

   $sql="insert into login(Mob_no,password,Type) values('$mobileno','$password','Donor')";

  $id= $this->dbObj->ExecuteQuery($sql, 2);

    $sql = "insert into details(id,Name,Location,Gender,Mob_no,Age,Blood_Group,Type) VALUES
    ('$id','$fullname','$location','$gender','$mobileno','$age','$bloodgroup','Donor')";
    $r=$this->dbObj->ExecuteQuery($sql, 2);
    return $id;

   }

   public function  request($fullname,$bloodgroup,$location,$mobileno,$hospital,$req_date,$quantity,$address,$info)
   {

   $sql="insert into request(patient_name,BloodGroup,Location,mob_no,hospital_name,req_date,Qty,hospital_address,info) values('$fullname','$bloodgroup','$location','$mobileno','$hospital','$req_date','$quantity','$address','$info')";

  $id= $this->dbObj->ExecuteQuery($sql, 2);

    return $id;

   }



   public function  trans_d($req_id,$regs,$regd,$status)
   {
     if($status=='WAITING')
	 {
	$sql="insert into donor_trans(req_id,regs,regd,status,open_date) values('$req_id','$regs','$regd','$status',now())";
    return $this->dbObj->ExecuteQuery($sql, 2);

	 }
	$sql="update req set visibility='not visible' where id='$req_id'";
	$this->dbObj->ExecuteQuery($sql, 2);
   $sql="insert into donor_trans(req_id,regs,regd,status,open_date) values('$req_id','$regs','$regd','$status',now())";
    return $this->dbObj->ExecuteQuery($sql, 2);
   }



       public function select()
	   {
		  $sql="select * from bloodgroup";
		 return $this->dbObj->ExecuteQuery($sql, 1);

	   }

     public function reqnew()
  {
   $sql="select * from request";
  return $this->dbObj->ExecuteQuery($sql, 1);

  }

     public function selectl()
   {
    $sql="select distinct location from details";
   return $this->dbObj->ExecuteQuery($sql, 1);

   }

   public function searchpage($bloodgroup,$location)
   {

   $sql="select * from details where Blood_Group='$bloodgroup' and location='$location' ";
   return $this->dbObj->ExecuteQuery($sql, 1);

   }




    public function update($user_name, $password, $name, $address, $contact_no, $about, $old_password, $user_id) {
        if (empty($password))
            $password = $old_password;
        else
            $password = hash('sha256', $password);
        $sql = " UPDATE"
                . " user "
                . " SET user_name = '$user_name',password = '$password',name = '$name',address = '$address',"
                . " contact_no = '$contact_no',about = '$about'"
                . " WHERE user_id = '$user_id'";
        return $this->dbObj->ExecuteQuery($sql, 3);
    }















    public function login($email_id, $password) {

       $sql = " SELECT"
                . " email_id,password,reg_as,reg_no"
                . " FROM register WHERE"
                . " email_id = '$email_id' AND password = '$password'";
        $data = $this->dbObj->ExecuteQuery($sql, 1);
        if (mysqli_num_rows($data) > 0) {
            $fetch_data = mysqli_fetch_assoc($data);
            $_SESSION['type'] = $fetch_data['reg_as'];
            $_SESSION['reg_no'] = $fetch_data['reg_no'];
			$_SESSION['email_id'] = $fetch_data['email_id'];
			if($_SESSION['type']=='D')
            header("location:donor_profile.php");
		     if($_SESSION['type']=='V')
            header("location:vendor_profile.php");
		    if($_SESSION['type']=='S')
            header("location:seeker_profile.php");




        }


		else {
            echo "<script>window.location='index.php';alert('Invalid User Name or Password !!')</script>";
        }
    }

}

?>
