<h1 class="text-center">
    Edit Member
</h1>
<div class="container">
    <form class="form-horizontal" action="AddMembers" method="POST">
        <input type="hidden" name="userid" value="<?php echo $userid ?>">
        <!-- start user name field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10 ">
                <input required="required" type="text" name="username" class="form-control" value="<?php echo $row['Username'] ?>" autocomplete="off">
            </div>
        </div>
        <!-- end user name field -->
        <!-- start user Password field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10 ">
                <input type="hidden" name="oldpassword" value="<?php echo $row['Password'] ?>" class="form-control" autocomplete="new-password">
                <input type="password" name="newpassword" placeholder="IF didn't want to change password leave it empty" class="form-control" autocomplete="new-password">
            </div>
        </div>
        <!-- end user Password field -->
        <!-- start use Email field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10 ">
                <input type="email" name="email" required="required" value="<?php echo $row['Email'] ?>" class="form-control">
            </div>
        </div>
        <!-- end user Email field -->
        <!-- start use fullname field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Full name</label>
            <div class="col-sm-10 ">
                <input type="text" name="full" value="<?php echo $row['Fullname'] ?>" required="required" class="form-control">
            </div>
        </div>
        <!-- end user Email field -->
        <!-- start user submit  -->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <!--col-sm-offset-2 that means begining as the above div of input staring -->
                <input type="submit" value="Save" class="btn btn-primary btn-lg">
            </div>
        </div>
        <!-- end user submit  -->
    </form>
</div>