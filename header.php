<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once 'head.php'; ?>
<body>
    <section id="content" class="container">
        <?php if (isset($_COOKIE['status'])): ?>
            
            <div id="alert" class="alert alert-<?php echo $_COOKIE['status'] ?>"><?php echo($_COOKIE['message']) ?></div>
        
        <?php endif ?>