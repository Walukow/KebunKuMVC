<?php

class Flasher
{
    public static function setFlash($pesan, $aksi, $hasil, $from)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'hasil' => $hasil,
            'from' => $from
        ];
    }
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '
            <div class="flasherT '.$_SESSION['flash']['hasil'].'">
                        <p><strong>'.$_SESSION['flash']['pesan'].'</strong>'.$_SESSION['flash']['aksi'].'!</p>
                        <form action="'.BASEURL.$_SESSION['flash']['from'].'/unset" method="post">
                            <button name="hapusSesi">×</button>
                        </form>
                    </div>
            ';
            unset($_SESSION['flash']);
        }
    }
}