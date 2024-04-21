<?php
session_start();
@include 'config.php';
if(!isset($_SESSION['email'])) {
    header("Location: home.php");
}
$email = $_SESSION['email']; 
$get = mysqli_query($conn, "select rule from checktable where email = '$email' ");
$getData = $get->fetch_all(MYSQLI_ASSOC);
$rule = $getData[0]['rule'];
if($rule != 2)
{
header("Location: home.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['filename']))
    {
        echo "The document name cannot be empty";
    }
    // Check if a file was uploaded without errors
    else if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "uploads/"; // Change this to the desired directory for uploaded files
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is allowed (you can modify this to allow specific file types)
        $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($file_type, $allowed_types)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
        } else {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                // File upload success, now store information in the database
                $filename = $_FILES["file"]["name"];
                $size = $_FILES["file"]["size"];
                $type = $_FILES["file"]["type"];
                $name = $_POST['filename'];
                $grade_id = $_POST['grade_id'];
                // Database connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Insert the file information into the database
                $sql = "INSERT INTO course_content (filename, size, type, name, grade_id) VALUES ('$filename', $size, '$type','$name', '$grade_id')";

                if ($conn->query($sql) === TRUE) {
                    echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded and the information has been stored in the database.";
                } else {
                    echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
                }

                $conn->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>


