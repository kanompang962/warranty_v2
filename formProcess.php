<?php
$errorMSG = "";
/* NAME */
if (empty($_POST["name"])) {
    $errorMSG = "ชื่อนามสกุล";
} else {
    if (empty($_POST['age'])) {
        $errorMSG = "อายุ";
    } else {
        if (empty($_POST['phone'])) {
            $errorMSG = "เบอร์โทรศัพท์";
        } else {
            /* EMAIL */
            if (empty($_POST["email"])) {
                $errorMSG .= "";
            } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $errorMSG .= "อีเมลให้ถูกต้อง";
            } else {
            }
        }
    }
}





if (empty($errorMSG)) {
    $msg = "";
    echo json_encode(['code' => 200, 'output' => $msg]);
    exit;
}


echo json_encode(['code' => 404, 'output' => $errorMSG]);
