<?php
// unset session, redirect to index.php --> login
session_start();
session_unset();
session_write_close();
$url = "../index.php";
header("Location: $url");
?>
