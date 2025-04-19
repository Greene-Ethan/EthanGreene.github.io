<?PHP session_start(); ?>
<?PHP include('../view./header.php')?>

<div class="content3">
  <h2>Edit Account Information</h2>
  <form class="registeracct" action="." method="post" id="create_user_login"><!--this may be changed later but you know what I mean-->
      <input type="hidden" name="action" value="update_profile">
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
    <input type="text" name="username" placeholder="Enter Username" value=<?PHP echo($_SESSION["user"]) ?> > <br>
    <input type="text" name="phone" placeholder="Enter Phone Number" value=<?PHP echo($_SESSION["phone"]); ?> > <br>
    <input type="text" name="firstName" placeholder="Enter First Name" value=<?PHP echo($_SESSION["first"]) ?> > <br>
    <input type="text" name="lastName" placeholder="Enter Last Name" value=<?PHP echo $_SESSION["last"]?> > <br>
    <input type="email" name="email" placeholder="Enter Email" value=<?PHP echo $_SESSION["email"]?> > <br>
    <input type="text" name="address" placeholder="Enter Street Address" value=<?PHP echo $_SESSION["address"]?> >  <br>
    <input type="text" name="city" placeholder="Enter City" value=<?PHP echo $_SESSION["city"]?> > <br>
    <input type="text" name="state" placeholder="Enter State" value=<?PHP echo $_SESSION["state"]?> > <br>
    <input type="text" name="postalCode" placeholder="Enter Zipcode" value=<?PHP echo $_SESSION["postal"]?> > <br>
    <input type="submit" value="Update" />
  </form>
</div>