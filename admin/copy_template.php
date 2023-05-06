<?php
ob_start();
session_start();

$pageTitle = '';
//if you login one time before
if (isset($_SESSION['Username'])) {


    include 'init.php';/*will include init .php*/

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
    //to get data from from
    if ($do == 'Manage') {
        echo 'welcome';
    } elseif ($do == 'Add') {
    } elseif ($do == 'Insert') {
    } elseif ($do == 'Edit') {
    } elseif ($do == 'Update') {
    } elseif ($do == 'Delete') {
    } elseif ($do == 'Activate') {
    }
    include $tpl . 'footer.php';
} else {
    header('Location:index.php');
    exit();
}
ob_end_flush(); //release the output
?>
