<ul class="nav">
    <li class="nav-item w-100">
        <a href="#" class="nav-link">
            <span class="nav-text nav-head"><i class="fa fa-user">
                </i> <?php echo $_SESSION['username']; ?>
            </span>
        </a>
        
        <ul class="nav sub-nav">
            <li class="nav-item w-100">
                <a href="<?php echo PATH; ?>/p/create/" class="nav-link">
                    <span class="nav-text text-white">
                        <i class="fa fa-plus"></i> New profile
                    </span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a href="<?php echo PATH; ?>/p/" class="nav-link">
                    <span class="nav-text text-white">
                        <i class="fa fa-eye"></i> View profiles
                    </span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a href="<?php echo PATH; ?>/logout/" class="nav-link">
                    <span class="nav-text text-white">
                        <i class="fa fa-sign-out"></i> Sign out
                    </span>
                </a>
            </li>
        </ul>
    </li>
</ul>