<?php
    session_start();
    @include 'config.php';

    $classId = $_GET['class_id'];
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
                    <p>ĐẠI HỌC QUỐC GIA TP.HCM<br>TRƯỜNG ĐẠI HỌC BÁCH KHOA</p>
                </a>
            </div>

            <div class="menu-bar">
                <div class="first-option"><a href="../UserHome/BeforeLoad.php">trang chủ</a></div>
                <div class="second-option"><a href="./homeAfterLogin_Manage.php">dịch vụ của tôi</a></div>
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
                <a href="home.php" class="logout">Đăng xuất</a>
            </div>
        </div>
    </section>

    <!-- header section ends -->




    <!-- body section starts -->
    <!-- Chắc là làm thêm chức năng có nút điểm danh -->
    <!-- Tích hợp xem ai đang onl/off -->
    <div class="body">
        <h1 class="title">
            Danh sách sinh viên của lớp
            <?php
                echo htmlspecialchars($classId);
            ?>
        </h1>

        <table border="1" id="spso_log_table">
            <colgroup>
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
                    <th>Giới tính</th>
                    <th>Năm sinh</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                </tr>
            </thead>
            
            <?php
                $email = $_SESSION['email'];
                $result = mysqli_query($conn, "SELECT s.full_name, s.student_id, s.gender, s.date_of_birth, s.email, s.phone_number
                                                FROM students s
                                                INNER JOIN grades g ON s.student_id = g.student_id
                                                INNER JOIN classes c ON g.class_id = c.class_id
                                                WHERE c.class_id = '$classId'");

                
                $data = $result->fetch_all(MYSQLI_ASSOC);

                if (empty($data)) {
                    echo "<p style='border:None; color:var(--text-color); font-weight:500; font-size:17px;'>Hiện tại không có lớp!</p>";
                } else{
                    foreach ($data as $row) {
                        echo '
                            <tr>
                                <td>
                                    ' . $row['full_name'] . '
                                </td>

                                <td> 
                                    ' . $row['student_id'] . '
                                </td>

                                <td> 
                                    ' . $row['gender'] . '
                                </td>

                                <td> 
                                    ' . $row['date_of_birth'] . '
                                </td>

                                <td> 
                                    ' . $row['email'] . '
                                </td>

                                <td> 
                                    ' . $row['phone_number'] . '
                                </td>
                            </tr> 
                        ';
                    }
                }
            ?>
        </table>

    </div>

    <!-- body section ends -->




    <!-- footer section starts -->
    <div class="footer-container">
        <section class="footer">
            <div class="box-container">
                <div class="box">
                    <h3>student smart printing service</h3>
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