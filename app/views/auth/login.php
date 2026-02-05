<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
</head>
<body>

    <?php use App\Helpers\Flash; ?>

    <?php if ($error = Flash::get('error')): ?>
        <div style="color:red;">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <?php if ($success = Flash::get('success')): ?>
        <div style="color:green;">
            <?= $success ?>
        </div>
    <?php endif; ?>

    <h1>Login</h1>

    <form method="post" action="">
        <?php use App\Helpers\Csrf; ?>
        <input type="hidden" name="csrf_token" value="<?= Csrf::generate() ?>">
        <input type="text" name="email" placeholder="Email">
        <br><br>
        <input type="password" name="password" placeholder="Password">
        <br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
