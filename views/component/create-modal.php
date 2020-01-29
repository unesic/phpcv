<?php
/**
 * @var $data
 */
?>

<div class="modal fade" id="create-modal" role="dialog" aria-hidden="true">
	
	<div class="modal-dialog" role="document">
		
		<div class="modal-content">
			
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $data['type']; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

            <form method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label for="text">Simple Text</label>
                        <textarea name="text" id="text" class="form-control" placeholder="Insert your text here..." required></textarea>
                    </div>
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="create" class="btn btn-primary" value="Create">
                </div>
                
            </form>
		
		</div>
	
	</div>

</div>