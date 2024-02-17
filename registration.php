<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: registration.php");
}
require_once "database.php"; // Includi il file database.php
?>
<!-- Resto del tuo codice -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="stylelog.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <?php
            if (isset($_POST["submit"])) {
                $full_name = $_POST["full_name"];
                $password = $_POST["password"];
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (full_name, password) VALUES (?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "ss", $full_name, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>You are registered successfully.</div>";
                } else {
                    die("Something went wrong");
                }
            }
            ?>
            <h2>
                <center>Registrazione solo per te</center>
            </h2>
            <form action="registration.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="full_name" placeholder="Nome:">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Parola d'ordine:">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="repeat_password" placeholder="Riscrivi Parola d'ordine:">
                </div>
                <div class="form-btn">
                    <input type="submit" class="btn btn-primary" value="Register" name="submit">
                </div>
            </form>
            <div>
                <div>
                    <p>Already Registered <a href="login.php">Login Here</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>