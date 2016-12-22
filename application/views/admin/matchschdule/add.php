
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Add sports</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="<?php echo base_url("admin/matchschdule/addformdb"); ?>"  id="frmAdd"  enctype="multipart/form-data">
        <div class="box-body">

            <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 text-center" id="errorDiv"></div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">Event <span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <select name="Schdule[eventtype_id]" class="form-control required">
                        <option value="">Select</option>
                        <?php foreach ($events as $event): ?>
                            <option value="<?php echo $event->id; ?>"><?php echo $event->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">Venue <span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <select name="Schdule[venu_id]" class="form-control required">
                        <option value="">Select</option>
                        <?php foreach ($venues as $venue): ?>
                            <option value="<?php echo $venue->id; ?>"><?php echo $venue->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">Title <span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <input class="form-control required" name="Schdule[title]"  placeholder="title" type="text">
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">Avilable start date <span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <input class="form-control datepicker required" name="Schdule[avilablestartdate]"  placeholder="select date" type="text">
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">Avilable end date <span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <input class="form-control datepicker required" name="Schdule[avilablendndate]"  placeholder="select date" type="text">
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">Match start date <span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <input class="form-control datepicker required" name="Schdule[matchdate]"  placeholder="select date" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="timepickerd" class="col-sm-2 control-label">Match start time <span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <input class="form-control timepicker required" id="timepickerd" name="Schdule[matchtime]"  placeholder="select time" type="text">
                </div>
            </div>


            <div class="form-group">
                <label for="details" class="col-sm-2 control-label">Description</label>

                <div class="col-sm-7">
                    <textarea name="Schdule[description]" class="form-control summernote" id="details" placeholder="Details"></textarea>
                </div>
            </div>

            <div id="moreimage">

            </div>

            <div class="form-group">
                <label for="details" class="col-sm-2 control-label"></label>
                <div class="col-sm-7">
                    <a href="#" data-imagecnt="1" class="btn btn-primary addimage"><i class="fa fa-plus"></i> image</a>
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
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true
        });
        $(".timepicker").timepicker({
            template: 'dropdown',
            showInputs: true,
        });
    });
</script>