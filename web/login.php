<html>

<head>
    <title> Login to Jade </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <head>

    <body>
        <div class="container w-25 pt-5">
            <div class="d-flex flex-column gap-3 text-center">
                <h1>Login</h1>
                <form method="post" action="../index.php" class="mt-5">
                    <?php
                    include("../service/routing.php");
                    if ($_SESSION['login'] == 'wrong') {
                        echo "<p class='text-danger'>Wrong credentials</p>";
                    }
                    ?>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="username"
                            placeholder="name@example.com" required>
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name="password"
                            placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="d-flex gap-2 flex-column justify-content-center align-items-center">
                        <div class="d-flex flex-row gap-4 mt-3 mb-4"><button type="submit" class="btn btn-primary"
                                name="login">Login</button>
                            <a class="btn btn-dark" href="home.php">Go back home</a>
                        </div>
                        <a href="signup.php"> No account yet? Sign up. </a>
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>