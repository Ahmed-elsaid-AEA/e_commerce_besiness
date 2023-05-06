<?php

/**
 * menage member page
 */
session_start();
$pageTitle = "Members";
// this page has session name
if (isset($_SESSION['Username'])) {
    //if your login anthor time 
    // echo "hello" . $_SESSION['Username'];
    include 'init.php';
 
    include $tpl . 'footer.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    //start manage page
    if ($do == 'manage' || $do == 'Pending') {
        //manage page

        include $sections_Members.'manageMember.php';
    } else if ($do == 'Add') {
        //add member
        include  $sections_Members . 'AddMembers.php';
    } else if ($do == 'Insert') {
        //insert member
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name_Target =  'Members';
            if (
                $_POST["password"] || $_POST["username"] || $_POST["email"] || $_POST["full"]
            ) {
                $formError = array();
                $user     = $_POST['username'];
                $pass     = $_POST['password'];
                $email    = $_POST['email'];
                $name     = $_POST['full'];
                //update database with this info
                if (
                    strlen($user) < 4
                ) {
                    $formError[] = 'Username can\'t be less than <Strong> 4 characters</Strong>';
                }
                if (
                    strlen($user) > 20
                ) {
                    $formError[] = 'Username can\'t be more than <Strong> 20 characters</Strong> ';
                }
                if (empty($user)) {
                    $formError[] = 'Username can\'t be <Strong>empty</Strong> ';
                }
                if (empty($name)) {
                    $formError[] = 'Full name can\'t be <Strong>empty</Strong> ';
                }
                if (empty($email)) {
                    $formError[] = 'Email  can\'t be <Strong>empty</Strong> ';
                }
                if (empty($pass)) {
                    $formError[] = 'Password  can\'t be <Strong>empty</Strong> ';
                }
                //    check if there is no error
                if (empty($formError)) {
                    try {
                        //check if User exist in database
                        $value = 'ahmed';
                        $check = checkItems("Username", "users", $user);
                        if ($check == 1) {
                            foreach ($formError as $key => $value) {
                                unset($formError[$key]);
                            }
                            $formError[] =  ' Select anthor name beacuse is excited ';
                        } else {
                            $stmt = $con->prepare('INSERT INTO 
                                        users(Username,Password, Email, FullName,RegStatus,Date)
                                        VALUES(:zuser,:zpass,:zemail,:zname,1,now())');
                            $shapss = sha1($pass);
                            $stmt->execute(array(
                                'zuser'     =>  $user,
                                'zpass'     =>  $shapss,
                                'zemail'    =>  $email,
                                'zname'     =>  $name

                            ));
                            $formError[] = $stmt->rowCount() . ' record Update';
                        }
                    } catch (Exception $ex) {
                        $formError[] = '$ex';
                    }
                    // echo success message
                }
                include $sections . 'DoAdded.php';
            }
        } else {
            redirectHome('can\'t browse this page directly', 2);
            // echo '<h1 class="text-center">can\'t browse this page directly<br></h1>';
        }
    } elseif ($do == 'Edit') { //edit page
        $userid = isset($_GET['userid']) && is_numeric($_GET['userid'])
            ?/*trnsfert it to integer*/
            intval($_GET['userid']) :  0;
        //check if user was in database
        $stmt = $con->prepare(
            "SELECT       
                             *
                            FROM 
                                users 
                            WHERE
                                 UserID=?
                              AND
                                GroupID=1
                            LIMIT 1"
        );
        $stmt->execute(array($userid));
        //to fetch or get data
        $row = $stmt->fetch();
        //to get count of row
        $count = $stmt->rowCount();
        //if count is bigger than 0 the database contain record about this username and password
        if ($count > 0) {
            include $sections_Members .'editMembers.php';
        } else {
            redirectHome('theres no such id', 2);

            // echo 'theres no such id';
        }
    } elseif ($do == "Update") {
        $formError = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST["userid"] || $_POST["username"] || $_POST["email"] || $_POST["full"]) {
                $id       = $_POST['userid'];
                $user     = $_POST['username'];
                $email    = $_POST['email'];
                $name     = $_POST['full'];
                //password trick
                $pass = empty($_POST['newpassword']) ?
                    $_POST['oldpassword']
                    :   sha1($_POST['newpassword']);
                //update database with this info
                if (strlen($user) < 4) {
                    $formError[] = 'Username can\'t be less than <Strong> 4 characters</Strong>';
                }
                if (strlen($user) > 20) {
                    $formError[] = 'Username can\'t be more than <Strong> 20 characters</Strong> ';
                }
                if (empty($user)) {
                    $formError[] = 'Username can\'t be <Strong>empty</Strong> ';
                }
                if (empty($name)) {
                    $formError[] = 'Full name can\'t be <Strong>empty</Strong> ';
                }
                if (empty($email)) {
                    $formError[] = 'Email  can\'t be <Strong>empty</Strong> ';
                }
                //    check if there is no error
                if (empty($formError)) {
                    $stmt = $con->prepare('UPDATE
                                            userS
                                        SET 
                                            Username=?,
                                            Email=?,
                                            Fullname=?,
                                            Password=?
                                        where
                                            UserID=?
                                              ');
                    $stmt->execute(array($user, $email, $name, $pass, $id));
                    // echo success message

                    $formError[] = $stmt->rowCount() . ' record Update';
                }
                include $sections_Members . 'memberUpdate.php';
            }
        } else {
            redirectHome('can\'t browse this page directly', 2);

            // echo 'can\'t browse this page directly';
        }
    } elseif ($do == "Delete") {
        $userid = isset($_GET['userid']) && is_numeric($_GET['userid'])
            ?/*trnsfert it to integer*/
            intval($_GET['userid']) :  0;
        //check if user was in database
        // $stmt = $con->prepare(
        //     "SELECT       
        //                      *
        //                     FROM 
        //                         users 
        //                     WHERE
        //                          UserID=?
        //                     LIMIT 1"
        // );
        $check = checkItems("userid", 'users', $userid);
        // $stmt->execute(array($userid));
        // //to fetch or get data
        // $row = $stmt->fetch();
        // //to get count of row
        // $count = $stmt->rowCount();
        //if count is bigger than 0 the database contain record about this username and password
        if ($check > 0) {
            $stmt = $con->prepare(
                "DELETE   
                            FROM 
                                users 
                            WHERE
                                 UserID=:zuserid"
            );
            $stmt->bindParam(":zuserid", $userid);
            $stmt->execute();
            $count = $stmt->rowCount();
            // include $sections_Members .'editMembers.php';
            echo '<h1 class="text-center">Deleted Member</h1>
            <div class="text-center alert alert-success container">' . $count . ' Record Deleted</div>';
            if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== null) {
                $url = $_SERVER['HTTP_REFERER'];
            } else {
                $url = "index.php";
            }
            header("refresh:1;url=$url");
            exit();
        } else {
            redirectHome('this ID not existed', 'back', 2);
        }
    } elseif ($do == "Activate") {
        $userid = isset($_GET['userid']) && is_numeric($_GET['userid'])
            ?/*trnsfert it to integer*/
            intval($_GET['userid']) :  0;

        $check = checkItems("userid", 'users', $userid);
        //if count is bigger than 0 the database contain record about this username and password
        if ($check > 0) {
            $stmt = $con->prepare(
                "UPDATE   
                    users 
                SET
                    RegStatus=1
                            WHERE
                                 UserID=:zuserid"
            );
            $stmt->bindParam(":zuserid", $userid);
            $stmt->execute();
            $count = $stmt->rowCount();
            // include $sections_Members .'editMembers.php';
            echo '<h1 class="text-center">Deleted Member</h1>
            <div class="text-center alert alert-success container">' . $count . ' Record Updated</div>';
            if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== null) {
                $url = $_SERVER['HTTP_REFERER'];
            } else {
                $url = "index.php";
            }
            header("refresh:.4;url=$url");
            exit();
        } else {
            redirectHome('this ID not existed', 'back', 2);
        }
    }
    include $tpl . 'footer.php';
} else {

    header('location: index.php'); //redirect to point of starting
    exit();
}
