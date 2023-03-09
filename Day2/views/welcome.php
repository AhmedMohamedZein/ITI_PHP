<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/welcomeStyle.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Welcome</title>
</head>
<body>

    <main class="container-flow">
        <?php 
            $contacts = read_from_file();
            foreach ($contacts as $contact) {
                $contact = explode(' , ', $contact);
                $date = $contact[0];
                $ipAddress = $contact[1];
                $username = $contact[2];
                $email = $contact[3];
                $body = $contact[4];
                echo '<section id="show">
                        <div class="row">
                            <label>Visit Date:</label>
                            <span>'.$date.'</span>
                        </div>
                        <div class="row">
                            <label>IP Adress:</label>
                            <span>'.$ipAddress.'</span>
                        </div>
                        <div class="row">
                            <label>Email Address</label>
                            <span>'.$email.'</span>
                        </div>
                        <div class="row">
                            <label>Name</label>
                            <span>'.$username.'</span>
                        </div>
                        <div class="row">
                            <label>Body</label>
                            <span>'.$body.'</span>
                        </div>
                    </section><br />
                ';
            }
        ?>
    </main>
</body>
</html>