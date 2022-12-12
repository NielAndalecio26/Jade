<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <div class="container-fluid h-100 w-100">
        <?php
        include("../navbar.php");
        ?>
        <div class="d-flex flex-column gap-4 justify-content-center h-auto align-items-center">
            <img class="pt-5" src="../assets/logo.svg" width="250px" />
            <p class="h1">Welcome to Jade</p>
            <p class="container text-center lead">The app is designed to help you work smart and efficiently. They
                include
                tools
                such as to-do lists, calendar reminders, task management, time tracking and more.
            </p>
            <div clas="d-flex flex-row">
                <a class="btn btn-outline-dark mx-2" href="notes.php">Try our notes</a>
                <a class="btn btn-success mx-2" target="_blank" href="https://play.google.com/store/apps">Download the
                    app</a>
            </div>
        </div>
    </div>
    <!--  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>