<?php
    $msg = "";

    if (isset($_POST['submit'])) {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $url = $_POST['url'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if (empty($full_name) || empty($email) || empty($url) || empty($password) || empty($cpassword)) {
            $msg = "<div class='alert alert-danger'>Sva polja moraju biti ispravno popunjena.</div>";
        }else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $msg = "<div class='alert alert-danger'>Unesite ispravno email adresu.</div>";
            }else {
                if (!filter_var($url, FILTER_VALIDATE_URL)) {
                    $msg = "<div class='alert alert-danger'>Unesite ispravno URL.</div>";
                }else {
                    if ($password !== $cpassword) {
                        $msg = "<div class='alert alert-danger'>Lozinka i potvrđena lozinka se ne podudaraju.</div>";
                    }else {
                        $msg = "<div class='alert alert-success'>Registracija uspješno završena.</div>";
                        $full_name = "";
                        $email = "";
                        $url = "";
                        $password = "";
                        $cpassword = "";
                    }
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Validacijska forma - PHP/HTML</title>
</head>
<body>
    <div class="wrapper">
        <h2 class="title">Registracija</h2>
        <?php echo $msg; ?>
        <form action="" method="post" class="form">
            <div class="input-field">
                <label for="full_name" class="input-label">Ime i prezime</label>
                <input type="text" name="full_name" class="input" id="full_name" placeholder="Unesite puno ime i prezime" value="<?php if (isset($_POST['submit'])) { echo $full_name; } ?>">
            </div>
            <div class="input-field">
                <label for="email" class="input-label">Email</label>
                <input type="text" name="email" class="input" id="email" placeholder="Unesite Vaš email" value="<?php if (isset($_POST['submit'])) { echo $email; } ?>">
            </div>
            <div class="input-field">
                <label for="website" class="input-label">Web stranica</label>
                <input type="text" name="url" class="input" id="website" placeholder="Unesite web stranicu" value="<?php if (isset($_POST['submit'])) { echo $url; } ?>">
            </div>
            <div class="input-field">
                <label for="password" class="input-label">Lozinka</label>
                <input type="password" name="password" class="input" id="password" placeholder="Unesite lozinku" value="<?php if (isset($_POST['submit'])) { echo $password; } ?>">
            </div>
            <div class="input-field">
                <label for="cpassword" class="input-label">Potvrdite lozinku</label>
                <input type="password" name="cpassword" class="input" id="cpassword" placeholder="Unesite još jednom Vašu lozinku" value="<?php if (isset($_POST['submit'])) { echo $cpassword; } ?>">
            </div>
            <button type="submit" name="submit" class="btn">Registruj</button>
        </form>
    </div>
</body>
</html>