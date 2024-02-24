<?php
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
<header>

    <nav style="opacity: 1; transform: translate(0px, 0px); background-color: #1f2739; padding: 10px 100px;" >
        <ul>
            <li><a class="anchor" href="Home.php">Home Page</a></li>
            <li><a class="anchor" href="SystemGroup.php">System Group</a></li>
            <li><a class="anchor" href="UDPTable.php">UDP Table</a></li>
            <li><a class="anchor" href="ARPTable.php">ARP Table</a></li>
            <li><a class="anchor" href="TCPTable.php">TCP Table</a></li>
            <li><a class="anchor" href="SystemGroup.php">Next</a></li>

        </ul>
    </nav>

</header>

<!-- Better to wrap barba container as close as possible -->
<main data-barba="wrapper">
    <!-- Only this section changes on link navigation -->
    <main data-barba="container" data-barba-namespace="home">

                <div class="centered-paragraph" style="margin-top:300px">
                    <p>Our SNMP Assignment: Tala Hamad & Mira Jamous</p>
                </div>
    </main>
</main>

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
