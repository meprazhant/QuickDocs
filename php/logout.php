<?php
setCookie("name", "", time() - (86400 * 30), "/");
setCookie("email", "", time() - (86400 * 30), "/");
setCookie("password", "", time() - (86400 * 30), "/");
setCookie("id", "", time() - (86400 * 30), "/");
header("Location:../")
    ?>