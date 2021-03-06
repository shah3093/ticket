<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Add seat</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="<?php echo base_url("admin/seats/addformdb/" . $result->id); ?>"  id="frmAdd"  enctype="multipart/form-data">
        <div class="box-body">

            <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 text-center" id="errorDiv"></div>
            </div>


            <div class="form-group">
                <label for="venue" class="col-sm-2 control-label">Venue name <span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <select class="form-control required" name="Seat[venue_id]">
                        <option value="">Select</option>
                        <?php foreach ($venues as $venue): ?>
                            <option  <?php echo $result->venuename == $venue->name ? "selected" : ""; ?> value="<?php echo $venue->id; ?>"><?php echo $venue->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="sportsname" class="col-sm-2 control-label"> Name <span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <input class="form-control required" value="<?php echo $result->name; ?>" name="Seat[name]"  placeholder="Name" type="text">
                </div>
            </div>



            <div class="form-group">
                <label for="details" class="col-sm-2 control-label">Details</label>

                <div class="col-sm-7">
                    <textarea name="Seat[details]" class="form-control summernote" id="details" placeholder="Details"><?php echo $result->details; ?></textarea>
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