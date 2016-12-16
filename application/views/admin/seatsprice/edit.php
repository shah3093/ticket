<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Add seat</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="<?php echo base_url("admin/seatsprice/addformdb/".$result->id); ?>"  id="frmAdd"  enctype="multipart/form-data">
        <div class="box-body">

            <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 text-center" id="errorDiv"></div>
            </div>


            <div class="form-group">
                <label  class="col-sm-2 control-label">Event <span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <select class="form-control required" name="Price[eventtype_id]">
                        <option value="">Select</option>
                        <?php foreach ($events as $seat): ?>
                        <option value="<?php echo $seat->id; ?>" <?php echo $result->eventtype_id == $seat->id ? 'selected':''; ?>><?php echo $seat->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Seat <span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <select class="form-control required" name="Price[seats_type_id]">
                        <option value="">Select</option>
                        <?php foreach ($seats as $seat): ?>
                            <option value="<?php echo $seat->id; ?>" <?php echo $result->seats_type_id == $seat->id ? 'selected':''; ?>><?php echo $seat->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="sportsname" class="col-sm-2 control-label"> Seat number <span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <input class="form-control required" name="Price[number]" value="<?php echo $result->number; ?>" type="text">
                </div>
            </div>


            <div class="form-group">
                <label for="sportsname" class="col-sm-2 control-label"> Seat price <span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <input class="form-control required" name="Price[price]" value="<?php echo $result->price; ?>" placeholder="Number" type="text">
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