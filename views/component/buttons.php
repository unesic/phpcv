<?php
/**
 * @var $component
 */
?>
<div class="btn-group">
        
        <div class="px-1">

            <button class="btn btn-outline-primary rounded-circle update-btn"
                    data-component="<?php echo $component['id']; ?>">
                <i class="fa fa-edit"></i>
            </button>
            
        </div>
        
        <div class="px-1">

            <button class="btn btn-outline-danger rounded-circle delete-btn"
                    data-component="<?php echo $component['id']; ?>">
                <i class="fa fa-remove"></i>
            </button>
            
        </div>
    
</div>