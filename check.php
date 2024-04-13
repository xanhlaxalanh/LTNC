<?php
ob_start();
session_start();

require_once 'vendor/autoload.php';
@include 'config.php';
require 'function.php';

$client = clientGoogle();
$service = new Google_Service_Oauth2($client);

if (isset($_GET['code'])) {
    $miss = $client->authenticate($_GET['code']); 
    if (isset($miss['error'])) { //Nếu nó lỗi 
        header('Location: home.php');
        exit();
    } else { 
        $temp1 = $client->getAccessToken();
        $user = $service->userinfo->get();

        $email = mysqli_real_escape_string($conn, $user->email);
        $check = "SELECT COUNT(*) AS email_count FROM checktable WHERE email = '$email'";  
        if ($check > 0) { //Nếu có email xuất hiện
            $email_gg = $user->email; //Lấy email từ Google 
            $stmt = $conn->prepare("select rule from checktable where email = ?");
            $stmt->bind_param('s', $user->email);
            $stmt->execute();
            $result = $stmt->get_result();
            $value = $result->fetch_object();
            $Rule = $value->rule;

            $_SESSION['email'] = $user->email;
            
            if ($Rule == "1") { //Student
                header('Location: homeAfterLogin_Student.php');
            } else if ($Rule == "2") { //Lecturers
                header('Location: homeAfterLogin_Teacher.php');
            } else if ($Rule =="3") { //Managers 
                header('Location: homeAfterLogin_Manager.php');
            } else { //Đăng nhập không thành công 
                $_SESSION['Fail_Login'] = True;
                header('Location: home.php');
                exit();
            }
        }
    }
}
?>

<script>
    localStorage.setItem("Email", <?php echo $_SESSION['email'] ?>);
</script>