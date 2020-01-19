<div class="container py-5">
    <div class="row">
        <div class="col col-md-6 offset-3 bg-light p-3 shadow card">
            <form method="POST">
                
                <div class="form-group">
                    <label for="profile">Select Profile</label>
                    <select name="profile" id="profile" class="form-control">
                        
                        <?php
                        
                        $profiles = $user->getProfiles();
                        
                        foreach ($profiles as $profile) {
                            echo '<option value="' .
                                $profile['profile_id'] . '">' .
                                $profile['name'] .
                                '</option>';
                        }
                        
                        ?>
                    
                    </select>
                </div>
                
                <div class="form-group">
                    <input class="form-check-inline" type="checkbox" name="profile-data" id="profile-data">
                    <label class="form-check-label" for="profile-data">Use profile data</label>
                </div>
                
                <div class="form-group">
                    <input class="form-check-inline" type="checkbox" name="default" id="default">
                    <label class="form-check-label" for="default">Set as default</label>
                </div>
                
                <div class="form-group">
                    <input type="submit" name="submit" id="submit" class="btn btn-success" value="Continue">
                </div>
            
            </form>
        </div>
    </div>
</div>