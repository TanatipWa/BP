<html>

<head>
    <style>
        .a {
            position: absolute;
            width: 490px;
            height: 900px;
            left: calc(50% - 490px/2);
            top: 0px;
            text-align: center;

            background: #FFFFFF;
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.1);
        }

        .b {
            position: center;
            width: 490px;
            height: 84px;
            left: 475px;
            top: 0px;

            background: #FFFFFF;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.05);
        }

        .c {
            position: absolute;
            width: 206px;
            height: 48px;
            left: calc(50% - 206px/2);
            top: 18px;

            /* Pink - BP */

        }

        .d {
            position: absolute;
            width: 379px;
            height: 80px;
            left: calc(50% - 379px/2 + 0.5px);
            top: 669px;

            /* Pink - BP */

            background: #F5678D;
            border-radius: 80px;
        }

        .e {
            position: center;
            width: 153px;
            height: 21px;
            left: 644px;
            top: 859px;

            font-family: Sarabun;
            font-style: normal;
            font-weight: normal;
            font-size: 16px;
            line-height: 21px;
            /* identical to box height */

            text-align: center;

            /* Pink - BP */

            color: #F5678D;
        }

        .f {
            position: absolute;
            width: 379px;
            height: 80px;
            left: calc(50% - 379px/2 + 0.5px);
            top: 669px;

            /* Gray 5 */

            background: #E0E0E0;
            border-radius: 80px;
        }
    </style>

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

    date_default_timezone_set('Asia/Bangkok');
    $sqltxt = "SELECT date_sale FROM ticket";
    $result = mysqli_query($conn, $sqltxt);

    $rs = mysqli_fetch_array($result);
    $date_sale = $rs[0];


    $checkdate = false;
    if ($date_sale == date("Y-m-d")) {
        $checkdate = true;
    }

    $sqltxt2 = "SELECT time_sale FROM ticket";
    $result2 = mysqli_query($conn, $sqltxt2);

    $rs2 = mysqli_fetch_array($result2);
    $time_sale = $rs2[0];

    $time_sale2 = explode(":", $time_sale);

    $checktime = false;
    if (
        $time_sale2[0] <= date('H') &&
        $time_sale2[1] <= date('i') &&
        $time_sale2[2] == date('A')
    ) {
        $checktime = true;
    }

    $sqltxt5 = "SELECT number FROM ticket";
    $result5 = mysqli_query($conn, $sqltxt5);

    $rs5 = mysqli_fetch_array($result5);
    $number_sale5 = $rs5[0];

    $bye5 = false;
    if ($number_sale5 > 0) {
        $bye5 = true;
    }

    $canBuy = false;
    if ($checkdate && $checktime) {
        $canBuy = true;
    }

    ?>

    <center>
        <div class="a">
            <table style="text-align:center;">
                <tr>
                    <td>
                        <div class="b">
                            <div class="c"><img src="picBP/logo2.svg"></img></div>
                        </div>
                    </td>

                </tr>
                <tr>
                    <td>
                        <br>
                        <br>

                        <i>You can get free concert</i><br><br>

                        <img src="picBP/logo.svg"></img><br><br><br>

                        <img src="picBP/Pic - Blackpink.png"></img><br><br><br>

                        <h1>Get ticket</h1>

                        <i>Sunday 26 January 2020 at 04.45 PM.</i><br><br>

                        <?php
                        if ($bye5) {

                            if ($checkdate && $checktime) {
                                echo "<a href=congrat.php><button class=d>";
                                echo "<font size=15 color=white>Get ticket now</font>";
                                echo "</button></a>";
                            } else {
                                echo "<button class=f>";
                                echo "<font size=15 color=white>Coming soon</font>";
                                echo "</button>";
                            }
                        } else {
                            echo "<button class=f>";
                            echo "<font size=15 color=white>SOLU OUT</font>";
                            echo "</button>";
                        }
                        ?>
                        <center><br><br><br><br><br><br><br><br><br><br><br><br>
                            <div class="e">Blackpink in your area</div>
                    </td>
                </tr>
            </table>
        </div>
    </center>

    <?php
    mysqli_close($conn);
    header("Refresh:5; indexBP.php");

    ?>

</body>

</html>