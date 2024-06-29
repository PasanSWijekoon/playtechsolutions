<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
  <div class="container">
    <img src="assets/img/Logo.png" alt="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span><i id="bar" class="fa fa-bars" aria-hidden="true"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="shop.php">Shop</a>
        </li>


        <li class="nav-item">
          <a class="nav-link " href="contact.php">Contact Us</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="profile.php">Account</a>
        </li>

        <li class="nav-item">
          <i class="fa fa-search" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
          <i onclick="window.location.href='cart.php'" class="fa fa-shopping-cart" aria-hidden="true"></i>
          <i onclick="window.location.href='whishlist.php'" class="fa fa-heart " aria-hidden="true"></i>
        </li>






      </ul>

    </div>
  </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search Your Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="searchForm" action="searchResults.php" method="GET">
          <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="t" name="t" />
            <button type="submit" class="btn btn-outline-success">Search</button>
          </div>
          <div class="row">
            <div class="col-4 mt-3">
              <select data-filter="make" class="filter-make filter form-control" id="c1" name="cat">
                <option value="0">Category</option>
                <?php
                require "connection.php";
                $category_rs = Database::search("SELECT*FROM `category`");
                $category_num = $category_rs->num_rows;
                for ($x = 0; $x < $category_num; $x++) {
                  $category_data = $category_rs->fetch_assoc();
                ?>
                  <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="col-4 mt-3">
              <select data-filter="make" class="filter-make filter form-control" id="b" name="b">
                <option value="0">Brand</option>
                <?php
                $brand_rs = Database::search("SELECT*FROM `brand`");
                $brand_num = $brand_rs->num_rows;
                for ($x = 0; $x < $brand_num; $x++) {
                  $brand_data = $brand_rs->fetch_assoc();
                ?>
                  <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"]; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="col-4 mt-3">
              <select data-filter="make" class="filter-make filter form-control" id="m" name="m">
                <option value="0">Model</option>
                <?php
                $model_rs = Database::search("SELECT*FROM `model`");
                $model_num = $model_rs->num_rows;
                for ($x = 0; $x < $model_num; $x++) {
                  $model_data = $model_rs->fetch_assoc();
                ?>
                  <option value="<?php echo $model_data["id"]; ?>"><?php echo $model_data["name"]; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="col-4 mt-3">
              <select data-filter="make" class="filter-make filter form-control" id="c2" name="con">
                <option value="0">Condition</option>
                <?php
                $condition_rs = Database::search("SELECT*FROM `condition`");
                $condition_num = $condition_rs->num_rows;
                for ($x = 0; $x < $condition_num; $x++) {
                  $condition_data = $condition_rs->fetch_assoc();
                ?>
                  <option value="<?php echo $condition_data["id"]; ?>"><?php echo $condition_data["name"]; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="col-4 mt-3">
              <select data-filter="make" class="filter-make filter form-control" id="c3" name="col">
                <option value="0">Colour</option>
                <?php
                $colour_rs = Database::search("SELECT*FROM `colour`");
                $colour_num = $colour_rs->num_rows;
                for ($x = 0; $x < $colour_num; $x++) {
                  $colour_data = $colour_rs->fetch_assoc();
                ?>
                  <option value="<?php echo $colour_data["id"]; ?>"><?php echo $colour_data["name"]; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-6 mt-3">
              <input type="text" id="pf" name="pf" placeholder="Price From" class="form-control">
            </div>
            <div class="col-6 mt-3">
              <input type="text" id="pt" name="pt" placeholder="Price To" class="form-control">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
