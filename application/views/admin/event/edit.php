<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Edit events</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="<?php echo base_url("admin/event/addformdb/".$result->id); ?>"  id="frmAdd"  enctype="multipart/form-data">
        <div class="box-body">

            <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 text-center" id="errorDiv"></div>
            </div>

            <div class="form-group">
                <label for="sportstype" class="col-sm-2 control-label">Sports type <span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <select id="sportstype" name="Event[sports_type_id]" class="form-control required">
                        <option value="">Select sport</option>
                        <?php foreach ($sports as $sport): ?>
                        <option  value="<?php echo $sport->id; ?>" <?php echo $sport->name == $result->sportsname ?"selected":""; ?>><?php echo $sport->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="sportsname" class="col-sm-2 control-label">Event name <span class="redstar">*</span></label>

                <div class="col-sm-7">
                    <input class="form-control required" value="<?php echo $result->name; ?>" name="Event[name]" id="sportsname" placeholder="Name" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="details" class="col-sm-2 control-label">Details</label>

                <div class="col-sm-7">
                    <textarea name="Event[details]" class="form-control summernote" id="details" placeholder="Details"><?php echo $result->details; ?></textarea>
                </div>
            </div>

            <?php foreach ($images as $image): ?>
                <div class="row form-inline" id="parrent_<?php echo $image->id; ?>" style="margin-bottom: 15px;">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <img src="<?php echo base_url("asset/image/".$image->name); ?>" style="height: 100px;width: 100px;" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <strong><?php echo $image->caption; ?></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <span class="deleteimagedb btn btn-danger" data-id="<?php echo $image->id; ?>" data-parentid="parrent_<?php echo $image->id; ?>"><i class="fa fa-trash"></i></span>
                    </div>

                </div>

            <?php endforeach; ?>

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
    });
</script>