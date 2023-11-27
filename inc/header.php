<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

    <!-- Add custom CSS -->
    <link rel="stylesheet" href="./style.css">
    <title>View Student Information</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <div class="container">
                <a class="navbar-brand" style="font-weight: 500;" href="#">
                    <img src="img/studentlogo.jpeg" alt="StudentLogo" width="60" height="60">
                    <span style="padding-left: 30px" class="fs-3"> StudentInfo </span>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color: white;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="view.php">View</a></li>
                            <li><a class="dropdown-item" href="add.php">Add</a></li>
                            <li><a class="dropdown-item" href="update.php">Update</a></li>
                            <li><a class="dropdown-item" href="delete.php">Remove</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-2">
                        <button type="button my-3 mx-2" class="btn btn-light"><a href="signin.php">Login</a></button>
                    </li>
                    <li class="nav-item">
                    <button type="button mx-3" class="btn btn-light"><a href="logout.php">LogOut</a></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"></script>
</body>

</html>