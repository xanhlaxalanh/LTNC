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
    <title>Khóa học của tôi</title>

    <!-- custom css file link -->
    <link rel="stylesheet" type="text/css" href="courseStyle.css" >
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
                <div class="second-option"><a href="homeAfterLogin_Student.php" >dịch vụ của tôi</a></div>
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
                <a href="logout.php" class="login">Đăng xuất</a>
            </div>
        </div>
    </section>

    <!-- header section ends -->




    <!-- body section starts -->

    <div class="body">  
        <div class = "title">
            <p>Các khóa học của tôi</p>
        </div>

        <div class = "wrapper">
            <p>Tổng quan về khóa học</p>
        </div>  
        <div class = "wrapper2">
            <p><span class="arrow">&#11206</span> Học kỳ (Semester) 2/2023-2024</p> 
            <hr>
            <?php
            $sql = "SELECT co.course_img, co.course_name, le.full_name, co.course_id 
                    FROM students st 
                    JOIN grades g ON g.student_id = st.student_id 
                    JOIN courses co ON g.course_id = co.course_id 
                    JOIN lecturers le ON g.lecturer_id = le.lecturer_id 
                    WHERE st.email = '$email';";
            $result = mysqli_query($conn, $sql);
            if ( mysqli_num_rows(   $result ) > 0){
                while ( $row = mysqli_fetch_array( $result ) ){ 
                    echo '<div class = "course-container">';
                        echo '<img src="' .$row["course_img"] .'">';
                        echo '<div class = "course-infor">';
                            echo '<div class = "course-infor2">';
                                echo '<p>' . $row["course_name"]. '_</p>';
                                echo '<div class = "teacher-name">';
                                    echo '<p>' . $row["full_name"]. '</p>';
                                echo '</div>';
                            echo '</div>';                          
                            echo '<div class ="course_id">';
                                echo '<p>' . $row["course_id"]. '</p>';
                            echo '</div>';
                        echo '</div>';
                    echo'</div>';
            echo'<hr>';
                }
            }
            ?>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- custom js file link -->
    <script src="script.js"></script>
</body>
</html>