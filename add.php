<?php
require('./inc/header.php');
include('./inc/database.php');

$recordsObj = new database();

// Insert Record in records table
if (isset($_POST['submit'])) {
    // Handle image upload
    $targetDirectory = "img/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedFormats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";

            // Save the file path to the database along with other data
            $_POST['image_path'] = $targetFile;
            $recordsObj->insertData($_POST);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<main>
    <section class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="m-0">Insert Data</h2>
                            <a class="btn btn-success" href="view.php" role="button">Back</a>
                        </div>
                    </div>
                    <div class="card-body bg-light">
                        <form action="add.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Student Name" required="">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter Student Email" required="">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter Student Phone Number" required="">
                            </div>
                            <div class="form-group">
                                <label for="grade">Grade:</label>
                                <input type="text" class="form-control" name="grade" placeholder="Enter Student Final Grade" required="">
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Image:</label>
                                <input type="file" class="form-control" name="image" id="image" accept="image/*" required="">
                            </div>
                            <input type="submit" name="submit" class="btn btn-success" style="float:right;" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require('./inc/footer.php'); ?>
</body>

</html>


