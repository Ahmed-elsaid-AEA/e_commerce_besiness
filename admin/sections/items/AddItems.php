<h1 class="text-center">
    Add New Item
    <br>
</h1>
<div class="container">
    <form class="form-horizontal" action="?do=Insert" method="POST">
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10 ">
                <input type="text" name="name" class="form-control" placeholder="Name Of the Items" required="required">
            </div>
        </div>
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10 ">
                <input type="text" name="description" class="form-control" placeholder="Description Of the Items" required="required">
            </div>
        </div>
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Price</label>
            <div class="col-sm-10 ">
                <input type="text" name="price" class="form-control" placeholder="Price Of the Items" required="required">
            </div>
        </div>
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Country</label>
            <div class="col-sm-10 ">
                <input type="text" name="country" class="form-control" placeholder="Country Of Made" required="required">
            </div>
        </div>
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10 ">
                <select  name="status" id="">
                    <option value="0">...</option>
                    <option value="1">New</option>
                    <option value="2">Like New</option>
                    <option value="3">Used</option>
                    <option value="4">Old</option>
                </select>
            </div>
        </div>
    
        <!-- start  submit  field-->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <!--col-sm-offset-2 that means begining as the above div of input staring -->
                <input type="submit" value="Add Item" class="btn btn-primary btn-sm">
            </div>
        </div>
        <!-- end submit field -->
    </form>
</div>