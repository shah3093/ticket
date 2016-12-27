<section id="packages" class="">
    <div class="container">
        <div class="ct-heading--withBorder ct-u-marginBottom70">
            <h4 class="ct-u-colorWhite text-uppercase ct-u-marginBottom10">&n&nbsp;</h4>
            <h2 style="font-family: 'Gloria Hallelujah', cursive;" class="text-center">Pick your ticket</h2>
        </div>
        <div class="col-sm-12">
            <div role="tabpanel">
                <div class="row">
                    <div class="col-sm-3">
                        <ul role="tablist" class="nav nav-tabs ct-nav--left">

                            <?php
                            $i = 1;
                            foreach ($events as $event):
                                if ($i == 1) {
                                    $eventid = $event->id;
                                }
                                ?>
                                <li role="presentation" class='<?php echo $i == 1 ? "active" : ""; ?> '>
                                    <a class="eventtype" data-id='<?php echo $event->id; ?>' href="#" aria-controls="history" role="tab" data-toggle="tab">
                                        <span class="ct-tab-number"><?php echo $i++; ?></span>
                                        <?php echo $event->name; ?>, <?php echo $event->sportsname; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="tab-content">
                            <span id="matchticketview"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</section>

<br/><br/>


<script>
    $(document).ready(function () {
        var eventid = "<?php echo $eventid; ?>";
        $.post(base_url + "site/home/matchview/" + eventid, {}, function (resp) {
            $("#matchticketview").html(resp);
        });
    });
</script>



<?php $this->load->view('site/subscription'); ?>

