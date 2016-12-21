<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Edit slider</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="<?php echo base_url("admin/slider/addformdb/" . $result->id); ?>"  id="frmAdd"  enctype="multipart/form-data">
        <div class="box-body">

            <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 text-center" id="errorDiv"></div>
            </div>

            <div class="form-group">
                <label for="sportsname" class="col-sm-2 control-label">Caption<span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <input class="form-control" value="<?php echo $result->caption; ?>" name="Image[caption]" id="sportsname" placeholder="Name" type="text">
                </div>
            </div>
            <div class="form-group">
                <label for="details" class="col-sm-2 control-label">&nbsp;</label>

                <div class="col-sm-7">
                    <img src="<?php echo base_url('asset/image/'.$result->name); ?>" style="width: 100px;height: 100px;"/>
                </div>
            </div>
            <div class="form-group">
                <label for="details" class="col-sm-2 control-label">Change image (height 600px)</label>

                <div class="col-sm-7">
                    <input type="file" name="img"  />
                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="button" id="cancel" class="btn btn-danger">Cancel</button>
            <button type="submit" id="submitform" class="btn btn-info pull-right">Submit</button>
        </div>
        <!-- /.box-footer -->
    </form>
</div>

<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 200
        });
    });
</script>