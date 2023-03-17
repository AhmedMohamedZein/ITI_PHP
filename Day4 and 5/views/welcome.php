<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Welcome</title>
    <style>
        button {
            border-radius: 30px;
            background-color: #CFB997;
            border: none;
            padding: 10px;
        }
        button:hover {
            border-radius: 30px;
            background-color: #95846b;
            border: none;
            padding: 10px;
        }
    </style>
</head>
<body style="background-color: #61764B; height: 100vh;" class="d-flex flex-column justify-content-center align-items-center">
    
    <main style="background-color: #CFB997; width: 60vh; height: 45vh; border-radius: 30px;">
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">Item ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    if ( !empty($rows) ) {
                        foreach ($rows as $row){
                            echo '
                            <tr>
                                <th scope="row">'.$row[0].'</th>
                                <td>'.$row[2].'</td>
                                <td><a href="glasses?id='.$row[0].'" target="_blank" >link</a></td>
                            </tr>
                            ';
                        }
                    }
                ?>
            </tbody>
        </table>
    </main>
    <div class="mt-3 d-flex gap-4">
        <a href="<?php echo $_SERVER["PHP_SELF"].'?recordNumber='.$previous_index?>"><button>Previous</button></a>
        <a href="<?php echo $_SERVER["PHP_SELF"].'?recordNumber='.$next_index?>"><button>Next</button></a>
    </div>
</body>
</html>