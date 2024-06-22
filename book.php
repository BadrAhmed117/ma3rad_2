<!-- database -->
<?php

if (isset($_POST["submit"])) {
    $conn =new mysqli('localhost','root','','ma3rad');
    $fname= $_POST["fname"];
    $sname= $_POST["sname"];
    $job= $_POST["job"];
    $cname= $_POST["cname"];
    $cactivity = $_POST['cactivity'];
    $telephone= $_POST["telephone"];
    $mobile= $_POST["mobile"];
    $web= $_POST["web"];
    $city= $_POST["city"];
    $country= $_POST["country"];
    $status="مشارك";
    // إنشاء معرف عشوائي للمستخدم

    $user_id = rand(10000, 99999);

    // قم بإدخال البيانات في قاعدة البيانات
    $techeck= "SELECT * FROM users Where telephone='$telephone'";
    $result=mysqli_query($conn,$techeck);
    $present=mysqli_num_rows($result);
    if($present>0)
{
    echo "<script>alert('The telephone was found')</script>";
}
else{

    $sql_1= "SELECT * FROM users Where mobile='$mobile'";
    $result_1=mysqli_query($conn,$sql_1);
    $present_1=mysqli_num_rows($result_1);

    if($present_1>0)
    {
        echo "<script>alert('The mobile was found')</script>";

    }else{
        $sql = mysqli_query ($conn ,"Insert into users (id,fname, sname, job, cname, cactivity, telephone, mobile, web, city, country,status)
        values('$user_id','$fname','$sname','$job','$cname','$cactivity','$telephone','$mobile','$web','$city','$country','$status')");

        // إذا تم إدخال البيانات بنجاح، قم بالتحويل إلى صفحة عرض بطاقة الهوية

        header("Location:card.php?user_id=$user_id");
        exit;
}
}
}


/* visitors */

if(isset($_POST['vsubmit']))
{
    $conn =new mysqli('localhost','root','','ma3rad');
    $vfname= $_POST["vfname"];
    $vsname= $_POST["vsname"];
    $vemail= $_POST["vemail"];
    $vmobile= $_POST["vmobile"];
    $vstatus="زائر";
    // إنشاء معرف عشوائي للمستخدم

    $vuser_id = rand(100000, 999999);

    // قم بإدخال البيانات في قاعدة البيانات
    $techeck= "SELECT * FROM visitors Where mobile='$vmobile'";
    $result=mysqli_query($conn,$techeck);
    $present=mysqli_num_rows($result);
    if($present>0)
{
    echo "<script>alert('The mobile was found')</script>";
}else{
        $sql = mysqli_query ($conn ,"Insert into visitors (id,fname, sname, mobile,email,status)
        values('$vuser_id','$vfname','$vsname','$vmobile','$vemail','$vstatus')");

        // إذا تم إدخال البيانات بنجاح، قم بالتحويل إلى صفحة عرض بطاقة الهوية

        header("Location:vcard.php?user_id=$vuser_id");
        exit;
}
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/book.css?v=<?php echo time(); ?>">
    <title>Ma3rad</title>
</head>
<body id="body">
    <nav class="navbar" dir="ltr">
        <!-- logo -->
        <div class="slogo">
            <img class="nlogo" src="images/slogo.png" alt="">
        </div>
        <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="index.html#goals">About</a></li>
        <li><a href="index.html#contact">Contact us</a></li>
        <li><a href="book.php">Book now</a></li>
        <li><a href="invest.php">Invest now</a></li>
        <li><a href="add.php">Add opportunity now</a></li>
        </ul>
        <div class="social">
            <img class="snap" src="images/icons8-snapchat-144.png" alt="">
            <img class="insta" src="images/icons8-instagram-144.png" alt="">
            <img class="tik" src="images/icons8-tiktok-144.png" alt="">
        </div>
    </nav>

    <div class="phone">
    <nav dir= ltr class="phone_nav" id="nav">
      
  
      <!-- logo -->
       <div class="phone_slogo" >
          <img class="phone_nlogo" src="images/slogo.png" alt="">
       </div>
  <div id="menu" class="menu">
  <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="index.html#phone_goals">About</a></li>
        <li><a href="index.html#phone_contact">Contact us</a></li>
        <li><a href="book.php">Book now</a></li>
        <li><a href="invest.php">Invest now</a></li>
        <li><a href="add.php">Add opportunity now</a></li>
 </ul>
    </div>
    <div class="phone_social">
      <img class="snap" src="images/icons8-snapchat-144.png" alt="">
      <img class="insta" src="images/icons8-instagram-144.png" alt="">
      <img class="tik" src="images/icons8-tiktok-144.png" alt="">
  </div>
  <div id="hamburger" class="hamburger">
    <div class="line" ></div>
    <div class="line" ></div>
    <div class="line" ></div>
  </div>
  </nav>
    </div>

    <!-- Toggle buttons -->
    <div id="toggle_but" class="toggle-buttons">
        <button id="form1-btn" class="tbutton"  >مشارك</button>
        <button id="form2-btn" class="tbutton" >زائر</button>
    </div>

    <!-- Form 1 -->
    <form id="form1" method="post">
        <div class="container">
            <h3 class="book">Book Now</h3>
            <label class="english">:First Name</label>
            <label class="arabic">الاسم الاول:</label>
            <input type="text" id="fname" name="fname" required >

            <label class="english">:second Name</label>
            <label class="arabic">الاسم الثاني:</label>
            <input type="text" id="sname"  name="sname" required>

            <label class="english">:job title</label>
            <label class="arabic">المسمى الوظيفي:</label>
            <input type="text" id="job" name="job" required>

            <label class="english">:company name</label>
            <label class="arabic">اسم الشركة:</label>
            <input type="text" id="cname" name="cname" required >


            <!-- product sector -->

                <label class="english">:Comapny Activity</label>
                <label class="arabic">نشاط الشركة:</label>
                <div class="product">
                <select name="cactivity" id="cactivity" required>
                    <option value="مطور عقاري">مطور عقاري</option>
                    <option value="استثمار عقاري">استثمار عقاري</option>
                    <option value="مقاولات عامة">مقاولات عامة</option>
                    <option value="مقاولات فرعية">مقاولات فرعية</option>
                    <option value="تشيد و بناء">تشيد و بناء</option>
                    <option value="خرصانة جاهزة">خرصانة جاهزة</option>
                    <option value="عقارات">عقارات</option>
                    <option value="تعمير و بناء">تعمير و بناء</option>
                    <option value="مواد بناء">مواد بناء</option>
                    <option value="استشارات هندسية">استشارات هندسية</option>
                    <option value="ديكور">ديكور</option>
                    <option value="تصميم معماري">تصميم معماري</option>
                    <option value="الامن والسلامة">الامن والسلامة</option>

                </select>
            </div>
            <label class="english">:Telephone</label>
            <label class="arabic">الهاتف:</label>
            <input type="text" id="telephone" name="telephone"  required>

            <label class="english">:Mobile</label>
            <label class="arabic"> الجوال:</label>
            <input type="text" id="mobile" name="mobile" required>

            <label class="english">:Website</label>
            <label class="arabic">الموقع الألكتروني:</label>
            <input type="text" id="web" name="web" >


            <label class="english">:City</label>
            <label class="arabic">المدينة:</label>
            <input type="text" id="city" name="city"  required >

            <label class="english" >:Country</label>
            <label class="arabic">الدولة:</label>
            <input type="text" id="country" name="country" required > 

            <button type="submit" name="submit" >Submit</button>
        </div>
    </form>

    <!-- Form 2 -->
    <form id="form2" class="form_2" method="post" style="display: none;">
        <div class="container">
            <h3>Book Now</h3>
            <label class="english">:First Name</label>
            <label class="arabic">الاسم الاول:</label>
            <input type="text" id="vfname" name="vfname" required >
    
            <label class="english">:second Name</label>
            <label class="arabic">الاسم الثاني:</label>
            <input type="text" id="vsname"  name="vsname" required>
    
            
            <label class="english">:Mobile</label>
            <label class="arabic">رقم الجوال:</label>
            <input type="text" id="vmobile" name="vmobile"  required>
    
            <label class="english">:email</label>
            <label class="arabic"> البريد الألكتروني:</label>
            <input type="text" id="vemail" name="vemail" required>
    
            <button type="submit" name="vsubmit" >Submit</button>
        </div>
    </form>
  
    <!-- text and logo -->
    <div class="logo">
        <img class="blogo" src="images/logo.png" alt="">
    </div>
    <div class="fp">
        <h3 class="ma3">معرض سيتي لاينز للبناء و التشييد</h3>
        <h3 class="first">(نسخته الاولى)</h3>
        <h3 class="jouf">الجوف</h3>
        <img class="bracket" src="images/bracket.png" alt="">
    </div>


    <script>
        // Toggle button click event handlers
        document.getElementById('form1-btn').addEventListener('click', () => {
  document.getElementById('form1').style.display = 'block';
  document.getElementById('form1').classList.add('form-transition');
  document.getElementById('form2').style.display = 'none';
  document.getElementById('form2').classList.remove('form-transition');
});

document.getElementById('form2-btn').addEventListener('click', () => {
  document.getElementById('form1').style.display = 'none';
  document.getElementById('form1').classList.remove('form-transition');
  document.getElementById('form2').style.display = 'block';
  document.getElementById('form2').classList.add('form-transition');
  document.body.style.height = '600px';
});


var button = document.getElementById("hamburger");
    var menu = document.getElementById("menu");
    var toggle_but=document.getElementById("toggle_but");
    var but1 = document.getElementById("form1-btn");
    var but2 = document.getElementById("form2-btn");
    button.addEventListener("click", function() {
        menu.style.display = "block";
        toggle_but.style.width ="30%";
        toggle_but.style.right ="200px";
        but1.style.width="100%";
        but2.style.width="100%";
      });

      document.addEventListener("click", function(event) {
      if (!event.target.closest("#menu") && !event.target.closest("#hamburger")) {
        menu.style.display = "none";
      }
    });

        // Prevent form resubmission
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>
</html>