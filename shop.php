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

        .pagination a {
            color: black;
        }
    </style>
</head>

<body>

    <?php include "includes/header.php"; ?>

    <section id="Mobile" class="my-5 py-5">
        <div class="container mt-5 py-3">
            <h2>Shop Page</h2>
            <hr>
            <p>Here you can check out all our products at fair prices.</p>
        </div>

        <div class="row mx-auto container">
            <?php
          

            // Pagination variables
            $results_per_page = 12; // Number of products per page
            $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
            $start_from = ($page - 1) * $results_per_page; // Starting index for SQL LIMIT

            // Query to fetch products with pagination
            $query = "SELECT * FROM product LIMIT $start_from, $results_per_page";
            $product_rs = Database::search($query);

            // Display products
            while ($results_data = $product_rs->fetch_assoc()) {
            ?>
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

            <!-- Pagination links -->
            <nav aria-label="Page navigation example">
                <ul class="pagination mt-5">
                    <!-- Previous page link -->
                    <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="<?php echo ($page <= 1) ? '#' : '?page=' . ($page - 1); ?>" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>

                    <!-- Page numbers -->
                    <?php
                    // Query to count total number of products
                    $count_query = "SELECT COUNT(*) AS total_count FROM product";
                    $count_result = Database::search($count_query);
                    $count_row = $count_result->fetch_assoc();
                    $total_pages = ceil($count_row['total_count'] / $results_per_page);

                    for ($i = 1; $i <= $total_pages; $i++) {
                    ?>
                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php } ?>

                    <!-- Next page link -->
                    <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="<?php echo ($page >= $total_pages) ? '#' : '?page=' . ($page + 1); ?>">Next</a>
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
