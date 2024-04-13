<?php

    // Dữ liệu cần chèn
    $data = array(
        'firstName' => 'BTL',
        'lastName' => '3',
        'email' => 'quanly@gmail.com',
        'password' => 'quanly',
        'rule' => '3'
        // 1 là sinh viên
        // 2 là giảng viên
        // 3 là quản lý 
    );

    // Chuyển đổi dữ liệu thành định dạng JSON
    $jsonData = json_encode($data);

    // URL của Firebase Realtime Database
    $firebaseUrl = 'https://ltnc-a1b8d-default-rtdb.firebaseio.com/user.json';

    // Khởi tạo cURL session
    $curl = curl_init($firebaseUrl);

    // Cấu hình cURL để gửi yêu cầu POST
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Thực hiện yêu cầu và lấy kết quả
    $response = curl_exec($curl);

    // Kiểm tra xem yêu cầu có thành công không
    if ($response === false) {
        echo 'Error: ' . curl_error($curl);
    } else {
        echo 'Data inserted successfully.';
    }

    // Đóng cURL session
    curl_close($curl);
?>
