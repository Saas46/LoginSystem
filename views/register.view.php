<?php
$token = new CSRFToken();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">

    <style type="text/css">
        body{
            background: grey;
        }

        .form-container{
            margin-top: 2.5rem;
            background: #fff;
            padding:30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px #000;
        }
    </style>

    <title>Register</title>
</head>
<body>
    <?php require 'views/partial/nav.php'; ?>

    <section class="container-fluid bg">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <form class="form-container" action="/register" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"  class="form-control" name="name" id="name" min="2" max="6" aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <?php if($errorEmail): ?>
                            <small id="emailHelp" class="form-text text-muted"><?= $errorEmail ?></small>
                        <?php endif; ?>


                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" min="6" max="20" name="password" id="password" class="form-control" placeholder="Password" required>
                        <?php if($errorPassword): ?>
                            <small class="form-text text-muted"><?= $errorPassword ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="password_again">Confirm Your Password</label>
                        <input type="password" min="6" max="20" name="password_again" id="password_again" class="form-control" placeholder="Confirm Password" required>
                        <?php if($errorPassword): ?>
                            <small class="form-text text-muted"><?= $errorPassword ?></small>
                        <?php endif; ?>
                    </div>
                    <input type="hidden" name="token" value="<?php echo $token->generate();?>">
                    <button type="submit" name="submit" class="btn btn-primary btn-block mt-3">Register</button>
                </form>
            </section>
        </section>
    </section>

</body>
</html>