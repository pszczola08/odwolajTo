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
        <div id="progressMade" style="flex: 1;"></div>
        <div id="left" style="flex: 2;"></div>
    </aside>
    <br>
    <form action="register1.php" method="post">
        Kto będzie korzystał z tego konta?<br>
        <div class="rdCnt">
            <label style="border: 2px solid #ff7f00" class="typeLb">
                <input type="radio" name="type" value="student" required>
                <div class="rdBtn">
                    Uczeń<br>
                    <img src="student.png" alt="student">
                </div>
            </label>
            <label style="border: 2px solid #3a4ec6" class="typeLb">
                <input type="radio" name="type" value="teacher">
                <div class="rdBtn">
                    Nauczyciel<br>
                    <img src="teacher.png" alt="teacher">
                </div>
            </label>
            <label style="border: 2px solid #7cd444" class="typeLb">
                <input type="radio" name="type" value="principal">
                <div class="rdBtn">
                    Dyrekcja<br>
                    <img src="principal.png" alt="principal">
                </div>
            </label>
        </div>
        <input type="submit" value="Kolejna strona">
    </form>
    <?php
        require '../lib/functions.php';
        require '../lib/globarVariables.php';
        session_start();
        if(!isset($_SESSION["user"]) || !isset($_SESSION["pass"])) {
            executeJS("window.open('register0.php', '_self')");
        }
        @$type = $_POST["type"];
        if(isset($type)) {
            try {
                if(DB->connect_error) {
                    throw new Exception(''. DB->connect_error);
                }
            } catch(Exception $e) {
                $ok = false;
                die("<div style='text-align: center; font-size: 20px; font-weight: bolder; color: red'>Wystąpił problem. Spróbuj ponownie później.</div>");
            }
            $_SESSION["type"] = $type;
            executeJS("window.open('register2.php', '_self')");
        }
    ?>
</body>
</html>