<?PHP include('../view./header.php')?>

<div class="content3">
  <h2>Create a New Account</h2>
  <form class="registeracct" action="." method="post" id="create_user_login"><!--this may be changed later but you know what I mean-->
      <input type="hidden" name="action" value="register_user">
      <label>Country:</label>
        <select name="countries" id="countries" value="countries">
        <?php foreach ($countriesAll as $country):
            $defaultCountry = "";
            $countryCodeUnique = $country["countryCode"];
        ?>
        <option <?php echo $defaultCountry?>> <?php echo $countryFullName = $country["countryName"]; ?> </option>
        <?php endforeach; ?>
        <option selected="seoected"> United States </option>
        </select> <br>
    <input type="text" name="username" placeholder="Enter Username"> <br>
    <input type="password" name="password" placeholder="Enter Password"> <br>
    <input type="text" name="phone" placeholder="Enter Phone Number"> <br>
    <input type="text" name="firstName" placeholder="Enter First Name"> <br>
    <input type="text" name="lastName" placeholder="Enter Last Name"> <br>
    <input type="email" name="email" placeholder="Enter Email"> <br>
    <input type="text" name="address" placeholder="Enter Street Address">  <br>
    <input type="text" name="city" placeholder="Enter City"> <br>
    <input type="text" name="state" placeholder="Enter State"> <br>
    <input type="text" name="postalCode" placeholder="Enter Zipcode"> <br>
    <input type="submit" value="Register" />
  </form>
</div>