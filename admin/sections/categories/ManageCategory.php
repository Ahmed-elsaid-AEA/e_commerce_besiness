<h1 class="text-center">
    Manage Catogeries
    <br>
</h1>

<?php
try {
    $sort = 'ASC';
    $sort_Array = array('ASC', 'DESC');
    if (isset($_GET['sort']) && in_array($_GET['sort'], $sort_Array)) {

        $sort =  $_GET['sort'];
    }
    $stmt = $con->prepare("SELECT * FROM categories ORDER BY Ordering $sort");
    $stmt->execute();
    $cats = $stmt->fetchAll();
} catch (Exception $ex) {
    echo $ex;
} ?>
<div class="container categories">
    <a class="add-category btn btn-primary" href="categories.php?do=Add"><i class="fa fa-plus"></i>Add New Category</a>
    <div class="panel panel-default">
        <div class="panel-heading">
           <i class="fa fa-edit"></i> Manage Catogries
            <div class="option pull-right">
                <i class="fa fa-sort"></i> Ordering: [
                <a href="?sort=ASC" class="<?php if ($sort == 'ASC') {
                                                echo "active";
                                            } ?>">ASC</a>
                <a href="?sort=DESC" class="desc <?php if ($sort == 'DESC') {
                                                        echo "active";
                                                    } ?>">DESC</a>]
                <i class="fa fa-eye"></i> View : [
                <span class="active" data-view="full">Full</span> |
                <span data-view="classic">Classic</span> ]
            </div>
        </div>
        <div class="panel-body">
            <?php
            foreach ($cats as $cat) {
                echo '<div class="cat">';
                echo '<div class="hidden-buttons">';
                echo '<a href="categories.php?do=Edit&catid=' . $cat["ID"] . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>Edit</a>';
                echo '<a href="categories.php?do=Delete&catid=' . $cat["ID"] . '" class="confirm btn btn-xs btn-danger"><i class="fa fa-close"></i>Delete</a>';
                echo '</div>';
                echo '<h3>' . $cat['Name'] . '</h3>';
                echo '<div class="full-view">';
                echo '<p>';
                if ($cat['Decsription'] == '') {
                    echo 'This category has no description';
                } else {
                    echo $cat['Decsription'];
                }
                echo  '</p>';
                if ($cat['Visibility'] == 1) {
                    echo '<span class="visibility cat-span"><i class="fa fa-eye"></i>Hidden </span>';
                }
                if ($cat['Allow_Comment'] == 1) {
                    echo '<span class="commenting cat-span"><i class="fa fa-close"></i>Comments Disabled </span>';
                }
                if ($cat['Allows_Ads'] == 1) {
                    echo '<span class="advertises cat-span"><i class="fa fa-close"></i>Ads Disabled </span>';
                }
                echo '</div>';
                echo '</div>';
                echo '<hr>';
            }
            ?>
        </div>
    </div>
</div>


<!-- 
<div class="container ">
    <a href="categories.php?do=Add" class="btnADDnewMember btn btn-primary">
        <i class="fa fa-plus">

        </i>
        New Gatogary
    </a>
    <div class="table-resposive">
        <table class="main-table text-center table table-bordered">
            <tr>
                <td>#ID</td>
                <td>Username</td>
                <td>Email</td>
                <td>Full Name</td>
                <td>Registerd Date</td>
                <td>Control</td>
            </tr>
            <?php
            try {
                $query = '';

                if ($do && $do == 'Pending') {
                    $query = ' AND RegStatus=0';
                } else {
                    $query = '';
                }
                $stmt = $con->prepare("SELECT * FROM users WHERE GroupID !=1 $query");
                $stmt->execute();
                $rows = $stmt->fetchAll();
            } catch (Exception $ex) {
                echo $ex;
            }
            ?>
            <?php
            foreach ($rows as $row) {
                echo ' <tr>';
                echo ' <td>' . $row['UserID'] . '</td>';
                echo ' <td>' . $row['Username'] . '</td>';
                echo ' <td>' . $row['Email'] . '</td>';
                echo ' <td>' . $row['Fullname'] . '</td>';
                echo ' <td>' . $row['Date'] . '</td>';
                echo "  <td>
                    <a href='memebers.php?do=Edit&userid=" . $row['UserID'] . "' class='btn btn-success'><i style='position:relative; right:5px;' class='fa fa-edit'></i>Edit</a> 
                    <a href='memebers.php?do=Delete&userid=" . $row['UserID'] . "' class='btn btn-danger confirm'><i style='position:relative; right:5px;' class='fa fa-close'></i>Delete</a>";
                if ($row['RegStatus'] == 0) {
                    echo
                    "  
                     <a href='memebers.php?do=Activate&userid=" . $row['UserID'] . "' class='btn btn-info'><i style='position:relative; right:5px;' class='fa fa-close'></i>Activate</a>
                    ";
                }
                "</td>";
                echo ' <tr/>';
            }
            ?>
        </table>
    </div>

</div> -->