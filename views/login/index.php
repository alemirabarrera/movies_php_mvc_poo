
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>assets/components/bootstrap-5.3.1-dist/css/style.css">    
    <link rel="stylesheet" href="<?php echo URL?>assets/components/bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL?>assets/components/style.css">    
    <script type="text/javascript" src="<?php echo URL?>assets/components/bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>
<body>
    <div>
        <?php              
        ?>
    </div>
    <div class="form container-md">
        <br><h2>Login</h2> 
        <form action="<?php echo URL?>/login/SingIn" method="POST">
            <label for="username"  class="form-label">Username</label><br>
            <input type="text" name="username" id="username" class="form-control"/><br>
            <label for="password"  class="form-label">Password</label><br>
            <input type="password" name="password" id="password" class="form-control"/><br>
            <input type="submit" name="submit" id="submit" class="btn btn-primary"/>
        </form>                
        <a href="<?php echo URL?>createUser">Create a new Account</a>
    </div>

</body>
</html>