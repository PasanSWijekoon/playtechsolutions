<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayTechSolutions Admin dashbord</title>
    <link rel="stylesheet" href="adminstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="icon" href="ico.png">

    <style>
        #menu .items li:nth-child(1) {
            border-left: 4px solid white;

        }
    </style>

</head>

<body>

    <section id="menu">
        <div class="logo">
            <img src="ico.png" alt="">
            <h2>PLAYTECH</h2>
        </div>

        <div class="items">
            <li><i class="fa-solid fa-chart-pie"></i> <a href="adashboard.html">Dashbord</a></li>
            <li><i class="fa-solid fa-laptop-file"></i> <a href="amangeproducts.html">Manage Products </a></li>
            <li><i class="fa-solid fa-magnifying-glass"></i></i> <a href="PurchasedHistory.html">Purchased History </a>
            </li>
            <li><i class="fa-sharp fa-solid fa-plus"></i><a href="ProductAdding.html">Product Adding </a></li>
            <li> <i class="fa-solid fa-users"></i> <a href="manageusers.html">Manage Users</a></li>
            <li><i class="fa-solid fa-file-invoice"></i> <a href="index.html">Visit Shop</a></li>
            <li><i class="fa-solid fa-binoculars"></i><a href="">Admin Settings </a></li>
        </div>
    </section>

    <section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menubtn" class=" fa fa-bars"></i>
                </div>
                <div class="search">
                    <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search">
                </div>
            </div>

            <div class="profile">
                <i class="fa-sharp fa-solid fa-bell"></i>
                <img src="admin.png" alt="">
            </div>
        </div>

        <h3 class="i-name"> Dashbord</h3>

        <div class="values">
            <div class="val-box">
                <i class=" fas fa-users"></i>
                <div>
                    <h3>2,345</h3>
                    <span>New users</span>
                </div>
            </div>

            <div class="val-box">
                <i class="fa-solid fa-sort"></i>
                <div>
                    <h3>5,345</h3>
                    <span>Total Orders</span>
                </div>
            </div>

            <div class="val-box">
                <i class="fa-solid fa-dolly"></i>
                <div>
                    <h3>3,345</h3>
                    <span>Product Sell</span>
                </div>
            </div>

            <div class="val-box">
                <i class="fa-solid fa-dollar-sign"></i>
                <div>
                    <h3>Rs 20,345</h3>
                    <span>This Month</span>
                </div>
            </div>

        </div>

        <h3 class="i-name2">New Orders</h3>
        <div class="board">

            <table width="100%">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Address</td>
                        <td>Product</td>
                        <td>Status</td>
                        <td></td>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td class="people">
                            <img src="admin.png" alt="">
                            <div class="people-de">
                                <h5>Chathura Kehelgamuwa</h5>
                                <p>Kehelgamuwa@example.com</p>
                            </div>
                        </td>

                        <td class="people-des">
                            <h5>2 Bankshall Street, 11</h5>
                            <p>Colombo</p>
                        </td>

                        <td class="role">
                            <p>Samsung Galaxy S 22</p>
                        </td>
                        <td class="active">
                            <p>Paid</p>
                        </td>

                        <td class="edit"><a href="#">Edit</a></td>
                    </tr>

                    <tr>
                        <td class="people">
                            <img src="22.png" alt="">
                            <div class="people-de">
                                <h5>Shehani Kahadagamuwa</h5>
                                <p>Shehani@example.com</p>
                            </div>
                        </td>

                        <td class="people-des">
                            <h5>945 Maradana Road, 08</h5>
                            <p>Colombo</p>
                        </td>

                        <td class="role">
                            <p>iphone 14 1TB</p>
                        </td>
                        <td class="active">
                            <p>Paid</p>
                        </td>

                        <td class="edit"><a href="#">Edit</a></td>
                    </tr>

                    <tr>
                        <td class="people">
                            <img src="admin.png" alt="">
                            <div class="people-de">
                                <h5>Mahawattage Obeyesekere</h5>
                                <p>Obeyesekere@example.com</p>
                            </div>
                        </td>

                        <td class="people-des">
                            <h5>38, 3RD CROSS STREET</h5>
                            <p>Colombo</p>
                        </td>

                        <td class="role">
                            <p>Samsung Galaxy S 22</p>
                        </td>
                        <td class="active">
                            <p>Paid</p>
                        </td>

                        <td class="edit"><a href="#">Edit</a></td>
                    </tr>

                    <tr>
                        <td class="people">
                            <img src="admin.png" alt="">
                            <div class="people-de">
                                <h5>Gunarathna Amarasinghe</h5>
                                <p>Amarasinghe@example.com</p>
                            </div>
                        </td>

                        <td class="people-des">
                            <h5> 257 Dam Street, 12</h5>
                            <p>Colombo</p>
                        </td>

                        <td class="role">
                            <p>Phone Charger</p>
                        </td>
                        <td class="active">
                            <p>Paid</p>
                        </td>

                        <td class="edit"><a href="#">Edit</a></td>
                    </tr>

                    <tr>
                        <td class="people">
                            <img src="22.png" alt="">
                            <div class="people-de">
                                <h5>Shehani Kahadagamuwa</h5>
                                <p>Shehani@example.com</p>
                            </div>
                        </td>

                        <td class="people-des">
                            <h5>945 Maradana Road, 08</h5>
                            <p>Colombo</p>
                        </td>

                        <td class="role">
                            <p>iphone 14 1TB</p>
                        </td>
                        <td class="active">
                            <p>Paid</p>
                        </td>

                        <td class="edit"><a href="#">Edit</a></td>
                    </tr>

                    <tr>
                        <td class="people">
                            <img src="admin.png" alt="">
                            <div class="people-de">
                                <h5>Chathura Kehelgamuwa</h5>
                                <p>Kehelgamuwa@example.com</p>
                            </div>
                        </td>

                        <td class="people-des">
                            <h5>2 Bankshall Street, 11</h5>
                            <p>Colombo</p>
                        </td>

                        <td class="role">
                            <p>Samsung Galaxy S 22</p>
                        </td>
                        <td class="active">
                            <p>Paid</p>
                        </td>

                        <td class="edit"><a href="#">Edit</a></td>
                    </tr>

                    <tr>
                        <td class="people">
                            <img src="22.png" alt="">
                            <div class="people-de">
                                <h5>Shehani Kahadagamuwa</h5>
                                <p>Shehani@example.com</p>
                            </div>
                        </td>

                        <td class="people-des">
                            <h5>945 Maradana Road, 08</h5>
                            <p>Colombo</p>
                        </td>

                        <td class="role">
                            <p>iphone 14 1TB</p>
                        </td>
                        <td class="active">
                            <p>Paid</p>
                        </td>

                        <td class="edit"><a href="#">Edit</a></td>
                    </tr>

                    <tr>
                        <td class="people">
                            <img src="admin.png" alt="">
                            <div class="people-de">
                                <h5>Mahawattage Obeyesekere</h5>
                                <p>Obeyesekere@example.com</p>
                            </div>
                        </td>

                        <td class="people-des">
                            <h5>38, 3RD CROSS STREET</h5>
                            <p>Colombo</p>
                        </td>

                        <td class="role">
                            <p>Samsung Galaxy S 22</p>
                        </td>
                        <td class="active">
                            <p>Paid</p>
                        </td>

                        <td class="edit"><a href="#">Edit</a></td>
                    </tr>

                    <tr>
                        <td class="people">
                            <img src="admin.png" alt="">
                            <div class="people-de">
                                <h5>Gunarathna Amarasinghe</h5>
                                <p>Amarasinghe@example.com</p>
                            </div>
                        </td>

                        <td class="people-des">
                            <h5> 257 Dam Street, 12</h5>
                            <p>Colombo</p>
                        </td>

                        <td class="role">
                            <p>Phone Charger</p>
                        </td>
                        <td class="active">
                            <p>Paid</p>
                        </td>

                        <td class="edit"><a href="#">Edit</a></td>
                    </tr>

                    <tr>
                        <td class="people">
                            <img src="22.png" alt="">
                            <div class="people-de">
                                <h5>Shehani Kahadagamuwa</h5>
                                <p>Shehani@example.com</p>
                            </div>
                        </td>

                        <td class="people-des">
                            <h5>945 Maradana Road, 08</h5>
                            <p>Colombo</p>
                        </td>

                        <td class="role">
                            <p>iphone 14 1TB</p>
                        </td>
                        <td class="active">
                            <p>Paid</p>
                        </td>

                        <td class="edit"><a href="#">Edit</a></td>
                    </tr>





                </tbody>


            </table>
        </div>

    </section>


    <script>

        $('#menubtn').click(function () {
            $('#menu').toggleClass("active");
        })
    </script>

</body>

</html>