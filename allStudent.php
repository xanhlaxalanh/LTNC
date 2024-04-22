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
    <title>Dịch vụ Quản lý</title>

    <!-- custom css file link -->
    <link rel="stylesheet" type="text/css" href="Style.css" >
    <link rel="stylesheet" type="text/css" href="actstyle.css" >
    <link rel="stylesheet" type="text/css" href="addstyle.css" >

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
        <h1 class="title">Danh sách sinh viên của trường</h1>

        <div id="filterByFaculty">
            <label for="facultySelect">Chọn khoa:</label>
            <select id="facultySelect">
                <option value="all">Tất cả</option>
                <option value="Faculty Of Computer Science And Engineering">Khoa Khoa học và Kỹ thuật Máy tính</option>
                <option value="Faculty Of Transportation Engineering">Khoa Giao thông</option>
                <option value="Industrial Maintenance Training Center">Trung tâm Bảo dưỡng Công nghiệp</option>
                <!-- Thêm các tùy chọn cho các khoa khác nếu cần -->
            </select>
        </div>
        <!-- Lọc danh sách theo khoa theo khóa học -->

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
                        <th>MSSV</th>
                        <th>Năm sinh</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Khoa</th>
                    </tr>
                </thead>
                
                <?php
                    $email = $_SESSION['email'];
                    $result = mysqli_query($conn, "SELECT full_name, student_id, date_of_birth, email, phone_number, faculty
                                                    FROM students;
                                                    ");

                    
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
                                        ' . $row['date_of_birth'] . '
                                    </td>

                                    <td> 
                                        ' . $row['email'] . '
                                    </td>

                                    <td> 
                                        ' . $row['phone_number'] . '
                                    </td>

                                    <td> 
                                        ' . $row['faculty'] . '
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const facultySelect = document.getElementById('facultySelect');
            const rows = document.querySelectorAll('#spso_log_table tbody tr');

            facultySelect.addEventListener('change', function() {
                const selectedFaculty = this.value;

                rows.forEach(row => {
                    const facultyCell = row.querySelector('td:nth-child(6)'); // Lấy ô chứa tên khoa (cột thứ 6)

                    if (selectedFaculty === 'all' || facultyCell.textContent.trim() === selectedFaculty) {
                        row.style.display = ''; // Hiển thị hàng nếu chọn "Tất cả" hoặc trùng với khoa được chọn
                    } else {
                        row.style.display = 'none'; // Ẩn các hàng không trùng khoa được chọn
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