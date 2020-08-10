<?php
    $session = new Session();

    if($session->exists('home')){
        $message = $session->get('home');
    }
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
        .form-container{
            margin-top: 2.5rem;
            background: #fff;
            padding:30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px #000;
        }
    </style>

    <title>Home</title>
</head>
<body>
    <?php require 'views/partial/nav.php'; ?>
    <div class="container">
        <h6 class="mt-5">Welcome <?= $message ?></h6><hr>

        <section class="container-fluid bg">
            <section class="row justify-content-center">
                    <form class="form-container" action="/upload" method="POST" enctype="multipart/form-data">
                        <input class="btn btn-secondary" type="file" name="file">
                        <?php if($fileMessage): ?>
                            <small class="form-text text-muted"><?= $fileMessage ?></small>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-primary btn-block mt-3">Upload Image</button>
                    </form>
                </section>
        </section>
    </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous">

</script>
</body>
</html>