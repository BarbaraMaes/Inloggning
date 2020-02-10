<?php 
include_once("../controllers/logout.php");

require("includes/head.php");
require("includes/nav.php");
?> 

<div class="container">
    <div class="row mt-5">
      <div class="col-md-6 m-auto">
        <div class="card card-body">
          <h1 class="text-center mb-3">
            Logout
          </h1>
          <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <button class="btn btn-block btn-danger" type="submit" name="logout">
              Logout
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>


<?php
require("includes/end.php");
?>