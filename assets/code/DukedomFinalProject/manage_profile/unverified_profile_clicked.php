<?PHP session_start(); ?>
<?PHP include('../view./header.php')?>

<div class="userinfo">
      <h2>Profile Information</h2>
      <form class="uilist">
        <span>Name:</span> 
            <?PHP echo($_SESSION["first"]); 
                  echo(" ");
                  echo($_SESSION["last"]);
        ?> <br><br>
        <span>Username:</span> <?PHP echo($_SESSION["user"]); ?><br><br>
        <span>Email:</span> <?PHP echo($_SESSION["email"]); ?><br><br>
        <span>Street Address:</span> <?PHP echo($_SESSION["address"]); ?><br><br>
        <span>City:</span> <?PHP echo($_SESSION["city"]); ?><br><br>
        <span>State:</span> <?PHP echo($_SESSION["user"]); ?><br><br>
        <span>Zip Code:</span> <?PHP echo($_SESSION["postal"]); ?><br><br>
        <span>Country:</span> <?PHP echo($_SESSION["country"]); ?><br><br>
	<button class="editProfilebtn"><a href="./user_update.php">Edit Profile</a></button><br>
        <button class="editProfilebtn"><a href="../logoutHomepage.php">Logout</a></button><br>
      </form>
    </div>

    <div class="ownedProps">
      <h2>Your Property Shares</h2>
	<ul class="houseListings">
      	 <?php if(isset($_SESSION["priceBought"])) : ?>
      	  <li class="house_box"><a href="./index.php?action=house3">
          <form>
          5 Sapphire St<br> Astera<br> TNW, 00326<br>
          <img src="../house_3.jpeg" width=190px><br>
	  <span>$<?PHP echo $_SESSION["priceBought"] ?></span> Total Value<br>
 	  <span><?PHP echo $_SESSION["percentBought"] ?>%</span> Percent Owned<br>
          </form>
          </a></li>
          <?php endif; ?>
	</ul>
	</div>
    <div class="sellingProps">
      <h2>Properties You're Selling</h2>
      <h2>Verification Request Sent!</h2>
    </div>
	 </a></li>
	</ul>