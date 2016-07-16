<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pinnacle Cart Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="container">
  <h2>Subcribe to our Email Alerts</h2>
  <div id="msgholder"></div>
  <form role="form">
    <div class="form-group">
      <label for="firstname">Firstname:</label>
      <input type="text" class="form-control" id="firstname" placeholder="Enter your Firstname">
    </div>
    <div class="form-group">
      <label for="midname">Middlename:</label>
      <input type="text" class="form-control" id="midname" placeholder="Enter your middlename or middle initial">
    </div>
    <div class="form-group">
      <label for="firstname">Lastname:</label>
      <input type="text" class="form-control" id="lastname" placeholder="Enter your Lastname">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email">
    </div>

    <div id="submitHolder"><button type="button" id="submit" class="btn btn-default">Submit</button></div>
  </form>
</div>

</body>
</html>

<script>
$(document).ready(function(){
    $("#submit").click(function(){
        $.post("ajax/subscribe.php",
        {
          firstname: $("#firstname").val(),
          midname: $("#midname").val(),
          lastname: $("#lastname").val(),
          email: $("#email").val()
        },
        function(data){
        	 $("#msgholder").html(data); 
        });
    });
});
</script>