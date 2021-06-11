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
			// $sql=mysqli_query($this->conn,"SELECT * FROM user");
			// $c=$sql->num_rows+1;
			// $this->qry=mysqli_query($this->conn,"INSERT INTO user(id,firstname,middlename,lastname,email,phone,gender,dob,password) VALUES('$c','$firstname','$middlename','$lastname','$email','$phone','$gender','$dob','$password')");
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
		 

		public function fillregister($email,$title,$alteremail,$alterphone,$fathername,$address,$city,$pin,$state,$country,$insti10,$start10,$end10,$board10,$per10,$insti12,$start12,$end12,$board12,$per12,$instigra,$startgra,$endgra,$boardgra,$pergra,$instipo,$startpo,$endpo,$boardpo,$perpo,$mark10,$mark12,$markgra,$markpo,$photo,$sign,$addressp,$proforma)
 		{
			// $sql=mysqli_query($this->conn,"SELECT * FROM userfull");
			// $c=$sql->num_rows+1;
 			$result=mysqli_query($this->conn,"SELECT id FROM user WHERE email='$email'");
 			$row = mysqli_fetch_assoc($result); 
			$userid=$row['id'];
			// $this->qry=mysqli_query($this->conn,"INSERT INTO userfull(id,user_id,title,alteremail,alterphone,fathername,address,city,pin,state,country,insti10,start10,end10,board10,per10,insti12,start12,end12,board12,per12,instigra,startgra,endgra,boardgra,pergra,instipo,startpo,endpo,boardpo,perpo,mark10,mark12,markgra,markpo,photo,sign,addressp,proforma) VALUES('$c','$userid','$title','$alteremail','$alterphone','$fathername','$address','$city','$pin','$state','$country','$insti10','$start10','$end10','$board10','$per10','$insti12','$start12','$end12','$board12','$per12','$instigra','$startgra','$endgra','$boardgra','$pergra','$instipo','$startpo','$endpo','$boardpo','$perpo','$mark10','$mark12','$markgra','$markpo','$photo','$sign','$addressp','$proforma')");
			$this->qry=mysqli_query($this->conn,"INSERT INTO userfull(user_id,title,alteremail,alterphone,fathername,address,city,pin,state,country,insti10,start10,end10,board10,per10,insti12,start12,end12,board12,per12,instigra,startgra,endgra,boardgra,pergra,instipo,startpo,endpo,boardpo,perpo,mark10,mark12,markgra,markpo,photo,sign,addressp,proforma) VALUES('$userid','$title','$alteremail','$alterphone','$fathername','$address','$city','$pin','$state','$country','$insti10','$start10','$end10','$board10','$per10','$insti12','$start12','$end12','$board12','$per12','$instigra','$startgra','$endgra','$boardgra','$pergra','$instipo','$startpo','$endpo','$boardpo','$perpo','$mark10','$mark12','$markgra','$markpo','$photo','$sign','$addressp','$proforma')");
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
		
		public function viewdata($email)
 		{
 			$result=mysqli_query($this->conn,"SELECT * FROM user,userfull WHERE email='$email' AND user.id=userfull.user_id");
 			return $result;
 		}

		public function updatedata($email,$title,$alteremail,$alterphone,$fathername,$address,$city,$pin,$state,$country,$insti10,$start10,$end10,$board10,$per10,$insti12,$start12,$end12,$board12,$per12,$instigra,$startgra,$endgra,$boardgra,$pergra,$instipo,$startpo,$endpo,$boardpo,$perpo)
 		{
			$result=mysqli_query($this->conn,"SELECT id FROM user WHERE email='$email'");
			$row = mysqli_fetch_assoc($result); 
		   	$userid=$row['id'];
 			$this->qry=mysqli_query($this->conn,"UPDATE userfull SET title='$title',alteremail='$alteremail',alterphone='$alterphone',fathername='$fathername',fathername='$fathername',address='$address',city='$city',pin='$pin',state='$state',country='$country',insti10='$insti10',start10='$start10',end10='$end10',board10='$board10',per10='$per10',insti12='$insti12',start12='$start12',end12='$end12',board12='$board12',per12='$per12',instigra='$instigra',startgra='$startgra',endgra='$endgra',boardgra='$boardgra',pergra='$pergra',instipo='$instipo',endpo='$endpo',startpo='$startpo',boardpo='$boardpo',perpo='$perpo' WHERE user_id='$userid'");
 			return $this->qry;
 		}

	}
?>