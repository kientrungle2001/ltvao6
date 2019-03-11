<?php 
session_start();
check_session(); 
exit(); 

function check_session() 
{      
    /*$rs= array('status'=> 1, 'data' => $_SESSION["security_code"]); 
    echo json_encode($rs);*/
    echo $_SESSION["security_code"];
} 
?>