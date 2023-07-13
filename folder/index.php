<?php
// get id from params
$id = $_GET['id'];
$tname = $GET['name'];
echo $tname;
$user = $_COOKIE['email'];

$conn = new mysqli("localhost", "root", "", "quickdocs");

if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} else {
    echo "";
}

$sql = "SELECT * FROM `folder` WHERE `id` = '$id' AND `user` = '$user'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $date = $row['date'];
} else {
    echo "
        <div class='unauth' style='flex-direction:column;display:flex;justify-content:center;align-items:center;height:100vh;width:100%;'>
           <img src='https://th.bing.com/th/id/R.43a552d9707a1fde4d28db10b210f205?rik=Ij%2fVVCoV6E5trQ&riu=http%3a%2f%2fvendorin.com%2fassets%2fimages%2funauthorized-animation.gif&ehk=fNlp2qXJU4PQnrZY5dViuEk6xnF7qHFtyANE2KwInF4%3d&risl=&pid=ImgRaw&r=0' alt='unauth'/>
              <h1>Unauthorized Access</h1>
              <a href='../index.php' class='btn btn-primary'>Go Home</a>
        </div>
    ";
    return;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $name; ?>
        - Folder
    </title>
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

<body>
    <div class="h-upload" id="hupload">
        <div class="h-form">
            <h2 class="text text-primary">Upload your Document</h2>
            <form action='<?php
            echo "../php/uploadtoserver.php?id=$id"
                ?>' method="post" enctype="multipart/form-data">
                <div class="h-input">
                    <label for="Image/PDF">Image(.jpg/.png/.jpeg)</label>
                    <input type="file" onchange="getFile(event);" name="file" id="file" class="h-file">
                </div>
                <div class="h-img">
                    <img src="" id="img" alt="">
                </div>
                <div class="h-input">
                    <label for="title" class="h-label">Title</label>
                    <input type="text" name="title" id="title" class="h-title" placeholder="Title">
                </div>
                <div class="h-input">
                    <label for="description">Describe your Document for easy findings.</label>
                    <input type="text" name="desc" id="description" class="h-description" placeholder="Description">
                </div>
                <div class="btns">
                    <input type="submit" value="Upload" name="submit" class="btn btn-primary">
                    <button class="btn btn-warning" onclick="closeUpload(event)">Close</button>
                </div>
            </form>
        </div>
    </div>

    <nav class="nav">
        <a class="navbar-brand" href="../index.php"><span class="fw-bolder text-primary">QuickDocs</span></a>
        <div class="" id="navbarSupportedContent">
            <ul>
                <img src="<?php echo $_COOKIE['image']; ?>" alt="Profile Picture">
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

    <div class="folder-file p-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?Php echo $name; ?>
                </li>
            </ol>
        </nav>
        <div class="h-create f-create">
            <div class="create-opt " onclick="showUpload();">
                <img src="https://cdn.onlinewebfonts.com/svg/img_411489.png" alt="add">
                <p>Add File</p>
            </div>

        </div>

        <div class="f-render">
            <?php
            $sql = "SELECT * FROM `docs` WHERE `folder` = $id";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="h-item">
                        <div class="h-img">
                            <img src="../docs/<?php echo $row['image']; ?>" alt="">
                        </div>
                        <div class="f-info">
                            <h3>
                                <?php echo $row['name']; ?>
                            </h3>
                            <p>
                                <?php echo $row['description']; ?>
                            </p>
                            <div class="f-btns">
                                <a href="<?php echo $row['file']; ?>" download="<?php echo $row['title']; ?>"
                                    class="btn btn-primary">Download</a>
                                <p onclick="imageView('<?php echo $row['image']; ?>','<?php echo $row['name']; ?>');"
                                    class="btn btn-warning">View</p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "NO RESULT FOUND";
            }
            ?>

        </div>

        <div class="imageViewer" id="imgvew">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <p onclick="hidepreview()" style="cursor:pointer;">Back</p>
                    </li>
                    <li class="breadcrumb-item" style="cursor:pointer;" aria-current="page">
                        <p><?Php echo $name; ?></p>
                    </li>
                </ol>
            </nav>
            <img id="imagePreview" />

        </div>


    </div>





    <!-- scripts -->

    <script>
        function imageView(e, name) {
            var imgs = document.getElementById("imagePreview");
            var imgvew = document.getElementById("imgvew");
            imgvew.style.display = "flex";
            // img.src = "../docs/" + e;
            var url = '../docs/' + e;
            var urlpath = window.location.href;
            imgs.src = url;
        }
        function hidepreview() {
            var imgvew = document.getElementById("imgvew");
            imgvew.style.display = "none";
        }


        function logout() {
            window.location.href = "../php/logout.php";
        }
        function showUpload() {
            var upload = document.getElementById("hupload");
            upload.style.display = "flex";
        }

        function closeUpload(e) {
            e.preventDefault();
            var upload = document.getElementById("hupload");
            upload.style.display = "none";
        }

        function getFile(e) {
            var file = e.target.files[0];
            // max size 2 mb
            if (file.size > 2 * 1024 * 1024) {
                alert("File is too big!");
                return;
            }
            if (file) {
                var reader = new FileReader();
                reader.onload = function () {
                    var result = reader.result;
                    var img = document.getElementById("img");
                    img.src = result;
                }
                reader.readAsDataURL(file);
            }
        }

    </script>





</body>

</html>