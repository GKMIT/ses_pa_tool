<div class="header navbar navbar-fixed-top">
    <div class="header-inner">
        <a class="navbar-brand" href="#">
            <span style="color:#fff;">&nbsp;&nbsp;&nbsp;&nbsp;SES PA TOOL</span>
        </a>
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <img src="<?php echo $_config['base_url'];?>assets/img/menu-toggler.png" alt=""/>
        </a>
        <ul class="nav navbar-nav pull-right">
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="username">
						<i class="fa fa-user" style="color: #fff !important; "></i> <?php echo $_SESSION['name']; ?>
					</span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo $_config['base_url']."logout.php"; ?>">
                            <i class="fa fa-sign-out"></i> Log Out
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>