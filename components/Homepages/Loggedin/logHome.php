<?php require_once("navbar.php") ?>

<?php
// Retrieve the email from the cookie
$email = $_COOKIE['email'];

// Perform the database query
require("./php/conn.php"); // Assuming this file establishes the database connection
$sql = "SELECT * FROM `docs` WHERE `user` = '$email'";
$result = mysqli_query($conn, $sql);
$dataLength = mysqli_num_rows($result);

mysqli_close($conn);
?>




<div class="home">
    <div class="h-upload" id="hupload">
        <div class="h-form">
            <h2 class="text text-primary">Upload your Document</h2>
            <form action="./php/uploadtoserver.php" method="post" enctype="multipart/form-data">
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
    <div class="h-wrap">
        <h2>My Bag</h2>


        <?php
        if ($dataLength > 0) {
            echo "<div class='h-items'>";
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row['name'];
                $desc = $row['description'];
                $img = $row['image'];
                $id = $row['id'];
                echo "
                <div class='h-item'>
                <div class='h-img'>
                    <img src='./docs/$img' alt=''>
                </div>
                <div class='h-text'>
                    <h3>$name</h3>
                    <p>$desc</p>
                </div>
                <div class='h-btns'>
                    <a href='./php/download.php?id=$id' class='btn btn-primary'>Download</a>
                    <a href='./php/delete.php?id=$id' class='btn btn-danger'>Delete</a>
                    <a href='./php/delete.php?id=$id' class='btn btn-warning'>Share</a>
                </div>
            </div>
                ";
            }
            echo "
            <div class='h-item h-add' onclick='showUpload()'>
                <img src='https://th.bing.com/th/id/R.72cc48ed0f9aceeb52acc6c817cd2a12?rik=gBz56a3VcGsm2A&riu=http%3a%2f%2fwww.clker.com%2fcliparts%2fb%2fe%2fU%2fI%2fk%2fO%2fadd2-png-hi.png&ehk=A6vPIQKb6FZFvi%2f%2fOKYA%2fKEdeECh476W6gEm3%2f5LSns%3d&risl=&pid=ImgRaw&r=0'
                    alt='empty'>
                <p>Add Document</p>
                <p>Add your Important Documents here</p>
            
            ";
            echo "</div>";
        } else {
            echo "
            <div class='h-empty' onclick='showUpload()'>
                <img src='https://th.bing.com/th/id/R.38c2da29f3c36f6e0cdc21f3870c5051?rik=GixYq%2ffiaw0Z4g&pid=ImgRaw&r=0'
                    alt='empty'>
                <p>Your bag is empty</p>
                <p>Add your Important Documents here</p>
            </div>
            ";
        }
        ?>
        <!-- <div class="h-empty" onclick="showUpload()">
            <img src="https://th.bing.com/th/id/R.38c2da29f3c36f6e0cdc21f3870c5051?rik=GixYq%2ffiaw0Z4g&pid=ImgRaw&r=0"
                alt="empty">
            <p>Your bag is empty</p>
            <p>Add your Important Documents here</p>
        </div> -->
    </div>
</div>


<!-- scripts -->

<script>

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