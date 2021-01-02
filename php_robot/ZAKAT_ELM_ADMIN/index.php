<?php
require '../init.php';
$user = new userDetails();
if (!$user->isAdminLoggedIn()) 
{
    exit('<h1>dar hale enteghal</h1><meta http-equiv="refresh" content="5; URL='.SITE_URL.'" />');
    
}
?>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🤖 ترمینال مدیر 🤖</title>
    <link rel="icon" href="./img/favicon.png" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/jquery.terminal/js/jquery.terminal.min.js"></script>
    <link href="https://unpkg.com/jquery.terminal/css/jquery.terminal.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <script src="js/main.js" type="text/javascript"></script> 
    <script type="text/javascript">
    </script>
<body>

</body>
</html>