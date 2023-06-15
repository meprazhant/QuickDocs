<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickDocs - Login</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body class="logclass">
    <?php require_once("../components/Homepages/notLoggedin/navbar.php") ?>


    <div class="login" id="login">
        <div class="logarea">
            <img src="https://th.bing.com/th/id/R.fee2dc920a89b5fdc5bc118c2fd2a877?rik=5AZUNpakkJog5w&pid=ImgRaw&r=0"
                alt="">
            <h4>Login to your Account</h4>
            <form action="./login.php" method="POST">
                <div class="l-input">
                    <label for="name">Username or Email</label>
                    <input type="text" name="email" id="name" />
                </div>

                <div class="l-input">
                    <label for="name">Password</label>
                    <input type="password" name="password" id="name" />
                </div>
                <div class="l-btns">
                    <input type="submit" name="submit" class="btn btn-primary" value="Login">
                    <button class="btn btn-warning" onclick="clearevent(event);">Clear</button>
                </div>
                <div class="l-input">
                    <p>Dont Have any Account? <a onclick="showReg()">Register Here</a></p>
                    <p>By signing up, you agree our <span class="text text-primary">Terms & Conditions</span></p>
                </div>
            </form>
        </div>
    </div>


    <div class="login" id="register">
        <div class="logarea">
            <img src="https://th.bing.com/th/id/R.fee2dc920a89b5fdc5bc118c2fd2a877?rik=5AZUNpakkJog5w&pid=ImgRaw&r=0"
                alt="">
            <h4>Register to Quickdocs</h4>
            <form action="./register.php" method="POST">
                <div class="l-input">
                    <label for="email">Valid Email Address</label>
                    <input type="text" name="email" id="email" />
                </div>
                <div class="l-input">
                    <label for="name">Your Full name</label>
                    <input type="text" name="name" id="name" />
                </div>
                <div class="l-input">
                    <label for="name">Create Strong Password</label>
                    <input type="password" name="password" id="name" />
                </div>
                <div class="l-btns">
                    <input type="submit" name="submit" class="btn btn-primary" value="Register">
                    <button class="btn btn-warning" onclick="clearevent(event)">Clear</button>
                </div>
                <div class="l-input">
                    <p>Already Have an account? <a onclick="showLog()">Login Here</a></p>
                    <p>By signing up, you agree our <span class="text text-primary">Terms & Conditions</span></p>
                </div>
            </form>
        </div>
    </div>


    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <script>
        // to toggle login and register

        function showReg() {
            var register = document.getElementById("register")
            var login = document.getElementById("login")
            register.style.display = "flex"
            login.style.display = "none"
        }
        function showLog() {
            var register = document.getElementById("register")
            var login = document.getElementById("login")
            register.style.display = "none"
            login.style.display = "flex"
        }

        function clearevent(e) {
            e.preventDefault()
        }


    </script>
</body>

</html>