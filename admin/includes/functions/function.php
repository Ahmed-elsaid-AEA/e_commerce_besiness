<?php

/**Title function that echo The page Title in case the page has the variable $pageTitle 
 * and Echo default title for other Pages */
function getTitle()
{
    //first make title page is grobal
    global $pageTitle;
    if (isset($pageTitle)) {
        echo $pageTitle;
    } else {
        echo 'default';
    }
}
/**
 * redirect function[this function accept parmanters]
 */
function redirectHome($errormessage, $url = null, $seconds = 3)
{
    if ($url) {
        $url = "index.php";
    } else {
        //to make it back to the page that you coming from it
        if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== null) {
            $url = $_SERVER['HTTP_REFERER'];
        } else {
            $url = "index.php";
        }
    }
    echo "<div class='container'>";
    echo "<div class='alert alert-danger'>
            $errormessage
            </div>";
    echo "<div class='alert alert-info'>
            You will be redirected to homepage After $seconds Seconds .
            </div>";
    echo "</div>";
    //will stop the second that you wand
    header("refresh:$seconds;url=$url");
    exit();
}
/**
 * function to check item in database
 */
function checkItems($select, $from, $value)
{
    global $con;
    $statment = $con->prepare("SELECT $select FROM $from WHERE $select=?");
    $statment->execute(array($value));
    $count =  $statment->rowCount();
    return $count;
}
/**
 * count Number of item
 */
function CountItems($items, $table)
{
    global $con;
    $stmt2 = $con->prepare("SELECT COUNT($items) FROM $table");
    $stmt2->execute();
    return $stmt2->fetchColumn();
}
/**
 * get latest records function
 * function to get latest items from database [user ,items,comments]
 */
function getLatest($select, $table, $order, $limit = 5)
{
    global $con;
    $getStmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");
    $getStmt->execute();
    $rows = $getStmt->fetchAll();
    return $rows;
}
