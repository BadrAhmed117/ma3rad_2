
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add.css?v=<?php echo time(); ?>">
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

    <form id="form1" method="post">
        <div class="container">
            <h3 class="book">اضف فرصة</h3>

            <label class="arabic">عنوان الفرصة:</label>
            <input type="text" id="title" name="title" required>

            <label class="arabic">وصف الفرصة:</label>
            <input type="text" id="description" name="description" required >

            <label class="arabic">اسم العارض:</label>
            <input type="text" id="bidder" name="bidder"  required>

            <label class="arabic">رقم الهوية:</label>
            <input type="text" id="national" name="national"  required>

            <label class="arabic">رقم الهاتف:</label>
            <input type="text" id="phone" name="phone"  required>

            <label class="arabic">مدة العقد:</label>
            <input type="text" id="DOTC" name="DOTC"  required>

            <label class="arabic"> السعر:</label>
            <input type="text" id="budget" name="budget" required>

            <label class="arabic">المنطقة:</label>
            <input type="text" id="elamana" name="elamana" >

            <label class="arabic">الشارع:</label>
            <input type="text" id="street" name="street" required > 

            <label class="arabic">الحي:</label>
            <input type="text" id="neighborhood" name="neighborhood" required > 

            <label class="arabic">المساحة:</label>
            <input type="text" id="space" name="space" required > 

            <!-- database -->
<?php

if (isset($_POST["submit"])) {
    $conn =new mysqli('localhost','root','','ma3rad');
    $id=rand(1000,9999);
    $title= $_POST["title"];
    $description= $_POST["description"];
    $bidder= $_POST["bidder"];
    $national= $_POST["national"];
    $phone= $_POST["phone"];
    $DOTC= $_POST["DOTC"];
    $budget = $_POST['budget'];
    $street= $_POST["street"];
    $neighborhood= $_POST["neighborhood"];
    $space= $_POST["space"];

    $sql = "INSERT INTO opportunities (
       id,title, description, bidder,national,phone, DOTC, budget, street, neighborhood, space
    ) VALUES (
        '$id','$title', '$description', '$bidder','$national','$phone', '$DOTC', '$budget', '$street', '$neighborhood', '$space'
    )";
    
    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<h3 style=' border:none; color:green; text-align:center; font-weight:100; font-size:x-large;'>تم اضافة الفرصة بنجاح!</h3>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    

   
}

?>
            <button type="submit" name="submit" >أضف الفرصة</button>
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
var button = document.getElementById("hamburger");
    var menu = document.getElementById("menu");
    button.addEventListener("click", function() {
        menu.style.display = "block";
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