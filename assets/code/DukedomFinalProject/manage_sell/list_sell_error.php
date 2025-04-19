<?php include("../view./header.php"); ?>

<div class="sellForm">
  <h2>Tell us about the Property You'd Like to Sell</h2>
  <br>
  <h2>Please fill in all fields</h2>
  <form class="sellInputs" action="." method="post" id="sellHouse"><!--this may be changed later but you know what I mean-->
      <input type="hidden" name="action" value="sellHouse">
    &nbsp;&nbsp;&nbsp;Price to Sell for<br><input type="number" name="price" placeholder="1234562"><br>
    &nbsp;&nbsp;&nbsp;Street Address<br><input type="text" name="address" placeholder="123 Dukedom Blvd"><br>
    &nbsp;&nbsp;&nbsp;City<br><input type="City" name="city" placeholder="Lakenheath"><br>
    &nbsp;&nbsp;&nbsp;State<br><input type="State" name="State" placeholder="MI"><br>
    &nbsp;&nbsp;&nbsp;Zip Code<br><input type="Zip Code" name="Zip Code" placeholder="67894"><br>
    <button class="sellButton"><a href="./index.php">Sell Property</a></button>
  </form>
 
</div>