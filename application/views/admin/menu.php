<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li class="treeview">
                <a href="<?php echo site_url("admin/home"); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url("admin/sports"); ?>">
                    <i class="fa fa-spotify"></i> <span>Sports</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url("admin/event"); ?>">
                    <i class="fa fa-spotify"></i> <span>Event type</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url("admin/venue"); ?>">
                    <i class="fa fa-spotify"></i> <span>Venue</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url("admin/seats"); ?>">
                    <i class="fa fa-spotify"></i> <span>Seats</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url("admin/slider"); ?>">
                    <i class="fa fa-spotify"></i> <span>Slider</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-spotify"></i> <span>Match</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo site_url("admin/seatsprice"); ?>"><i class="fa fa-circle-o"></i> Seats price</a></li>
                    <li><a href="<?php echo site_url("admin/matchschdule"); ?>"><i class="fa fa-circle-o"></i>Schdule</a></li>

                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>