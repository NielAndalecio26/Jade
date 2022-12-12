<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <?php
    session_start();
    if ($_SESSION['login'] != 'access') {
        $_SESSION['login'] = 'notes';
        echo $_SESSION['login'];
        header("location: ../web/signup.php");
    } else {
        include("../navbar.php");
        include "../service/database.php";
        $action = "";
        if (isset($_GET['update'])) {
            $id = $_GET['update'];
            $action = "?update=$id";
        }
        echo "<form method=\"POST\" action=\"../service/note_handler.php$action\">";
    }
    ?>
        <div class="container">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="message" 
                <?php
                $val = '';
                if (isset($_GET['update'])) {
                    $note_to_update = get_notes_by_id($_GET['update']);
                    $message = $note_to_update[0]->message;
                    $val = "value=\"$message\" ";
                }
                echo $val;
                ?> required placeholder=" Type your notes here..." maxlength=200>

                <?php
                if (isset($_GET['update'])) {
                    echo "<button class=\"btn btn-outline-primary\" name=\"update\" type=\"submit\" id=\"button-addon2\">edit</button>";
                    echo "<a class=\"btn btn-danger\" href=\"notes.php\">cancel</a>";
                } else {
                    echo "<button class=\"btn btn-outline-primary\" name=\"addnote\" type=\"submit\" id=\"button-addon2\">+</button>";
                }
                ?>
            </div>
    </form>
    <div class="d-flex flex-wrap justify-content-start align-items-center">
        <?php
        $notes = get_notes_by_user_id($_SESSION['user_id']);
        if ($notes[0]->user_id != null) {
            foreach ($notes as $note) {
                echo "<div class=\"d-flex flex-column p-3 my-3 mx-2 alert alert-warning\" style=\"
                width: 23%;
                height: 15em;
                \">
                <div class=\"d-flex flex-row justify-content-center align-items-center\">
                <a class=\"btn btn-sm\" href=\"notes.php?update=$note->id\">
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='gray' class='bi bi-pencil-square' viewBox='0 0 16 16'>
  <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
  <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
</svg></a>
                
                <a class=\"btn btn-sm\" href=\"../service/note_handler.php?delete=$note->id\">
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='gray' class='bi bi-trash' viewBox='0 0 16 16'>
  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
</svg>
                </a></div>$note->message</div>";
            }
        }
        else {
            echo '<div class="h-100 w-100 justify-content-center align-items-center text-center text-secondary d-flex" style="min-height: 50vh;height: 50vh;">Seems pretty empty in here...</div>';
        }
        ?>
    </div>
    </div>
    <!--  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>