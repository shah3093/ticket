<header id="home" class="ct-u-colorWhite text-left">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->

        <ol class="carousel-indicators">
            <?php for ($i = 0; $i < $slidernumber; $i++): ?>
                <li data-target="#myCarousel" data-slide-to="<?php $i; ?>" class="<?php echo $i == 0 ? 'active' : '' ?>"></li>
            <?php endfor; ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            

            <?php $i = 0; foreach ($sliders as $slider):?>
                <div class="item <?php echo $i == 0 ? 'active' : ''; $i = 1;?>">
                    <img src="<?php echo base_url('asset/image/'.$slider->name); ?>" alt="<?php echo $slider->caption; ?>" style="height: 450px;" width="460" height="345">
                    <div class="carousel-caption">
                        <h3><?php echo $slider->caption; ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>