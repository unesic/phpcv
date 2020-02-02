<?php
/**
 * @var $component
 */
?>

<div class="component paragraph-component">
    <div class="row">
        <div class="col col-md-12">
            <p class="paragraph-component_<?php echo $component['id']; ?>"><?php echo $component['content']; ?></p>
        </div>

        <div class="col col-md-6">
		    <?php include 'views/component/buttons.php'; ?>
        </div>
    </div>
</div>
