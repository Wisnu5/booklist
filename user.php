
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

$username = $_SESSION['username'];

$pdo = new PDO('pgsql:host=localhost;dbname=basdat', 'postgres', 'roufth29');
$statement = $pdo->prepare("SELECT fullname, email, username FROM users WHERE username = :username");
$statement->execute(array(':username' => $username));
$user = $statement->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <div class="container">
        <h2>Data Pengguna</h2>
        <div class="user-info">
            <h2><?php echo $user['fullname']; ?></h2>
            <p>Email: <?php echo $user['email']; ?></p>
            <p>Username: <?php echo $user['username']; ?></p>
        </div>
        <div class="edit-user">
            <button onclick="window.location.href='edituser.php'">Edit Profile</button>
        </div>
        <div class="back-btn">
            <iconify-icon icon="icon-park:back" width="35" height="35" onclick="window.location.href='dashboard.php'"></iconify-icon>
        </div>
        <div class="logout-btn">
            <iconify-icon icon="majesticons:logout" width="35" height="35" onclick="window.location.href='logout.php'"></iconify-icon>
        </div>
            <p>User Activity</p>
        </div>
    </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>
</html>

