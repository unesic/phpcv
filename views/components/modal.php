<?php

/**
 * @var $data
 *
 * TODO: Modify it so it can be used for both updating and creating
 */

?>

<div class="modal fade" id="modal" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"><?php echo $data['type']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <?php echo $data['content']; ?>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="save" type="button" class="btn btn-primary">Save</button>
            </div>
            
        </div>
        
    </div>
    
</div>