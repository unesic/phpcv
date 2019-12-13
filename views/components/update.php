<button class="btn btn-outline-primary rounded-circle"
        type="button"
        data-toggle="modal"
        data-target="#update-modal">
	<i class="fa fa-edit"></i>
</button>

<?php

if (isset($_POST['update'])) {
	$this->setContent($_POST['text']);
    $this->update();
    
    // FIXME: Edit buttons all refer to the first component
    // TODO: Instead of working with in chaos, create controllers
} else {
	include_once 'views/components/update-modal.php';
}