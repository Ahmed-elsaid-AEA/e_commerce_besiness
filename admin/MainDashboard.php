<div class="container home-stats text-center">
    <h1>
        Dashboard
    </h1>
    <div class="row">
        <div class="col-md-3">
            <div class="stat st-members">
                Total members
                <span><a href="memebers.php?do=manage&userid=<?php echo $_SESSION['ID'] ?>"><?php echo CountItems('UserID', 'users') ?></a></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat st-pending">
                Pending members

                <span><a href="memebers.php?do=Pending&userid=<?php echo $_SESSION['ID'] ?>"><?php echo checkItems('RegStatus', 'users', 0) ?></a></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat st-items">
                Total Items
                <span>200</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat st-comments">
                Total Comments
                <span>200</span>
            </div>
        </div>
    </div>
</div>
<div class="container latest">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <?php $latestUsers = 5; ?>
                <div class="panel-heading">
                    <i class="fa fa-users"></i>
                    Latest <?php echo $latestUsers ?> Registerd Users
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled latest-users">
                        <?php
                        $thelatest =  getLatest("*", "users", "UserID", 4);
                        foreach ($thelatest as $user) {
                            echo '<li>' . $user['Username'];
                            echo '<a href="memebers.php?do=Edit&userid=' . $user['UserID'] . '">';
                            echo '<span class="btn btn-success pull-right">';
                            echo '<i class="fa fa-edit"></i> Edit';
                            if ($user['RegStatus'] == 0) {
                                echo  " <a href='memebers.php?do=Activate&userid=" . $user['UserID'] . "' class='btn btn-info pull-right activate'><i style='position:relative; right:5px;' class='fa fa-close'></i>Activate</a>";
                            }
                            echo '</span>';
                            echo '</a>';
                            echo '</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-tag"></i>
                    Latest Items
                </div>
                <div class="panel-body">
                    df
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
<style>
    .home-stats .stat {
        background-color: #eee;
        border: 1px solid #ccc;
        padding: 20px;
        font-size: 15px;
    }

    .home-stats .stat span {
        display: block;
        font-size: 50px;
    }

    .latest {
        margin-top: 30px;
    }

</style> -->