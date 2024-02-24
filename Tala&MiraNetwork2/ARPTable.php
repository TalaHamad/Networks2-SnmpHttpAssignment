<?php

$ip = "127.0.0.1";
$MAC = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.2");// fetch Object according to the ID
$IP = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.3");
$Type = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.4");
$index = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.1"); //index

$ARP_Indexes = array();   // initialize array for the Indexes
$ARP_MAC = array();   // initialize array for the MAC
$ARP_IP = array();   // initialize array for the IP
$ARP_Type = array(); //initialize array for the type
$i =0;

foreach ($index as $k => $val){
    $x = explode(":" , $index[$i]);
    $i++;
    array_push($ARP_Indexes , $x[1]);
} // used to split the Index from the string ("INTEGER: value")

$i = 0 ; // reinitialize the counter

foreach ($MAC as $val){
    $x = explode(":", $MAC[$i]);
    if (count($x) >= 2) {
        $ARP_MAC[$i] = $x[1]; // Store the MAC address
    } else {
        // If the string is empty or doesn't contain the expected format, push an empty string
        $ARP_MAC[$i] = ""; // Push an empty string
    }
    $i++;
}

$i = 0 ; // reinitialize the counter

foreach ($IP as $k => $val){
    $x = explode(":" , $IP[$i]);
    $i++;
    array_push($ARP_IP , $x[1]);
} // used to split the IP from the string ("IpAddress: address")


$i = 0 ; // reinitialize the counter

foreach ($Type as $k => $val){
    $x = explode(":" , $Type[$i]);
    $i++;
    array_push($ARP_Type , $x[1]);

} // used to split the Type from the string ("INTEGER: value")

$i = 0 ; // reinitialize the counter



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
            <li><a class="anchor" href="UDPTable.php">Previous</a></li>
            <li><a class="anchor" href="Home.php">Home Page</a></li>
            <li><a class="anchor" href="SystemGroup.php">System Group</a></li>
            <li><a class="anchor" href="UDPTable.php">UDP Table</a></li>
            <li><a class="anchor" href="ARPTable.php">ARP Table</a></li>
            <li><a class="anchor" href="TCPTable.php">TCP Table</a></li>
            <li><a class="anchor" href="TCPTable.php">Next</a></li>
        </ul>
    </nav>
</header>



<div data-barba="wrapper">
    <main data-barba="container" data-barba-namespace="about">
        <div class="heading-container">
            <table style="margin-top: 7%;" class="container_data">
                <thead>
                <tr>  <th style="text-align: center;"> ID </th> <th style="text-align: center;"> Index </th> <th style="text-align: center;"> MAC Address </th> <th style="text-align: center;"> IP Address </th>  <th style="text-align: center;"> Type </th>  </tr>
                </thead>
                <tbody style="text-align: center;">
                <?php
                foreach ($ARP_Indexes as $k => $val){
                    echo "<tr> <td> $i </td> <td> $ARP_Indexes[$i] </td> <td> $ARP_MAC[$i]</td>  <td> $ARP_IP[$i]</td>  <td> $ARP_Type[$i]</td>  </tr>";
                    $i++;
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