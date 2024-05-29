    <div class="container3">
        <a class="judul back kembali">
            <i data-feather="arrow-left"></i>
        </a>
        <div class="img">
            <img src="<?= BASEURL.'/img/'.$data['barang']["gambar"] ?>" class="border" alt="">
        </div>
        <div class="text3">
            <p><?= $data['barang']["nama"] ?></p>
            <h4><?= $data['barang']["harga"] ?></h4>
            <p>stok : <?= $data['barang']["stock"] ?></p>
            <?php
            if (!isset($_SESSION['login'])) {
                ?>
                <p class="tengah"><strong>Login terlebih dahulu agar dapat membeli!</strong></p>
                <div class="jarak1"></div>
                <div class="learn1">
                    <a href="<?= BASEURL ?>/login">
                        <p><strong>Login</strong></p>
                    </a>
                </div>
                <?php
            } elseif ($data['barang']["stock"] == 0) {
                ?>
                <p class="tengah"><strong>Stok Telah Habis</strong></p>
                <?php
            } else {
                ?>
                <form action="<?= BASEURL.'/product/add/'.$data['barang']['id']; ?>" method="post">
                    <button class="tmbl" name="submit">
                        + Keranjang
                    </button>
                </form>
                <?php
            }
            ?>
        </div>
        <div class="jarak"></div>
        <hr class="garis">
    </div>
    <div class="jarak"></div>
    <hr class="garis">
    <div class="judul">
        <p>Produk Lainya</p>
    </div>