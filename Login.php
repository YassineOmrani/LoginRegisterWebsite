    <?php
        require_once 'inc/header.php';
    ?>
    <?php
        require_once 'inc/navbar.php';
    ?>
    <?php
        require_once 'init.php'; 
    ?>
    <form action="" class="js-login" >
  <div class="form-group">
    <label for="usename">Username</label>
    <input type="text" class="form-control" name="Username" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  
  <?php include("inc/footer.php"); ?>
