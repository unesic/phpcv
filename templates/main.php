<section id="main">
	<div class="main-wrapper bg-light">
		<div class="main-inner">

            <?php
            
            if (empty(User::hasProfile($db))) {
                redirect('/p/create/', 1, 'Create your first profile to get started!');
            }
            
            if (!isset($_COOKIE['CURRENT_CV'])) {
	            include_once 'templates/profile-select.php';
            } else {
                checkRelation($db, 'user-cv');
                include_once 'templates/canvas.php';
            }
            
            ?>
            
		</div>
	</div>
</section>