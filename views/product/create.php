<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <h1>Edit product <?=$pro->name?></h1>
    <?php $url_action = base_url."product/save&id=".$pro->id; ?>
<?php else: ?>
    <h1>Enter product</h1>
    <?php $url_action = base_url."product/save"; ?>
<?php endif; ?>
<div form_container>
    
    
    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?=  isset($pro) && is_object($pro) ? $pro->name : '';?>">

        <label for="description">Description</label>
        <textarea name="description" ><?=  isset($pro) && is_object($pro) ? $pro->description : '';?></textarea>

        <label for="price">Price</label>
        <input type="text" name="price" value="<?=  isset($pro) && is_object($pro) ? $pro->price : '';?>">

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?=  isset($pro) && is_object($pro) ? $pro->stock : '';?>">

        <label for="category">Category</label>
        <?php $categories = Utils::showCategories(); ?>
        <select name="category">
            <?php while ($cat = $categories->fetch_object()): ?>
                <option value="<?= $cat->id ?>" <?=  isset($pro) && is_object($pro) && $cat->id == $pro->category_id ? 'selected' : '';?>>
                    <?= $cat->name ?>
                </option>
            <?php endwhile; ?>
        </select>


        <label for="image">Image</label>
        <?php if(isset($pro) && is_object($pro) && !empty($pro->image)) :?>
        <img src="<?=base_url?>uploads/images/<?=$pro->image?>" class="thumb" >
        <?php endif; ?>
        <input type="file" name="image">
        
        <input type="submit" value="Save">

    </form>
</div>