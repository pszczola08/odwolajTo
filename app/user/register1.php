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
            <label style="border: 2px solid #ff7f00">
                <input type="radio" name="type">
                <div class="rdBtn">
                    Uczeń<br>
                    <img src="student.png" alt="student">
                </div>
            </label>
            <label style="border: 2px solid #3a4ec6">
                <input type="radio" name="type">
                <div class="rdBtn">
                    Nauczyciel<br>
                    <img src="teacher.png" alt="teacher">
                </div>
            </label>
            <label style="border: 2px solid #7cd444">
                <input type="radio" name="type">
                <div class="rdBtn">
                    Dyrekcja<br>
                </div>
            </label>
        </div>
    </form>
    <?php
        session_start();
    ?>
</body>
</html>