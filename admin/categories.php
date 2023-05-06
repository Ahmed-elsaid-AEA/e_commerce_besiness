<?php
ob_start();
session_start();

$pageTitle = 'Categories';
//if you login one time before
if (isset($_SESSION['Username'])) {


    include 'init.php';/*will include init .php*/

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
    //to get data from from

    if ($do == 'Manage') {
        include $sections_cat . 'ManageCategory.php';
    } elseif ($do == 'Add' || $do == 'add') {
        include $sections_cat . 'AddCategory.php';
    } else if ($do == 'Insert') {
        $name_Target = 'Catogory';
        //insert Catogery
        echo "<h1 class='text-center'>Insert Catogory</h1>";
        echo "<div class='container'>";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (
                $_POST["description"] || $_POST["ads"] || $_POST["name"]  || $_POST["ordering"] || $_POST["visibility"] || $_POST["commenting"]
            ) {
                $formError = array();

                $name        =   $_POST['name'];
                $desc        =   $_POST['description'];
                $order       =   $_POST['ordering'];
                $visible     =   $_POST['visibility'];
                $comment     =   $_POST['commenting'];
                $ads         =   $_POST['ads'];

                //    check if there is no error
                if (!empty($name)) {

                    try {
                        //check if Catogery exist in database

                        $check = checkItems("Name", "categories", $name);

                        if ($check == 1) {
                            foreach ($formError as $key => $value) {
                                unset($formError[$key]);
                            }
                            $formError[] =  ' Select anthor Category beacuse is excited ';
                        } else {
                            $stmt = $con->prepare('INSERT INTO 
                                        categories(name,Decsription, Ordering,Visibility,Allow_Comment,Allows_Ads)
                                        VALUES(:zname,:zDecsription,:zDecsription,:zVisibility,:zAllow_Comment,:Allows_Ads)');
                            $shapss = sha1($pass);
                            $stmt->execute(array(
                                'zname'            =>    $name,
                                'zDecsription'     =>    $desc,
                                'zDecsription'     =>    $order,
                                'zVisibility'      =>    $visible,
                                'zAllow_Comment'   =>    $comment,
                                'Allows_Ads'       =>    $ads

                            ));
                            $formError[] = $stmt->rowCount() . ' record Update';
                        }
                    } catch (Exception $ex) {
                        $formError[] = '$ex';
                    }

                    // echo success message


                } else {
                }
                include $sections . 'DoAdded.php';
            }
        } else {
            redirectHome('can\'t browse this page directly', 2);
            // echo '<h1 class="text-center">can\'t browse this page directly<br></h1>';
        }
        echo "</div";
    } elseif ($do == 'Edit') {
        //edit page
        $catid = isset($_GET['catid']) && is_numeric($_GET['catid'])
            ?/*trnsfert it to integer*/
            intval($_GET['catid']) :  0;
        //check if user was in database
        $stmt = $con->prepare(
            "SELECT       
                             *
                            FROM 
                                categories 
                            WHERE
                                 ID=?"

        );
        $stmt->execute(array($catid));
        //to fetch or get data
        $cat = $stmt->fetch();
        //to get count of row
        $count = $stmt->rowCount();
        //if count is bigger than 0 the database contain record about this username and password

        if ($count > 0) {
            include $sections_cat . 'editCatogory.php';
        } else {

            redirectHome('theres no such id', 2);

            // echo 'theres no such id';
        }
    } elseif ($do == 'Update') {

        $formError = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (
                $_POST["catid"] || $_POST["name"] || $_POST["description"]
                || $_POST["ordering"] || $_POST["visibility"] || $_POST["commenting"] || $_POST["ads"]
            ) {
                $id          =       $_POST['catid'];
                $name        =       $_POST['name'];
                $des         =       $_POST['description'];
                $order       =       $_POST['ordering'];
                $visible     =       $_POST['visibility'];
                $commnet     =       $_POST['commenting'];
                $ads       =       $_POST['ads'];

                //update database with this info
                if (strlen($name) < 4) {
                    $formError[] = 'Name can\'t be less than <Strong> 4 characters</Strong>';
                }
                //    check if there is no error
                if (empty($formError)) {
                    $stmt = $con->prepare('UPDATE
                                            categories
                                        SET 
                                            Name=?,
                                            Decsription=?,
                                            Ordering=?,
                                            Visibility=?,
                                            Allow_Comment=?,
                                            Allows_Ads=?
                                        where
                                            ID=?
                                              ');
                    $stmt->execute(array($name, $des, $order, $visible, $commnet, $ads, $id));
                    // echo success message
                    $formError[] = $stmt->rowCount() . ' record Update';
                }
                include $sections_cat . 'categoryUpdate.php';
            }
            header("refresh:2;url=categories.php");
            exit();
        } else {
            redirectHome('can\'t browse this page directly', 2);
            // echo 'can\'t browse this page directly';
        }
    } elseif ($do == 'Delete') {
        $catid = isset($_GET['catid']) && is_numeric($_GET['catid'])
            ?/*trnsfert it to integer*/
            intval($_GET['catid']) :  0;
        $check = checkItems("ID", 'categories', $catid);
        if ($check > 0) {
            $stmt = $con->prepare(
                "DELETE   
                            FROM 
                                categories 
                            WHERE
                                 ID=:zcatid"
            );
            $stmt->bindParam(":zcatid", $catid);
            $stmt->execute();
            $count = $stmt->rowCount();
            // include $sections_Members .'editMembers.php';
            echo '<h1 class="text-center">Deleted Category</h1>
            <div class="text-center alert alert-success container">' . $count . ' Record Deleted</div>';
            if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== null) {
                $url = $_SERVER['HTTP_REFERER'];
            } else {
                $url = "categories.php";
            }
            header("refresh:1;$url");
            exit();
        } else {
            redirectHome('this ID not existed', 'back', 2);
        }
    }
    include $tpl . 'footer.php';
} else {
    header('Location:index.php');
    exit();
}
ob_end_flush(); 
//release the output
