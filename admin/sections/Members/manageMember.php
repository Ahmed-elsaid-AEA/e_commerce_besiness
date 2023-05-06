<h1 class="text-center">
    Manage Members
    <br>

</h1>
<div class="container ">
    <a href="memebers.php?do=Add" class="btnADDnewMember btn btn-primary">
        <i class="fa fa-plus">

        </i>
        New Members
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
                    <a href='memebers.php?do=Delete&userid=" . $row['UserID'] . "' class='confirm btn btn-danger '><i style='position:relative; right:5px;' class='fa fa-close'></i>Delete</a>";
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

</div>