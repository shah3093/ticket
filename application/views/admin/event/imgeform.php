<div class="row form-inline" id="parrent_<?php echo $cnt; ?>" style="margin-bottom: 15px;">

    <div class="col-sm-10 text-center">
        <div class="form-group">
            <label class="col-sm-4">Image</label>
            <div class="col-sm-7">
                <input  name="img_<?php echo $cnt; ?>"   type="file">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4">Caption</label>
            <div class="col-sm-8">
                <input class="form-control" name="Image[<?php echo $cnt; ?>][caption]" placeholder="Caption" type="text">
            </div>
        </div>
    </div>
    <div class="col-sm-1">
        <span style="color: red;" class="deleteimagefrm btn" data-parentid="parrent_<?php echo $cnt; ?>"><i class="fa fa-trash"></i></span>
    </div>
    
</div>

