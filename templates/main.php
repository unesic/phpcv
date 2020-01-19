<section id="main">
	<div class="main-wrapper bg-light">
		<div class="main-inner">

            <?php
            
            include_once 'templates/user-options.php';
            
            if (!isset($_COOKIE['CURRENT_PROFILE'])) {
	            include_once 'templates/profile-select.php';
            } else {
                include_once 'templates/canvas.php';
            }
            
            ?>
            
		</div>
	</div>
</section>