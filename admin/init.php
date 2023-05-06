<?php

include 'connect.php'; //connection database file



//routes
$tpl = 'includes/templates/'; //template directory
$Languages = 'includes/languages/'; //Js directory
$fun = 'includes/functions/'; //Js directory
$Css = 'layout/css/'; //Css directory
$Js = 'layout/js/'; //Js directory
$Js = 'layout/js/'; //Js directory
$sections= 'sections/';
$sections_cat = $sections. 'categories/';
$sections_Members = $sections.'Members/';
$sections_Items = $sections.'items/';

//include the important file 
include  $Languages . 'english.php'; // include  $Languages . 'english.php';
include  $fun . 'function.php'; // include  $Languages . 'english.php';
include $tpl . 'header.php'; // -- will include or import header.php 

//include NavBar on all pages expect the one with $noNavBar variable 
if (!isset($noNavBar)) {
   include $tpl . 'navbar.php'; // -- will include or import header.php 
}
