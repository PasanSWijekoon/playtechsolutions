<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayTechSolutions - Product Adding</title>
    <link rel="stylesheet" href="adminstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="icon" href="ico.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <style>
        #menu .items li:nth-child(4) {
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


        <h3 class="i-name"> Add New Products</h3>

<div>
    
    <div class="row col-lg-11 border rounded mx-auto mt-5 p-2 shadow-lg">
			
        <div class="col-md-4 text-center">
            <img src="Products/1.jpg" class="js-image img-fluid rounded" style="width: 180px;height:180px;object-fit: cover;">
            <div>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Click below to select an image</label>
                  <input class="js-image-input form-control" type="file" id="formFile">
                </div>
                <div></div>
            </div>
        </div>

        <div class="col-md-8">
            
            <div class="h2"></div>

            
                <table class="table table-striped">
                    <tr><th colspan="2">Product Details:</th></tr>
                    <tr><th><i class="bi bi-envelope"></i> Product Name</th>
                        <td>
                            <input type="text" class="form-control" name="text" placeholder="Product Name">
                            
                        </td>
                    </tr>
                    <tr><th><i class="bi bi-person-circle"></i> Price</th>
                        <td>
                            <input type="text" class="form-control" name="text" placeholder="Price">
                            
                        </td>
                    </tr>
                    <tr><th><i class="bi bi-person-square"></i> Description</th>
                        <td>
                            <input type="text" class="form-control" name="text" placeholder="Description">
                            
                        </td>
                    </tr>
                    <tr><th><i class="bi bi-gender-ambiguous"></i> Catergory</th>
                        <td>
                            <select name="gender" class="form-select form-select mb-3" aria-label=".form-select-lg example">
                              <option value="">--Select Catergory--</option>
                              <option value="Male">Phones</option>
                              <option value="Female">Laptops</option>
                            </select>
                           
                        </td>
                    </tr>
                    
                    <tr><th><i class="bi bi-key"></i> Stock</th>
                        <td>
                            <input type="text" class="form-control" name="text" placeholder="Stock">
                            
                        </td>
                    </tr>
                    <tr><th><i class="bi bi-key-fill"></i> Brand</th>
                        <td>
                            <input type="text" class="form-control" name="text" placeholder="Brand">
                            
                        </td>
                    </tr>

                </table>

           

                <div class="p-2">
                    
                    <button class="btn btn-primary float-end">Save</button>
                    
                    

                </div>
        

        </div>
    </div>

</div>




    </section>


    <script>

        $('#menubtn').click(function () {
            $('#menu').toggleClass("active");
        })
    </script>

</body>

</html>