<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Odwołaj To - Logowanie">
    <meta name="keywords" content="Odwołaj To, Odwołaj, Logowanie, Zaloguj Się, Zaloguj">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="form.css">
    <link rel="icon" href="../icon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>odwolajto.pl - Rejestracja</title>
</head>
<body>
    <header>
        odwolajto.pl - Rejestracja
    </header>
    <br>
    <aside>
        <div id="progressMade" style="flex: 2;"></div>
        <div id="left" style="flex: 1;"></div>
    </aside>
    <br>
    <form action="register3.php" method="post">
        Zanim utworzysz konto, zapoznaj się i zaakceptuj Warunki i Zasady użytkowania naszej witryny:
    </form>
    <?php
        session_start();
        if(!isset($_SESSION["user"]) || !isset($_SESSION["pass"]) || !isset($_SESSION["type"])) {
            echo("<script>window.open('register0.php', '_self')</script>");
        }
        @$type = $_POST["type"];
        if(isset($type)) {
            $_SESSION["type"] = $type;
            echo("<script>window.open('register2.php', '_self')</script>");
        }
    ?>
</body>
</html>