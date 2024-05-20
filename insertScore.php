<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    @include 'config.php';
    $classId = $_SESSION['classID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dịch vụ sinh viên</title>

    <!-- custom css file link -->
    <link rel="stylesheet" type="text/css" href="Style.css">
    <link rel="stylesheet" type="text/css" href="actstyle.css">

</head>

<body>
    <!-- header section starts -->

    <section class="header">
        <div class="left-side">
            <div class="logo">
                <a href="#">
                    <img src="images/logo-removebg-preview.png" alt="logo" />
                    <p>ĐẠI HỌC QUỐC GIA TP.HCM<br>TRƯỜNG ĐẠI HỌC DEF</p>
                </a>
            </div>

            <div class="menu-bar">
                <div class="first-option"><a href="homeAfterLogin_Teacher.php">trang chủ</a></div>
                <div class="second-option"><a href="homeAfterLogin_Teacher.php">dịch vụ của tôi</a></div>
            </div>
        </div>

        <div class="right-side">
            <div class="username"><a href="infoTeachers.php">
                <?php
                    if (isset($_SESSION['email'])) {
                        $email = $_SESSION['email']; 
                        $get = mysqli_query($conn, "select full_name from lecturers where email = '$email' ");
                        $getData = $get->fetch_all(MYSQLI_ASSOC);
                        $name = $getData[0]['full_name'];
                        echo htmlspecialchars($name);
                    }
                ?>
                </a>
            </div>

            <div class="seperator">|</div>

            <div>
                <a href="logout.php" class="logout">Đăng xuất</a>
            </div>
        </div>
    </section>

    <!-- header section ends -->




    <!-- body section starts -->
    <!-- Chắc là làm thêm chức năng có nút điểm danh -->
    <!-- Tích hợp xem ai đang onl/off -->
    <div class="body">
        <h1 class="title">
            Nhập điểm cho lớp 
            <?php
                // $classId = $_SESSION['classID'];
                // echo htmlspecialchars($classId);
                $gradeId = $_GET['grade_id'];
                echo htmlspecialchars($gradeId);
            ?>
        </h1>

        <table border="1" id="spso_log_table" method="post">
            <colgroup>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
            </colgroup>

            <thead>
                <tr>
                    <th>Họ và tên</th>
                    <th>Mssv</th>
                    <th>Chuyên cần</th>
                    <th>Quizz</th>
                    <th>BTL</th>
                    <th>Giữa kì</th>
                    <th>Cuối kì</th>
                    <th>Xác Nhận</th>
                </tr>
            </thead>
            
            <?php
            //sai chỗ truy xuất 
                        $classId = $_SESSION['classID'];
                        $result = mysqli_query($conn, "SELECT s.full_name,g.class_id, s.student_id, g.attendance_score, g.quizz_score, g.btl_score, g.mid_term_score, g.final_exam_score
                                                FROM grades g
                                                JOIN students s ON g.student_id = s.student_id 
                                                WHERE
                                                g.grade_id = '$gradeId'");
                        $data = $result->fetch_all(MYSQLI_ASSOC);
                        foreach ($data as $row) {
                            echo '<form action="insertScoreAction.php" method="POST" enctype="multipart/form-data">';
                            echo '<tr>';
                            echo '<td>' . $row['full_name'] . '</td>';
                            echo '<td>' . $row['student_id'] . '</td>';
                            echo '<td><input type="hidden" name="full_name" value="' . $row['full_name'] . '"></td>';
                            echo '<td><input type="hidden" name="student_id" value="' . $row['student_id'] . '"></td>';
                            echo '<td><input type="hidden" name="grade_id" value="' . $gradeId . '"></td>';
                            echo '<td><input type="text" name="attendance_score[]" value="' . $row['attendance_score'] . '"></td>';
                            echo '<td><input type="text" name="quizz_score[]" value="' . $row['quizz_score'] . '"></td>';
                            echo '<td><input type="text" name="btl_score[]" value="' . $row['btl_score'] . '"></td>';
                            echo '<td><input type="text" name="mid_term_score[]" value="' . $row['mid_term_score'] . '"></td>';
                            echo '<td><input type="text" name="final_exam_score[]" value="' . $row['final_exam_score'] . '"></td>';
                            echo '<td><button type="submit" class="button">Xác Nhận</button></td>';
                            echo '</tr>';
                            echo '</form>';
                        }

                        //  else {
                        //     echo '<tr><td colspan="7">Hiện tại không có sinh viên trong lớp!</td></tr>';
                        // }
                    ?>
        </table>
        <?php
        $gradeId = $_GET['grade_id'];
        ?>
        <a href="scoreListofStudent.php?grade_id=<?php echo $gradeId; ?>" class="button">Lưu.</a>


    </div>

    <!-- body section ends -->




    <!-- footer section starts -->
    <div class="footer-container">
        <section class="footer">
            <div class="box-container">
                <div class="box">
                    <h3>Dịch vụ quản lý học thuật</h3>
                    <img src="images/logo-removebg-preview.png" alt="logo" />
                </div>

                <div class="box">
                    <h3>website</h3>
                    <a href="https://hcmut.edu.vn/" class="hcmut">DEFU</a>
                    <a href="https://mybk.hcmut.edu.vn/my/index.action" class="mybk">MyDEF</a>
                    <a href="https://mybk.hcmut.edu.vn/bksi/public/vi/" class="bksi">DEFSI</a>
                </div>

                <div class="box">
                    <h3>liên hệ</h3>
                    <a href="#">
                        <div class="location-icon"></div>268 Ly Thuong Kiet Street Ward 14, District 10, Ho Chi Minh
                        City, Vietnam
                    </a>
                    <a href="#">
                        <div class="phone-icon"></div>(028) 38 651 670 - (028) 38 647 256 (Ext: 5258, 5234)
                    </a>
                    <a href="mailto:elearning@hcmut.edu.vn" class="email">
                        <div class="email-icon"></div>elearning@hcmut.edu.vn
                    </a>
                </div>
            </div>
        </section>
        <div class="copyright">
            <p>Copyright 2007-2022 BKEL - Phát triển dựa trên Moodle</p>
        </div>
    </div>
    <!-- footer section ends -->









    <!-- swiper js link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- custom js file link -->
</body>

</html>

<script>
    localStorage.setItem("Email", <?php echo $_SESSION['email'] ?>);
</script>
