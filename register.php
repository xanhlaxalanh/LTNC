<?php
    // cần chỉnh sửa
include("config.php");
include("firebaseRDB.php");
$db = new firebaseRDB($databaseURL);

$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    echo "Không thể để trống email và password";
    exit; 
}

$path1 = $db->retrieve('user', 'email', 'EQUAL', $email);
$path2 = $db->retrieve('user', 'password', 'EQUAL', $password);

if (!$path1 || !$path2) {
    echo "Email hoặc password không đúng!";
    exit; 
}

$data1 = json_decode($path1, true);

if (!empty($data1) && isset($data1['rule'])) {
    $rule = intval($data1['rule']);

    if ($rule === 1) {
        header("Location: homeAfterLogin_Student.html");
        exit; 
    } elseif ($rule === 2) {
        header("Location: homeAfterLogin_Teacher.html");
        exit;
    } elseif ($rule === 3) {
        header("Location: homeAfterLogin_Manager.html");
        exit;
    } else {
        echo "Quyền truy cập không hợp lệ!";
        exit; 
    }
} else {
    echo "Không thể xác định quyền truy cập!";
    exit;
}
?>
