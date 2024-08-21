<form method='post' action="" name="login">
    <input name="email" type="email" placeholder="Enter your email"/> <br>
    <input name="password" type="password" placeholder="Enter your password"/> <br>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif;?>
    <button type="submit"> Login </button> <br>
    <a href="/register/">Don't have an account?</a>
</form>