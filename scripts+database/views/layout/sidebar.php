<!--sidebar-->
<aside id="sidebar">


    <div id="login" class="block_aside">
        <?php if (!isset($_SESSION['identity'])): ?>
            <img src="assets/img/loginlogo.gif">
            <img src="../assets/img/loginlogo.gif">
            <form action="<?= base_url ?>user/login" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email">
                <label for="pw">Password</label>
                <input type="password" name="pw">

                <input type="submit" value="Send">
            </form>

        <?php else: ?>
            <h3><?= $_SESSION['identity']->name ?> <?= $_SESSION['identity']->lastname ?></h3>
        <?php endif; ?>

        <ul>
            <?php if (isset($_SESSION['admin'])): ?>
                <a href="<?= base_url ?>category/index">Manage categories</a></br>
                <a href="<?= base_url ?>product/gestion">Manage Products</a>
                <img src="../assets/img/adminlogo.gif">
                <img src="assets/img/adminlogo.gif">
            <?php endif; ?>
            <?php if (isset($_SESSION['identity'])): ?>
               
                <a href="<?= base_url ?>user/logout">Sign-off</a>
            <?php else: ?>    
               
               <a href="<?= base_url ?>user/register">Sign Up</a>
            <?php endif; ?>
        </ul>



    </div>
</aside>
<!--content-->
<div id="central">