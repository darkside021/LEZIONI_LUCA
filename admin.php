<?php
include "database.php";

// Avvia la sessione
session_start();

// Controlla se il modulo è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $recipient_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $created_by = $_SESSION['user_id']; // L'admin è il creatore del messaggio

    $sql = "INSERT INTO phrases (content, user_id, created_by) VALUES ('$content', '$recipient_id', '$created_by')";
    if (mysqli_query($conn, $sql)) {
        echo "Frase inserita con successo!";
    } else {
        echo "Errore: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- font cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <!--header section starts -->
    <section class="header">
    <a href="home.php" class="logo"><div class="message">Il sito fatto apposta per te <span class="heart">&hearts;</span></div></a>
<nav class="navbar">
            <a href="home.php">home</a>
            <a href="my_account.php">Account</a>
            <a href="logout.php">logout</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </section>

    <!-- header section ends -->
<!-- Form per inserire una nuova frase -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="created_by" value="<?php echo $_SESSION['user_id']; ?>">
        Content: <input type="text" name="content" placeholder="Inserisci qui la tua frase..."><br>
        Recipient ID: <input type="text" name="user_id"><br>
        <input type="submit">
    </form>


    <!-- swiper js link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- custom js file link -->
    <script src="script.js"></script>

    <body>

</html>




