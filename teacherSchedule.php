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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dịch vụ Giảng viên</title>

    <!-- custom css file link -->
    <link rel="stylesheet" type="text/css" href="Style.css" >
    <link rel="stylesheet" type="text/css" href="actstyle.css" >

</head>
<body>
    <!-- header section starts -->

    <section class="header">
        <div class="left-side">
            <div class="logo">
                <a href="#">
                    <img src="images/logo-removebg-preview.png" alt="logo" />
                    <p>ĐẠI HỌC QUỐC GIA TP.X<br>TRƯỜNG ĐẠI HỌC DEF</p>
                </a>
            </div>

            <div class="menu-bar">
                <div class="first-option"><a href="homeAfterLogin_Teacher.php">trang chủ</a></div>
                <div class="second-option"><a href="homeAfterLogin_Teacher.php" >dịch vụ của tôi</a></div>
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
                <a href="logout.php" class="login">Đăng xuất</a>
            </div>
        </div>
    </section>

    <!-- header section ends -->




    <!-- body section starts -->

    <div class="body">
        <h1 class="title">Thời Khoa Biểu</h1>
        <table border="1" id="spso_log_table">
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
                        <th>Mã môn</th>
                        <th>Môn</th>
                        <th>Lớp</th>
                        <th>Thứ</th>
                        <th>Bắt đầu</th>
                        <th>Kết thúc</th>
                        <th>Học kì</th>
                        <th>Phòng</th>
                    </tr>
                </thead>
                
                <?php
                    $email = $_SESSION['email'];
                    $result = mysqli_query($conn, "SELECT c.class_id,cr.course_id, cr.course_name, c.semester, t.day_of_week, t.start_time, t.end_time, t.room
                                                    FROM
                                                    classes c
                                                    INNER JOIN courses cr ON c.course_id = cr.course_id
                                                    INNER JOIN timetables t ON c.class_id = t.class_id
                                                    INNER JOIN lecturers l ON c.lecturer_id = l.lecturer_id
                                                    WHERE t.course_id = c.course_id
                                                    AND l.email = '$email'");

                    
                    $data = $result->fetch_all(MYSQLI_ASSOC);

                    if (empty($data)) {
                        echo "<p style='border:None; color:var(--text-color); font-weight:500; font-size:17px;'>Hiện tại không có lớp!</p>";
                    } else{
                        foreach ($data as $row) {
                            echo '
                                <tr>
                                    <td>
                                        ' . $row['course_id'] . '
                                    </td>

                                    <td> 
                                        ' . $row['course_name'] . '
                                    </td>

                                    <td> 
                                        ' . $row['class_id'] . '
                                    </td>
                                    <td>
                                        ' . $row['day_of_week'] . '
                                    </td>

                                    <td> 
                                        ' . $row['start_time'] . '
                                    </td>

                                    <td> 
                                        ' . $row['end_time'] . '
                                    </td>
                                    <td> 
                                        ' . $row['semester'] . '
                                    </td>
                                    <td> 
                                        ' . $row['room'] . '
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
                    <a href="#"> <div class="location-icon"></div>268 Ly Thuong Kiet Street Ward 14, District 10, Ho Chi Minh City, Vietnam </a>
                    <a href="#"> <div class="phone-icon"></div>(028) 38 651 670 - (028) 38 647 256 (Ext: 5258, 5234) </a>
                    <a href="mailto:elearning@hcmut.edu.vn" class="email"> <div class="email-icon"></div>elearning@hcmut.edu.vn </a>
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
    <script src="script.js"></script>
</body>
</html>

<script>
    localStorage.setItem("Email", <?php echo $_SESSION['email'] ?>);
</script>
