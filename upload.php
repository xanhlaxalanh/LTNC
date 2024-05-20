<?php
session_start();
@include 'config.php';

// Kiểm tra xem người dùng đã đăng nhập chưa
if(!isset($_SESSION['email'])) {
    header("Location: home.php");
    exit;
}

$email = $_SESSION['email']; 

// Lấy quy tắc từ cơ sở dữ liệu
$get = mysqli_query($conn, "SELECT rule FROM checktable WHERE email = '$email'");
$getData = $get->fetch_all(MYSQLI_ASSOC);
$rule = $getData[0]['rule'];

// Kiểm tra quyền truy cập
if($rule != 2) {
    header("Location: home.php");
    exit;
}

// Xử lý form khi được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra nếu tên file không được để trống
    if(empty($_POST['filename'])) {
        echo "The document name cannot be empty";
    }
    // Kiểm tra nếu file được upload mà không có lỗi
    else if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "uploads/"; // Thư mục để lưu trữ file upload
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra loại file được cho phép
        $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($file_type, $allowed_types)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
        } else {
            // Di chuyển file upload tới thư mục đích
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                // Upload thành công, lưu thông tin vào cơ sở dữ liệu
                $filename = $_FILES["file"]["name"];
                $size = $_FILES["file"]["size"];
                $type = $_FILES["file"]["type"];
                $name = $_POST['filename'];
                $grade_id = $_POST['grade_id'];

                // Kết nối cơ sở dữ liệu
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Chèn thông tin file vào cơ sở dữ liệu
                $sql = "INSERT INTO course_content (filename, size, type, name, grade_id) VALUES ('$filename', $size, '$type', '$name', '$grade_id')";

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
