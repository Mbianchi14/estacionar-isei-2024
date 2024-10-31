<!DOCTYPE html>
<html lang="en">

<head>
    <?= $head ?>
    <title><?= $title ?></title>
</head>

<body style="background-color:white !important">
    <div class="form-design">
        <form action="" method="post">
            <div class="branding">
                <h1>Estacionar</h1>
                <img src="../img/favicon.png" alt="branding-app" srcset="" />
            </div>
            <div class="create_account">
                <h2>Crear una cuenta</h2>
                <p>ingrese su email para registrarse en la App</p>
            </div>
            <input type="text" name="mail" value="<?= $mail ?>" placeholder="email@domain.com" required
                autocomplete="off" autofocus id="" />
            <?php if (!empty($error)): ?>
                <?php foreach ($error as $e): ?>
                    <output class="msg_error"><?php echo htmlspecialchars($e) ?></output>
                <?php endforeach; ?>
            <?php endif; ?>
            <button class="btnReg" name="send" type="submit">Registrarse</button>
            <div class="divider">
                <hr />
                <p>o continuar en</p>
                <hr />
            </div>
            <div class="google">
                <i class='bx bxl-google'></i>
                <a class="btnGog" href="https://">oogle</a>
            </div>
            <div class="policy-terms">
                <p>
                    By clicking continue, you agree to our
                    <a class="policy" href="https://">Terms of Service</a> and
                    <a class="policy" href="https://">Privacy Policy</a>.
                </p>
            </div>
        </form>
    </div>
</body>

</html>