<section id="main">
	<div class="main-wrapper bg-light">
		<div class="main-inner">

            <?php
            
            if (!isset($_COOKIE['CURRENT_CV'])) {
	            include_once 'templates/profile-select.php';
            } else {
                include_once 'templates/canvas.php';
            }
            
            ?>
            
		</div>
	</div>
</section>