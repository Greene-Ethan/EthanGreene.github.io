<!DOCTYPE html>
<?PHP 
session_start();
unset($_SESSION["user"]); 
$_SESSION["loggedIn"] = false;
unset($_SESSION["priceBought"]);
?>
<html lang="en">
<head>
  <title>Dukedom</title>
  <link rel="stylesheet" type="text/css" href="/362FinalProject/style.css">
<body>
  <div class="main">
    <div class="navbar">
      <div class="icon">
        <h2 class="logo"><a href="./index.php"><img src= ./view/Dukedom_Logo.png" alt="Dukedom brand logo, a blue D with a darker blue sDukedom_Logohadow" width="30" height= "30">&nbsp;Dukedom</a></h2>
      </div><!--ends icon-->

      <div class="menu">
        <ul>
          <li><a href="./index.php">Home</a></li>
          <li><a href="./manage_buy">Buy</a></li>
          <li><a href="#">Sell</a></li>
          <li><a href="./manage_contact">Contact</a></li>
          <li><a href="./manage_about">About</a></li>
          <li><a href="./manage_profile">Profile</a></li><!--THIS IS HOW YOU LINK TO OTHER WEBSITES/PAGES-->
        </ul>
      </div><!--ends menu-->
    </div><!--ends navbar-->
    
    <div class="content">
      <h1>Slice of<br><span>Real Estate</span><br>Investment</h1>
      <p class="par">Start your real estate investment and diversify your portfolio by starting smaller...  
      </p>
      <button class="cn"><a href="manage_about">Learn More</a></button>
      <div class="form">
        <section>
        <a href="manage_customer"><button class="subbtn">Login</button></a>
        </form>
        </section>
        <p class="link">Need an account?<br>
        <a href="manage_register_account">Sign up here</a></p>
      </div><!--ends form-->
    </div><!--ends content-->
  </div><!--ends main-->
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script><!--Pulls other application icons onto site-->
</body>
</head>

