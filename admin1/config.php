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
        public function showdetails($id)
 		{
             $result=mysqli_query($this->conn,"SELECT * FROM user,userfull WHERE user.id='$id' AND user.id=userfull.user_id");
 			 return $result;
 		}

        public function approved($id)
 		{
            $r=mysqli_query($this->conn,"UPDATE user SET is_approved=1 WHERE id='$id'");
            if($r)
                return 1;
            else
                return 0;
 		}
	}
?>