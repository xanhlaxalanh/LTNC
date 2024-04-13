<?php
session_start();
@include 'config.php';

require_once 'vendor/autoload.php';

require 'function.php';

$client = clientGoogle();

$url = $client->createAuthUrl();
?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trang chủ</title>

            <link rel="stylesheet" type="text/css" href="Style.css">
            <link rel="stylesheet" type="text/css" href="UserHome.css">
            <title>Trang chủ</title>

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    </head>

    <body>

    <?php

        if (isset($_SESSION['Fail_Login'])) {
            $show_message = $_SESSION['Fail_Login'];
            $_SESSION['Fail_Login'] = null;
        }
        session_write_close();

        if (isset($show_message)) {
            echo "<script>alert('You\'re not a student of BKU!');</script>";
        }
    ?>

        <section class="header">
        <div class="left-side">
                <div class="logo">
                    <a href="">
                        <img src="images/logo-removebg-preview.png" alt="logo" />
                        <p>ĐẠI HỌC QUỐC GIA TP.X<br>TRƯỜNG ĐẠI HỌC DEF</p>
                    </a>
                </div>
        </div>

        <div class="right-side">
            <a href='<?= $url ?>' class="login">Đăng nhập</a>
        </div>
        </section>
        <!-- header section ends -->

        <div class="main">
            <img src="images/slbktv.jpg" alt="backkhoa" />
            <div class="home-title">
                <p class="school-name">TRƯỜNG ĐẠI HỌC DEF - ĐHQG TP.X</p>
                <p class="service-name">ỨNG DỤNG HỖ TRỢ</p>
            </div>
        </div>

        <!-- footer section starts -->
            <div class="footer-container">
                <section class="footer">
                    <div class="box-container">
                        <div class="box">
                            <h3>ứng dụng hỗ trợ</h3>
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
                                <div class="location-icon"></div>268 Ly Thuong Kiet Street Ward 14, District 10, Ho Chi
                                Minh City, Vietnam
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

                    <!-- swiper js link -->
                    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    </body>

    </html>