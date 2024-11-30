
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/input copy.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <section class="content-container">
        <section class="nav-container" id="nav-container">
        <nav>
    <img src="logo/cobra_tour.svg" alt="Error" class="cobra-tour">
    <ul>
        <li class="clickable">
            <img src="icons/home.svg" alt="Error" class="nav-icon">
            <a href="home.php">Contents</a>
        </li>
        <li class="clickable">
            <img src="icons/map-map.png" alt="Error" class="nav-icon">
            <a href="map.php">Map</a>
        </li>
        <li class="clickable">
            <img src="icons/dashboard.svg" alt="Error" class="nav-icon">
            <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="clickable">
            <img src="icons/account.svg" alt="Error" class="nav-icon">
            <a href="account.php">Account</a>
        </li>
        <li class="clickable">
            <img src="icons/logout.svg" alt="Error" class="nav-icon">
            <a href="logout.php">Log out</a>
        </li>
    </ul>
</nav>
        </section>
        
    <?php include ('account_fetch.php')?>
        
        <script src="js/account.js"></script>
        <script src="js/acount-profile.js"></script>
        <script src="js/hover.js"></script>
    </section>
</body>
</html>
