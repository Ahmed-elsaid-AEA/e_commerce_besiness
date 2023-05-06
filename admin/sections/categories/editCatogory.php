<h1 class="text-center">
    Edit Category
    <br>
</h1>
<div class="container">
    <form class="form-horizontal" action="?do=Update" method="POST">
        <input type="hidden" name="catid" value="<?php echo $catid?>">
        <!-- start user name field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10 ">
                <input type="text" name="name" class="form-control" placeholder="Name Of the Category" required="required" value="<?php echo $cat['Name'] ?>">
            </div>
        </div>
        <!-- end user name field -->
        <!-- start Description field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10 ">
                <input type="text" name="description" placeholder="Describe The Category" class="form-control" value="<?php echo $cat['Decsription'] ?>">
            </div>
        </div>
        <!-- end Description field -->
        <!-- start Ordering field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Ordering</label>
            <div class="col-sm-10 ">
                <input type="text" name="ordering" required="required" placeholder="Number To Arrange The Categories" class="form-control" value="<?php echo $cat['Ordering'] ?>">
            </div>
        </div>
        <!-- end Ordering field -->
        <!-- start Visible field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Visible</label>
            <div class="col-sm-10 ">
                <div>
                    <input id="vis-yes" type="radio" name="visibility" value="0" <?php if ($cat['Visibility'] == 0) echo 'checked' ?>>
                    <label for="vis-yes">
                        Yes
                    </label>
                </div>
                <div>
                    <input id="vis-no" type="radio" name="visibility" value="1" <?php if ($cat['Visibility'] == 1) echo 'checked' ?>>
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
                    <input id="com-yes" type="radio" name="commenting" value="0" <?php if ($cat['Allow_Comment'] == 0) echo 'checked' ?>>
                    <label for="com-yes">
                        Yes
                    </label>
                </div>
                <div>
                    <input id="com-no" type="radio" name="commenting" value="1" <?php if ($cat['Allow_Comment'] == 1) echo 'checked' ?>>
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
                    <input id="ads-yes" type="radio" name="ads" value="0" <?php if ($cat['Allows_Ads'] == 0) echo 'checked' ?>>
                    <label for="ads-yes">
                        Yes
                    </label>
                </div>
                <div>
                    <input id="ads-no" type="radio" name="ads" value="1" <?php if ($cat['Allows_Ads'] == 1) echo 'checked' ?>>
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
                <input type="submit" value="Save Category" class="btn btn-primary btn-lg">
            </div>
        </div>
        <!-- end submit field -->
    </form>
</div>