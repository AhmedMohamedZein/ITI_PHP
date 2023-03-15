<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Session Task</title>
</head>
<body class="container d-flex justify-content-center align-items-center" style="height: 100vh; background-color: #CCD5AE;">
    
    <?php
        $counter = new Counter();
        $counter->increment_and_update();
        $counter = $obj->getCount();
    ?>    
    <h1> Visitor number : $counter </h1>"
</body>
</html>