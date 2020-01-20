<?php
/*
 * @var $profile
 */
$social_networks = explode(',', $profile['social_networks']);
$profile['linked_in'] = $social_networks[0];
$profile['github'] = $social_networks[1];

?>

<div class="row py-5">
	
	<div class="col col-md-6 offset-3 bg-light p-3 card shadow">
		
		<form method="POST" class="form-row">
			
			<div class="form-group col-md-12">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" class="form-control" value="<?php echo $profile['name'] ?>" disabled>
			</div>
			
			<div class="form-group col-md-12">
				<label for="title">Title</label>
				<input type="text" name="title" id="title" class="form-control" value="<?php echo $profile['title']; ?>" disabled>
			</div>
			
			<div class="form-group col-md-12">
				<label for="date_of_birth">Date of Birth</label>
				<input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="<?php echo $profile['date_of_birth']; ?>" disabled>
			</div>
			
			<div class="form-group col-md-6">
				<label for="phone_number">Phone Number</label>
				<input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo $profile['phone_number']; ?>" disabled>
			</div>
			
			<div class="form-group col-md-6">
				<label for="email">E-mail Address</label>
				<input type="text" name="email" id="email" class="form-control" value="<?php echo $profile['email']; ?>" disabled>
			</div>
			
			<div class="form-group col-md-6">
				<label for="country">Country</label>
				<input type="text" name="country" id="country" class="form-control" value="<?php echo $profile['country']; ?>" disabled>
			</div>
			
			<div class="form-group col-md-6">
				<label for="city">City</label>
				<input type="text" name="city" id="city" class="form-control" value="<?php echo $profile['city']; ?>" disabled>
			</div>
			
			<div class="form-group col-md-6">
				<label for="linked_in">Linked In</label>
				<input type="text" name="linked_in" id="linked_in" class="form-control" value="<?php echo $profile['linked_in']; ?>" disabled>
			</div>
			
			<div class="form-group col-md-6">
				<label for="github">GitHub</label>
				<input type="text" name="github" id="github" class="form-control" value="<?php echo $profile['github']; ?>" disabled>
			</div>

            <div class="form-group col-md-12">
                <a href="<?php echo PATH . '/p/?pid=' . $profile['id'] . '&edit=1'; ?>" class="btn btn-primary w-100 mt-3">EDIT PROFILE</a>
            </div>
		
		</form>
	
	</div>

</div>