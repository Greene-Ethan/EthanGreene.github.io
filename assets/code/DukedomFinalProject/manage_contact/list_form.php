<?PHP include('../view./header.php')?>


  <!--everything above is for the navbar and background-->
  <div class="contactcontent">
    <h1 class="contactH">Contact<span2> <img src="../Dukedom_Logo.png" alt="Dukedom brand logo, a blue D with a darker blue shadow" width="30" height="30">Dukedom</span2></h1>
    <p class="par2">Let's build your future together.</p>
    <h2>Questions, Comments, Concerns?</h2>
    <div class='form'>
        <form action="." method="post" id="submit_form">
        <input type="hidden" name="action" value="submit_form">
        <input type="text" name="form" placeholder="Enter Comment Here">
        <input type="text" name="email" placeholder="Email Address Here">
        <input type="submit" value="Submit" />
        </form>
    </div>
    <!--chat bot-->
    <!-- Dialogflow Messenger Styles and Script -->
<link rel="stylesheet" href="https://www.gstatic.com/dialogflow-console/fast/df-messenger/prod/v1/themes/df-messenger-default.css">
<script src="https://www.gstatic.com/dialogflow-console/fast/df-messenger/prod/v1/df-messenger.js"></script>

<!-- Dialog flow Messenger Widget -->
<df-messenger
  project-id="zeta-essence-438421-i4"
  agent-id="9eec68f7-9e21-4543-b945-64ce8e9b6fd9"
  language-code="en"
  max-query-length="-1">
  <df-messenger-chat-bubble
   chat-title="Dukedom AI">
  </df-messenger-chat-bubble>
</df-messenger>

    <!--chat bot-->

     </div>
  </div><!--ends main-->
  <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>
  
 <!--old script-->
   <!--old <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>  script-->
  
</body>
</head>