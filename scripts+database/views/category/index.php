<h1>Manage categories</h1>
<a href="<?=base_url?>category/create" class="button button-small">Create category</a>
<table>
        <tr>
        <th>ID</th>
        <th>Name</th>           
    </tr>
    <?php while ($cat = $categories->fetch_object()): ?>
        <tr>
            <td><?=$cat->id?></td>
            <td><?=$cat->name?></td>      
        </tr>
    <?php endwhile; ?>
    
</table>