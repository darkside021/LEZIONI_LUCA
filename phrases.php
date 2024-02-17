<?php
include "database.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM phrases WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);

$sql_users = "SELECT id, full_name FROM users";
$result_users = mysqli_query($conn, $sql_users);
$users = [];
while ($row = mysqli_fetch_assoc($result_users)) {
    $users[$row['id']] = $row['full_name'];
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
        
    <table>
        <tr>
            <th>Sender</th>
            <th>Content</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td>
                    <?php
                    if ($row['created_by'] == $_SESSION['user_id']) {
                        echo "Admin";
                    } else {
                        echo $users[$row['created_by']];
                    }
                    ?>
                </td>
                <td><?php echo $row['content']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <!-- swiper js link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- custom js file link -->
    <script src="script.js"></script>

    <body>

</html>



