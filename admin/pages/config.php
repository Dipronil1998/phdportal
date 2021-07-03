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
	}
?>