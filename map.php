
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="css/account.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style3.css">
        <link rel="stylesheet" href="css/input copy.css">
        <link rel="stylesheet" href="css/map.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/remove-record.js"></script>
        <script src="js/add-on.js"></script>
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
<section id="search-section" class="search-section">
    <form class="search-form" id="searchForm">
        <h1 class="search-text">MAP</h1>
        <input type="search" placeholder="Search" name="searchQuery" class="search-bar" id="searchInput">
    </form>
</section>
<!-- add map-->
<section class="map-add-sec">
    <button class="map-button" id="add-map">ADD MAP</button>
    <button class="map-button remove-sub143" id="removeall-map">REMOVE ALL</button>
 </section>
 <!--main map-->
 <?php include ("fetch_map.php");?>
 <!-- 
<section class="map-sec">
    <div class="map-container">
        <span class="map-img-container">
        <img src="icons/3d-map.png" alt="Error" class="map-img">
        </span>
        <h1>[map_name]</h1>
        <button class="map-button" id="view-map">View</button>
    </div>
    <div class="map-container2" id="container-map" style="display: none;">
        <span class="map-label">
        <h1>map_name</h1>
        <h6>id</h6>
        </span>
        <div class="map-align">
        <span class="span-icon">
        <button id="map-add" class="map-icon1">
            <img src="icons/add-map.png" alt="Error" class="map-icon">
            Add Map
            <form action="" method="" id="addMap-click">
            <input type="file" name="AddMap" hidden>
            </form>
        </button>
        <button id="map-add" class="map-icon1">
            <img src="icons/remove-map.png" alt="Error" class="map-icon">
            Remove Map
            <form action="" method="" id="removeMap-click">
                <input type="file" name="RemoveMap" hidden>
            </form>
        </button>
        </span>
        <div class="map-area">
             image of map
             <img src="destination/classroom.jpg" class="final-map">
        </div>
        <span class="icon-align">
        <button id="Delete-sec" class="map-icon1">
            <img src="icons/delete-final.png" alt="Error" class="map-icon">
            Delete Section
            <form action="" method="" id="removeMap-click">
                <input type="file" name="RemoveMap" hidden>
            </form>
        </button>
        </span>
    </div>
</section>-->
</section>
<section class="add-map-sec" id="show-form1">
    <div class="add-map-container">
        <img src="icons/x-mark.png" alt="Error" class="mark-esc" id="map-esc">
        <img src="icons/female-map.png" alt="Error" class="map-add-form">
        <form action="map_add.php" method="POST" id="map-add-form" class="map-text" enctype="multipart/form-data">
        <span class="span-form">
        <input type="text" placeholder="Enter Map Name" name="map-name" required> <br>
        <input type="file" name="map_img" accept="image/*" required><br>
        <input type="submit" value="Save Map" name="save-map" class="save-map"><br> 
        </form>
        </span>     
    </div>
</section>
<section id="discard-map" class="delete-sec">   
    <div class="add-container">
        <form class="add-form" action="removemap_all.php" method="POST">
            <img src="icons/x-mark.png" alt="Error" class="x-mark1" id="deletemark">
            <div style="text-align: center;">
                <img src="icons/delete_all.png" alt="Error" class="add-img2">
                <br>
                <h1 class="add-label">Are you sure to delete all of the content?</h1>
                <span class="delete-span">
                    <input type="submit" name="DeletFile" value="Delete" id="DeletFile" class="br-submit">
                </span>
            </div>
        </form>        
    </div>
</section>
</section>
<script src="js/map.js"></script>
<script src="js/hover.js"></script>
<script src="js/remove_all.js"></script>
</body>
</html>