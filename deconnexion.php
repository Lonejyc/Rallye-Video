<?php
session_start();
$last_page = $_SERVER['HTTP_REFERER']; // Store the last page URL in a variable
session_unset();
session_destroy();
if($last_page = "dashboard.php") {
    header("Location: index.php");
} else {
    header("Location: $last_page"); // Redirect the user to the last page they were on
}
exit();

header('Location: index.php');
exit();
?>