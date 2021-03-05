<?php
require_once('inc/header.php');
?>
<form action="handle-add-product.php" method="POST" style="padding: 25px;">
    <input type="text" name="name" placeholder="name">
    <textarea name="description" placeholder="description"></textarea>
    <input type="number" name="price" placeholder="price">
    <input type="submit" name="submit" value="submit">
</form>
<?php
require_once('inc/footer.php');
?>