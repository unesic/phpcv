<div class="container">
    <div class="row justify-content-end">
        <div class="col-md-2 btn-group">
            <a href="#"
               class="btn btn-primary">
                <span class="nav-text"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?></span>
            </a>
            <button type="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    class="btn btn-primary dropdown-toggle dropdown-toggle-split"></button>
            
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-item px-0">
                    <a href="<?php echo PATH; ?>/p/create/" class="nav-link"><i class="fa fa-plus"></i> New profile</a>
                </div>
                
                <div class="dropdown-item px-0">
                    <a href="<?php echo PATH; ?>/p/" class="nav-link"><i class="fa fa-eye"></i> View profiles</a>
                </div>
                
                <div class="dropdown-divider"></div>
                
                <div class="dropdown-item px-0">
                    <a href="<?php echo PATH; ?>/logout/" class="nav-link"><i class="fa fa-sign-out"></i> Sign out</a>
                </div>
                
            </div>
        </div>
    </div>
</div>