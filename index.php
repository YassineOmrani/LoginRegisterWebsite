    <?php require_once 'inc/header.php'; ?>
    <?php require_once 'init.php'; ?>
    <?php require_once 'inc/navbar.php'; ?>

    <div class="container text-center" id="container">
        <h2>Hello today is <?php echo date('d'.'/'.'m'.'/20'.'y'); ?></h2>
        <h3>Would you like to <a href="Login.php">Login</a> Or <a href="Register.php">Register</a></h3>
    </div>
   

    <?php include("inc/footer.php"); ?>
