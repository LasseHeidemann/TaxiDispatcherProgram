

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
                    <li><a href= "RequestPage.php">Requests</a></li>
                    <li><a href= "BookingsPage.php">Bookings</a></li>
                    <li><a href= "TaxiPage2.php">Taxis</a></li>
                    <li><a href= "SharedModePage.php">Shared Mode</a></li>
                </ul>
             </nav>

            <div id = "conecnt_area">
            <?php echo $content; ?>
            </div>


            </div>

            <footer>
            <p> Welcome to our Taxi Company </p>
            </footer>

    </body>

</html>

