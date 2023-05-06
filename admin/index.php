<?php
session_start();
$noNavBar = '';
$pageTitle = 'Login';
//if you login one time before
if (isset($_SESSION['Username'])) {
    header('Location: dashboard.php');  //to rediredict next page
}
include 'init.php';/*will include init .php*/


//to get data from from
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    //to hash password
    $hashedpass = sha1($password);
    //check if user was in database
    $stmt = $con->prepare(
        "SELECT       
                              UserID,  Username,Password 
                            FROM 
                                users 
                            WHERE 
                                Username=? 
                            AND 
                                Password=? 
                            AND 
                                GroupID=1
                            LIMIT 1"
    );
    $stmt->execute(array($username, $hashedpass));
    //to fetch or get data
    $row = $stmt->fetch();
    //to get count of row
    $count = $stmt->rowCount();
    //if count is bigger than 0 the database contain record about this username and password
    if ($count > 0) {
        $_SESSION['Username'] = $username; //register session name
        $_SESSION['ID'] = $row['UserID']; //register session ID
        header('Location: dashboard.php');  //to rediredict next page
        exit();
    } else {
        echo '<div class="text-center container">

     <div style="margin-top:50px;"  class="alert alert-danger">
    Enter Correct Username and Password
     </div>
            </div>';
    }
}
?>

<form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <h4 class="text-center">Admin Login </h4>
    <input class="form-control <!--input-lg-->" input-lg" type="text" name="user" placeholder="Username" autocomplete="off" id="">
    <input class="form-control <!--input-lg-->" type="password" name="pass" placeholder="password" autocomplete="new-password" id="">
    <input class="btn btn-primary btn-block <!--btn-lg-->" type="submit" value="Login" />
</form>
<?php
include $tpl . 'footer.php'; //will include or import footer.php 
?>