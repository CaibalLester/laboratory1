<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Product List</title>
     
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">            
        <link href="<?= base_url() ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>css/bootstrap-icons.css" rel="stylesheet">
        <link href="<?= base_url() ?>css/templatemo-topic-listing.css" rel="stylesheet">      
    </head>
<body>

                <div class="container text-left">
                    <div class="row">
                        <div class="col-18">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-7">
                                            <div class="custom-block bg-white shadow-lg">
                                                <h5>ENTER PRODUCT INFORMATION</h5>
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
                                                                                            echo '<option value="' . $category . '">' . $category . '</option>';}}?>
                                                                        </select>
                                                                <br><br>
                                                            <label>Product Quantity</label>
                                                                <input type="number" name="ProductQuantity" min="1" max="1000000" value="<?php if (isset($pro['ProductQuantity'])) {echo $pro['ProductQuantity'];}?>" placeholder="Quantity">
                                                                <br><br>
                                                            <label>Product Price</label>
                                                                <input type="text" name="ProductPrice" value="<?php if (isset($pro['ProductPrice'])) {echo $pro['ProductPrice'];}?>" placeholder="Product Price">
                                                                <br><br>
                                                                <input type="submit" value="save" class="btn btn-primary">
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container text-left">
                    <div class="row">
                        <div class="col-18">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-7">
                                            <div class="custom-block bg-white shadow-lg">
                                            <h5>ENTER PRODUCT CATEGORY</h5>
                                                    <form action="/submit" method="post">
                                                            <label for="ProductCategory">Product Category</label>
                                                            <input type="hidden" name="id" value="<?php if (isset($pro['id'])) {echo $pro['id'];}?>">
                                                            <input type="text" name="ProductCategory" placeholder="Product Category">    
                                                            <br><br>
                                                                <input type="submit" value="submit" class="btn btn-primary">
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
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
                        <a href="/delete/<?= $pr['id'] ?>" class="btn btn-primary">Delete</a> || <a href="/edit/<?= $pr['id'] ?>">Edit</a>
                    </li>
                <?php endforeach;?>
            </ul>


        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script> 
</body>
</html>