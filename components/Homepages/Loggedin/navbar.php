<?php require("./User/getUser.php") ?>

<nav class="nav">
    <a class="navbar-brand" href="index.php"><span class="fw-bolder text-primary">QuickDocs</span></a>
    <div class="" id="navbarSupportedContent">
        <ul>
            <img src="<?php echo $profilePicture; ?>" alt="Profile Picture">
            <p>
                <?php echo $_COOKIE['name']; ?>
            </p>
        </ul>
        <ul onclick="logout()">
            <img src="https://th.bing.com/th/id/R.787d2226247378d88e91ab8d8217d7c4?rik=2H888hs88sYctg&riu=http%3a%2f%2fclipground.com%2fimages%2flogout-clipart-13.jpg&ehk=YB4lyDAzefejPNekO8XC86ies9qqUt3Gsn41599p2%2fI%3d&risl=&pid=ImgRaw&r=0"
                alt="Logout">
        </ul>
    </div>
</nav>


<!-- scripts -->

<script>

    function logout() {
        window.location.href = "./php/logout.php";
    }

</script>