<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayTechSolutions - Product View</title>
    <link rel="icon" href="assets/img/ico.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .small-img-group {

            display: flex;
            justify-content: space-between;
        }

        .small-img-col {
            flex-basis: 33%;
            cursor: pointer;
        }

        .sproduct select {
            display: block;
            padding: 5px 10px;

        }

        .sproduct input {
            width: 50px;
            height: 40px;
            font-size: 16px;
            margin-right: 10px;
            padding-left: 10px;

        }

        .sproduct input:focus {
            outline: none;
        }

        .buy-button {
            background: orange;
            opacity: 1;
            transition: 0.3s all;

        }
    </style>

</head>

<body>

    <?php include "includes/header.php"; ?>

    <?php




    if (isset($_GET["id"])) {

        $pid = $_GET["id"];

        $product_rs = Database::search("SELECT product.price,product.qty,product.description,product.title,
    product.datetime_added,product.delivery_fee_colombo,product.delivery_fee_other,product.category_id,
    product.brand_has_model_id,product.colour_id,product.status_id,product.condition_id,product.user_email,
    model.name AS mname,brand.name AS bname FROM `product` INNER JOIN `brand_has_model` ON 
    brand_has_model.id=product.brand_has_model_id INNER JOIN `brand` ON brand.id=brand_has_model.brand_id INNER JOIN 
    `model` ON model.id=brand_has_model.model_id WHERE product.id='" . $pid . "'");

        $product_num = $product_rs->num_rows;

        if ($product_num == 1) {

            $product_data = $product_rs->fetch_assoc();
            // echo ($product_data["title"]);
        } else {
            echo ("Sorry for the Inconvenience");
        }
    } else {
        echo "Something went wrong";
    }


    ?>


    <section class=" container sproduct my-5 pt-3">
        <div class="row mt-5">
            <?php

            $image_rs = Database::search("SELECT*FROM `images`WHERE `product_id`='" . $pid . "'");
            $image_data = $image_rs->fetch_assoc();

            ?>
            <div class="col-lg-5 col-md-12 col-12 ">
                <img class=" img-fluid w-100 pb-1" src="<?php echo $image_data["code"]; ?>" id="MainImg" alt="">

              
                        <div class=" small-img-group">
                              <?php

                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                $image_num = $image_rs->num_rows;
                $img = array();

                if ($image_num != 0) {

                    for ($x = 0; $x < $image_num; $x++) {
                        $image_data = $image_rs->fetch_assoc();
                        $img[$x] = $image_data["code"];

                ?>
                            <div class=" small-img-col ">
                                <img src="<?php echo $img["$x"]; ?>" width="100%" class="small-img" alt="">
                            </div>
                           

                    <?php
                    }
                }
                    ?>
                        </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 ">
                <h6>Home/Android</h6>
                <h3 class="py-4"><?php echo ($product_data["title"]); ?></h3>
                <?php

                $price = $product_data["price"];
                $adding_price = ($price / 100) * 5;
                $new_price = $price + $adding_price;
                $difference = $new_price - $price;
                $percentage = ($difference / $price) * 100;

                ?>

                <h2>Rs. <?php echo $price; ?> .00</h2>
                <span class="fs-4 fw-bold text-danger text-decoration-line-through">Rs. <?php echo $new_price; ?> .00</span>
                <span class="fs-4 fw-bold text-black-50">Save Rs. <?php echo $difference; ?> .00 (<?php echo $percentage; ?>%)</span>
                <h2 class="fs-5 text-primary">In Stock : <?php echo $product_data["qty"]; ?> Items Available</h2>

                <p id="qtygana" style="display: none;"><?php echo $product_data["qty"]; ?> </p>

                <input type="number" id="myInput" value="1" onchange="checkValue()">
                <button class="buy-button" type="submit" id="payhere-payment" onclick="payNow(<?php echo $pid; ?>);">Buy Now</button>
                <button onclick="addToCart(<?php echo $pid ?>);" class="buy-button">Add to cart</button>
                <button  onclick='addToWatchlist(<?php echo $pid ?>);' class="buy-button" id='heart<?php echo $pid ?>'>Add to Wishlist</button>


                <h4 class="mt-5 mb-5">Product details</h4>
                <span><?php echo $product_data["description"]; ?></span>



            </div>
        </div>
    </section>

    <section id="featured" class="my-5 pb-5">
        <div class=" container text-center mt-5 py-3">
            <h3>Related Products</h3>
            <hr class="mx-auto">

        </div>

        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img class=" img-fluid" src="assets/img/Products/1.jpg" alt="s 22">
                <div class="star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <h5 class="p-name">Samsung Galaxy S22</h5>
                <h4 class="p-price">Rs/= 50,000 </h4>
                <button class="buy-button">Buy now</button>
            </div>

            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img class=" img-fluid" src="assets/img/Products/2.jpg" alt="s 22">
                <div class="star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <h5 class="p-name">Dell Moniter</h5>
                <h4 class="p-price">Rs/= 20,000 </h4>
                <button class="buy-button">Buy now</button>
            </div>

            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img class=" img-fluid" src="assets/img/Products/3.jpg" alt="s 22">
                <div class="star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <h5 class="p-name">Razor G22 Mouse</h5>
                <h4 class="p-price">Rs/= 57,800 </h4>
                <button class="buy-button">Buy now</button>
            </div>

            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img class=" img-fluid" src="assets/img/Products/4.jpg" alt="s 22">
                <div class="star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <h5 class="p-name">Asus Tuf Gaming i7-5000</h5>
                <h4 class="p-price">Rs/= 24,000 </h4>
                <button class="buy-button">Buy now</button>
            </div>


        </div>


    </section>


    <?php include "includes/footer.php"; ?>


    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

    <script>
        var MainImg = document.getElementById('MainImg');
        var smallimg = document.getElementsByClassName('small-img');

        smallimg[0].onclick = function() {
            MainImg.src = smallimg[0].src;
        }

        smallimg[1].onclick = function() {
            MainImg.src = smallimg[1].src;
        }

        smallimg[2].onclick = function() {
            MainImg.src = smallimg[2].src;
        }

       
    </script>
</body>

</html>