<h1>Check in</h1>

<?php
if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
<strong class="alert_green">Registration completed successfully!!</strong> 
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
<strong class="alert_red">Sign up failed!! Enter the data well</strong>
<?php endif; ?>    
<?php Utils::deleteSession('register'); ?>

<div class="container">
        <div class="row">
            <div class="col-6">

<form action="<?=base_url?>user/save" method="POST">
    <label for="name">Name</label>
    <input type="text" name="name" required>
    
    <label for="lastname">Lastname</label>
    <input type="text" name="lastname" required>
    
    <label for="email">Email</label>
    <input type="email" name="email" required>
    
    <label for="pw">Password</label>
    <input type="password" name="pw" required>
    
    <button type="submit" class="btn btn-primary">Sign-Up</button>
</form>

</div>
<div class="col-6">

<img src="../assets/img/logoregister.png">
</div></div></div>