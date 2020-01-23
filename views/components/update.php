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
} else {
	echo '<br>';
    echo $this->id . '<br>';
	echo $this->content . '<br>';
	echo '<br>';
//	include_once 'views/components/update-modal.php';
}