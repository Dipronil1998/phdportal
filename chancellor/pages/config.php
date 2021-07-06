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
		public function signin($email,$pass,$role)
        {
			$this->qry=mysqli_query($this->conn,"SELECT * FROM admin_login WHERE adminemail='$email' AND adminpassword='$pass' AND role='$role'");
			$no_rows = mysqli_num_rows($this->qry); 
			if($no_rows==1)
				return 1;
			else
				return 0;
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

		public function viewsynopsis()
 		{
             $result=mysqli_query($this->conn,"SELECT * FROM synopsis");
 			 return $result;
 		}

		public function approved($id)
 		{
             $result=mysqli_query($this->conn,"UPDATE synopsis SET is_registrar=1 WHERE id='$id'");
 			 return $result;
 		}

		public function pending()
 		{
            $result=mysqli_query($this->conn,"SELECT * FROM synopsis WHERE is_registrar=0");
			$result=mysqli_num_rows($result);
 			return $result;
 		}

		public function totalsynopsis()
 		{
            $result=mysqli_query($this->conn,"SELECT * FROM synopsis");
			$row = mysqli_fetch_assoc($result);
			if($row['synopsis']!=''){
				$result=mysqli_num_rows($result);
				return $result;
			}
			
 		} 
		 public function totalthesis()
 		{
            $result=mysqli_query($this->conn,"SELECT * FROM synopsis");
			$row = mysqli_fetch_assoc($result);
			if($row['thesis']!=''){
				$result=mysqli_num_rows($result);
				return $result;
			}
			
 		}  
	}
?>