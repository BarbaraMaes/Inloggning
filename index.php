<?php

require("views/includes/head.php");
require("views/includes/nav.php");
?>

<div class="container">
    <div class="row mt-5">
      <div class="col-md-6 m-auto">
        <div class="card-body text-center">
          <h1 class="my-3">
            <i class="fas fa-star fa-2x"></i
            ><i class="fas fa-star-half-alt fa-2x"></i
            ><i class="far fa-star fa-2x"></i>
          </h1>
          <p class="lead">Create an account or login</p>
          <a href="views/register.php" class="btn btn-primary btn-block mb-2"
            >Register</a
          >
          <a href="views/login.php" class="btn btn-secondary btn-block">Login</a>
        </div>
      </div>
    </div>
  </div>

  <?php

require("views/includes/end.php");
?>
