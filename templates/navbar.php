
<div id="header">
    <img src="logo.png" alt="logo" onclick="window.location.assign('aboutUs.php')">
    <div class="hMenu vMenu">
        <ul class="menu">
            <li class="menu-item" id="home">
                <a href="home.php">Home</a>
            </li>
            <li class="menu-item" id="profile">    
                <a href="myProfile.php" class="anc">My Profile</a>
            </li>
            <li class="menu-item" id="about">
                <a href="aboutUs.php" class="anc">About Us</a>
            </li>
            <li class="menu-item" id="contact">
                <a href="contactUs.php" class="anc">Contact Us</a>
            </li>
            <li class="menu-item" id="logout">
                <a href="index.php" id="logout">Log Out</a>
            </li>
        </ul>
    </div>
    <button class="but" onclick="toggleMenu()">
        <span class="material-symbols-outlined">
            menu
        </span>
    </button>
</div>