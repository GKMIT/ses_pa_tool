<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
    <li class="sidebar-toggler-wrapper">
        <div class="sidebar-toggler hidden-phone">
        </div>
    </li>
    <li class="sidebar-search-wrapper">
        <form class="sidebar-search" action="extra_search.html" method="POST">
            <div class="form-container">
                <div class="input-box">
                    <a href="javascript:;" class="remove">
                    </a>
                    <input type="text" placeholder="Search..."/>
                    <input type="button" class="submit" value=" "/>
                </div>
            </div>
        </form>
    </li>
    <li class="start ">
        <a href="index.html">
            <i class="fa fa-home"></i>
            <span class="title">
                Dashboard
            </span>
        </a>
    </li>
    <li>
        <a href="javascript:;">
            <i class="fa fa-shopping-cart"></i>
            <span class="title">
                Company
            </span>
            <span class="arrow ">
            </span>
        </a>
        <ul class="sub-menu">
            <li>
                <a href="<?php echo $_config['base_url']."InputSheet/admin/add-company.php"; ?>">
                    <i class="fa fa-plus"></i>
                    Add New Company
                </a>
            </li>
            <li>
                <a href="<?php echo $_config['base_url']."InputSheet/admin/view-edit-company.php"; ?>">
                    <i class="fa fa-edit"></i>
                    Edit Company
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;">
            <i class="fa fa-shopping-cart"></i>
            <span class="title">
                Director
            </span>
            <span class="arrow ">
            </span>
        </a>
        <ul class="sub-menu">
            <li>
                <a href="<?php echo $_config['base_url']."InputSheet/admin/add-director.php"; ?>">
                    <i class="fa fa-plus"></i>
                    Add New Director
                </a>
            </li>
            <li>
                <a href="<?php echo $_config['base_url']."InputSheet/admin/edit-director.php"; ?>">
                    <i class="fa fa-edit"></i>
                    Edit Director
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;">
            <i class="fa fa-shopping-cart"></i>
						<span class="title">
							Input Sheet
						</span>
						<span class="arrow ">
						</span>
        </a>
        <ul class="sub-menu">
            <li>
                <a href="<?php echo $_config['base_url']."InputSheet/admin/director-info.php"; ?>">
                <i class="fa fa-plus"></i>
                Add Director's Info
                </a>
            </li>
            <li>
                <a href="<?php echo $_config['base_url']."InputSheet/admin/edit-director-info.php"; ?>">
                    <i class="fa fa-edit"></i>
                    Edit Director's Info
                </a>
            </li>
            <li>
                <a href="<?php echo $_config['base_url']."InputSheet/admin/director-attendance-remuneration.php"; ?>">
                <i class="fa fa-plus"></i>
                Add Director's Attendance and Remuneration
                </a>
            </li>
            <li>
                <a href="<?php echo $_config['base_url']."InputSheet/admin/edit-director-attendance-remuneration.php"; ?>">
                    <i class="fa fa-edit"></i>
                    Edit Director's Attendance and Remuneration
                </a>
            </li>
            <li>
                <a href="<?php echo $_config['base_url']."InputSheet/admin/add-auditor-info.php"; ?>">
                    <i class="fa fa-plus"></i>
                    Add Auditor's info
                </a>
            </li>
            <li>
                <a href="<?php echo $_config['base_url']."InputSheet/admin/edit-auditor-info.php"; ?>">
                    <i class="fa fa-edit"></i>
                    Edit Auditor's info
                </a>
            </li>
            <li>
                <a href="<?php echo $_config['base_url']."InputSheet/admin/view-details.php"; ?>">
                <i class="fa fa-bars"></i>
                View Sheet
                </a>
            </li>
        </ul>
    </li>
</ul>