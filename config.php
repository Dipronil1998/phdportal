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


		public function checkpdf($string)
 		{
 			$pdf=$string['name'];
			$file_type=$string['type'];
			if ($file_type=="application/pdf")
				return 1;
			else
				return 0;
 		}

		 public function checkimage($string)
 		{
 			$image=$string['name'];
			$file_type=$string['type'];
			if ($file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/png')
				return 1;
			else
				return 0;
 		}
		 

		public function fillregister($email,$alteremail,$alterphone,$fathername,$address,$city,$pin,$state,$country,$insti10,$start10,$end10,$board10,$per10,$insti12,$start12,$end12,$board12,$per12,$instigra,$startgra,$endgra,$boardgra,$pergra,$instipo,$startpo,$endpo,$boardpo,$perpo,$mark10,$mark12,$markgra,$markpo,$photo,$sign,$addressp,$proforma)
 		{
 			$result=mysqli_query($this->conn,"SELECT id FROM user WHERE email='$email'");
 			$row = mysqli_fetch_assoc($result); 
			$userid=$row['id'];
			$this->qry=mysqli_query($this->conn,"INSERT INTO userfull(user_id,alteremail,alterphone,fathername,address,city,pin,state,country,insti10,start10,end10,board10,per10,insti12,start12,end12,board12,per12,instigra,startgra,endgra,boardgra,pergra,instipo,startpo,endpo,boardpo,perpo,mark10,mark12,markgra,markpo,photo,sign,addressp,proforma) VALUES('$userid','$alteremail','$alterphone','$fathername','$address','$city','$pin','$state','$country','$insti10','$start10','$end10','$board10','$per10','$insti12','$start12','$end12','$board12','$per12','$instigra','$startgra','$endgra','$boardgra','$pergra','$instipo','$startpo','$endpo','$boardpo','$perpo','$mark10','$mark12','$markgra','$markpo','$photo','$sign','$addressp','$proforma')");

			if($this->qry)
			{
				$r=mysqli_query($this->conn,"UPDATE user SET is_profile=1 WHERE email='$email'");
				return 1;
			}
			else
				return 0;
 		}

		 public function isProfile($email)
		 {
			 $this->qry=mysqli_query($this->conn,"SELECT is_profile FROM user WHERE email='$email'");
			 $row = mysqli_fetch_assoc($this->qry);
			 if($row['is_profile']==1)
				 return 1;
			 else
				 return 0;
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