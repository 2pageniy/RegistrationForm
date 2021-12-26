<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <meta charset="UTF-8">
    <title>Registration</title>
</head>
<body>

<?php
    if($_COOKIE['user'] == ''):
?>
<section>
    <form class="row g-3 form-sign-in" method="post" action="validation-forms/registration.php">
        <div class="row-auto">
            <label for="login" class="visually-hidden">Login</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Login">
        </div>
        <div class="row-auto">
            <label for="staticEmail2" class="visually-hidden">Email</label>
            <input type="text" class="form-control" id="staticEmail2" name="email" placeholder="email@example.com">
        </div>
        <div class="row-auto">
            <label for="inputPassword" class="visually-hidden">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
        </div>
        <div class="row-auto">
            <label for="repeat-inputPassword" class="visually-hidden">Password</label>
            <input type="password" class="form-control" id="repeat-inputPassword" name="repeat-password" placeholder="Repeat password">
        </div>
        <div class="row-auto">
            <input type="submit" class="btn btn-primary mb-3" value="Sign up">
        </div>
        <p class="new-account">You have account?<a href="index.php"> Sign in</a></p>
    </form>
</section>
    <?php
    else:header('Location: /');
    endif;
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>