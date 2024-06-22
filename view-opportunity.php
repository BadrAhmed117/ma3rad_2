<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ma3rad";

$conn = new mysqli($servername, $username, $password, $dbname);
$opportunityId = $_GET['id'];
$sql = "SELECT * FROM opportunities WHERE id = $opportunityId";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Redirect the user to the registration page for the opportunity
    header("Location: register.php?id=" . $opportunityId);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>تفاصيل الفرصة</title>
    <link rel="stylesheet" href="css/view.css">
</head>
<body>
    <header>
        <h1>تفاصيل الفرصة</h1>
        <nav>
            <ul>
                <li><a href="index.php">الرجوع الى الفرص</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2><?php echo $row["title"]; ?></h2>
            <p><?php echo $row["description"]; ?></p>
            <p>العارض: <?php echo $row["bidder"]; ?></p>
            <p>مدة العقد: <?php echo $row["DOTC"]; ?></p>
            <p>السعر: <?php echo $row["budget"]; ?></p>
            <p>الشارع: <?php echo $row["street"]; ?></p>
            <p>الحي: <?php echo $row["neighborhood"]; ?></p>
            <p>المساحة: <?php echo $row["space"]; ?></p>
            <div class="action-buttons">
                <a href="register.php?id=<?php echo $opportunityId; ?>" class="btn btn-primary">قدم طلب</a>
            </div>
        </section>
    </main>
</body>
</html>