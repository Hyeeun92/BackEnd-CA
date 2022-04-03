<nav class="navbar navbar-inverse navabar-fixed-top">
  <div class="container">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a href="index.php" class="navbar-brand">Pet Store</a>
      </div>
      
      <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
              <?php
              session_start();
              if(isset($_SESSION) && isset($_SESSION['id'])){
              if($_SESSION['type'] == "admin"){  
              ?>
                <li><a href="addProduct.php"><span class="glyphicon glyphicon-plus"></span> Add product</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              <?php } else { ?>
              <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              <?php
              }}else{
              ?>
              <li><a href="signIn.php"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
              <li><a href="logIn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
              <?php
              }
              ?>
              
          </ul>
      </div>
  </div>
</nav>