<?php

class database
{
    private $servername = "localhost";
    private $username   = "root";
    private $password   = "";
    private $database   = "phpa2";
    public $con;

    // Database Connection
    public function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        }
    }

    // Insert customer data into customer table
    public function insertData($post)
    {
        $name  = $this->con->real_escape_string($_POST['name']);
        $email = $this->con->real_escape_string($_POST['email']);
        $phone = $this->con->real_escape_string($_POST['phone']);
        $grade = $this->con->real_escape_string($_POST['grade']);

        // Handle image upload
        $targetDirectory = "img/";
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

        // Insert data into records table
        $image = $targetFile;
        $query = "INSERT INTO records (name, email, phone, grade, image) VALUES ('$name', '$email', '$phone', '$grade', '$image')";
        $sql = $this->con->query($query);

        if ($sql == true) {
            header("Location:view.php?msg1=insert");
        } else {
            echo "Registration failed, try again!";
        }
    }

    // Delete customer data from customer table
    public function deleteRecord($id)
    {
        $query = "DELETE FROM records WHERE id = '$id'";
        $sql = $this->con->query($query);
        if ($sql == true) {
            header("Location:view.php?msg3=delete");
        } else {
            echo "Record does not delete, try again";
        }
    }

    // Fetch customer records for show listing
    public function displayData()
    {
        $query = "SELECT * FROM records";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No found records";
            return array();
        }
    }

    // Fetch single data for edit from customer table
    public function displayRecordById($id)
    {
        $query = "SELECT * FROM records WHERE id = '$id'";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "Record not found";
        }
    }

    // Update data into Students table
    public function updateRecord($id, $postData)
    {
        $name  = $this->con->real_escape_string($postData['uname']);
        $email = $this->con->real_escape_string($postData['uemail']);
        $phone = $this->con->real_escape_string($postData['uphone']);
        $grade = $this->con->real_escape_string($postData['ugrade']);

        if (!empty($id) && !empty($postData)) {
            // Handle image upload if a new image is provided
            if (!empty($_FILES["uimage"]["name"])) {
                $targetDirectory = "img/";
                $targetFile = $targetDirectory . basename($_FILES["uimage"]["name"]);
                move_uploaded_file($_FILES["uimage"]["tmp_name"], $targetFile);
                $image = $targetFile;
                $updateImage = ", image = '$image'";
            } else {
                $updateImage = ""; // No new image provided
            }

            // Add the missing comma after 'grade' and include image update
            $query = "UPDATE records SET name = '$name', email = '$email', phone = '$phone', grade = '$grade' $updateImage WHERE id = '$id'";
            $sql = $this->con->query($query);
            if ($sql == true) {
                return true; // Indicate successful update
            } else {
                return false; // Indicate update failure
            }
        }
        return false; // Indicate update failure if ID or postData is empty
    }
}
?>
