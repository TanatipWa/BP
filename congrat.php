<html>

<head>
    <link rel="stylesheet" type="text/css" href="css\style.css" />
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>

    <?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "BP";
    $conn = mysqli_connect($hostname, $username, $password);
    if (!$conn) die("ไม่สามารถติดต่อกับ MySQL ได้");
    mysqli_select_db($conn, $dbname) or die("ไม่สามารถเลือกฐานข้อมูล BP ได้");

    //***************
    $sql10 = "SELECT * FROM ticket WHERE id=1 LOCK IN SHARE MODE";
    mysqli_query($conn, $sql10) or die("INSERT ลงตาราง BP มีข้อผิดพลาดเกิดขึ้น" . mysqli_error($conn));

    $sqltxt = "SELECT number FROM ticket";
    $result = mysqli_query($conn, $sqltxt);

    $rs = mysqli_fetch_array($result);
    $number_sale1 = $rs[0];

    $number_sale2 = 0;
    $bye = false;
    if ($number_sale1 > 0) {
        $bye = true;
        $number_sale2 =  $number_sale1 - 1;
    }

    $sql1 = "UPDATE ticket SET number='$number_sale2'";
    mysqli_query($conn, $sql1) or die("INSERT ลงตาราง BP มีข้อผิดพลาดเกิดขึ้น" . mysqli_error($conn));

    if ($bye) {

        echo "<div class =box>";

        echo "<div class=fulllogo>";
        echo "<div class =logo>";
        echo "<img src='pic/Blackpink logo - 1.svg'>";
        echo "</div>";
        echo "</div>";

        echo "<div class = logoT >";
        echo "<img src=pic/congratulations.svg >";
        echo "</div>";

        echo "<div class=text>";
        echo "Congratulations !";

        echo "</div>";
        echo "<div class=yourTicket>";
        echo "Your ticket number";
        echo "</div>";

        echo "<div class=number>";

        printf("BP%04d", 11 - $number_sale1);

        echo "</div>";

        echo "<div class=under>";
        echo "Blackpink in your area";

        echo "</div>";
    } else {
        echo "<div class =box>";

        echo "<div class=fulllogo>";
        echo "<div class =logo>";
        echo "<img src='pic/Blackpink logo - 1.svg'>";
        echo "</div>";
        echo "</div>";

        echo "<div class = logoT >";
        echo "<img src=pic/sad.svg >";
        echo "</div>";

        echo "<div class=text>";
        echo "Sold out";

        echo "</div>";
        echo "<div class=yourTicket>";
        echo "Maybe next time.";
        echo "</div>";

        echo "<div class=under>";
        echo "Blackpink in your area";

        echo "</div>";
    }
    ?>
    </div>

    <?php

    $sql11 = "UNLOCK TABLES;";
    mysqli_query($conn, $sql11) or die("INSERT ลงตาราง BP มีข้อผิดพลาดเกิดขึ้น" . mysqli_error($conn));
    mysqli_close($conn);
    ?>
</body>


</html>