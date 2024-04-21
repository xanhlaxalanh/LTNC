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
                <div class="first-option"><a href="">trang chủ</a></div>
                <div class="second-option"><a href="" >dịch vụ của tôi</a></div>
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
    <h1 style="font-size: 24px;">Upload a file</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="upload-section">
            <h2 style="font-size: 20px;"><label for="file" class="form-label">Select file</label>
            <input type="file" class="form-control" name="file" id="file"></h2>
        </div>

        <div class="upload-section">
            <h2 style="font-size: 20px;"><label for="filename" class="form-label">Tên file</label>
            <input type="text" name="filename" id="filename"></h2>
        </div>

        <!-- Trường input ẩn để gửi giá trị GET -->
        <div class="upload-section">
            <input type="hidden" name="grade_id" value='<?php echo $_GET['grade_id']; ?>' id='grade_id'></h2>
        </div>

        <button type="submit" class="btn btn-primary rounded-btn" style="font-size: 20px">Upload file</button>
    </form>
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



<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<title>File upload and download</title>
</head>
<body>
	<div class="container mt-5">
		<h2>Upload a file</h2>
		<form action="upload.php" method="POST" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="file" class="form-label">Select file</label>
				<input type="file" class="form-control" name="file" id = "file">
				<input type="text" name="filename" id = "filename">
				<input type="hiden" name="class_id" value ="
			</div>
			<button type="submit" class="btn btn-primary">Upload file</button>
		</form>
	</div>

</body>
</html> -->