<?php
require "../../session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>แบบทดสอบก่อนเรียน</title>
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
                    <a class="nav-link active" data-bs-toggle="offcanvas" data-bs-target="#demo">เมนู</a>
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
        <?php
        for ($i = 1; $i <= 7; $i++) {
            echo '<div class="dropdown dropend p-1">';
            echo '<button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">';
            echo 'บทที่ ' . $i;
            echo '</button>';
            echo '<ul class="dropdown-menu">';
            echo '<li><a class="dropdown-item" href="../chapter' . $i . '/pretest.php">แบบทดสอบก่อนเรียน</a></li>';
            echo '<li><a class="dropdown-item" href="../chapter' . $i . '/lesson.php">บทเรียน</a></li>';
            echo '<li><a class="dropdown-item" href="../chapter' . $i . '/postest.php">แบบทดสอบหลังเรียน</a></li>';
            echo '</ul>';
            echo '</div>';
        }
        ?>
    </div>
    </div>

    <!-- แบบทดสอบ -->
    <div class="container p-5 my-5 bg-white">
        <h1 class="text-center navyf">แบบทดสอบหลังเรียน</h1>
        <h2 class="text-danger text-center">บทที่ 1. ความรู้เบื้องต้นเกี่ยวกับเครื่องมือกล</h2>
        <p><b class="text-danger">คำชี้แจง :</b> จงเลือกคำตอบข้อที่ถูกต้องที่สุดเพียงคำตอบเดียว (14 คะแนน)</p>
        <form id="quizForm">
            <p class="mt-5">1.การขันหรือคลายสลักเกลียวในพื้นที่แคบและลึกควรเลือกใช้เครื่องมือชนิดใด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="1">
                <label class="form-check-label" for="radio1">ประแจปากตาย</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="2">
                <label class="form-check-label" for="radio2">ประแจหกเหลี่ยม</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="3">
                <label class="form-check-label" for="radio3">ประแจบล็อก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="4">
                <label class="form-check-label" for="radio4">ประแจตะขอ</label>

                <p class="mt-5">2.การขันล็อกแกนเพลาของเครื่องกัดควรเลือกใช้เครื่องมือชนิดใด</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="1">
                    <label class="form-check-label" for="radio1">ประแจปากตาย</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="2">
                    <label class="form-check-label" for="radio2">ประแจหกเหลี่ยม</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="3">
                    <label class="form-check-label" for="radio3">ประแจบล็อก</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="4">
                    <label class="form-check-label" for="radio4">ประแจตะขอ</label>
                </div>

                <p class="mt-5">3.เครื่องมือชนิดใดที่ใช้ขันหรือคลายสกรูหัวฝัง</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="1">
                    <label class="form-check-label" for="radio1">ประแจปากตาย</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="2">
                    <label class="form-check-label" for="radio2">ประแจหกเหลี่ยม</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="3">
                    <label class="form-check-label" for="radio3">ประแจบล็อก</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="4">
                    <label class="form-check-label" for="radio4">ประแจตะขอ</label>
                </div>

                <p class="mt-5">4.จากรูป คือ ประแจชนิดใด</p>
                <img src="postest/Q4.PNG" alt="pic" style="width:70%">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="1">
                    <label class="form-check-label" for="radio1">ประแจปากตายด้านเดียว</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="2">
                    <label class="form-check-label" for="radio2">ประแจปากตายสองด้าน </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="3">
                    <label class="form-check-label" for="radio3">ประแจปากผสม</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="4">
                    <label class="form-check-label" for="radio4">ประแจแหวน </label>
                </div>

                <p class="mt-5">5.เครื่องมือที่ใช้ในการขันท่อหรือจับยึดท่อ คือ</p>
                <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q5" value="1">
                        <label class="form-check-label" for="radio1">
                            <img src="postest/Q5A.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q5" value="2">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q5B.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q5" value="3">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q5C.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q5" value="4">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q5D.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                </div>

                <p class="mt-5">6.เครื่องมือที่ใช้ในการขันหรือคลายสกรูหัวผ่าร่องตรง คือ</p>
                <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q6" value="1">
                        <label class="form-check-label" for="radio1">
                            <img src="postest/Q6A.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q6" value="2">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q6B.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q6" value="3">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q6C.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q6" value="4">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q6D.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                </div>

                <p class="mt-5">7.คีมชนิดใดสามารถจับยึดชิ้นงานแบน ชิ้นงานกลมและตัดเส้นลวดขนาดเล็กได้</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="1">
                    <label class="form-check-label" for="radio1">คีมปากจิ้งจก</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="2">
                    <label class="form-check-label" for="radio2">คีมล็อก</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="3">
                    <label class="form-check-label" for="radio3">คีมตัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="4">
                    <label class="form-check-label" for="radio4">คีมปากประสม</label>
                </div>

                <p class="mt-5">8.คีมชนิดใดใช้สำหรับจับหรือบีบชิ้นงานขนาดเล็ก</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="1">
                    <label class="form-check-label" for="radio1">คีมปากจิ้งจก</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="2">
                    <label class="form-check-label" for="radio2">คีมปากประสม</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="3">
                    <label class="form-check-label" for="radio3">คีมตัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="4">
                    <label class="form-check-label" for="radio4">คีมล็อก</label>
                </div>

                <p class="mt-5">9.จากรูปข้อใด คือ ประแจบล็อก</p>
                <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q9" value="1">
                        <label class="form-check-label" for="radio1">
                            <img src="postest/Q9A.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q9" value="2">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q9B.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q9" value="3">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q9C.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q9" value="4">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q9D.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                </div>

                <p class="mt-5">10.คีมชนิดใดมีปากด้านข้างเอียงเป็นคมตัดใช้สำหรับตัดเส้นลวดขนาดเล็กและสายไฟฟ้า</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="1">
                    <label class="form-check-label" for="radio1">คีมปากจิ้งจก</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="2">
                    <label class="form-check-label" for="radio2">คีมปากประสม</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="3">
                    <label class="form-check-label" for="radio3">คีมตัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="4">
                    <label class="form-check-label" for="radio4">คีมล็อก</label>
                </div>

                <p class="mt-5">11.จากรูป การขันยึดหรือคลายสกรูชนิดนี้ต้องใช้เครื่องมือชนิดใด</p>
                <img src="postest/Q11.PNG" alt="pic" style="width:60%">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="1">
                    <label class="form-check-label" for="radio1">ประแจหกเหลี่ยม</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="2">
                    <label class="form-check-label" for="radio2">ประแจแหวน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="3">
                    <label class="form-check-label" for="radio3">ประแจเลื่อน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="4">
                    <label class="form-check-label" for="radio4">ประแจบล็อก</label>
                </div>

                <p class="mt-5">12.ค้อนที่เหมาะสำหรับงานเคาะเบา ๆ เพื่อปรับแต่งชิ้นงานให้ได้ตำแหน่งบนอุปกรณ์จับยึด คือ</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="1">
                    <label class="form-check-label" for="radio1">ค้อนหัวกลม </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="2">
                    <label class="form-check-label" for="radio2">ค้อนหัวพลาสติก</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="3">
                    <label class="form-check-label" for="radio3">ค้อนหัวตรง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="4">
                    <label class="form-check-label" for="radio4">ค้อนหัวขวาง</label>
                </div>

                <img src="postest/Q13.PNG" alt="pic" style="width:70%">
                <p class="mt-5">13.จากรูป การถอด-ประกอบแหวนสปริงล็อกนอกควรเลือกใช้เครื่องมือชนิดใด</p>
                <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q13" value="1">
                        <label class="form-check-label" for="radio1">
                            <img src="postest/Q13A.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q13" value="2">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q13B.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q13" value="3">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q13C.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q13" value="4">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q13D.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                </div>

                <p class="mt-5">14.เครื่องมือในข้อใดแตกต่างจากพวก</p>
                <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q14" value="1">
                        <label class="form-check-label" for="radio1">
                            <img src="postest/Q14A.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q14" value="2">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q14B.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q14" value="3">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q14C.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q14" value="4">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q14D.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                </div>

                <p class="mt-5">15.เครื่องมือในข้อใดแตกต่างจากพวก</p>
                <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q15" value="1">
                        <label class="form-check-label" for="radio1">
                            <img src="postest/Q15A.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q15" value="2">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q15B.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q15" value="3">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q15C.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q15" value="4">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q15D.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button type="button" class="btn navy text-white mt-3" id="checkAnswers">ยืนยัน</button>
                </div>
        </form>
    </div>
    </div>

    <!-- ส่วนท้าย -->
    <div class="mt-5 p-4 bg-dark text-center">
        <a href="mailto:66309010042@udontech.ac.th" class="text-warning">66309010042@udontech.ac.th</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="postest.js" defer></script>
</body>

</html>