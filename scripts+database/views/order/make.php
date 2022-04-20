
<?php if(isset($_SESSION['identity'])): ?>
<h1> Place order </h1>
<p>
    <a href="<?=base_url?>cart/index">See purchase detail</a>
</p>
</br>
<h3> Shipping address </h3>
<form action="<?=base_url.'cart/add'?>" method="POST">
    <label for="province">Province</label>
    <input type="text" name="province" required>
    
    <label for="city">City</label>
    <input type="text" name="city" required>
    
    <label for="adresse">Address</label>
    <input type="text" name="adresse" required>
    
    <input type="submit" value="To confirm order">
</form>
<?php else: ?>
<h1> You need to be logged in </h1>
<p> Login to your account or register to continue </p>
<?php endif; ?>
