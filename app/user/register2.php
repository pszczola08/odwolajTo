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
    <form action="register2.php" method="post">
        Zanim utworzysz konto, zapoznaj się i zaakceptuj Warunki i Zasady użytkowania naszej witryny:
        <div class="terms">
            <h1>Warunki i Zasady Użytkowania odwolajto.pl</h1>
            Data wejścia w życie: 19.10.2024

            <h2>1. Wprowadzenie</h2>
            Niniejsze Warunki i Zasady Użytkowania (dalej „Warunki”) określają zasady korzystania z aplikacji odwolajto.pl (dalej „Aplikacja”). Korzystając z Aplikacji, użytkownik (dalej „Użytkownik”) akceptuje niniejsze Warunki. Jeśli Użytkownik nie zgadza się z którymkolwiek punktem, nie powinien korzystać z Aplikacji.
            <h2>2. Definicje</h2>
            Aplikacja: Oprogramowanie dostępne na platformie odwolajto.pl, umożliwiające komunikację między nauczycielami a uczniami.
            Użytkownik: Osoba korzystająca z Aplikacji, w tym uczniowie i nauczyciele.
            <h2>3. Zasady korzystania z Aplikacji</h2>
            Użytkownik zobowiązuje się do korzystania z Aplikacji zgodnie z obowiązującym prawem oraz niniejszymi Warunkami.
            Użytkownik nie może:
            Wysyłać fałszywych lub wprowadzających w błąd informacji.
            Używać Aplikacji do celów niezgodnych z prawem lub szkodliwych dla innych użytkowników.
            Naruszać praw autorskich lub innych praw własności intelektualnej.
            <h2>4. Rejestracja konta</h2>
            Aby korzystać z Aplikacji, Użytkownik musi zarejestrować konto, podając prawdziwe i aktualne dane.
            Użytkownik jest odpowiedzialny za zachowanie poufności swojego hasła i konta.
            <h2>5. Wysyłanie próśb</h2>
            Użytkownik ma prawo do wysyłania próśb o przełożenie sprawdzianów oraz zastępstw.
            Nauczyciele mają prawo do akceptacji lub odrzucenia tych próśb.
            <h2>6. Ochrona danych osobowych</h2>
            Aplikacja przetwarza dane osobowe Użytkowników zgodnie z obowiązującymi przepisami prawa o ochronie danych osobowych.
            Szczegóły dotyczące przetwarzania danych osobowych można znaleźć w Polityce Prywatności.
            <h2>7. Odpowiedzialność</h2>
            Aplikacja nie ponosi odpowiedzialności za jakiekolwiek straty lub szkody wynikające z korzystania z Aplikacji, w tym za decyzje podjęte na podstawie informacji uzyskanych z Aplikacji.
            <h2>8. Zmiany w Warunkach</h2>
            Aplikacja zastrzega sobie prawo do wprowadzania zmian w niniejszych Warunkach. Użytkownicy będą informowani o wszelkich istotnych zmianach.
            <h2>9. Kontakt</h2>
            W przypadku pytań dotyczących Warunków prosimy o kontakt na adres: pomoc@odwolajto.pl.
        </div>
        <label class="agree">
            <input type="checkbox" name="agree" value="agree" required>     
            <div class="info">
                &nbsp;Zapoznałem się z Warunkami i Zasadami Użytkowania
            </div>
        </label>
        <input type="submit" value="Zakończ rejestrację">
    </form>
    <?php
        require '../lib/functions.php';
        require '../lib/globarVariables.php';
        session_start();
        if(!isset($_SESSION["user"]) || !isset($_SESSION["pass"])) {
            echo("<script>window.open('register0.php', '_self')</script>");
        }
        if(!isset($_SESSION["type"])) {
            echo("<script>window.open('register1.php', '_self')</script>");
        }
        @$agree = $_POST['agree'];
        if(isset($agree)) {
            try {
                if(DB->connect_error) {
                    throw new Exception(''. DB->connect_error);
                }
            } catch(Exception $e) {
                $ok = false;
                die("<div style='text-align: center; font-size: 20px; font-weight: bolder; color: red'>Wystąpił problem. Spróbuj ponownie później.</div>");
            }
            executeJS("window.open('register3.php', '_self')");
        }
    ?>
</body>
</html>