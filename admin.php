<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PlayTechSolutions - Account</title>
        <link rel="icon" href="ico.png">
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="ionicons.min.css">
        <link rel="stylesheet" href="style.css">
        

    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
            <div class="container">
                <img src="assets/img/webtoon-logo.png" alt="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span><i id="bar" class="fa fa-bars" aria-hidden="true"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
    
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link " href="shop.html">Shop</a>
                        </li>
    
    
                        <li class="nav-item">
                            <a class="nav-link " href="contact.html">Contact Us</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link " href="account.html">Account</a>
                        </li>
    
                        <li class="nav-item">
                            <i class="fa fa-search" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                            <i onclick="window.location.href='cart.html'"  class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <i onclick="window.location.href='whishlist.html'" class="fa fa-heart " aria-hidden="true"></i>
                        </li>
    
    
    
    
    
    
                    </ul>
    
                </div>
            </div>
        </nav>


<section class="background-radial-gradient overflow-hidden">
    
  
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            Play Tech Solutions <br />
            <span style="color: hsl(218, 81%, 75%)"> Admin Log In</span>
          </h1>
          
        </div>
  
        <div class="col-lg-6 mb-5 mb-lg-0 position-relative my-5 py-5">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
  
          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">



              <form id="login-form">
               <div class="form-outline mb-4">
                  <input type="email" id="username" class="form-control" value="admin@gmail.com" />
                  <label class="form-label" for="form3Example3">Email address</label>
                </div>
  <div class="form-outline mb-4">
                  <input type="password" id="password" class="form-control" value="password" />
                  <label class="form-label" for="form3Example4">Password</label>
                </div>
  
  
              
                <button onclick="k();" type="reset"  class="btn btn-primary btn-block mb-4">
                  Sign In
                </button>
  
              
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->


  



        
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Search Your Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" class="btn btn-outline-success">search</button>
    
                    
                  </div>
    
                  <div class="row">
    
                    <div class="col-4 mt-3">
                        <select data-filter="make" class="filter-make filter form-control">
                            <option value="">Categories</option>
                            <option value="">Phones</option>
                            <option value="">laptops</option>
                            <option value="">Mouse</option>
                            <option value="">Show All</option>
                        </select>
                      </div>
    
                      <div class="col-4 mt-3">
                        <select data-filter="make" class="filter-make filter form-control">
                            <option value="">OS</option>
                            <option value="">ios</option>
                            <option value="">mac</option>
                            <option value="">Windows</option>
                            <option value="">Show All</option>
                        </select>
                      </div>
    
                      <div class="col-4 mt-3">
                        <select data-filter="make" class="filter-make filter form-control">
                            <option value="">brand</option>
                            <option value="">Samsung</option>
                            <option value="">Apple</option>
                            <option value="">Asus</option>
                            <option value="">Show All</option>
                        </select>
                      </div>
        
    
    
                  </div>
    
    
                  <div class="row">
    
    
                      <div class="col-6 mt-3">
                        <input type="text" placeholder="Price From" class="form-control">
                      </div>
    
                      <div class="col-6 mt-3">
                        <input type="text" placeholder="Price To" class="form-control">
                      </div>
        
    
    
                  </div>
    
                  
    
                  
    
    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
              </div>
          </div>
        </div>
      </div>



        <footer class="footer-07">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <h2 class="footer-heading"><a href="#" class="logo">PlayTechSolutions.com</a></h2>
                        <p class="menu">
                            <a href="index.html">Home</a>
                            <a href="shop.html">SHOP</a>
                            <a href="cart.html">cart</a>
                            <a href="admin.html">Admin</a>
                            <a href="Signup.html">Register</a>
                            <a  href="contact.html">Contact Us</a>
                        </p>
                </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 text-center">
                        <p class="copyright">
                      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made by <a href="https://pasanswijekoon.github.io/About/" target="_blank">@pasanwijekoon</a>
                 
                    </div>
                </div>
            </div>
        </footer>


<script src="script.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
            integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
            integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
            crossorigin="anonymous"></script>
    </body>

</html>