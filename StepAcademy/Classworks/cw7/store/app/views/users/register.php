<form method='post' action="" name="login">
    <input name="first_name" type="text" placeholder="Enter your first name"/> <br>
    <input name="last_name" type="text" placeholder="Enter your last name"/> <br>
    <input name="phone" type="text" placeholder="Enter your phone"/> <br>
    <input name="email" type="email" placeholder="Enter your email"/> <br>
    <input name="password" type="password" placeholder="Enter your password"/> <br>
    <input name="confirm_password" type="password" placeholder="Confirm your password"/> <br>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif;?>
    <button type="submit"> Register </button>  <br>
    <a href="/login/">Already have an account?</a>
</form>