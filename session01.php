<?php
session_start();

$_SESSION['name'] = $name;
$_SESSION['age'] = $age;


echo session_id();
