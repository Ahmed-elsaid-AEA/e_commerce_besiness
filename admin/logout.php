<?php
//will delete your session
session_start(); //first open your session
session_unset(); //unset data not destroy data
session_destroy(); //destroy session
/**after that will direct user to starting page */
header('location: index.php');
//after that sould exit it
exit();