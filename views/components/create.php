<button class="btn btn-outline-secondary rounded-circle"
        id="create"
        type="button"
        data-toggle="modal"
        data-target="#create-modal">
	<i class="fa fa-plus"></i>
</button>

<?php

$data['type'] = 'paragraph';

if (isset($_POST['create'])) {
	$data['content'] = $_POST['text'];
	$data['cv_id'] = $_COOKIE['CURRENT_CV'];
	
//	print('<pre>' . print_r($data, true) . '</pre>');
    (new Component($db))->create($data);
} else {
	include_once 'views/components/create-modal.php';
}