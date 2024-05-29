<?php Flasher::flash(); ?>
<div class="login-container">
        <a href="index.php" class="navcon"><span class="kebun">Kebun</span><span class="ku">Ku</span></a>
        <h1 class="judul">Sign In</h1>

        <form action="<?= BASEURL; ?>/register/add" method="post" class="login-form">
        <ul>
            <li>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </li>
            <li>
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" id="alamat" required>
            </li>
            <li>
                <label for="nohp">No Hp:</label>
                <input type="text" name="nohp" id="nohp" required>
            </li>
            <li>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <label for="password2">Konfirmasi Password:</label>
                <input type="password" name="password2" id="password2" required>
            </li>
            <li>
                <button type="submit" name="register" class="login-button">Register</button>
            </li>
        </ul>
        <p class="register-text">Sudah Punya Akun?</p>
        <a href="<?= BASEURL ?>/login" class="register-link">Login</a>
    </form>