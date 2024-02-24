
<?php
$ip = "127.0.0.1";

$ConnectionState = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.1");
$ConnectionLocalAddress = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.2");
$ConnectionLocalPort = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.3");
$RemoteAddress = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.4");//Remote
$RemotePort = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.5");

$i =0;
$TCP_ConnectionState= array();
$TCP_ConnectionLocalAddress= array();
$TCP_ConnectionLocalPort= array();
$TCP_RemoteAddress= array();
$TCP_RemotePort = array();


foreach ($ConnectionState as $k => $val){
    $x = explode(":" , $ConnectionState[$i]);
    $i++;
    array_push($TCP_ConnectionState , $x[1]);
} // used to split the Index from the string ("INTEGER: value")

$i = 0 ; // reinitialize the counter


foreach ($ConnectionLocalAddress as $k => $val){
    $x = explode(":" , $ConnectionLocalAddress[$i]);
    $i++;
    array_push($TCP_ConnectionLocalAddress , $x[1]);
} // used to split the Index from the string ("IpAddress: Address")

$i = 0 ; // reinitialize the counter


foreach ($ConnectionLocalPort as $k => $val){
    $x = explode(":" , $ConnectionLocalPort[$i]);
    $i++;
    array_push($TCP_ConnectionLocalPort , $x[1]);
} // used to split the Index from the string ("INTEGER: value")

$i = 0 ; // reinitialize the counter


foreach ($RemoteAddress as $k => $val){
    $x = explode(":" , $RemoteAddress[$i]);
    $i++;
    array_push($TCP_RemoteAddress , $x[1]);
} // used to split the Index from the string ("IpAddress: Address")

$i = 0 ; // reinitialize the counter

foreach ($RemotePort as $k => $val){
    $x = explode(":" , $RemotePort[$i]);
    $i++;
    array_push($TCP_RemotePort , $x[1]);
} // used to split the Index from the string  ("INTEGER: value")

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
            <li><a class="anchor" href="ARPTable.php">Next</a></li>
        </ul>
    </nav>
</header>



<div data-barba="wrapper">
    <main data-barba="container" data-barba-namespace="about">
        <div class="heading-container">
            <table style="margin-top: 7%;" class="container_data">
                <thead>
                <tr>  <th style="text-align: center;">  ID  </th> <th style="text-align: center;"> Connection State </th>
                    <th style="text-align: center;"> Connection Local Address </th> <th style="text-align: center;"> Connection Local Port </th>
                    <th style="text-align: center;"> Remote Address </th>  <th style="text-align: center;"> Remote Port </th>  </tr>
                </thead>
                <tbody style="text-align: center;">
                <?php
                foreach ($TCP_ConnectionState as $k => $val){
                    echo "<tr> <td> $i </td> <td> $TCP_ConnectionState[$i] </td> <td>  $TCP_ConnectionLocalAddress[$i]</td>  
                         <td> $TCP_ConnectionLocalPort[$i]</td>  <td> $TCP_RemoteAddress[$i]</td>  <td> $TCP_RemotePort[$i]</td>  </tr>";
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
