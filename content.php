<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="css/account.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style2.css">
        <link rel="stylesheet" href="css/input copy.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/remove-record.js"></script>
    </head>
<body>
<!-- Add Content Section -->
<section class="add-sec" id="add-section" style="display:none;">
    <div class="add-container">
        <form class="add-form" action="main_contents.php" method="POST" enctype="multipart/form-data" id="add-dis">
            <img src="icons/x-mark.png" alt="Error" class="x-mark" id="escape">
            <div class="new-gen">
                <img src="icons/map.png" alt="Error" class="add-img2" id="image-preview">
                <span class="new-gen2">
                <button id="profile-btn">Add Profile</button>
                <input type="file" name="main_profile" id="main_profile" accept="image/*" hidden required> <br>
                </span>
                <span class="br-submit">
                    <label class="add-label">Building/Facility:</label>
                    <input type="text" name="building_name" placeholder="Building Name" class="add-style" required> <br>
                    <label class="add-label">Building Department:</label>
                    <input type="text" name="building_classification" placeholder="Ex: I.T Department"><br>
                    <label class="add-label">Building Description:</label>
                    <input type="text" name="building_description" placeholder="Description"><br>
                    <input type="submit" value="Save" id="addFile" class="br-submit"><br>
                </span>
            </div>
        </form>
    </div>
</section>
<!-- DELETE CONTENT-->
<section id="remove-form" class="delete-sec">
    <div class="add-container">
        <form class="add-form" action="remove_all.php" method="POST" id="remove-dis">
            <img src="icons/x-mark.png" alt="Error" class="x-mark" id="deletemark">
            <div style="text-align: center;">
                <img src="icons/delete_all.png" alt="Error" class="add-img2">
                <br>
                <h1 class="add-label">Are you sure to delete all of the content?</h1>
                <span class="delete-span">
                    <button type="button" id="CancelFile" class="cancel-btn br-submit">Cancel</button>
                    <input type="submit" name="DeletFile" value="Delete" id="DeletFile" class="br-submit">
                </span>
            </div>
        </form>        
    </div>
</section>
<!-- EDIT FORM-->

<section class="content-container">
<section class="nav-container" id="nav-container">
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
                <a href="account.php">Account</a>
            </li>
            <li>
                <img src="icons/logout.svg" alt="Error" class="nav-icon">
                <a href="logout.php">Log out</a>
            </li>
        </ul>
    </nav>
</section>
<!-- Search Form -->
<section id="search-section" class="search-section">
    <form class="search-form" id="searchForm">
        <h1 class="search-text">HOME</h1>
        <input type="search" placeholder="Search" name="searchQuery" class="search-bar" id="searchInput">
    </form>
</section>
<!-- Add Content Button -->
<section class="content-btn" id="content-btn">
    <button id="add-btn" class="first-btn">
        <img src="icons/add.png" alt="Error" class="add-btn" >
        Add Content
    </button>
    <button id="removeall-btn" class="first-btn">
        <img src="icons/add.png" alt="Error" class="add-btn angle">
        Delete All
    </button>
</section>
<section class="sort-sec sort-container">
<a href="home.php">
    <button class="edit-view" id="edit-view" >
    <img src="icons/back-arrow.png" alt="Error" class="icon-button">
</button>
    </a>
</section>
<script src="js/script.js"></script>
<script src="js/remove_all.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/ajax.js"></script>
<script src="js/show_content.js"></script>
<script src="js/hover.js"></script>
<script src="js/floorplan.js"></script>
<script src="js/sort.js"></script>
<script src="js/modal-script.js"></script>
</body>
</html>
<?php include('floor-fetch.php');?>
</section>