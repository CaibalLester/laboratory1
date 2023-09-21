<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>
<h1>ENTER PRODUCT INFORMATION</h1>
    <form action="/save" method="post">
            <label>Product Name</label>
                <input type="hidden" name="id" value="<?php if (isset($pro['id'])) {echo $pro['id'];}?>">
                <input type="text" name="ProductName" value="<?php if (isset($pro['ProductName'])) {echo $pro['ProductName'];}?>" placeholder="Product Name">
                <br><br>

            <label>Product Description</label>
                <input type="text" name="ProductDescription" value="<?php if (isset($pro['ProductDescription'])) {echo $pro['ProductDescription'];}?>" placeholder="Product Description">
                <br><br>

            <label for="ProductCategory">Product Category</label>
                    <select name="ProductCategory" id="ProductCategory">
                        <option value="<?php if (isset($pro['ProductCategory'])) {echo $pro['ProductCategory'];}?>">Select a category</option>
                <?php
                    $uniqueCategories = array(); 
                    foreach ($product as $pr) {
                        $category = $pr['ProductCategory'];
                            if (!in_array($category, $uniqueCategories)) {
                                $uniqueCategories[] = $category; 
                                echo '<option value="' . $category . '">' . $category . '</option>';}}
                ?>
                    </select>
            <label for="ProductCategory">Or</label>
                <input type="text" name="ProductCategory" value="<?php if (isset($pro['ProductCategory'])) {echo $pro['ProductCategory'];}?>" placeholder="Product Category">
                <br><br>
            <label>Product Quantity</label>
                <input type="number" name="ProductQuantity" min="1" max="1000000" value="<?php if (isset($pro['ProductQuantity'])) {echo $pro['ProductQuantity'];}?>" placeholder="Quantity">
                <br><br>
            <label>Product Price</label>
                <input type="text" name="ProductPrice" value="<?php if (isset($pro['ProductPrice'])) {echo $pro['ProductPrice'];}?>" placeholder="Product Price">
                <br><br>
                <input type="submit" value="save">

    </form>
    <h1>Product Listing</h1>
            <ul>
                <?php foreach($product as $pr): ?>
                    <li>
                        <strong>Product Name:</strong> <?= $pr['ProductName'] ?><br>
                        <strong>Product Description:</strong> <?= $pr['ProductDescription'] ?><br>
                        <strong>Product Category:</strong> <?= $pr['ProductCategory'] ?><br>
                        <strong>Product Quantity:</strong> <?= $pr['ProductQuantity'] ?><br>
                        <strong>Product Price:</strong> <?= $pr['ProductPrice'] ?><br>
                        <strong>Action:</strong>
                        <a href="/delete/<?= $pr['id'] ?>">Delete</a> || <a href="/edit/<?= $pr['id'] ?>">Edit</a>
                    </li>
                <?php endforeach;?>
            </ul>
</body>
</html>