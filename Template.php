
<html>
    <head>

        <title> <?php echo $title; ?>  </title>
        <link rel= "stylesheet" type= "text/css" href="Styles/Stylesheet.css"

    </head>

    <body>

        <div id = "wrapper">
            <div id = "banner">
            </div>

            <nav id = "navigation">
                <ul id = "nav">
                    <li><a href= "Index.php">Home</a></li>
                    <li><a href= "Booking.php">Booking</a></li>
                    <li><a href= "Taxi.php">Taxis</a></li>
                </ul>
             </nav>

            <div id = "conecnt_area">
            <?php echo $content; ?>
            </div>

            <div id = "sidebar"
        </div>

        <footer>
            <p> All rights reserved </p>
        </footer>

    </body>

</html>