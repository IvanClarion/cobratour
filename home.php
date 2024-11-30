
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
<section class="add-sec" id="add-section">
    <div class="add-container" id="drop-area"> 
        <form class="add-form" action="main_contents.php" method="POST" enctype="multipart/form-data" id="add-dis">
            <img src="icons/x-mark.png" alt="Error" class="x-mark1" id="escape">
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
<!-- REMOVE ALL -->
<section id="remove-form" class="delete-sec">
    <div class="add-container">
        <form class="add-form" action="remove_all.php" method="POST" id="remove-dis">
            <img src="icons/x-mark.png" alt="Error" class="x-mark1" id="deletemark">
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

<!-- Search Form -->
<h1>CONTENTS</h1>
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

<!-- DELETE CONTENT-->



<section class="sort-sec sort-container">
<h3>CONTENTS</h3>
    <!-- Sorting Buttons -->
<!--<button class="sort-btn" id="sort-first">
    <img src="icons/sort.png" alt="Error" class="icon-button">
    Sort by First
    <img src="icons/sort-arrow.png" alt="Error" class="icon-button">
</button>

<button class="sort-btn" id="sort-last">
    <img src="icons/sort.png" alt="Error" class="icon-button">
    Sort by Last
    <img src="icons/sort-arrow.png" alt="Error" class="icon-button angle-sort">
</button>-->
    <a href="content.php">
    <button class="edit-view" id="edit-view" >
    <img src="icons/other.png" alt="Error" class="icon-button">
    Floor Map
</button>
    </a>
</section>
<section id="contents">
    <div id="data-table">
        <table>
            <tbody id="table-body">
                <!-- Fetched data will be inserted here -->
            </tbody>
        </table>
    </div>
</section>

<!--<section class="main-view-sec" id="main-view">
    <div class="main-view-container">
        <img src="logo/SWU_LOGO.png" class="logo">
        <h1>Name</h1>
        <button class="mainv-btn" id="main-floor">
            <img src="icons/view-btn.png" alt="Error" class="icon-button">
        </button>
    </div>
</section>
<section class="main-view-sec1" id="main-view2">
    <div class="main-view-container1">
    <h1>Name</h1>
    <img src="logo/SWU_LOGO.png" class="logo">
        <form action="" method="" enctype="multipart/form-data">
        <h4>Floor Map:</h4>
        <input type="file" name="floorMap" id="floor-img">
        </form>
        <div class="distination-container" id="distination-container">
            <div class="distination-display" id="sliders">
                <img src="destination/canteen.jpg" alt="Error" class="over-img">
                <img src="destination/canteen.jpg" alt="Error" class="over-img">
            </div>
        </div>
</section>-->
</section>
<script src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/ajax.js"></script>
<script src="js/show_content.js"></script>
<script src="js/hover.js"></script>
<script src="js/floorplan.js"></script>
<script src="js/sort.js"></script>
<script src="js/modal-script.js"></script>
<script src="js/remove_all.js"></script>
<script src="js/drag-drop.js"></script>
</body>
</html>
