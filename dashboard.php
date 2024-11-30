<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <title>Dashboard</title>
    <link rel="icon" href="logo/COBRA_LOGO.png" type="image/png">
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
<h1>DASHBOARD</h1>
<section class="chart-section">
    <div class="chart-display">
        <canvas id="Users"></canvas>
    </div>
    <div class="chart-display">
        <canvas id="total_user"></canvas>
    </div>
</section>
<section class="chart-section">
    <div class="chart-display">
        <canvas id="total_rating"></canvas>
    </div>
</section>
<section class="data-section">
    <div class="data-container">
        <img src="icons/all.png" alt="Error" class="data-img">
        <?php include ("total_blg.php"); ?>
        <label>Total Location: <?php echo htmlspecialchars($latest_id); ?></label>
    </div>
    <div class="data-container">
        <img src="icons/user.png" alt="Error" class="data-img">
        <?php include ("total_user.php"); ?>
        <label>Total Users:<?php echo htmlspecialchars($latest_id); ?></label>
    </div>
</section>
<section class="data-btn-dis">
    
    <div class="data-btn">
        <button id="statistics-btn">  
            <img src="icons/icons8-line-chart-16.png" alt="Error">
            <label>Statistics</label>
        </button>
        <button id="feedback-btn">
            <img src="icons/icons8-feedback-16.png" alt="Error" class="data-icon">
            <label>Feedback</label>
        </button>
        <button id="rating-btn">
            <img src="icons/icons8-feedback-16.png" alt="Error" class="data-icon">
            <label>Ratings</label>
        </button>
    </div>
</section>

<section class="data-table statistics-display">
    <table id="statistics">
        <tbody>
            <?php include("fetch_survey.php"); ?>
        </tbody>
    </table>
</section>
<section class="data-table feedback-display">
    <table id="Feedback">
        <tbody>
            <?php include ("fetch_feedback.php");?>
        </tbody>
    </table>
</section>
<section class="data-table feedback-display1">
    <table id="Rating-bldg">
        <tbody>
            <?php include ("fetch_rating.php");?>
        </tbody>
    </table>
</section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/ajax_feedback.js"></script>
    <script src="js/user.js"></script>
    <script src="js/total_user.js"></script>
    <script src="js/table.js"></script>
    <script src="js/remove.js"></script>
    <script src="js/hover.js"></script>
    <script src="js/total_rating.js"></script>
</body>