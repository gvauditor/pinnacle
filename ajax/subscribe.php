<?php
require("../Subscribe.php"); 

$data = array("firstname"=>$_POST['firstname'], "midname"=>$_POST['midname'], "lastname"=>$_POST['lastname'], "email"=>$_POST['email']); 

$subscribe = new Subscribe($data); 

$msg = $subscribe->checkdata();

if($msg == 'success') { 
	$subscribe->insert();

	echo "<div class='alert alert-success'>
  				Thanks $_POST[firstname] $_POST[midname] $_POST[lastname], your email address $_POST[email] was added to subscribers list.
			</div>";
}
else {  
    echo "<div class='alert alert-warning'>$msg</div>";
    
}
?> 
 
