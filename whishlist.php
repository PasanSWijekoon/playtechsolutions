<?php
session_start();
if (isset($_SESSION["u"])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PlayTechSolutions - whishlist</title>
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


        <section id="Mobile" class="pt-5 mt-5 container">

            <h3 class=" font-weight-bold pt-5">Wishlist</h3>
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
                        <td>Buy Today</td>
                    </tr>
                </thead>
                <?php

                $user = $_SESSION["u"]["email"];

                $watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $user . "'");
                $watch_num = $watch_rs->num_rows;

                if ($watch_num == 0) {

                ?>
                    <tbody>
                        <tr>
                            <td>No Items</td>
                            <td>No Items</td>
                            <td>No Items</td>
                            <td>No Items</td>
                            <td>No Items</td>
                            <td>No Items</td>

                        </tr>

                    <?php

                } else {
                    ?>
                        <?php

                        for ($x = 0; $x < $watch_num; $x++) {

                            $watch_data = $watch_rs->fetch_assoc();

                            $pi = "resource/empty.svg";

                            $p_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $watch_data["product_id"] . "'");
                            $p_data = $p_rs->fetch_assoc();

                            $i_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $watch_data["product_id"] . "'");
                            $i_num = $i_rs->num_rows;
                            if ($i_num > 0) {
                                $i_data = $i_rs->fetch_assoc();
                                $pi = $i_data["code"];
                            }

                            $col_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $p_data["colour_id"] . "'");
                            $col_data = $col_rs->fetch_assoc();

                            $con_rs = Database::search("SELECT * FROM `condition` WHERE `id`='" . $p_data["condition_id"] . "'");
                            $con_data = $con_rs->fetch_assoc();

                            $seller_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $p_data["user_email"] . "'");
                            $seller_data = $seller_rs->fetch_assoc();

                        ?>
                            <tr>
                                <td><a  onclick='removeFromWatchlist(<?php echo $watch_data["id"];?>);'> <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                <td> <img src="<?php echo $pi ;?>"/></td>
                                <td>
                                    <h5><?php echo $p_data["title"]?></h5>
                                </td>
                                <td>
                                    <h5>Rs. <?php echo $p_data["price"]?> .00 </h5>
                                </td>
                                <p id="qtygana" style="display: none;"><?php echo $p_data["qty"]; ?> </p>
                                <td><input class="w-25 pl-1 " type="number" value="1"  value="1" ></td>
                                <td><button class="ml-auto">Buy Now</button></td>

                            </tr>
                        <?php

                        }

                        ?>

                        <!-- have Products -->
                    <?php

                }

                    ?>


                    </tbody>
            </table>



        </section>


        <?php include "includes/footer.php"; ?>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script src="assets/js/script.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    </body>

    </html>

<?php

} else {
    header("location:profile.php");
}

?>