<?php

session_start(); // Khai báo hàm session cho File logout trước

session_destroy(); 
header('location: home.php');

?>