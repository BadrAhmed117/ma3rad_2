<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ma3rad";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the opportunity ID from the URL
if(isset($_GET['id'])) {
    $opportunityId = $_GET['id'];
} else {
    $opportunityId = null;
}


?>

<!DOCTYPE html>
<html dir=rtl>
<head>
    <title>التقديم على الفرصة</title>
    <link rel="stylesheet" href="css/submit.css?v=<?php echo time(); ?>">
</head>
<body>

<div class="container">
    <header>
    <nav id="nav" class="navbar" dir="ltr">
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
      <img class="phone_snap" src="images/icons8-snapchat-144.png" alt="">
      <img class="phone_insta" src="images/icons8-instagram-144.png" alt="">
      <img class="phone_tik" src="images/icons8-tiktok-144.png" alt="">
  </div>
  <div id="hamburger" class="hamburger">
    <div class="line" ></div>
    <div class="line" ></div>
    <div class="line" ></div>
  </div>
  </nav>
    </div>

    </header>
    <div class="content"></div>
    <?php
        echo "<h1 class='id'>التقديم على الفرصة رقم $opportunityId</h1>";
?>
    <main>
        <section>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <input type="hidden" id="opportunity" name="opportunity" value="<?php echo $opportunityId?>">
                <label for="name">الاسم:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">رقم الهوية:</label>
                <input type="text" id="national" name="national" required>

                <label for="phone">رقم الجوال:</label>
                <input type="text" id="phone" name="phone" required>

                <div class="terms-and-conditions">
  <label for="terms-checkbox" class="terms-label">
    <span class="checkbox-container">
      <input type="checkbox" id="terms-checkbox" name="terms-checkbox" required>
      <span class="checkmark"></span>
    </span>
    أقر بصحة جميع المعلومات الواردة أعلاه، والوثائق المُرفَقة ؛ صحيحة ومطابقة للواقع، وأتحمل المسؤولية الكاملة عن عدم صحة هذه المعلومات </label>
</div>

                <!-- php code -->
                <?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $opportunity= $_POST['opportunity'];
    $name = $_POST['name'];
    $national = $_POST['national'];
    $phone = $_POST['phone'];

    // Prepare the SQL query
    if($opportunityId !== null) {
        $sql = "INSERT INTO applied (opportunity, national, name, phone)
                VALUES ('$opportunity', '$national', '$name', '$phone')";
    } else {
        $sql = "INSERT INTO applied (opportunity, national, name, phone)
                VALUES ('$opportunity', '$national', '$name', '$phone')";
    }
    if ($conn->query($sql) === TRUE) {
        echo "<h2 style='color:green;'>تم تقديم الطلب!</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>
                <input type="submit" name="submit" value="قدم الطلب">
            </form>
        </section>
    </main>
    <img class="bottom_logo" src="images/logo1.png" alt="">
    <div class="bottom">
    <h2 class="terms">تطبق الشروط والأحكام</h2>
    </div>
    <script>

var button = document.getElementById("hamburger");
    var menu = document.getElementById("menu");
    var toggle_but=document.getElementById("toggle_but");
    var but1 = document.getElementById("form1-btn");
    var but2 = document.getElementById("form2-btn");
    button.addEventListener("click", function() {
        menu.style.display = "block";
      });

      document.addEventListener("click", function(event) {
      if (!event.target.closest("#menu") && !event.target.closest("#hamburger")) {
        menu.style.display = "none";
      }
    });

         if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>
</html>