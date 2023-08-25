<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>assets/components/bootstrap-5.3.1-dist/css/style.css">    
    <link rel="stylesheet" href="<?php echo URL?>assets/components/bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL?>assets/components/style.css">    
    <script type="text/javascript" src="<?php echo URL?>assets/components/bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
    <title>Create User</title>
</head>
<body>    
    <div class="container"><br>
    <h2 class="text-center">Create Account</h2><br>    
    <div class="form container-md">
        <form action="<?php echo URL?>/createUser/validarUsuario" method="POST">
            <label for="username"  class="form-label">Username</label><br>
            <input type="text" name="username" id="username" class="form-control"/><br>
            <label for="phone"  class="form-label">Phone</label><br>
            <input type="text" name="phone" id="phone" class="form-control"/><br>
            <label for="email"  class="form-label">Email</label><br>
            <input type="text" name="email" id="email" class="form-control"/><br>
            <label for="password"  class="form-label">Password</label><br>
            <input type="password" name="password" id="password" class="form-control"/><br>
            <input type="submit" name="submit" id="submit" class="btn btn-primary"/>
            <br>  
        </form>
    </div>
    </div>
</body>
</html>

<?php //../controller/userController.php //include_once("../controller/userController.php"); ?>