<?php

$ip = "127.0.0.1:161";      // initialize the ip of the local host on the port for req/res mode

if (isset($_REQUEST["NAME"])) {
    snmp2_set($ip, "public", ".1.3.6.1.2.1.1.5.0", "s", $_REQUEST['NAME_text']);
    $Name = snmp2_get($ip, "public", ".1.3.6.1.2.1.1.5.0");
}

if (isset($_REQUEST["CONTACT"])) {
    snmp2_set($ip, "public", ".1.3.6.1.2.1.1.4.0", "s", $_REQUEST['Contact_text']);
    $Contact = snmp2_get($ip, "public", ".1.3.6.1.2.1.1.4.0");
}

if (isset($_REQUEST["LOCATION"])) {
    snmp2_set($ip, "public", ".1.3.6.1.2.1.1.6.0", "s", $_REQUEST['Location_text']);
    $Location = snmp2_get($ip, "public", ".1.3.6.1.2.1.1.6.0");
}

$Name = snmp2_get($ip , "public" , ".1.3.6.1.2.1.1.5.0");
$OID = snmp2_get($ip , "public" , ".1.3.6.1.2.1.1.2.0");
$Desc = snmp2_get($ip , "public" , ".1.3.6.1.2.1.1.1.0");
$UP_Time = snmp2_get($ip , "public" , ".1.3.6.1.2.1.1.3.0");
$Contact = snmp2_get($ip , "public" , ".1.3.6.1.2.1.1.4.0");
$Location = snmp2_get($ip , "public" , ".1.3.6.1.2.1.1.6.0");


?>

<!doctype html>
<html class="no-js" lang="">

<head>

    <meta charset="utf-8">
    <title>SNMP Assignment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Pretty Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

    <!-- CSS Defaults -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/default.css">

    <!-- Main CSS file -->
    <link rel="stylesheet" href="css/main.css">

</head>

<body>
<div class="loading-container">
    <div class="loading-screen">
    </div>
</div>

<header>
    <nav style="opacity: 1; transform: translate(0px, 0px); background-color: #1f2739; padding: 10px 100px;" >
        <ul>

            <li><a class="anchor" href="Home.php">Previous</a></li>
            <li><a class="anchor" href="Home.php">Home Page</a></li>
            <li><a class="anchor" href="SystemGroup.php">System Group</a></li>
            <li><a class="anchor" href="UDPTable.php">UDP Table</a></li>
            <li><a class="anchor" href="ARPTable.php">ARP Table</a></li>
            <li><a class="anchor" href="TCPTable.php">TCP Table</a></li>
            <li><a class="anchor" href="UDPTable.php">Next</a></li>

        </ul>
    </nav>
</header>


<!-- Better to wrap barba container as close as possible -->
<div data-barba="wrapper">
    <!-- Only this section changes on link navigation -->
    <main data-barba="container" data-barba-namespace="home">
        <div class="heading-container">
            <form action="SystemGroup.php" method="post">
                <table style="margin-top: 10%;" class="container_data">
                    <tbody>
                    <tr>
                        <td style="text-align: center;" >System Name </td>
                        <td  style="padding-left: 2%;"=>
                            <label>
                                <?php
                                echo "'".explode(": " , $Name)[1]."'" ; // explode used to separate between the object data type and its data value, such index 1 indicate the value
                                ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">System Object ID </td>
                        <td  style="padding-left: 2%;"=>
                            <label>
                                <?php
                                echo "'".explode(": " , $OID)[1]."'" ;  // explode used to separate between the object data type and its data value
                                ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">System Description </td>
                        <td  style="padding-left: 2%;"=>
                            <label>
                                <?php
                                echo "'".explode(": " , $Desc)[1]. ": " . explode(": " , $Desc)[2]."'" ;    // concatenate between the second and third element of the explode due there is :
                                ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" >System Up Time </td>
                        <td  style="padding-left: 2%;"=>
                            <label>
                                <?php
                                echo "'".explode(": " , $UP_Time)[1]."'" ;  // explode used to separate between the object data type and its data value
                                ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" >System Contact</td>
                        <td  style="padding-left: 2%;"=>
                            <label>
                                <?php
                                echo "'".explode(": " , $Contact)[1]."'" ;  // explode used to separate between the object data type and its data value
                                ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" >System Location</td>
                        <td  style="padding-left: 2%;"=>
                            <label>
                                <?php
                                echo "'".explode(": " , $Location)[1]."'" ;
                                ?>
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <input class="in_datatxt" name="NAME_text" type="text">
                <input class="in_data" name="NAME" type="submit" value="Change Name">


                <input class="in_datatxt" name="Contact_text" type="text">
                <input class="in_data" name="CONTACT" type="submit" value="Change Contact">

                <input class="in_datatxt" name="Location_text" type="text">
                <input class="in_data" name="LOCATION" type="submit" value="Change Location">


            </form>
        </div>
    </main>
</div>


</body>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!-- Barba Core -->
<script src="https://unpkg.com/@barba/core"></script>

<!-- GSAP for animation -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/gsap.min.js"></script>

<!-- Some basic helper functions -->
<script src="js/helper.js"></script>

<!-- Main JS file -->
<script src="js/main.js"></script>


</html>
