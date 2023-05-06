<?php
ob_start();
session_start();

$pageTitle = 'Items';
//if you login one time before
if (isset($_SESSION['Username'])) {


    include 'init.php';/*will include init .php*/

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
    //to get data from from
    if ($do == 'Manage') {
        echo 'welcome to items page';
    } elseif ($do == 'Add' || $do == 'add') {
        include $sections_Items . 'AddItems.php';
    } elseif ($do == 'Insert' || $do == 'insert') {
        $name_Target = 'Items';

        //insert member
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $formError = array();
            $name            = $_POST['name'];
            $desc            = $_POST['description'];
            $price           = $_POST['price'];
            $country         = $_POST['country'];
            $status         = $_POST['status'];

            //update database with this info
            if (
                empty($name)
            ) {
                $formError[] = 'Name can\'t be <Strong>Empty</Strong>';
            }
            if (
                empty($desc)
            ) {
                $formError[] =
                    'Description can\'t be <Strong>Empty</Strong>';
            }
            if (empty($price)) {
                $formError[] =
                    'price can\'t be <Strong>Empty</Strong>';
            }
            if (empty($country)) {
                $formError[] =
                    'country can\'t be <Strong>Empty</Strong>';
            }
            if ($status === 0) {
                $formError[] = 'You must choose the <Strong>Status</Strong> ';
            }

            //    check if there is no error
            if (empty($formError)) {

                try {
                    $stmt = $con->prepare('INSERT INTO 
                                        items(Name,Description, Price, Country_Made,Status,Add_Date)
                                        VALUES( :zName,
                                                :zDescription,
                                                :zPrice,
                                                :zCountry_Made,
                                                :zStatus,
                                                now())');
                    $shapss = sha1($pass);
                    $stmt->execute(array(
                        'zName'             =>   $name      ,
                        'zDescription'      =>   $desc      ,
                        'zPrice'            =>   $price     ,
                        'zCountry_Made'     =>   $country   ,
                        'zStatus'           =>   $status

                    ));
                    $formError[] = $stmt->rowCount() . ' record Update';
                } catch (Exception $ex) {
                    $formError[] = $ex;
                }
                // echo success message
            }
            include $sections . 'DoAdded.php';
        } else {
            // redirectHome('can\'t browse this page directly', 2);
            // echo '<h1 class="text-center">can\'t browse this page directly<br></h1>';
        }
    } elseif ($do == 'Edit') {
    } elseif ($do == 'Update') {
    } elseif ($do == 'Delete') {
    } elseif ($do == 'Approve') {
    }
    include $tpl . 'footer.php';
} else {
    header('Location:index.php');
    exit();
}
ob_end_flush(); //release the output
