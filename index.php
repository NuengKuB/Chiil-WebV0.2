<?php session_start();?>
<!DOCTYPE html>
<html>
<link rel="icon" href="image/fk.png" type="image/x-icon"/>
<link rel="shortcut icon" href="image/fk.png" type="image/x-icon"/>
<title>Image - Online</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="sweetalert2.min.css">
<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="index.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

<body>
<?php
        require_once('connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน
        /**
         * ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_POST['submit'] ได้ถูกกำหนดขึ้นมาหรือไม่
         */
        if (isset($_POST['submit'])) { 
            /**
             * กำหนดตัวแปรเพื่อมารับค่า
             */
            $username =  $conn->real_escape_string($_POST['username']);
            $password = $conn->real_escape_string($_POST['password']);
            /**
             * สร้างตัวแปร $sql เพื่อเก็บคำสั่ง Sql
             * จากนั้นให้ใช้คำสั่ง $conn->query($sql) เพื่อที่จะประมาณผลการทำงานของคำสั่ง sql
             */
            $sql = "SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '".$password."'"; 
            $result = $conn->query($sql);

            /**
             * ตรวจสอบการเข้าสู่ระบบ
             */
            if($result->num_rows > 0){
                /**
                 * แสดงข้อมูลของ user 
                 * เก็บข้อมูลเข้าสู่ session เพื่อนำไปใช้งาน 
                 */
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                header('location:index.php');
            }else echo '<script>
            swal("ผิดพลาด!", "มึงกรอบผิดไอ้สัส!!!", "error");
           </script>';
        }
    ?>

    <div id="id01" class="w3-modal">
      <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
    
        <div class="w3-center"><br>
          <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
          <img src="image/icon.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
        </div>
        <form action="" method="POST" class="w3-container">
        <div id="login">
          <div class="w3-section">
            <label><b>⚡ ชื่อผู้ใช้</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" id="username" placeholder="กรอบชื่อผู้ใช้" name="username" required>
            <label><b>⚡ รหัสผ่าน</b></label>
            <input class="w3-input w3-border" type="password" id="password" placeholder="กรอบรหัสผ่าน" name="password" required>
            <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="submit" value="เข้าสู่ระบบ">
          <center>
          <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> จำชื่อผู้ใช้ 
          </center>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="id02" class="w3-modal">
      <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center"><br>
          <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
          <img src="image/icons.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
        </div>
        <form action="" method="POST" class="w3-container">
        <div id="login">
          <div class="w3-section">
            <label><b>💖 ชื่อผู้ใช้</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" id="username" placeholder="กรอบชื่อผู้ใช้" name="username" required>
            <label><b>💖 รหัสผ่าน</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="password" id="password" placeholder="กรอบรหัสผ่าน" name="password" required>
            <label><b>💖 รหัสผ่านอีกรอบ</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="password" id="password" placeholder="ยืนยันรหัสผ่าน" name="confirmpassword" required>
            <label><b>💖 อีเมล</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" id="username" placeholder="กรอบอีเมล" name="email" required>
            <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="submit" value="สมัครสมาชิก">
          </div>
        </form>
      </div>
    </div>
  </div>
  

<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
    <img src="image/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
    รูปภาพออนไลน์
  </a>
  <!-- Form Login Register :(-->
  <div class="btn-group">
  <button onclick="document.getElementById('id01').style.display='block'" type="button" class="btn btn-success">
    เข้าสู่ระบบ
  </button>
  <button onclick="document.getElementById('id02').style.display='block'" type="button" class="btn btn-danger">
    สมัครสมาชิก
  </button>
  </div>
</div>
</nav>
<div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main w3-content" style="max-width:1600px;margin-top:83px">
  <!-- อัพโหลดรูปภาพขึ้น WebSite :(-->
  <div class="w3-row w3-grayscale-min">
    <div class="w3-quarter">
      <img src="image/fk.png" style="width:100%" onclick="onClick(this)" alt="Canoeing again">
      <img src="image/fk.png" style="width:100%" onclick="onClick(this)" alt="Quiet day at the beach. Cold, but beautiful">
      <img src="image/fk.png" style="width:100%" onclick="onClick(this)" alt="The Beach. Me. Alone. Beautiful">
   </div>
    
   <div class="w3-quarter">
      <img src="image/fk.png" style="width:100%" onclick="onClick(this)" alt="A girl, and a train passing">
      <img src="image/fk.png" style="width:100%" onclick="onClick(this)" alt="Waiting for the bus in the desert">
      <img src="image/fk.png" style="width:100%" onclick="onClick(this)" alt="Nature again.. At its finest!">
    </div>
    
    <div class="w3-quarter">
      <img src="image/fk.png" style="width:100%" onclick="onClick(this)" alt="Waiting for the bus in the desert">
      <img src="image/fk.png" style="width:100%" onclick="onClick(this)" alt="What a beautiful scenery this sunset">
      <img src="image/fk.png" style="width:100%" onclick="onClick(this)" alt="The Beach. Me. Alone. Beautiful">
    </div>

    <div class="w3-quarter">
      <img src="image/fk.png" style="width:100%" onclick="onClick(this)" alt="A boy surrounded by beautiful nature">
      <img src="image/fk.png" style="width:100%" onclick="onClick(this)" alt="A girl, and a train passing">
      <img src="image/fk.png" style="width:100%" onclick="onClick(this)" alt="Quiet day at the beach. Cold, but beautiful">
    </div>
  </div>
<!-- หน้าต่อไป :) -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>
  <div class="" style="background-color:#212519!important">
  <div class="contx" style="padding-top:20px;padding-bottom:20px;">
  <center>
  <iframe src="https://discord.com/widget?id=814863099215478825&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
    </center>
    <br>
            <div class="row">
              <div class="col-7">
                <div style="color:#F3F3F3; margin-bottom:10px;">
                <center>
                <br>
                <br>    
                เว็บไซต์นี้สร้างขึ้นมาเพื่ออัพโหลดรูปภาพต่างๆ ที่คุณอยากอัพโหลด
                <br>
                 อัพโหลดเสร็จปัปจะขึ้นออนไลน์ทันที่ในเว็บของเรา
                             ขอให้สนุกกับเว็บไซต์ของเรา
                </center>
                </div>
              </div>
              <div class="col-5">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fsystemminecraft%2F&amp;tabs&amp;width=440&amp;height=400&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=1402610513369583" height="215" style="border:none;overflow:hidden;width:100%;" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
              </div>
            </div>
          </div>
          <div class="" style="background-color:#2f3133!important">
  <div class="contx" style="padding:8px;color:#FFF; text-align:center;">
    <small style="font-size:14px;">ผู้สร้างเว็บไซต์ &amp; By <a href="https://web.facebook.com/nobphakhu.nachipoon/" style="color:#FFF;text-decoration:underline;">NuengKuB</a></small>
  </div>
</div>
</div>   
</body>
</html>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>


<!-- ไม่ต้องยุ่ง เดียวพัง :(-->
<script src="./pink.js"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>   


