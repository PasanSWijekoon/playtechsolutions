<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="assets/img/ico.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" href="assets/css/invoicestyle.css">

    <title>Generated Invoice</title>
</head>

<body>

    <?php
    session_start();
    include "includes/connection.php";

    if (isset($_SESSION["u"])) {
        $umail = $_SESSION["u"]["email"];
        $oid = $_GET["id"];

    ?>
    <div class="col-12 btn-toolbar justify-content-end">
                    <button class="btn btn-dark me-2" onclick="printInvoice();"><i class="bi bi-printer-fill"></i> Print</button>
                    <button onclick="location.href = 'purchaselist.php';"class="btn btn-danger me-2"><i class="bi bi-filetype-pdf"></i> Close</button>
                </div>
        <div class="my-5 page" size="A4" id="page">
            <div class="p-5">
                <section class="top-content bb d-flex justify-content-between">
                    <div class="logo">
                        <img src="Invoice.png" alt="" class="img-fluid">
                    </div>
                    <div class="top-left">
                        <div class="graphic-path">
                            <p>Invoice</p>
                        </div>
                        <?php

                        $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "'");
                        $invoice_data = $invoice_rs->fetch_assoc();

                        ?>
                        <div class="position-relative">
                            <p>Invoice No. <span><?php echo $invoice_data["id"]; ?></span></p>

                        </div>
                    </div>
                </section>

                <section class="store-user mt-5">
                    <div class="col-10">
                        <div class="row bb pb-3">
                            <div class="col-7">
                                <p>Supplier,</p>
                                <h2>Play Tech Solutions</h2>
                                <p class="address"> 945 Maradana Road, 08, <br> Colombo, <br>Srilanaka </p>
                                <div class="txn mt-2">Tele: 071909090</div>
                            </div>
                            <div class="col-5">
                                <?php

                                $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $umail . "'");
                                $address_data = $address_rs->fetch_assoc();

                                ?>
                                <p>Client,</p>
                                <h2><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></h2>
                                <p class="address"> <?php echo $address_data["line1"] . " " . $address_data["line2"]; ?></p>
                                <div class="txn mt-2"><?php echo $umail; ?></div>
                            </div>
                        </div>
                        <div class="row extra-info pt-3">
                            <div class="col-7">
                                <p>Payment Method: <span>Debit Card</span></p>
                                <p>Order Number: <span><?php echo $oid; ?></span></p>
                            </div>
                            <div class="col-5">
                                <p>Invoice Date: <span><?php echo $invoice_data["date"]; ?></span></p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="product-area mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>Item Description</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $invoice_data["product_id"] . "'");
                            $product_data = $product_rs->fetch_assoc();

                            ?>
                            <tr>
                                <td>
                                    <div class="media">
                                        <?php

                                        $image_rs = Database::search("SELECT*FROM `images`WHERE `product_id`='" .$invoice_data["product_id"] . "'");
                                        $image_data = $image_rs->fetch_assoc();

                                        ?>
                                        <img class="mr-3 img-fluid" src="<?php echo $image_data["code"]; ?>" alt="Product 01">
                                        <div class="media-body">
                                            <p class="mt-0 title"><?php echo $product_data["title"]; ?></p>
                                            Ram 6Gb Rom 256 GB
                                        </div>
                                    </div>
                                </td>
                                <td>Rs. <?php echo $product_data["price"]; ?> .00</td>
                                <td><?php echo $invoice_data["qty"]; ?></td>
                                <td>Rs. <?php echo $invoice_data["total"]; ?> .00</td>
                            </tr>

                        </tbody>
                    </table>
                </section>

                <?php

                $city_rs = Database::search("SELECT * FROM `city` WHERE `id`='" . $address_data["city_id"] . "'");
                $city_data = $city_rs->fetch_assoc();

                $delivery = 0;

                if ($city_data["district_id"] == 2) {
                    $delivery = $product_data["delivery_fee_colombo"];
                } else {
                    $delivery = $product_data["delivery_fee_other"];
                }

                $t = $invoice_data["total"];
                $g = $t - $delivery;

                ?>

                <section class="balance-info">
                    <div class="row">
                        <div class="col-8">
                            <p class="m-0 font-weight-bold"> Note: </p>
                            <p>Thank You For Shoping With Us</p>
                        </div>
                        <div class="col-4">
                            <table class="table border-0 table-hover">
                                <tr>
                                    <td>Sub Total:</td>
                                    <td>Rs. <?php echo $g; ?> .00</td>
                                </tr>

                                <tr>
                                    <td>Deliver:</td>
                                    <td>Rs. <?php echo $delivery; ?> .00</td>
                                </tr>
                                <tfoot>
                                    <tr>
                                        <td>Total:</td>
                                        <td>Rs. <?php echo $t; ?> .00</td>
                                    </tr>
                                </tfoot>
                            </table>



                        </div>
                    </div>
                </section>




            </div>
        </div>





    <?php
    }

    ?>



<script src="assets/js/script.js"></script>
</body>

</html>