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
    <title>Dịch vụ Quản Lý</title>

    <!-- custom css file link -->
    <link rel="stylesheet" type="text/css" href="Style.css">
    <link rel="stylesheet" type="text/css" href="actstyle.css">
    <link rel="stylesheet" type="text/css" href="addstyle.css">

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
                <div class="first-option"><a href="homeAfterLogin_Manager.php">trang chủ</a></div>
                <div class="second-option"><a href="homeAfterLogin_Manager.php" >dịch vụ của tôi</a></div>
            </div>
        </div>
        
        <div class="right-side">
            <div class="username"><a href="infoManagers.php">
                <?php
                    if (isset($_SESSION['email'])) {
                        $email = $_SESSION['email']; 
                        $get = mysqli_query($conn, "select full_name from managers where email = '$email' ");
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

    <div class="body">
        <h1 class="title">Bảng điểm</h1>
        <div id="filterByFaculty">
        <label for="facultySelect">Lớp:</label>
            <select id="facultySelect">
                <option value="all">Tất cả</option>
                <?php 
                $optResult = mysqli_query($conn, "SELECT class_id FROM classes");
                while ($optRow = mysqli_fetch_array($optResult)) {
                    if (isset($optRow['class_id'])) {
                    ?>
                    <option value="<?php echo $optRow['class_id']?>"><?php echo $optRow['class_id']?></option>
                    <?php }
                }
                ?>
            </select>
        </div>
        <script>
        </script>
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
                    <col>
                </colgroup>

                <thead>
                    <tr>
                    <th>Mã MH</th>
                        <th>Tên môn học</th>
                        <th>Học kỳ</th>
                        <th>Lớp</th>
                        <th>Số TC</th>
                        <th>MSGV</th>
                        <th>Giảng viên</th>
                        <th>MSSV</th>
                        <th>Tên SV</th>
                        <th>Điểm danh</th>
                        <th>Điểm BT</th>
                        <th>Điểm BTL</th>
                        <th>Điểm thi GK</th>
                        <th>Điểm thi CK</th>   
                    </tr>
                </thead>
                
                <?php
                    $email = $_SESSION['email'];
                    $result = mysqli_query($conn, "SELECT c.course_id, cr.course_name,
                                                          g.semester, g.class_id, cr.credit_hours,
                                                          l.lecturer_id, l.full_name lecturer_name,
                                                          g.student_id, s.full_name student_name,
                                                          g.attendance_score, g.quizz_score, g.btl_score, g.mid_term_score, g.final_exam_score
                                                   FROM classes c
                                                   INNER JOIN courses   cr  ON c.course_id      = cr.course_id
                                                   INNER JOIN lecturers l   ON c.lecturer_id   = l.lecturer_id
                                                   INNER JOIN grades    g   ON c.class_id       = g.class_id
                                                   INNER JOIN students  s   ON g.student_id     = s.student_id"); 
                    
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
                                        ' . $row['semester'] . '
                                    </td>
                                    <td> 
                                        ' . $row['class_id'] . '
                                    </td>
                                    <td>
                                        ' . $row['credit_hours'] . '
                                    </td>
                                    <td> 
                                        ' . $row['lecturer_id'] . '
                                    </td>
                                    <td> 
                                        ' . $row['lecturer_name'] . '
                                    </td>
                                    <td> 
                                        ' . $row['student_id'] . '
                                    </td>
                                    <td>
                                        ' . $row['student_name'] . '
                                    </td>
                                    <td> 
                                        ' . $row['attendance_score'] . '
                                    </td>
                                    <td> 
                                        ' . $row['quizz_score'] . '
                                    </td>
                                    <td> 
                                        ' . $row['btl_score'] . '
                                    </td>
                                    <td> 
                                        ' . $row['mid_term_score'] . '
                                    </td>
                                    <td> 
                                        ' . $row['final_exam_score'] . '
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const facultySelect = document.getElementById('facultySelect');
            const rows = document.querySelectorAll('#spso_log_table tbody tr');

            facultySelect.addEventListener('change', function() {
                const selectedFaculty = this.value;

                rows.forEach(row => {
                    const facultyCell = row.querySelector('td:nth-child(4)');

                    if (selectedFaculty === 'all' || facultyCell.textContent.trim() === selectedFaculty) {
                        row.style.display = ''; 
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });s
    </script>
</body>
</html>

<script>
    localStorage.setItem("Email", <?php echo $_SESSION['email'] ?>);
</script>