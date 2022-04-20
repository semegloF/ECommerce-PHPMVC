<h1>Shopping cart</h1>
<?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) >= 1): ?>
<table>
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Units</th>
     
    </tr>
    <?php
    
    foreach ($cart as $indice => $element): 
        $product = $element['product'];
    ?>
    <tr>
       <td><?php if ($product->image != NULL): ?>
                <img src="<?= base_url ?>uploads/images/<?= $product->image ?>" class="img_carrito">
            <?php else: ?>
                <img src="<?= base_url ?>assets/img/logo2.png" class="img_carrito">
            <?php endif; ?>
        </td>
        <td><a href="<?= base_url ?>product/select&id=<?=$product->id?>"><?=$product->name?></a></td>
        <td><?=$product->price?> $</td>
        <td>
            <?=$element['units']?>
            <div class="updown-unidades">
            <a href="<?=base_url?>cart/down&index=<?=$indice?>" class="button">-</a>
			<a href="<?=base_url?>cart/up&index=<?=$indice?>" class="button">+</a>
            </div>
        </td>
        <td>
<a href="<?=base_url?>cart/delete&index=<?=$indice?>" class="btn btn-danger">🗑</a>
        </td>
    </tr>
    <?php endforeach; ?>    
</table>
<br>

<br>
<div class="total-carrito">
    <?php $statut = Utils::statutCart(); ?>
    <h3>Total: $<?=$statut ['total']?> </h3>
  

</div>
<?php else: ?>
<p>The cart is empty!</p>
<?php endif; ?>