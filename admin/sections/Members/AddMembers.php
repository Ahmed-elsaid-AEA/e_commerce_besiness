<h1 class="text-center">
    Add New Members
    <br>

</h1>
<div class="container">
    <form class="form-horizontal" action="?do=Insert" method="POST">
        <!-- start user name field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10 ">
                <input type="text" name="username" class="form-control" placeholder="Username to login into Shop" required="required" autocomplete="off">
            </div>
        </div>
        <!-- end user name field -->
        <!-- start user Password field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10 ">
                <input type="password" name="password" required="required" placeholder="Password thould be hard & complex" class="password form-control" autocomplete="new-password">
            <i class="show-pass fa fa-eye fa-2x"></i>
            </div>
        </div>
        <!-- end user Password field -->
        <!-- start use Email field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10 ">
                <input type="email" name="email" required="required" placeholder="Email must be valid" class="form-control">
            </div>
        </div>
        <!-- end user Email field -->
        <!-- start use fullname field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Full name</label>
            <div class="col-sm-10 ">
                <input type="text" name="full" required="required" placeholder="Full name appear in your profile page" class="form-control">
            </div>
        </div>
        <!-- end user Email field -->
        <!-- start user submit  -->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <!--col-sm-offset-2 that means begining as the above div of input staring -->
                <input type="submit" value="Add Members" class="btn btn-primary btn-lg">
            </div>
        </div>
        <!-- end user submit  -->
    </form>
</div>