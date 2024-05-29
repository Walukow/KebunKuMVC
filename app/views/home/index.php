<div class="intro">
        <div class="animation">
            <div class="isi">
                <p>Transformasi Ruangan Anda</p>
                <p> Menuju Kenyamanan dan Keindahan</p>
                <p>dengan Produk Kami.</p>
            </div>
            <div class="learn">
                <a href="<?= BASEURL; ?>/about">
                    <p>Pelajari Selengkap nya...</p>
                </a>
            </div>
            <div class="jarak"></div>
            <div class="animasi"></div>
        </div>
    </div>
    <div class="konten">
        <p class="judul">Produk Baru</p>
        <div class="akanKeKanan">
            <div class="container11">
                <div class="card1">
                    <a href="<?= BASEURL.'/product/'.$data['baru'][0]['id'] ?>">
                        <img src="<?= BASEURL ?>/img/<?= $data['baru'][0]['gambar'] ?>" alt="">
                    </a>
                </div>
                <div class="text1">
                    <p>
                        <?= $data['baru'][0]['nama'] ?>
                    </p>
                    <h4>Rp
                        <?= $data['baru'][0]['harga'] ?>
                    </h4>
                    <p>Tersedia :
                        <?= $data['baru'][0]['stock'] ?>
                    </p>
                </div>
            </div>
        </div>
        
        <div class="akanKeKiri">
            <div class="container12">
                <div class="card2">
                    <a href="<?= BASEURL.'/product/'.$data['baru'][1]['id'] ?>">
                        <img src="<?= BASEURL ?>/img/<?= $data['baru'][1]['gambar'] ?>" alt="">
                    </a>
                </div>
                <div class="text2">
                    <p>
                        <?= $data['baru'][1]['nama'] ?>
                    </p>
                    <h4>Rp
                        <?= $data['baru'][1]['harga'] ?>
                    </h4>
                    <p>Tersedia :
                        <?= $data['baru'][1]['stock'] ?>
                    </p>
                </div>
            </div>
        </div>
        <hr class="garis">
        <div class="judul2">
            <p>Populer Saat Ini</p>
        </div>
        <div class="newproduk">
            <div class="img5">
                <a href="<?= BASEURL.'/product/'.$data['populer']['id'] ?>">
                    <img src="<?= BASEURL ?>/img/<?= $data['populer']['gambar'] ?>" alt="">
                </a>
            </div>
            <div class="text3">
                <p>
                    <?= $data['populer']['nama'] ?>
                </p>
                <h4>Rp
                    <?= $data['populer']['harga'] ?>
                </h4>
                <p>Tersedia :
                    <?= $data['populer']['stock'] ?>
                </p>
            </div>
        </div>
    </div>