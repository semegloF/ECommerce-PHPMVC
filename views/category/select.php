<?php if (isset($category)): ?>
    <h1><?= $category->name ?></h1>
    <?php if ($products->num_rows == 0): ?>
        <p>No products to display</p>
    <?php else: ?>

        <?php while ($product = $products->fetch_object()): ?>
            <div class="product">
                <a href="<?= base_url ?>product/select&id=<?= $product->id ?>">
                    <?php if ($product->image != NULL): ?>
                        <img src="<?= base_url ?>uploads/images/<?= $product->image ?>">
                    <?php else: ?>
                        <img src="<?= base_url ?>assets/img/logo2.png">
                    <?php endif; ?>
                    <h2><?= $product->name ?></h2> </a>

                <p><?= $product->price ?> $</p>
                <a href="<?=base_url?>cart/add&id=<?=$product->id?>" class="button">Buy</a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else: ?>
    <h1>This category doesn't exist</h1>
<?php endif; ?>