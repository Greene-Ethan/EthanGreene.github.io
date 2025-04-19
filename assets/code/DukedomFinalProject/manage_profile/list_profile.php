
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
      	 <li class="house_box"><a href="#">
	  <form>
          193 Koana Blvd<br> Tulliyolal<br> EOR, 43592<br>
           <img src="../house_2.jpg" alt="A House" width=190px><br>
           <span>$35,000</span> Total Value<br>
           <span>5%</span> Percent Owned<br>
          </form>
	 </a></li>
	 <li class="house_box"><a href="#"> 
         <form>
           2003 Galuf Way, Old Sharlayan<br> EOR, 86753<br>
           <img src="../Dukedom_BG_alt.jpg" alt="A House" width=190px>
           <span>$254,000</span> Total Value<br>
           <span>42%</span> Percent Owned<br>
         </form>
        </a></li>
	</ul>
	</div>
    <div class="sellingProps">
      <h2>Properties You're Selling</h2>
      	<ul class="houseListings">
      	 <li class="house_box"><a href="#">
	  <form>
          5 Sapphire St<br> Astera<br> TNW, 00326<br>
          <img src="../house_3.jpeg" width=190px><br>
	  <span>$139,377</span> Total Sold<br>
 	  <span>33%</span> Percent-Left<br>
	  <span>$3,450</span> Buy-In
          </form>
	 </a></li>
	</ul>
	