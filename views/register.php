<?php 

require "../classes/User.php";
session_start();

$name = $email = $password = $confirm = "";

if(isset($_POST["register"]))
{
  //get vars
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirm = $_POST["confirm"];

  $data = ["name" => $name, "email" => $email, "password" => $password, "confirm" => $confirm];

  $user = new User();
  $user->createUser($data);

}

require("includes/head.php");
require("includes/nav.php");
?> 
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6 m-auto">
        <div class="card card-body">
          <h1 class="text-center mb-3">
            Register
          </h1>
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
          <div class="form-group">
              <label for="username">Username</label>
              <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                placeholder="Enter Username"
                value="<?php echo htmlspecialchars($name)?>"
                required
              />
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                placeholder="Enter email"
                value="<?php echo htmlspecialchars($email)?>"
                required
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
                required
              />
              <?php if(isset($_SESSION["Error"]))
              { ?>
              <p class="text-danger"><?php echo $_SESSION["Error"] ?></p>
              <?php } ?> 
              
            </div>
            <div class="form-group">
              <label for="confirm">Confirm Password</label>
              <input
                type="password"
                id="confirm"
                name="confirm"
                class="form-control"
                placeholder="Confirm Password"
                value="<?php echo htmlspecialchars($confirm)?>"
                required
              />
              <?php if(isset($_SESSION["Error"]))
              { ?>
              <p class="text-danger"><?php echo $_SESSION["Error"] ?></p>
              <?php }
              unset($_SESSION["Error"]);?> 
            </div>
            <button class="btn btn-block btn-success" type="submit" name="register">
              Register
            </button>
          </form>
          <p class="my-3"><a href="login.php">Login</a></p>
        </div>
      </div>
    </div>
  </div>
<?php
require("includes/end.php");
?>