<!DOCTYPE html>

<html>
<title>Assistance Informatique JM</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
@font-face {
    font-family: 'trench';
    src: url('fonts/trench100free.otf');
}
 {font-family: "Cabin", sans-serif}
h1,h2,h3,h4,h5,.w3-wide,.w3-sidebar a, th {font-family: "trench";font-weight: bold;}
body,.w3-table, input, h6, .w3-button {font-family: "Cabin", sans-serif;}
</style>
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block color-blue w3-collapse w3-top" style="z-index:3;width:150px" id="mySidebar">
  <div class="w3-container w3-display-container w3-white w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
	<img src="images/logo.png" alt="Smiley face" height="74" width="118">
  </div>
  <div class="w3-padding-64 w3-large color-text-white" style="font-weight:bold">
		<?php
		session_start();
		require_once'fonctions.php';
		if(isset($_SESSION['type']) && $_SESSION['type']=="ADMINISTRATEUR")
		{
		?>
			<a href="accueil.php" class="w3-bar-item w3-button">Accueil</a>
			<a href="accueil.php?page=tickets" class="w3-bar-item w3-button">Tickets</a>
			<a href="accueil.php?page=imprimantes" class="w3-bar-item w3-button">Imprimantes</a>
			
		<?php
		}
		elseif(isset($_SESSION['type']) && $_SESSION['type']=="PROFESSEUR")
		{
		?>
			<a href="accueil.php" class="w3-bar-item w3-button">Accueil</a>
			<a href="accueil.php?page=tickets" class="w3-bar-item w3-button">Tickets</a>
			
		<?php
		}
		elseif(isset($_SESSION['type']) && $_SESSION['type']=="GESTIONNAIRE")
		{
		?>
		
			<a href="accueil.php" class="w3-bar-item w3-button">Accueil</a></li>
			<a href="accueil.php?page=imprimantes" class="w3-bar-item w3-button">Imprimantes</a>
			
		<?php
		}
		else
		{
		?>
		
			<a href="accueil.php" class="w3-bar-item w3-button">Accueil</a></li>
			
		<?php
		}
		?>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large color-blue w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide"><img src="images/logo2.png" alt="Smiley face" height="90" width="143"></div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:150px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
    <p class="w3-left">Version de développpement</p>
	<form method="post" action="accueil.php?page=deconnexion">
<button class="w3-button w3-block color-blue">Deconnexion</button>
</form>
  </header>



  <!-- Subscribe section -->
  <div class="w3-container w3-light-grey w3-padding-32">
    <?php 
	if (!isset($_GET['page']))
	{
		include('tickets.php');
		include('imprimantes.php');
	}
		
	if (isset($_GET['page']))
	{
		include($_GET['page'].'.php');
	}
		
	?>
  </div>
  
  <!-- Footer 
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Contact</h4>
        <p>Questions? Go ahead.</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
          <button type="submit" class="w3-button w3-block w3-black">Send</button>
        </form>
      </div>-->

     

     
    </div>
  </footer>


  <!-- End page content -->
</div>



<script>
// Accordion 
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>
