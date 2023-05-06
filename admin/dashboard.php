<?php
ob_start("ob_gzhandler");//start buffering start
session_start();

// this page has session name
if (isset($_SESSION['Username'])) { //if your login anthor time 
    // echo "hello" . $_SESSION['Username'];
    $pageTitle = 'Dashboard';
    include 'init.php';
    include $tpl . 'footer.php'; 
    // print_r( $_SESSION);
    /* start Dashboard page */
    include  'MainDashboard.php';
    /* end Dashboard page */
    include $tpl . 'footer.php';
} else {

    // echo "<center>You are not authorized to view this page<br>🤓🤓🤓🤓🤓🤓</center>";

    header('location: index.php'); //redirect to point of starting
    exit();
    ob_end_flush();
}
