<?php
require_once('inc/functions.php');
require_once('inc/header.php');

/**
 * validation rules
 * name → required | string | min:5 | max:255
 * description → optional | string 
 * price → required | number | min:0 
 */

if (isset($_POST['submit'])) {
    // errors array
    $errors = [];

    // inputs
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // validating name
    if (empty($name)) {
        $errors[] = 'name is required';
    } elseif (!is_string($name)) {
        $errors[] = 'name must be string (text)';
    } elseif (strlen($name) <= 5 || strlen($name) > 255) {
        $errors[] = 'name must be between 5 to 255 characters';
    }

    // validating description
    if (!is_string($description)) {
        $errors[] = 'description must be string (text)';
    }

    // validating name
    if (empty($price)) {
        $errors[] = 'price is required';
    } elseif (!is_numeric($price)) {
        $errors[] = 'price must be number';
    } elseif ($price <= 0) {
        $errors[] = 'price must be at least 1';
    }
?>

    <?php if (count($errors) > 0) { ?>
        <div style="padding: 25px;">
            <table>
                <thead>
                    <tr>
                        <th>Errors:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($errors as $error) { ?>
                        <tr>
                            <td><?= $error ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a class="button" href="add-product.php">Back to form</a>
        </div>
    <?php } else { ?>
        <div style="padding: 25px;">
            <table>
                <thead>
                    <tr>
                        <th>Item:</th>
                        <th>Value:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td><?= $name ?></td>
                    </tr>
                    <?php if (!empty($description)) { ?>
                    <tr>
                        <td>Description</td>
                        <td><?= $description ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td>Price</td>
                        <td><?= $price ?></td>
                    </tr>
                    <tr>
                        <td>Price After Discount</td>
                        <td><?= getPriceWithDiscount($price) ?></td>
                    </tr>
                </tbody>
            </table>
            <a class="button" href="add-product.php">Reset Data</a>
        </div>
    <?php } ?>

<?php
}
require_once('inc/footer.php');
?>