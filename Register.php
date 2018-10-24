    <?php
        require_once 'inc/header.php';
    ?>
    <?php
        require_once 'inc/navbar.php';
    ?>
    <?php
        require_once 'init.php'; 
    ?>
    <form class="js-register" method='POST' action="process.php">
      <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="name" class="form-control"  aria-describedby="emailHelp" name="Name" placeholder="Enter name">
        </div>
      <div class="form-group">
          <label for="exampleInputPassword1">E-mail</label>
          <input type="email" class="form-control"  placeholder="Enter E-mail" name="Email">
      </div>
      <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="username" class="form-control"  aria-describedby="emailHelp" name="Username" placeholder="Enter username">
      </div>
      <div class="form-group">
          <label for="exampleInputEmail1">Password</label>
          <input type="password" class="form-control"  aria-describedby="emailHelp" name="Password" placeholder="Enter password">
      </div>
      <div class="form-group">
          <label for="exampleInputEmail1">Website</label>
          <input type="text" class="form-control"  aria-describedby="emailHelp" name="Password" placeholder="Enter website">
      </div>
      <div class="js-error alert alert-danger" style="display:none;">
      
      </div>
      <br>
      <button name="submit" type="submit" class="btn btn-primary">register</button>
      <input type="submit">
</form>
   <?php include("inc/footer.php"); ?>