<?php use App\Helpers\Flash; use App\Helpers\Csrf; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h1>Register</h1>

<?php if ($error = Flash::get('error')): ?>
    <div style="color:red;"><?= $error ?></div>
<?php endif; ?>

<?php if ($success = Flash::get('success')): ?>
    <div style="color:green;"><?= $success ?></div>
<?php endif; ?>

<form method="post" action="">
    <input type="hidden" name="csrf_token" value="<?= Csrf::generate() ?>">

    <input type="email" name="email" placeholder="Email">
    <br><br>

    <input type="password" name="password" placeholder="Password">
    <br><br>

    <input type="password" name="password_confirmation" placeholder="Confirm Password">
    <br><br>

    <button type="submit">Register</button>
</form>

<a href="<?= BASE_URL ?>/login">Login</a>

</body>
</html>
