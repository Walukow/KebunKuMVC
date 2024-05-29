<?php Flasher::flash(); ?>
    <div class="daftar">
<?php 
    foreach ($data['produk'] as $row) :
?>
    <div class="card">
            <a href="<?= BASEURL.'/product/'.$row["id"] ?>">
            <img src="<?= BASEURL.'/img/'.$row["gambar"] ?>" alt="">
            <p><?= $row["nama"] ?></p>
            <h4>Rp<?= $row["harga"] ?></h4>
            <p>Tersedia <?= $row["stock"] ?></p>
            </a>
    </div>
<?php 
endforeach
?>
    </div>