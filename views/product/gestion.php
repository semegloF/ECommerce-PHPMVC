<h1>Product management</h1>
<a href="<?=base_url?>product/create" class="button button-small">Create product</a>
<!-- add product -->
<?php if(isset($_SESSION['product']) && $_SESSION['product'] == 'complete') : ?>
    <strong class="alert_green">The product has been added to the catalog successfully!</strong>
<?php elseif(isset($_SESSION['product']) && $_SESSION['product'] != 'complete'): ?>
    <strong class="alert_red">The product could not be entered into the catalog!</strong>
<?php endif; ?>
<?php Utils::deleteSession('product'); ?>
<!--remove product-->
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
    <strong class="alert_green">The product has been removed from the catalog successfully!</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert_red">The product could not be removed from the catalog!</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>
    
<table>
      <tr>
        <th> ID </th>
        <th> NAME </th>
        <th> PRICE </th>
        <th> STOCK </th>
        <th> ACTIONS </th>
    </tr>
    <?php while ($pro = $products->fetch_object()): ?>
        <tr>
            <td><?=$pro->id?></td>
            <td><?=$pro->name?></td>    
            <td><?=$pro->price?></td>
            <td><?=$pro->stock?></td>
            <td>
                <a href="<?=base_url?>product/edit&id=<?=$pro->id?>" class="button button-gestion">Edit</a>
                <a href="<?=base_url?>product/deletee&id=<?=$pro->id?>" class="button button-gestion button-red">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    
</table>

