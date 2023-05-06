<h1 class="text-center">
    Add New Category
    <br>
</h1>
<div class="container">
    <form class="form-horizontal" action="?do=Insert" method="POST">
        <!-- start user name field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10 ">
                <input type="text" name="name" class="form-control" placeholder="Name Of the Category" required="required" autocomplete="off">
            </div>
        </div>
        <!-- end user name field -->
        <!-- start Description field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10 ">
                <input type="text" name="description" placeholder="Describe The Category" class="form-control">
            </div>
        </div>
        <!-- end Description field -->
        <!-- start Ordering field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Ordering</label>
            <div class="col-sm-10 ">
                <input type="text" name="ordering" required="required" placeholder="Number To Arrange The Categories" class="form-control">
            </div>
        </div>
        <!-- end Ordering field -->
        <!-- start Visible field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Visible</label>
            <div class="col-sm-10 ">
                <div>
                    <input id="vis-yes" type="radio" name="visibility" value="0" checked>
                    <label for="vis-yes">
                        Yes
                    </label>
                </div>
                <div>
                    <input id="vis-no" type="radio" name="visibility" value="1">
                    <label for="vis-no">
                        No
                    </label>
                </div>
            </div>
        </div>
        <!-- end Visible field -->
        <!-- start Comments field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Allow Commenting</label>
            <div class="col-sm-10 ">
                <div>
                    <input id="com-yes" type="radio" name="commenting" value="0" checked>
                    <label for="com-yes">
                        Yes
                    </label>
                </div>
                <div>
                    <input id="com-no" type="radio" name="commenting" value="1">
                    <label for="com-no">
                        No
                    </label>
                </div>
            </div>
        </div>
        <!-- end Comments field -->
        <!-- start ads field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Allow ads</label>
            <div class="col-sm-10 ">
                <div>
                    <input id="ads-yes" type="radio" name="ads" value="0" checked>
                    <label for="ads-yes">
                        Yes
                    </label>
                </div>
                <div>
                    <input id="ads-no" type="radio" name="ads" value="1">
                    <label for="ads-no">
                        No
                    </label>
                </div>
            </div>
        </div>
        <!-- end ads field -->
        <!-- start  submit  field-->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <!--col-sm-offset-2 that means begining as the above div of input staring -->
                <input type="submit" value="Add Category" class="btn btn-primary btn-lg">
            </div>
        </div>
        <!-- end submit field -->
    </form>
</div>