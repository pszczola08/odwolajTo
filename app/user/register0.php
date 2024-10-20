<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Odwołaj To - Logowanie">
    <meta name="keywords" content="Odwołaj To, Odwołaj, Logowanie, Zaloguj Się, Zaloguj">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="form.css">
    <link rel="icon" href="../assets/icons/icon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>odwolajto.pl - Rejestracja</title>
</head>
<body>
    <header>
        odwolajto.pl - Rejestracja
    </header>
    <br>
    <aside>
        <div id="progressMade" style="flex: 0;"></div>
        <div id="left" style="flex: 3;"></div>
    </aside>
    <br>
    <form action="register0.php" method="post">
        <input type="text" name="user" placeholder="Nazwa Użytkownika" required id="userInp" minlength="8" maxlength="24"><br>
        <div class="passLabel">
            <input type="password" name="pass" placeholder="Hasło" id="passInp0" required>
            <span class="material-symbols-rounded" id="showBtn" onclick="vis(0)">visibility_off</span><br>
        </div>
        <div class="passLabel">
            <input type="password" name="pass2" placeholder="Powtórz Hasło" id="passInp1" required>
            <span class="material-symbols-rounded" id="showBtn" onclick="vis(1)">visibility_off</span><br>
        </div>
        <input type="submit" value="Kolejna strona"><br>
    </form>
    <p>Masz już konto? <a href="login.php">Zaloguj się!</a></p>
    <script>
        function vis(place) {
            var icon = document.getElementsByTagName("span")[place].innerText
            if(icon == "visibility") {
                document.getElementsByTagName("span")[place].innerText = "visibility_off";
                document.getElementById(`passInp${place}`).setAttribute("type", "password");
            } else {
                document.getElementsByTagName("span")[place].innerText = "visibility";
                document.getElementById(`passInp${place}`).setAttribute("type", "text");
            }
        }
    </script>
    <?php
        require '../lib/functions.php';
        $ok = true;
        @$user = $_POST['user'];
        @$pass = $_POST['pass'];
        @$pass2 = $_POST['pass2'];
        if(!empty($user) && !empty($pass) && !empty($pass2)) {
            require '../lib/globarVariables.php';
            try {
                if(DB->connect_error) {
                    throw new Exception(''. DB->connect_error);
                }
            } catch(Exception $e) {
                DB -> close();
                die("<div style='text-align: center; font-size: 20px; font-weight: bolder; color: red'>Wystąpił problem. Spróbuj ponownie później.</div>");
            }

            if($pass == $pass2) {
                $userCheck = mysqli_query(DB, "SELECT * FROM users WHERE username = '$user'");
                if(mysqli_num_rows($userCheck) == 0) {
                    $hashPass = sha1($pass);
                    session_start();
                    $_SESSION["user"] = $user;
                    $_SESSION["pass"] = $hashPass;
                    executeJS("window.open('register1.php', '_self')");
                } else {
                    executeJS("document.getElementById('userInp').value = '$user';");
                    executeJS("document.getElementById('passInp0').value = '$pass';");
                    executeJS("document.getElementById('passInp1').value = '$pass2';");
                    DB -> close();
                    die("<div style='text-align: center; font-size: 20px; font-weight: bolder; color: red'>Ta nazwa użytkownika jest już zajęta./div>");
                }
            } else {
                executeJS("document.getElementById('userInp').value = '$user';");
                executeJS("document.getElementById('passInp0').value = '$pass';");
                executeJS("document.getElementById('passInp1').value = '$pass2';");
                DB -> close();
                die("<div style='text-align: center; font-size: 20px; font-weight: bolder; color: red'>Hasła nie są takie same!</div>");
            }
            DB -> close();
        }
    ?>
</body>
</html>