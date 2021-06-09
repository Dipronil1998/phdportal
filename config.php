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
        public function checkemail($email)
        {
            $this->qry=mysqli_query($this->conn,"SELECT * FROM user WHERE email='$email'");
            if(mysqli_num_rows($this->qry)>0)
                return 0;
            else
                return 1;
        }
        

		public function register($firstname,$middlename,$lastname,$email,$phone,$gender,$dob,$password)
        {
			$this->qry=mysqli_query($this->conn,"INSERT INTO user(firstname,middlename,lastname,email,phone,gender,dob,password) VALUES('$firstname','$middlename','$lastname','$email','$phone','$gender','$dob','$password')");
			if($this->qry)
				return 1;
			else
				return 0;
        }

		public function signin($email,$pass)
        {
			$this->qry=mysqli_query($this->conn,"SELECT * FROM user WHERE email='$email' AND password='$pass'");
			$no_rows = mysqli_num_rows($this->qry); 
			if($no_rows==1)
				return 1;
			else
				return 0;
        }
		public function fetchregdata($email)
 		{
 			$result=mysqli_query($this->conn,"SELECT * FROM user WHERE email='$email'");
 			return $result;
 		}

		public function isApproved($email)
		{
			$this->qry=mysqli_query($this->conn,"SELECT is_approved FROM user WHERE email='$email'");
			$row = mysqli_fetch_assoc($this->qry);
			if($row['is_approved']==1)
				return 1;
			else
				return 0;
		}

		public function isPayment($email)
		{
			$this->qry=mysqli_query($this->conn,"SELECT is_payment FROM user WHERE email='$email'");
			$row = mysqli_fetch_assoc($this->qry);
			if($row['is_payment']==1)
				return 1;
			else
				return 0;
		}				
	}
?>