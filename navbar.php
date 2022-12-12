<div class="container">
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                <use xlink:href="#bootstrap" />
            </svg>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <?php



            $loc = $_SERVER["PHP_SELF"];
            if (str_contains($loc, "home.php")) {
                $home = true;
                $notes = false;
                $about = false;
            } else if (str_contains($loc, "notes.php")) {
                $home = false;
                $notes = true;
                $about = false;
            } else if (str_contains($loc, "about-us.php")) {
                $home = false;
                $notes = false;
                $about = true;
            } else {
                $home = false;
                $notes = false;
                $about = false;
            }

            $items = array(
                (object) array(
                    "label" => "Home",
                    "link" => "home.php",
                    "active" => $home,
                ),
                (object) array(
                    "label" => "Notes",
                    "link" => "notes.php",
                    "active" => $notes,
                ),
                (object) array(
                    "label" => "About us",
                    "link" => "about-us.php",
                    "active" => $about,
                )
            );

            foreach ($items as $item) {
                if ($item->active) {
                    $color = "primary";
                } else {
                    $color = "dark";
                }
                echo "<li><a href=\"$item->link\" class=\"nav-link px-2 link-$color\">$item->label</a></li>";
            }
            ?>
        </ul>
        <div class="col-md-3 text-end">
            <?php
            if(!isset($_SESSION)){
            session_start();
            }
            if ($_SESSION['login'] == 'access') {
                echo "
            <form method='get' action='../index.php'>
            <button type=\"submit\"
                class=\"btn btn-outline-danger\" name=\"logout\">Logout</button></form>";
            } else {
                echo "
            <button onclick=\"location.href='login.php'\" type=\"button\"
                class=\"btn btn-outline-primary me-2\">Login</button>
            <button onclick=\"location.href='signup.php'\" type=\"button\" class=\"btn btn-primary\">Sign up</button>";
            }
            ?>
        </div>

    </header>
</div>