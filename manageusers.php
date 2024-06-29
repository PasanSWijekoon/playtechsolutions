<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayTechSolutions - Manage Users</title>
    <link rel="stylesheet" href="adminstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="icon" href="ico.png">

    <style>
        #menu .items li:nth-child(5) {
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
            <li><i class="fa-solid fa-magnifying-glass"></i></i> <a href="PurchasedHistory.html">Purchased History </a></li>
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

        <h3 class="i-name"> Manage Users</h3>
        <div class="board">

            <table width="100%">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Address</td>
                        <td>Total Orders</td>
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
                            <p>22</p>
                        </td>
                        <td class="active">
                            <p>Verified</p>
                        </td>

                        <td class="edit"><a href="#">Edit</a></td>
                    </tr>

                    <tr>
                        <td class="people">
                            <img src="22.png" alt="">
                            <div class="people-de">
                                <h5>Piumi Hansamai</h5>
                                <p>queenhansi@example.com</p>
                            </div>
                        </td>

                        <td class="people-des">
                            <h5>34 Piliyandala Street, 15</h5>
                            <p>Colombo</p>
                        </td>

                        <td class="role">
                            <p>4</p>
                        </td>
                        <td class="active">
                            <p>Verified</p>
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
                            <p>2</p>
                        </td>
                        <td class="active">
                            <p>Verified</p>
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
                            <p>22</p>
                        </td>
                        <td class="active">
                            <p>Verified</p>
                        </td>

                        <td class="edit"><a href="#">Edit</a></td>
                    </tr>

                    <tr>
                        <td class="people">
                            <img src="22.png" alt="">
                            <div class="people-de">
                                <h5>Piumi Hansamai</h5>
                                <p>queenhansi@example.com</p>
                            </div>
                        </td>

                        <td class="people-des">
                            <h5>34 Piliyandala Street, 15</h5>
                            <p>Colombo</p>
                        </td>

                        <td class="role">
                            <p>4</p>
                        </td>
                        <td class="active">
                            <p>Verified</p>
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
                            <p>2</p>
                        </td>
                        <td class="active">
                            <p>Verified</p>
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
                            <p>22</p>
                        </td>
                        <td class="active">
                            <p>Verified</p>
                        </td>

                        <td class="edit"><a href="#">Edit</a></td>
                    </tr>

                    <tr>
                        <td class="people">
                            <img src="22.png" alt="">
                            <div class="people-de">
                                <h5>Piumi Hansamai</h5>
                                <p>queenhansi@example.com</p>
                            </div>
                        </td>

                        <td class="people-des">
                            <h5>34 Piliyandala Street, 15</h5>
                            <p>Colombo</p>
                        </td>

                        <td class="role">
                            <p>4</p>
                        </td>
                        <td class="active">
                            <p>Verified</p>
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
                            <p>2</p>
                        </td>
                        <td class="active">
                            <p>Verified</p>
                        </td>

                        <td class="edit"><a href="#">Edit</a></td>
                    </tr>

                    




                </tbody>


            </table>
        </div>

             

    </section>


    <script>

$('#menubtn').click(function(){
    $('#menu').toggleClass("active");
})
    </script>

</body>

</html>