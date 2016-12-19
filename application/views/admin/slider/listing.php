<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>SL</th>
            <th>Image</th>
            <th>Caption</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($results): $cnt = 0;
            foreach ($results as $result):
                ?>
                <tr>
                    <td><?php echo ++$cnt; ?></td>
                    <td><img src="<?php echo base_url('asset/image/'.$result->name); ?>" style="width: 100px;height: 100px;" /></td>
                    <td><?php echo $result->caption; ?></td>
                    <td class="text-center">
                        <a href="#" data-id="<?php echo $result->id; ?>"  class="btn btn-warning edit"><i class="fa fa-edit"></i></a>
                        <a href="#" data-id="<?php echo $result->id; ?>" class="btn btn-danger delete"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php
            endforeach;
        else:
            ?>
            <tr>
                <td colspan="4" align="center">No data found</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>