<?php 
include_once("../Controllers/login.php");

require("includes/head.php");
require("includes/nav.php");
?> 
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6 m-auto">
        <div class="card card-body">
          <h1 class="text-center mb-3">
            Login
          </h1>
          <?php if(isset($_SESSION["Exists"]))
              { ?>
              <p class="text-danger"><?php echo $_SESSION["Exists"] ?></p>
              <?php  unset($_SESSION["Exists"]);}
             ?>
          <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <div class="form-group">
              <label for="email">Email</label>
              <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                placeholder="Enter email"
                value="<?php echo htmlspecialchars($email)?>"
              />
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input
                type="password"
                id="password"
                name="password"
                class="form-control"
                placeholder="Enter Password"
                value="<?php echo htmlspecialchars($password)?>"
              />
            </div>
            <?php if(isset($_SESSION["pwd"]))
              { ?>
              <p class="text-danger"><?php echo $_SESSION["pwd"] ?></p>
              <?php unset($_SESSION["pwd"]);}
              ?>
            <button class="btn btn-block btn-success" type="submit" name="login">
              Login
            </button>
          </form>
          <p class="my-3"><a href="register.php">Register</a></p>
        </div>
      </div>
    </div>
  </div>
<?php
require("includes/end.php");
?>