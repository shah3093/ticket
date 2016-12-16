<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Add venue</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="<?php echo base_url("admin/venue/addformdb/".$result->id); ?>"  id="frmAdd"  enctype="multipart/form-data">
        <div class="box-body">

            <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 text-center" id="errorDiv"></div>
            </div>

            <div class="form-group">
                <label for="sportsname" class="col-sm-2 control-label"> Name <span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <input class="form-control required" value="<?php echo $result->name; ?>" name="Venue[name]"  placeholder="Name" type="text">
                </div>
            </div>
            
            <div class="form-group">
                <label  class="col-sm-2 control-label">Address</label>

                <div class="col-sm-7">
                    <textarea name="Venue[address]" class="form-control" ><?php echo $result->address; ?></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <label  class="col-sm-2 control-label">Maps iframe</label>

                <div class="col-sm-7">
                    <textarea name="Venue[location_maps]" class="form-control" ><?php echo $result->location_maps; ?></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <label for="details" class="col-sm-2 control-label">Details</label>

                <div class="col-sm-7">
                    <textarea name="Venue[details]" class="form-control summernote" id="details" placeholder="Details"><?php echo $result->details; ?></textarea>
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