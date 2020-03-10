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
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link rel="SHORTCUT ICON" href="images/favicon.ico" />
        <script src="https://www.google.com/recaptcha/api.js" async defer></script> 
        <script type="text/javascript" src="includes/javascript/jquery.js"></script>
	<script type="text/javascript" src="includes/javascript/ajax.js"></script>
	<script type="text/javascript" src="includes/javascript/scripts.js"></script> 
    </head>
    <body>
        
        <!-- Main Content -->
            <!-- Header -->
            <header class="header"> </header>
 <div class="nav-menu">
            <!-- Navigation -->
            <nav>
                <ul class="navigation">
                    <li><a onclick ='web("modules/news.php")'>HOME</a></li>
                    <li><a onclick ='web("modules/register.php")'>REGISTER</a></li>
                    <li><a onclick ='web("modules/download.php")'>DOWNLOAD</a></li>
                    <li><a onclick ='web("modules/statistics.php")'>STATISTICS</a></li>
                    <li><a onclick ='web("modules/rankings/rankings.php")'>RANKINGS</a>
                    <ul>
                    <li><a onclick ='web("modules/rankings/rankings.php")'>TOP CHARACTERS</a></li>
                    <li><a onclick ='web("modules/rankings/guilds.php")'>TOP GUILDS</a></li>
                    <li><a onclick ='web("modules/rankings/killers.php")'>TOP KILLERS</a></li>
                    <li><a onclick ='web("modules/rankings/topTime.php")'>TOP ONLINE TIME</a></li>
                    <li><a onclick ='web("modules/rankings/online.php")'>ONLINE PLAYERS</a></li>
                    </ul>
                    </li>
                    <li><a onclick ='web("modules/contact.php")'>CONTACT US</a></li>
                    <li><a target="_blank" href="#">FORUM</a></li>
                </ul>
            </nav>
        </div>
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
                    Esse enim quam vellet iniquus iustus poterat inpune. Tu enim ista lenius, hic Stoicorum more nos vexat. Duo Reges: constructio interrete.
                </p>
            </footer>


    </body>
</html>