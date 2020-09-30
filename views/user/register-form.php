<div class="row py-5">
    
    <div class="col col-md-6 offset-3 bg-light p-3 shadow card">
        
        <form method="POST">
            
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            
            <div class="form-group">
                <input type="submit" name="submit" id="submit" class="btn btn-primary" value="SUBMIT">
            </div>
            
        </form>

        <p>Already have an account? <a href="<?php echo PATH; ?>/u/login">Login</a></p>
        
    </div>
    
</div>