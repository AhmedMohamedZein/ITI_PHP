<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Show Glasses</title>
</head>
<body style="background-color: #61764B; height: 100vh;" class="d-flex justify-content-center align-items-center">
    <main style="background-color: #CFB997; width: 80vh; height: 45vh; border-radius: 30px;" class="d-flex gap-5">
        <div class="d-flex flex-column" style="padding: 30px;">
            <ul style="list-style: none;" class="d-flex flex-column gap-3">
                <li class="d-flex flex-column">
                    <label class="fw-bold">Item ID</label> 
                    <span><?php  echo $result[0][0] ?></span>
                </li>
                <li class="d-flex flex-column">
                    <label class="fw-bold">Product Name</label> 
                    <span><?php echo $result[0][2] ?></span>
                </li>
                <li class="d-flex flex-column">
                    <label class="fw-bold">Price</label> 
                    <span><?php echo $result[0][4] ?></span>
                </li>
                <li class="d-flex flex-column">
                    <label class="fw-bold">Rating</label> 
                    <span><?php echo $result[0][9] ?></span>
                </li>
            </ul>
        </div>
        <div class="mt-4">
            <img width="300vh" src="/php/Day4/images/<?php echo $result[0][3] ?>" alt="">
        </div> 
    </main>
</body>
</html>