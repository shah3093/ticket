<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>SL</th>
            <th>Title</th>
            <th>Event name</th>
            <th>Venue name</th>
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
                    <td><?php echo $result->title; ?></td>
                    <td><?php echo $result->eventname; ?></td>
                    <td><?php echo $result->venuename; ?></td>
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