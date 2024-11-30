
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Super Admin</title>
        <link rel="stylesheet" href="css/account.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style2.css">
        <link rel="stylesheet" href="css/input copy.css">
        <link rel="stylesheet" href="css/super.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/remove-record.js"></script>
    </head>
<body>
<section class="add-account" id="s-add"  style="display:none;">
    <div class="s-addcontainer">
    <img src="icons/x-mark.png" alt="Error" class="s-xmark" id="s-mark">
    <img src="icons/editing.png" alt="Error" class="account-icon" >
    <h1>ADD ACCOUNT</h1>
    <form class="form-s24"  action="super-add.php" method="POST">
        <input type="text" placeholder="Name" name="name" class="new-user"><br>
        <input type="text" placeholder="Username" name="s-username" class="new-user"><br>
        <input type="password" placeholder="Password" name="s-password"><br>
        <input type="submit" value="Save" class="s-save">
    </form>
    </div>
</section>
<section class="content-container">
<section class="nav-container" id="nav-container" >
    <nav>
        <img src="logo/cobra_tour.svg" alt="Error" class="cobra-tour">
        <ul>
            <li>
                <img src="icons/home.svg" alt="Error" class="nav-icon">
                <a href="home.php">Contents</a>
            </li>
            <li>
                <img src="icons/map-map.png" alt="Error" class="nav-icon">
                <a href="map.php">Map</a>
            </li>
            <li>
                <img src="icons/dashboard.svg" alt="Error" class="nav-icon">
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li>
                <img src="icons/account.svg" alt="Error" class="nav-icon">
                <a href="super-account.php">Account</a>
            </li>
            <li>
                <img src="icons/logout.svg" alt="Error" class="nav-icon">
                <a href="logout.php">Log out</a>
            </li>
        </ul>
    </nav>
</section>
<h1>CONTROL ADMIN</h1>
<!--ADD USER -->
<section class="s-section" id="s-add1">
    <button class="s-button">
        <img src="icons/add-user.png" alt="Error">
        Add Account
    </button>
</section>
<?php include('super_account.php');?>
</section>
<script src="js/super-acc.js"></script>
<script>
</script>
</body>
</html>