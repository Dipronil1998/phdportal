<?php
	
	class config 
	{
		protected $servername='localhost';
		protected $username='root';
		protected $pass='';
		protected $db='phdportal';
		function __construct()
		{
			$this->conn=new mysqli($this->servername,$this->username,$this->pass,$this->db);
		}
	}

	
	class database extends config
	{

		public function signin($email,$pass)
        {
			$this->qry=mysqli_query($this->conn,"SELECT * FROM admin_login WHERE adminemail='$email' AND adminpassword='$pass'");
			$no_rows = mysqli_num_rows($this->qry); 
			if($no_rows==1)
				return 1;
			else
				return 0;
        }
		public function viewsynopsis()
		{
			$result=mysqli_query($this->conn,"SELECT * FROM synopsis");
			 return $result;
		}

		public function guideselect()
 		{
 			$result=mysqli_query($this->conn,"SELECT * FROM guide");
 			return $result;
 		}
		 
		public function viewapplicant()
 		{
 			$result=mysqli_query($this->conn,"SELECT * FROM user");
 			return $result;
 		}

		public function showdetails($id)
 		{
             $result=mysqli_query($this->conn,"SELECT * FROM user,userfull WHERE user.id='$id' AND user.id=userfull.user_id");
 			 return $result;
 		}


		public function addguide($guidename,$title,$about)
		{
			$this->qry=mysqli_query($this->conn,"INSERT INTO guide VALUES(NULL,'$guidename','$title','$about',1)");
			if($this->qry)
				return 1;
			else
				return 0;
		}

		public function approved($id)
 		{
             $result=mysqli_query($this->conn,"UPDATE user SET is_approved=1 WHERE id='$id'");
 			return $result;
 		}

		 public function delete($id)
 		{
             $result=mysqli_query($this->conn,"DELETE FROM user WHERE id='$id'");
 			return $result;
 		}

		public function email($id)
 		{
			$this->qry=mysqli_query($this->conn,"SELECT * FROM user WHERE id='$id'");
			$row = mysqli_fetch_assoc($this->qry);
 			return $row['email'];
			
 		}

		public function newapplication()
 		{
            $result=mysqli_query($this->conn,"SELECT * FROM user WHERE is_approved=1");
			$result=mysqli_num_rows($result);
 			return $result;
 		}

		public function totalstudent()
 		{
            $result=mysqli_query($this->conn,"SELECT * FROM user WHERE is_approved=1");
			$result=mysqli_num_rows($result);
 			return $result;
 		}

		public function pendingstudent()
 		{
            $result=mysqli_query($this->conn,"SELECT * FROM user WHERE is_approved=0");
			$result=mysqli_num_rows($result);
 			return $result;
 		}

		public function totalguide()
 		{
            $result=mysqli_query($this->conn,"SELECT * FROM user WHERE is_approved=0");
			$result=mysqli_num_rows($result);
 			return $result;
 		}
	}
?>