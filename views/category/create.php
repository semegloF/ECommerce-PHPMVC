<h1>Create a new category</h1>

<form action="<?=base_url?>category/save" method="POST">
    <label for="name">Category name</label>
    <input type="text" name="name" required>
    <input type="submit" value="Save">
</form>