<?php

session_start();
@include 'config.php';

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['email'])) {
    header("Location: home.php");
    exit;
}

$email = $_SESSION['email']; 
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Lấy quy tắc từ cơ sở dữ liệu
$get = $conn->prepare("SELECT rule FROM checktable WHERE email = ?");
$get->bind_param("s", $email);
$get->execute();
$result = $get->get_result();
$getData = $result->fetch_assoc();
$rule = $getData['rule'];

// Kiểm tra quyền truy cập
if ($rule != 2) {
    header("Location: home.php");
    exit;
}

// Xử lý form khi được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Lấy dữ liệu từ form
    $full_name = $_POST["full_name"];
    $student_id = $_POST["student_id"];
    $attendance_score = $_POST["attendance_score"][0];
    $quizz_score = $_POST["quizz_score"][0];
    $btl_score = $_POST["btl_score"][0];
    $mid_term_score = $_POST["mid_term_score"][0];
    $final_exam_score = $_POST["final_exam_score"][0];
    $grade_id = $_POST['grade_id'];
    

    // Chuyển đổi dữ liệu đầu vào thành số nếu cần thiết
    $attendance_score = floatval($attendance_score);
    $quizz_score = floatval($quizz_score);
    $btl_score = floatval($btl_score);
    $mid_term_score = floatval($mid_term_score);
    $final_exam_score = floatval($final_exam_score);
    $grade_id = floatval($grade_id);
    // Kiểm tra kết nối cơ sở dữ liệu
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    // Chuẩn bị và thực thi truy vấn SQL
    $sql = "UPDATE grades
        JOIN students s ON grades.student_id = s.student_id 
        SET 
        grades.attendance_score = '$attendance_score', 
        grades.quizz_score = '$quizz_score', 
        grades.btl_score = '$btl_score', 
        grades.mid_term_score = '$mid_term_score', 
        grades.final_exam_score = '$final_exam_score'
        WHERE grades.grade_id = '$grade_id' AND grades.student_id = '$student_id'" ;


    if ($conn->query($sql) === TRUE) {
        echo "Cập nhật dữ liệu thành công";

    } else {
        echo "Lỗi khi cập nhật dữ liệu: " ;
    }

    // Đóng câu lệnh và kết nối cơ sở dữ liệu
    // $stmt->close();
    $conn->close();
} else {
    echo "Sorry, there was an error uploading your file.";
}
?>
<a href="insertScore.php?grade_id=<?php echo $grade_id; ?>" class="button">Quay lại.</a>