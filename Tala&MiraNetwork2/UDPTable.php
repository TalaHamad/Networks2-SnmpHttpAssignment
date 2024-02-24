<?php
$ip = "127.0.0.1:161";
$UDP_LOCAL = snmp2_walk($ip , "public" , "1.3.6.1.2.1.7.5.1.1"); // we use the snmp walk to get the addresses using the get next request
$UDP_LOCALPORT = snmp2_walk($ip , "public", "1.3.6.1.2.1.7.5.1.2"); // here we will get the port of the addresses
$udp_obj = 0 ;

$UDP_Addresses = array();   // initialize array for the addresses
$UDP_PORT = array();        // initialize array for the ports

foreach ($UDP_LOCAL as $k => $val){
    $x = explode(":" , $UDP_LOCAL[$udp_obj]);
    $udp_obj++;
    array_push($UDP_Addresses , $x[1]);
} // used to split the address from the string ("ip address: address value")

$udp_obj = 0 ; // reinitialize the counter

foreach ($UDP_LOCALPORT as $k => $val){
    $x = explode(":" , $UDP_LOCALPORT[$udp_obj]);
    $udp_obj++;
    array_push($UDP_PORT , $x[1]);
} // used to split the port from the string ("INTEGER: port value")

$udp_obj = 0 ; // reinitialize the counter


?>



<!doctype html>
<html class="no-js" lang="">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SNMP Assignment</title>

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
            <li><a class="anchor" href="SystemGroup.php">Previous</a></li>
            <li><a class="anchor" href="Home.php">Home Page</a></li>
            <li><a class="anchor" href="SystemGroup.php">System Group</a></li>
            <li><a class="anchor" href="UDPTable.php">UDP Table</a></li>
            <li><a class="anchor" href="ARPTable.php">ARP Table</a></li>
            <li><a class="anchor" href="TCPTable.php">TCP Table</a></li
            <li><a class="anchor" href="ARPTable.php">Next</a></li>
        </ul>
    </nav>
</header>



<div data-barba="wrapper">
    <main data-barba="container" data-barba-namespace="about">
        <div class="heading-container">
            <table style="margin-top: 7%;" class="container_data">
                <thead>
                <tr> <th style="text-align: center;"> ID </th> <th style="text-align: center;"> IP Address </th> <th style="text-align: center;"> Port </th> </tr>
                </thead>
                <tbody style="text-align: center;">
                <?php
                foreach ($UDP_Addresses as $k => $val){
                    echo "<tr> <td> $udp_obj </td><td> $UDP_Addresses[$udp_obj] </td> <td> $UDP_PORT[$udp_obj]</td> </tr>";
                    $udp_obj++;
                }   // used to print the UDP table
                ?>
                </tbody>
            </table>
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
