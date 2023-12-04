<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$vnp_TmnCode = "O6M373MC"; //Mã định danh merchant kết nối (Terminal Id)
$vnp_HashSecret = "HXBHFRLMCHBCWPTCKECOLAYAXHCJCGXO"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://nhom3.test/cloud_store/index.php?page=vnpay-return";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
$apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

//----- THÔNG TIN TEST -----
//ngân hàng: NCB
//số thẻ: 9704198526191432198
//tên: NGUYEN VAN A
//ngày phát hành: 07/15
//OTP: 123456

//link tra cứu giao dịch:  https://sandbox.vnpayment.vn/merchantv2/
//tên đăng nhập: tranghttpc02468@fpt.edu.vn
//password: trangFPT0612