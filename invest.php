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

// Fetch and display opportunities
$sql = "SELECT * FROM opportunities";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html dir=rtl>
<head>
  <title>الفرص الاستثمارية المتاحة</title>
  <link rel="stylesheet" href="css/invest.css?v=<?php echo time(); ?>">
</head>
<body>
<style>
@import url('https://fonts.googleapis.com/css2?family=Changa:wght@200..800&display=swap');
</style>
<header>
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
<section id="opportunities">
    <h2 style="   font-family: 'Changa', sans-serif; font-optical-sizing: auto; font-weight: 500; font-style: normal;">الفــرص المتـاحــة</h2>
    <div class="opportunity-cards">
        <?php if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
                <div class="opportunity-card">
                    <h3><?php echo $row["title"]; ?></h3>
                    <p><?php echo substr($row["description"], 0, 50) . "..."; ?></p>
                    <p>العارض: <?php echo $row["bidder"]; ?></p>
                    <a href="view-opportunity.php?id=<?php echo $row["id"]; ?>" class="view-opportunity-btn">القي نظرة</a>
                </div>
            <?php }
        } else {
            echo "<h1>لا يوجد فرص متاحة.</h1>";
        } ?>
    </div>
</section>
   
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
</script>


</body>
</html>