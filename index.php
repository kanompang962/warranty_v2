<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="insert-form" class="signup-form" data-toggle="validator">
                        <h2 class="form-title">ลงทะเบียนใบรับประกันสินค้าและบริการ</h2>
                        <hr>
                        <p>ส่วนที่ 1: ข้อมูลส่วนตัวของผู้ซื้อสินค้า</p>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="ชื่อ และนามสกุลผู้ซื้อ">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-input" name="age" id="age" placeholder="อายุ">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="phone" id="phone" placeholder="หมายเลขโทรศัพท์">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="line" id="line" placeholder="Line ID">
                        </div>
                        <!-- gender radio -->
                        <p class="mb-3">เพศ</p>
                        <div class="my-3">
                            <div class="form-check">
                                <input id="men" name="gender" type="radio" class="form-check-input" checked="" value="Male" required="">
                                <label class="form-check-label" for="man">ผู้ชาย</label>
                            </div>
                            <div class="form-check">
                                <input id="female" name="gender" type="radio" class="form-check-input" value="Female" required="">
                                <label class="form-check-label" for="feman">ผู้หญิง</label>
                            </div>
                        </div>
                        <!-- job radio -->
                        <p class="mb-3">อาชีพ</p>
                        <div class="my-3">
                            <div class="form-check">
                                <input id="official" name="job" type="radio" class="form-check-input" checked="" value="official" required="">
                                <label class="form-check-label" for="official">ข้าราชการ / ทหาร / ตำรวจ</label>
                            </div>
                            <div class="form-check">
                                <input id="employee" name="job" type="radio" class="form-check-input" value="employee" required="">
                                <label class="form-check-label" for="employee">พนักงานเอกชน</label>
                            </div>
                            <div class="form-check">
                                <input id="student" name="job" type="radio" class="form-check-input" value="student" required="">
                                <label class="form-check-label" for="student">นักเรียน / นักศึกษา</label>
                            </div>
                            <div class="form-check">
                                <input id="contractor" name="job" type="radio" class="form-check-input" value="contractor" required="">
                                <label class="form-check-label" for="contractor">ผู้รับเหมาก่อสร้าง</label>
                            </div>
                            <div class="form-check">
                                <input id="business" name="job" type="radio" class="form-check-input" value="business" required="">
                                <label class="form-check-label" for="business">เจ้าของธุรกิจ / เจ้าของโรงงาน / ธุรกิจส่วนตัว</label>
                            </div>
                            <div class="form-check">
                                <input id="farmer" name="job" type="radio" class="form-check-input" value="farmer" required="">
                                <label class="form-check-label" for="farmer">เกษตรกร / ฟาร์มเลี้ยงสัตว์</label>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up">
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {

        $('#submit').click(function(e) {
            e.preventDefault();
            var name = $("#name").val();
            var email = $("#email").val();
            var age = $("#age").val();
            var phone = $("#phone").val();

            $.ajax({
                type: "POST",
                url: "formProcess.php",
                dataType: "json",
                data: {
                    name: name,
                    email: email,
                    age: age,
                    phone: phone,
                },
                success: function(data) {
                    if (data.code == "200") {
                        alert("Success: " + data.output);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'กรุณากรอก'+ data.output,
                            text: 'Done, we will take you to the home page!',
                            timer: 3000,
                            timerProgressBar: true,
                        });
                        // $(".display-error").html("<ul>" + data.msg + "</ul>");
                        // $(".display-error").css("display", "block");
                    }
                }
            });


        });
    });
</script>