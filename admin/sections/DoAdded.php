<h1 class="text-center">
    Added the new <?php
                    echo $name_Target
                    ?>
</h1>
<div class="text-center container">

    <?php

    foreach ($formError as $f) {
        if ($f == '1 record Update') {
    ?>
            <div class="alert alert-success">
                <?php
                echo '1 record Added';
                ?>
            </div>
        <?php
        } else  if ($f == '0 record Update') {
        ?>
            <div class="alert alert-success">
                <?php
                echo 'nothing inserted';
                ?>
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger">
                <?php
                echo $f;
                ?>
            </div><?php
        }?>
            <div class="container text-center">
                <form action="?do=Insert" method="POST">
                    <?php if ($name_Target == 'Members') {
                    ?>
                        <a href="memebers.php?do=manage&userid=<?php echo $_SESSION['ID'] ?>">Return to <?php echo $name_Target; ?> </a>
                    <?php
                    } else if ($name_Target == 'Catogory') {
                    ?>
                        <a href="categories.php?do=Manage&userid=<?php echo $_SESSION['ID'] ?>">Return to <?php echo $name_Target; ?> </a>
                    <?php
                    }
                    ?>
                </form>
            </div>
    <?php
       
    }
    header("refresh:3;url=index.php");
    exit();
    // print_r($formError);
    ?>


</div>