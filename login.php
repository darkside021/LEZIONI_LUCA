
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="stylelog.css">
</head>
<body>
    <div class="container">
    <?php
session_start();
if (isset($_POST["login"])) {
    $full_name = $_POST["name"]; // Cambia "full_name" in "name"
    $password = $_POST["password"];

    require_once "database.php";
    $sql = "SELECT * FROM users WHERE full_name = '$full_name'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($user) {
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"]; // Memorizza l'ID dell'utente nella sessione
            header("Location: home.php");
            die();
        } else {
            echo "<div class='alert alert-danger'>Password does not match</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Nome does not match</div>";
    }
}
?>
<!-- Resto del tuo codice -->
    <h2><center>Login per Melania</center></h2>
    <h6><center>Solo tu puoi entrare, inserisci pure i dati di login</center></h6>

      <form action="login.php" method="post">
        <div class="form-group">
            <input type="text" placeholder="Nome:" name="name" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Parola d'ordine:" name="password" class="form-control">
        </div>


        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
    </div>

    
</body>
</html>
