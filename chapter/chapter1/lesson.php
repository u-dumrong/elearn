<?php
require "../../session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>บทเรียน</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css">
    <style>

    </style>
</head>

<body>
    <!-- พื้นหลัง -->
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>

    <!-- แถบนำทาง -->
    <nav class="navbar navbar-expand bg-dark navbar-dark fixed-top">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="../../student.php">หน้าแรก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="offcanvas" data-bs-target="#carouselDemo">เมนู</a>
                </li>
            </ul>

            <ul class="navbar-nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ส่วนหัว -->
    <div class="p-5 mt-5 navy text-white text-center">
        <h1>ทฤษฎีเครื่องมือกล</h1>
        <p>รหัสวิชา 20102-2003</p>
    </div>

    <!-- แถบเมนูทางซ้าย -->
    <div class="offcanvas offcanvas-start text-bg-dark" id="demo">
        <div class="offcanvas-header">
            <h1 class="offcanvas-title">เมนู</h1>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <div class="dropdown dropend p-1">
                <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
                    บทที่ 1
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">แบบทดสอบก่อนเรียน</a></li>
                    <li><a class="dropdown-item" href="#">บทเรียน</a></li>
                    <li><a class="dropdown-item" href="#">แบบทดสอบหลังเรียน</a></li>
                </ul>
            </div>

            <div class="dropdown dropend p-1">
                <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
                    บทที่ 2
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">แบบทดสอบก่อนเรียน</a></li>
                    <li><a class="dropdown-item" href="#">บทเรียน</a></li>
                    <li><a class="dropdown-item" href="#">แบบทดสอบหลังเรียน</a></li>
                </ul>
            </div>

            <div class="dropdown dropend p-1">
                <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
                    บทที่ 3
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">แบบทดสอบก่อนเรียน</a></li>
                    <li><a class="dropdown-item" href="#">บทเรียน</a></li>
                    <li><a class="dropdown-item" href="#">แบบทดสอบหลังเรียน</a></li>
                </ul>
            </div>

            <div class="dropdown dropend p-1">
                <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
                    บทที่ 4
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">แบบทดสอบก่อนเรียน</a></li>
                    <li><a class="dropdown-item" href="#">บทเรียน</a></li>
                    <li><a class="dropdown-item" href="#">แบบทดสอบหลังเรียน</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- เนื้อหา -->
    <!-- Carousel -->
    <div id="carouselDemo" class="carousel slide mt-5">

        <!-- Indicators/dots -->
        <div class="carousel-indicators bg-dark">
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="4"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="5"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="6"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="7"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="8"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="9"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="10"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="11"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="12"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="13"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="14"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="15"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="16"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="17"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="18"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="19"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="20"></button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="21"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0001.jpg" alt="งานเครื่องมือกล1" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0002.jpg" alt="งานเครื่องมือกล2" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0003.jpg" alt="งานเครื่องมือกล3" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0004.jpg" alt="งานเครื่องมือกล4" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0005.jpg" alt="งานเครื่องมือกล5" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0006.jpg" alt="งานเครื่องมือกล6" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0007.jpg" alt="งานเครื่องมือกล7" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0008.jpg" alt="งานเครื่องมือกล8" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0009.jpg" alt="งานเครื่องมือกล9" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0010.jpg" alt="งานเครื่องมือกล10" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0011.jpg" alt="งานเครื่องมือกล11" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0012.jpg" alt="งานเครื่องมือกล12" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0013.jpg" alt="งานเครื่องมือกล13" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0014.jpg" alt="งานเครื่องมือกล14" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0015.jpg" alt="งานเครื่องมือกล15" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0016.jpg" alt="งานเครื่องมือกล16" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0017.jpg" alt="งานเครื่องมือกล17" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0018.jpg" alt="งานเครื่องมือกล18" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0019.jpg" alt="งานเครื่องมือกล19" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0020.jpg" alt="งานเครื่องมือกล20" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0021.jpg" alt="งานเครื่องมือกล21" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="chapImg1/บทที่ 1 ความรู้เบื้องต้นเกี่ยวกับ งานเครื่องมือกล_page-0022.jpg" alt="งานเครื่องมือกล22" class="d-block" style="width:100%">
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDemo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselDemo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- ส่วนท้าย -->
    <div class="mt-5 p-4 bg-dark text-center">
        <a href="mailto:66309010042@udontech.ac.th">66309010042@udontech.ac.th</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>