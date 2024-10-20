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
        <div id="progressMade" style="flex: 3;"></div>
        <div id="left" style="flex: 0;"></div>
    </aside>
    <br>
    <?php
        session_start();
        @$user = $_SESSION['user'];
        @$pass = $_SESSION['pass'];
        @$type = $_SESSION['type'];
        @$agree = $_SESSION['agree'];
        if($agree != 'agree') {
            die("<div style='text-align: center; font-size: 20px; font-weight: bolder; color: red'>Wystąpił błąd podczas tworzenia konta: Warunki i Zasady Uzytkowania niezaakceptowane</div>");
        }
        if(!isset($pass)) {
            die("<div style='text-align: center; font-size: 20px; font-weight: bolder; color: red'>Wystąpił błąd podczas tworzenia konta: Nie ustawiono hasła</div>");
        }
        if(!isset($type)) {
            die("<div style='text-align: center; font-size: 20px; font-weight: bolder; color: red'>Wystąpił błąd podczas tworzenia konta: Nie zaznaczono typu konta</div>");
        }
        if(!isset($user)) {
            die("<div style='text-align: center; font-size: 20px; font-weight: bolder; color: red'>Wystąpił błąd podczas tworzenia konta: Nie ustawiono nazwy użytkownika</div>");
        }
        require '../lib/globarVariables.php';
        try {
            if(DB -> connect_error) {
                throw new Exception(''. DB->connect_error);
            }
        } catch(Exception $e) {
            DB -> close();
            die("<div style='text-align: center; font-size: 20px; font-weight: bolder; color: red'>Wystąpił problem. Spróbuj ponownie później.</div>");
        }
        $select = DB -> query(
            "SELECT `username` FROM `users` WHERE `username` = '$user'"
        );
        if($select->num_rows > 0) {
            DB -> close();
            die("<div style='text-align: center; font-size: 20px; font-weight: bolder; color: red'>Podany użytkownik już istnieje. Błąd może być spowodowany odświeżeniem strony.</div>");
        }
        else {
            $insert = DB -> query(
                "INSERT INTO `users`(`username`, `password`, `accountType`) VALUES ('$user','$pass','$type')"
            );
        }
        if(!$insert) {
            DB -> close();
            die("<div style='text-align: center; font-size: 20px; font-weight: bolder; color: red'>Wystąpił problem. Spróbuj ponownie później.</div>");
        }
        DB -> close();
        echo("<div style='text-align: center; font-size: 20px; font-weight: bolder; color: green'>Pomyślnie Utworzono Konto!</div>");
        echo("<a href='login.php' style='text-align: center; display: block;'>Przejdź do strony logowania.</a>");
    ?>
</body>
</html>