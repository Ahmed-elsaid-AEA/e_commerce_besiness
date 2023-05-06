<h1 class="text-center">
    Update Member
</h1>
<div class="text-center container">

    <?php
    foreach ($formError as $f) {
        if ($f == '1 record Update') {
    ?>
            <div class="alert alert-success">
                <?php
                echo $f;
                ?>
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger">
                <?php
                echo $f;
                ?>
            </div>
    <?php
        }
    }
    // print_r($formError);
    ?>


</div>
