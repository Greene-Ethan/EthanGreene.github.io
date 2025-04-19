<?PHP include('../view./header.php')?>
    
<div class="content">
      <h1>Slice of<br><span>Real Estate</span><br>Investment</h1>
      <p class="par">Start your real estate investment and diversify your portfolio by starting smaller...  
      </p>
      <button class="cn"><a href="../manage_about">Learn More</a></button>
      <div class="form">
        <h2>Welcome back <?PHP echo $username?>!</h2>
        <?PHP 
        $_SESSION["user"] = $username;
                ?>
      </div><!--ends form-->
</div><!--ends content-->
  </div><!--ends main-->
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script><!--Pulls other application icons onto site-->
</body>
</head>