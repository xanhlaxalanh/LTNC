<?php
    session_start();
    @include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký khóa học</title>

    <!-- custom css file link -->
    <link rel="stylesheet" type="text/css" href="regcourseStyle.css" >
    <link rel="stylesheet" type="text/css" href="Style.css" >

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
                <div class="first-option"><a href="">trang chủ</a></div>
                <div class="second-option"><a href="" >dịch vụ của tôi</a></div>
            </div>
        </div>
        
        <div class="right-side">
        <div class="username"><a href="infoStudents.php">
            <?php
                if (isset($_SESSION['email'])) { 
                    $email = $_SESSION['email']; 
                    $get = mysqli_query($conn, "select full_name from students where email = '$email' ");
                    $getData = $get->fetch_all(MYSQLI_ASSOC);
                    $name = $getData[0]['full_name'];
                    echo htmlspecialchars($name);
                }
            ?>
            </a>
        </div>
            <div class="seperator">|</div>
            <div>
                <a href="#" class="login">Đăng xuất</a>
            </div>
        </div>
    </section>

    <!-- header section ends -->




    <!-- body section starts -->

    <div class="body">  
    
    <div class = "main">
        <ul class = "course-list">
            <?php
            $sql = "SELECT * from regcourse";
            $result = mysqli_query($conn, $sql);
            if ( mysqli_num_rows(   $result ) > 0){
                while ( $row = mysqli_fetch_array( $result ) ){ 
                echo '<li>';
                    echo '<img src="'.$row["course_img"].'">';
                echo '<div class = "name">';
                    echo '<p>'.$row["course_name"].'</p>';
                echo '</div>';
                echo '<p><span>Mã môn: </span>' .$row["course_id"].'</p>';
                echo '<p><span>Số tín chỉ: </span>'.$row["credit_hour"].'</p>';
                echo '<button>Đăng ký môn</button>';
                echo'</li>';
                }
            }
            ?>
        </ul>
        <div class = "alert">
            <div class = "temp"></div>
                <ion-icon name="checkmark-circle-outline"></ion-icon>
                <span>Đăng ký thành công</span>
            </div>
        </div>

    </div>
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
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <!-- custom js file link -->
    <script src="regcourse.js"></script>
</body>
</html>