<?php

session_start();

unset($user_id);
$_SESSION['loggedin'] = false;
session_destroy();
header('location:login.php');

die;
