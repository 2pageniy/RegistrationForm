<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentication</title>
</head>
<body>
<?php
    if($_COOKIE['user'] == ''):
?>
<section>
    <form class="row g-3 form-sign-in" method="post" action="validation-forms/authentication.php">
        <div class="row-auto">
            <label for="login" class="visually-hidden">Login</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Login">
        </div>
        <div class="row-auto">
            <label for="inputPassword2" class="visually-hidden">Password</label>
            <input type="password" class="form-control" id="inputPassword2" name="password" placeholder="Password">
        </div>
        <div class="row-auto">
            <input type="submit" class="btn btn-primary mb-3" value="Sign in">
        </div>
        <p class="new-account"><a href="signup.php">Create an account</a></p>
    </form>
</section>
    <?php else:
        require "blocks/logout.php";?>
    <p>Hello <?=$_COOKIE['user']?>, to logout click <a href="exit.php">here</a>.</p>
        <section>
            <form action="validation-forms/interaction-users.php" method="post">
                <div class="group-btn" role="group" aria-label="Basic example">
                    <label for="btn-unblock"><input type="submit" class="btn btn-warning" name="interaction" value="Block"></label>
                    <label for="btn-unblock"><img src="images/unblock-icon.png" alt="unblock icon" class="img-delete-icon"></label>
                    <input type="submit" class="visually-hidden" id="btn-unblock" name="interaction" value="Unblock">
                    <label for="btn-delete"><img src="images/delete-icon.png"  alt="delete icon" class="img-delete-icon"></label>
                    <input type="submit" class="visually-hidden" id="btn-delete" name="interaction" value="Delete">
                </div>

            <table class="users-table" cols="7">
                <caption>Users</caption>
                <tr>
                    <th><span style="font-size: 12px">Select all</span><br><input type="checkbox"id='checkAll'></th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registration date</th>
                    <th>Last login date</th>
                    <th>Status</th>
                </tr>
                <?php
                require "blocks/connect.php";

                if($mysql->connect_error){
                    die("Ошибка: " . $mysql->connect_error);
                }

                $sql = "SELECT * FROM `users`";
                if($result = $mysql->query($sql)) {
                    foreach($result as $row){
                        echo "<tr>";
                        echo "<td><input class='simple-checkbox' name=".$row["id"]." type='checkbox'></td>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["login"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["registrationDate"] . "</td>";
                        echo "<td>" . $row["lastLoginDate"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "</tr>";
                    }
                    $result->free();
                } else{
                    echo "Error: " . $mysql->error;
                }


                $mysql->close();
                ?>
            </table>
            </form>
        </section>
        <script type="text/javascript" src="javascript/index.js" ></script>
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>