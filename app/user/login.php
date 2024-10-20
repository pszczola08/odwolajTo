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
    <title>odwolajto.pl - Logowanie</title>
</head>
<body>
    <header>
        odwolajto.pl - Logowanie
    </header>
    <br>
    <form action="login.php" method="post">
        <input type="text" name="user" placeholder="Nazwa Użytkownika bądź Adres E-mail" required><br>
        <div class="passLabel">
            <input type="password" name="pass" placeholder="Hasło" id="passInp" required>
            <span class="material-symbols-rounded" id="showBtn" onclick="vis()">visibility_off</span><br>
        </div>
        <input type="submit" value="Zaloguj Się"><br>
    </form>
    <p>Nie masz jeszcze konta? <a href="register0.php">Utwórz Je!</a></p>
    <script>
        function vis() {
            var icon = document.getElementById("showBtn").innerText;
            if(icon == "visibility") {
                document.getElementById("showBtn").innerText = "visibility_off";
                document.getElementById("passInp").setAttribute("type", "password");
            } else {
                document.getElementById("showBtn").innerText = "visibility";
                document.getElementById("passInp").setAttribute("type", "text");
            }
        }
    </script>
    <?php
        require '../lib/functions.php';
        @$user = $_POST['user'];
        @$pass = $_POST['pass'];
        if(!empty ($user) && !empty($pass)) {
            require '../lib/globarVariables.php';
            try {
                if(DB->connect_error) {
                    throw new Exception(''. DB->connect_error);
                }
            } catch(Exception $e) {
                DB -> close();
                die("<div style='text-align: center; font-size: 20px; font-weight: bolder; color: red'>Wystąpił problem. Spróbuj ponownie później.</div>");
            }
            $select = DB -> query(
                "SELECT `username`, `password`, `accountType` FROM user WHERE `username` = '$user'"
            );
            if($fetch = $select -> fetch_object()) {
                if(sha1($pass) == $fetch -> password) {
                    DB -> close();
                    session_start();
                    $_SESSION["username"] = $fetch -> username;
                    executeJS("window.open('../main/panel.php', '_self')");
                } else {
                    DB -> close();
                    die("<div style='text-align: center; font-size: 20px; font-weight: bolder; color: red'>Podane hasło jest niepoprawne.</div>");
                }
            }
            else {
                DB -> close();
                die("<div style='text-align: center; font-size: 20px; font-weight: bolder; color: red'>Podany użytkownik nie istnieje.</div>");
            }

        }
    ?>
</body>
</html>