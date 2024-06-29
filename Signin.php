<?php



session_start();
if(isset($_SESSION["u"])){


    header("location:profile.php");
    exit();
} else if (isset($_SESSION["jsonData"])) {

    header("location:profile.php");
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PlayTechSolutions - Login</title>
  <link rel="icon" href="assets/img/ico.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>

  <?php include "includes/header.php"; ?>

  <!-- Section: Design Block -->
  <section class="background-radial-gradient overflow-hidden">


    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            Play Tech Solutions<br />
            <span style="color: hsl(218, 81%, 75%)">Log In</span>
          </h1>
          <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
            The login page allows a user to gain access to an application by entering their username Password So Please Login to Continue Access Our Services
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative my-5 py-5">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">

              <?php

              $email = "";
              $password = "";

              if (isset($_COOKIE["email"])) {
                $email = $_COOKIE["email"];
              }
              if (isset($_COOKIE["password"])) {
                $password = $_COOKIE["password"];
              }



              ?>


              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="email2" class="form-control" value="<?php echo $email; ?>" />
                <label class="form-label" for="form3Example3">Email address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="password2" class="form-control" value="<?php echo $password; ?>" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">

                    <input class="form-check-input" type="checkbox" id="rememberme">
                    <label class="form-check-label" for="flexCheckDefault"> Remember Me</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <a href="#" class="link-primary" onclick="forgotPassword();">Forgot Password?</a>
                  </div>
                </div>
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                <p class="mb-0">Don't have an account? <a href="Signup.php" class="text-black-50 fw-bold">Sign Up</a>
                </p>
              </div>

              <!-- Submit button -->

              <button onclick="signIn();" class="btn btn-primary btn-block mb-4">
                Sign In
              </button>

              <div id="g_id_onload" data-client_id="CLIENT_ID.apps.googleusercontent.com" data-context="signin" data-ux_mode="popup" data-callback="handleCredentialResponse" data-auto_prompt="false">
              </div>

              <div class="g_id_signin" data-type="standard" data-shape="rectangular" data-theme="outline" data-text="signin_with" data-size="large" data-logo_alignment="left">
              </div>
              <br>
              <!-- Display the user's profile info -->
              <div class="pro-data hidden"></div>
              <div class="col-12 d-none" id="msgdiv">
                <div class="alert alert-danger" role="alert">
                  <i class="bi bi-x-octagon-fill fs-5" id="msg">


                  </i>

                </div>


              </div>




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


   <!-- modal -->

   <div class="modal" tabindex="-1" id="forgotPasswordModel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reset Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class=" row g-3">
                                <div class=" col-6">
                                    <label class=" form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="npi">
                                        <button class="btn btn-outline-primary" type="button"  onclick="showPassword();"><i class="bi bi-eye-slash-fill" id="npb"></i></button>
                                    </div>
                                </div>
                                <div class=" col-6">
                                    <label class=" form-label">Re-type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rpi">
                                        <button class="btn btn-outline-primary" type="button"  onclick="showPassword2();"><i class="bi bi-eye-slash-fill" id="rpb"></i></button>
                                    </div>
                                </div>
                                <div class=" col-12">
                                    <label class=" form-label">Verification Code</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="vc">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetpw();">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>

        <!-- modal -->



  <?php include "includes/footer.php"; ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="assets/js/script.js"></script>
  <script src="https://accounts.google.com/gsi/client" async></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>

