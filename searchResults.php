<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayTechSolutions - Shop</title>
    <link rel="icon" href="assets/img/ico.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .product img {
            width: 100%;
            height: auto;
            box-sizing: border-box;
            object-fit: cover;
        }

        #Mobile>div.row.mx-auto.container>div.row.mx-auto.container>div.row.mx-auto.container>div.row.mx-auto.container>div.row.mx-auto.container>nav>ul>li.page-item.active>a {

            background-color: coral;
            border-color: coral;

        }

        .pagination a {
            color: black;

        }
    </style>

</head>

<body>

    <?php include "includes/header.php"; ?>

    <?php

// Initialize default values for search parameters
$txt = $_GET["t"] ?? '';
$category = $_GET["cat"] ?? 0;
$brand = $_GET["b"] ?? 0;
$model = $_GET["m"] ?? 0;
$condition = $_GET["con"] ?? 0;
$colour = $_GET["col"] ?? 0;
$price_from = $_GET["pf"] ?? '';
$price_to = $_GET["pt"] ?? '';
$page = $_GET["page"] ?? 1;

$query = "SELECT p.*, b.name AS brand_name, m.name AS model_name
          FROM product p
          JOIN brand_has_model bm ON p.brand_has_model_id = bm.id
          JOIN brand b ON bm.brand_id = b.id
          JOIN model m ON bm.model_id = m.id
          WHERE 1 = 1"; // Start with a base query

// Array to store conditions
$conditions = [];

// Check and append conditions based on parameters
if (!empty($txt)) {
    $conditions[] = "p.title LIKE '%$txt%'";
}

if ($category != 0) {
    $conditions[] = "p.category_id = $category";
}

if ($brand != 0) {
    $conditions[] = "bm.brand_id = $brand";
}

if ($model != 0) {
    $conditions[] = "bm.model_id = $model";
}

if ($condition != 0) {
    $conditions[] = "p.condition_id = $condition";
}

if ($colour != 0) {
    $conditions[] = "p.colour_id = $colour";
}

if (!empty($price_from) && empty($price_to)) {
    $conditions[] = "p.price >= '$price_from'";
} elseif (empty($price_from) && !empty($price_to)) {
    $conditions[] = "p.price <= '$price_to'";
} elseif (!empty($price_from) && !empty($price_to)) {
    $conditions[] = "p.price BETWEEN '$price_from' AND '$price_to'";
}

// Combine conditions into the main query
if (!empty($conditions)) {
    $query .= " AND " . implode(" AND ", $conditions);
}

// Execute the query
$product_rs = Database::search($query);
$product_num = $product_rs->num_rows;


// Pagination setup (assuming you have this logic already)

// Example pagination logic for illustration
$results_per_page = 10;
$number_of_pages = ceil($product_num / $results_per_page);
$viewed_results_count = ((int)$page - 1) * $results_per_page;

$query .= " LIMIT $results_per_page OFFSET $viewed_results_count";

$results_rs = Database::search($query);
$results_num = $results_rs->num_rows;

?>


    <section id="Mobile" class="my-5 py-5">
        <div class=" container mt-5 py-3">
            <h2>Search Results</h3>
                <hr class="">

        </div>

        <div class="row mx-auto container">
            <?php while ($results_data = $results_rs->fetch_assoc()) { ?>
                <div class="product text-center col-lg-3 col-md-4 col-12">
                    <?php
                    $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $results_data["id"] . "'");
                    $product_img_data = $product_img_rs->fetch_assoc();
                    ?>
                    <img class=" img-fluid" src="<?php echo $product_img_data["code"]; ?>" alt="s 22">
                    <div class="star">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <h5 class="p-name"><?php echo $results_data["title"]; ?></h5>
                    <?php

                    if ($results_data["qty"] > 0) {

                    ?>
                        <h5 class="p-name">In Stock</h5>
                        <h5 class="p-name"><?php echo $results_data["qty"]; ?> Items Available</h5>
                        <h4 class="p-price">Rs <?php echo $results_data["price"]; ?>.00</h4>
                        <a href='<?php echo "singleProductView.php?id=" . $results_data["id"]; ?>'>
                            <button class="buy-button">Buy now</button>
                        </a>

                    <?php      } else {

                    ?>
                        <h4 class="p-name">Out of Stock</h4>
                        <h4 class="p-name">00 Items Available</h4>
                        <h4 class="p-price">$<?php echo $results_data["price"]; ?>.00</h4>
                        <button class="buy-button">Buy now</button>

                    <?php

                    }
                    ?>
                </div>


            <?php } ?>

            <nav aria-label="Page navigation example">
                <ul class="pagination mt-5">
                    <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                        <a class="page-link" href="<?php if ($page > 1) echo "searchResults.php?t=$txt&cat=$category&b=$brand&m=$model&con=$condition&col=$colour&pf=$price_from&pt=$price_to&page=" . ($page - 1);
                                                    else echo '#'; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <?php for ($i = 1; $i <= $number_of_pages; $i++) { ?>
                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                            <a class="page-link" href="searchResults.php?t=<?php echo $txt; ?>&cat=<?php echo $category; ?>&b=<?php echo $brand; ?>&m=<?php echo $model; ?>&con=<?php echo $condition; ?>&col=<?php echo $colour; ?>&pf=<?php echo $price_from; ?>&pt=<?php echo $price_to; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php } ?>
                    <li class="page-item <?php if ($page >= $number_of_pages) echo 'disabled'; ?>">
                        <a class="page-link" href="<?php if ($page < $number_of_pages) echo "searchResults.php?t=$txt&cat=$category&b=$brand&m=$model&con=$condition&col=$colour&pf=$price_from&pt=$price_to&page=" . ($page + 1);
                                                    else echo '#'; ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>


    </section>


    <?php include "includes/footer.php"; ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>