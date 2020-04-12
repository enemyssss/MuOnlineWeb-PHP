  <?php
   include 'includes/config.php';
   include 'includes/engine.php';
   ?>
<html lang="en-US">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <title>Mu Online Project </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="images/css/style.css">
        <link rel="stylesheet" href="images/css/navigations.css">
          <link rel="stylesheet" href="images/css/charPanel.css">
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link rel="SHORTCUT ICON" href="images/favicon.ico" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="includes/javascript/jquery.js"></script>
	<script type="text/javascript" src="includes/javascript/ajax.js"></script>
	<script type="text/javascript" src="includes/javascript/scripts.js"></script>
    </head>
    <body>

        <!-- Main Content -->
            <!-- Header -->

        <div id="main-navigation">
            <div class="logo">
                <a onclick ='web("index.php")'><?php echo $server; ?></a>
            </div>
            <nav>
                <ul>
                    <li>
                        <a onclick ='web("index.php")'>Home</a>
                    </li>
                    <li>
                        <a onclick ='web("modules/register.php")'>Register</a>
                    </li>
                    <li>
                        <a onclick ='web("modules/download.php")'>Download</a>
                    </li>
                    <li>
                        <a onclick ='web("modules/statistics.php")'>Statistics</a>
                    </li>
                    <li>
                        <a onclick ='web("modules/serverInfo.php")'>Server Info</a>
                    </li>
                    <li class="dropdown">
                        <a onclick ='web("modules/rankings/rankings.php")'>Rankings</a>
                        <ul>
                            <li><a onclick ='web("modules/rankings/rankings.php")'>Top Characters</a></li>
                            <li><a onclick ='web("modules/rankings/guilds.php")'>Top Guilds</a></li>
                            <li><a onclick ='web("modules/rankings/killers.php")'>Top PVP</a></li>
                            <li><a onclick ='web("modules/rankings/topTime.php")'>Top Online Time</a></li>
                            <li><a onclick ='web("modules/rankings/online.php")'>Who is online</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">Forum</a>
                    </li>
                </ul>
            </nav>
        </div>
        <header class="header"> </header>
            <div class="flex-container wrapper">

                 <!-- Sidebar -->
                <aside class="sidebar">
            <?php
                include 'modules/accpanel.php';
                include 'modules/serverInfo.php';
            ?>
                </aside>

                <!-- Content -->
                <section class="content">
                   <?php echo "<div id='main'></div>"; ?>
                </section>

                <!-- Sidebar -->
                <aside class="sidebar">
                 <?php
                  include 'modules/rankings/top5char.php';
                  include 'modules/rankings/top5guilds.php';
                  ?>
                </aside>

            </div>

            <!-- Footer -->
            <footer class="footer">
                Footer
                <p>
                    Copyright 2019 - <?php echo date("Y")?> <a href="https://github.com/enemyssss" target="_blank">enemY</a>. All rights reserved!
                </p>
            </footer>


    </body>
</html>
