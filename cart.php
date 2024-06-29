<?php

session_start();
if (isset($_SESSION["u"])) {

    $email = $_SESSION["u"]["email"];

    $total = 0;
    $subtotal = 0;
    $shipping = 0;
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PlayTechSolutions - Cart</title>
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
        <?php include "includes/header.php";

        ?>
        <?php

        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "' ");
        $cart_num = $cart_rs->num_rows;

        if ($cart_num == 0) {
        ?>

            <section id="Mobile" class="pt-5 mt-5 container">

                <h3 class=" font-weight-bold pt-5">Shopping Cart</h3>
                <hr class="">
                <p>Cart is Empty</p>


            </section>



        <?php
        } else {
        ?>

            <section id="Mobile" class="pt-5 mt-5 container">

                <h3 class=" font-weight-bold pt-5">Shopping Cart</h3>
                <hr class="">
              


            </section>

            <section id="cartcontainer" class="container my-5">


                <table width="100%">
                    <thead>
                        <tr>
                            <td>Remove</td>
                            <td>Image</td>
                            <td>Product</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        for ($x = 0; $x < $cart_num; $x++) {
                            $cart_data = $cart_rs->fetch_assoc();

                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cart_data["product_id"] . "'");
                            $product_data = $product_rs->fetch_assoc();

                            $total = $total + ($product_data["price"] * $cart_data["qty"]);

                            $address_rs = Database::search("SELECT district.id AS did FROM `user_has_address` INNER JOIN `city` ON 
    user_has_address.city_id=city.id INNER JOIN `district` ON 
    city.district_id=district.id WHERE `user_email`='" . $email . "' ");

                            $address_data = $address_rs->fetch_assoc();

                            $ship = 0;

                            if ($address_data["did"] == 2) {
                                $ship = $product_data["delivery_fee_colombo"];
                                $shipping = $shipping + $ship;
                            } else {
                                $ship = $product_data["delivery_fee_other"];
                                $shipping = $shipping + $ship;
                            }

                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                            $image_data = $image_rs->fetch_assoc();

                            $clr_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "'");
                            $clr_data = $clr_rs->fetch_assoc();

                            $seller_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "' ");
                            $seller_data = $seller_rs->fetch_assoc();
                            $seller = $seller_data["fname"] . " " . $seller_data["lname"];

                        ?>


                            <tr>
                                <td><a  onclick="deleteFromCart(<?php echo $cart_data['id'];?>);"> <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                <td><img src="<?php echo ($image_data["code"]); ?>" alt=""></td>
                                <td>
                                    <h5><?php echo ($product_data["title"]); ?></h5>
                                </td>
                                <td>
                                    <h5>Rs.<?php echo ($product_data["price"]); ?></h5>
                                </td>
                                <td><input class="w-25 pl-1 " type="number" value="<?php echo ($cart_data["qty"]); ?>" onchange="changeQTY(<?php echo $cart_data['id']; ?>);" id="qty_num"></td>
                                <td>
                                    <h5>Rs.<?php echo ($product_data["price"] * $cart_data["qty"]) + $ship; ?>.00</h5>
                                </td>

                            </tr>
                        <?php

                        }

                        ?>

                    </tbody>
                </table>



            </section>


            <section id="cart-botom" class=" container py-3">
                <div class="row">
                    <div class="coupon col-lg-6 col-md-6 col-12 mb-4">
                        <div>
                            <h5>Coupoun</h5>
                            <p>Enter Your Coupon code here if you have any</p>
                            <input type="text" placeholder="coupoun code">
                            <button>Apply coupoun</button>
                        </div>
                    </div>

                    <div class="total col-lg-6 col-md-6 col-12">
                        <div>
                            <h5>Cart total</h5>
                            <div class=" d-flex justify-content-between">
                                <h6>subtotal items (<?php echo ($cart_num); ?>)</h6>
                                <p>Rs. <?php echo ($total); ?> .00</p>
                            </div>
                            <div class=" d-flex justify-content-between">
                                <h6>Shipping</h6>
                                <p>Rs. <?php echo ($shipping); ?> .00</p>
                            </div>
                            <hr class="second-hr">
                            <div class=" d-flex justify-content-between">
                                <h6>Total</h6>
                                <p>Rs. <?php echo ($shipping + $total); ?> .00</p>
                            </div>
                            <p style="display: none;" id="myInput">This paragraph is hidden and does not take up space.</p>
                            <button class="ml-auto" id="payhere-payment" onclick="payNoww();">Proceed to Checkout</button>
                        </div>
                    </div>
                </div>

            <?php
        }

            ?>
            </section>



            <?php include "includes/footer.php"; ?>


            <script src="assets/js/script.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    </body>

    </html>

<?php

} else {
    header("location:profile.php");
}

?>