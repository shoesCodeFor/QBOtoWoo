<!DOCTYPE html>
<html lang="en">
<head>
    <script
    src="https://code.jquery.com/jquery-3.2.1.slim.js"
    integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    
    
</head>
<body>
<div class="container">
    <form id="plugin-settings" action="Config.php" method="post">
    <div class="form-group">
        <label for="storeURL" >Website URL:<span>*</span></label>
        <input type="text" placeholder="http://www.example.com" class="form-control" name="storeURL" id="woo-url" required="required" aria-required="true">
    </div>
    <div class="form-group">
        <label for="ck" class="fb-text-label">WooCommerce Consumer Key</label>
        <input type="text" class="form-control" name="ck" id="ck"></div>
    <div class="form-group">
        <label for="cs">WooCommerce Consumer Secret</label>
        <input type="text" class="form-control" name="cs" id="cs">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="savekey" style="primary" id="savekey" onclick=""></input>
    </div>
</form>
    
</div>    

<?php






?>
    
    
</body>


</html>

