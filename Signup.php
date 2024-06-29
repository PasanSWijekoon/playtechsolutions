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
  <title>PlayTechSolutions - Home</title>
  <link rel="icon" href="assets/img/ico.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/style.css">


</head>

<body>

<?php include "includes/header.php";?>

  <section class="background-radial-gradient overflow-hidden">


    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Play Tech Solutions<br />
            <span style="color: hsl(218, 81%, 75%)">Sign Up</span>
          </h1>
          <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
            The Register page allows a user to Create New Account to gain access to our shop by entering their username Password So
            Please Register to Continue Access Our Services
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative my-5 py-5">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">

              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="f" class="form-control" />
                    <label class="form-label" for="form3Example1">First name</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="l" class="form-control" />
                    <label class="form-label" for="form3Example2">Last name</label>
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="e" class="form-control" />
                <label class="form-label" for="form3Example3">Email address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="p" class="form-control" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="mob" class="form-control" />
                    <label class="form-label" for="form3Example1">Mobile</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">

                    <select name="cars" id="g" class="form-control">
                      <option value="Select">Select</option>
                      <?php
                      $rs = Database::search("SELECT*FROM`gender`");
                      $n = $rs->num_rows;

                      for ($x = 0; $x < $n; $x++) {
                        $d = $rs->fetch_assoc();

                      ?>

                        <option value="<?php echo $d["id"]; ?>"><?php echo $d["gender_name"]; ?></option>

                      <?php

                      }


                      ?>
                    </select>
                    <label class="form-label" for="form3Example2">Gender</label>
                  </div>
                </div>
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                <p class="mb-0">Already have an account? <a href="Signin.php" class="text-black-50 fw-bold">Sign
                    In</a>
                </p>
              </div>

              <!-- Submit button -->
              <button onclick="signUp();" class="btn btn-primary btn-block mb-4">
                Sign up
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


  <?php include "includes/footer.php";?>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="assets/js/script.js"></script>
  <script src="https://accounts.google.com/gsi/client" async></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>