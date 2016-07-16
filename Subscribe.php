<?php
require("Database.php");

class Subscribe extends Database { 
	private $fname;
	private $midname;
	private $lname; 
	private $email;

	function __construct($data = '') { 
		 $this->fname = mysql_real_escape_string($data['firstname']); 
		 $this->midname = mysql_real_escape_string($data['midname']);
		 $this->lname = mysql_real_escape_string($data['lastname']);
		 $this->email = mysql_real_escape_string($data['email']);	
	} 

	function checkdata() { 
		if(trim($this->fname) == '' OR trim($this->midname) == ''OR trim($this->lname) == '') { 
			$msg = 'Please check the inputs for your name.'; 
		} 
		elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) { 
			$msg = 'Invalid email address.'; 
		}
		elseif($this->check_email() > 0) { 
			$msg = 'Email address already exist in the list.';
		}
		else { 
			$msg = 'success';
		}

		return $msg; 
	}


	function runquery($sql) { 
		return parent::getInstance()->getConnection()->query($sql);
	}


	function check_email() { 
		$sql = "SELECT email FROM users WHERE email = '$this->email' ";
		$result = Subscribe::runquery($sql);
 		return $result->num_rows; 
	}

	function insert() { 
		$sql = "INSERT INTO users (firstname,midname,lastname,email) VALUES('$this->fname','$this->midname','$this->lname','$this->email')"; 
		$result = Subscribe::runquery($sql);
	}
}
?>