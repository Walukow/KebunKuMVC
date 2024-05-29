<?php Flasher::flash(); ?>
<div class="login-container">
    <a href="index.php" class="navcon"><span class="kebun">Kebun</span><span class="ku">Ku</span></a>

        <h1 class="judul">Login</h1>
        <form action="<?= BASEURL; ?>/alogin/verif" method="post" class="login-form">
            <ul>
                <li>
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" required>
                </li>
                <li>
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" required>
                </li>
                <li>
                    <button type="submit" name="login" class="login-button">Login</button>
                </li>
            </ul>
        </form>
    </div>