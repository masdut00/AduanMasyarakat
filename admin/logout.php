<?php
session_start();

session_unset();
session_destroy();

header('location: http://localhost:/pm1/admin/index.php');

 ?>
