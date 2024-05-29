<div class="isi1">
        <a class="judul back1 kembali">
            <i data-feather="arrow-left"></i>
        </a>
        <div class="container6">
        <div class="keranjang">
                <hr class="garis2">
                <p class="judul">Keranjang</p>
                <div class="container2">
<?php
    foreach($data['keranjang'] as $data_barang)
    {
?>
                    <div class="card3">
                        <img src="<?= BASEURL.'/img/'.$data_barang['gambar'] ?>" class="img3 card3i border1" alt="">
                        <p class="card3i2">
                        <?= $data_barang['nama'] ?>
                        </p>
                        <div class="harga">
                        <p class="card3i2">
                            Rp
                            <?= $data_barang['harga'] ?>
                        </p>
                            <div class="harga1">
                                <div class="tombol card3i1">
                                    <form action="<?= BASEURL ?>/cart/act/" method="post" class="pusing" >
                                        <input type="number" name="jumlah[]" class="angka" min="1"
                                            max="<?= $data_barang['stock'] ?>" value="1" required>
                                        <input type="hidden" name="tanggal[]"
                                            value="<?php echo date('Y-m-d H:i:s'); ?>">
                                        <input type="hidden" name="idproduk[]" value="<?= $data_barang['id'] ?>">
                                        <input type="hidden" name="stock[]" value="<?= $data_barang['stock'] ?>">
                                        <input type="hidden" name="id" value="<?= $data_barang['id'] ?>">
                                </div>
                            <button type="submit" class="hapus" name="hapus"><i data-feather="trash-2"></i></button>
                            </div>
                        </div>
                    </div>
                    
<?php 
    }
?>
                    <div class="card5">
                        <button type="submit" class="card3i konfirmasi" name="beli">KONFIRMASI untuk
                            Bayar</button>
                        </form>
                    </div>
                </div>
            </div>
                <div class="riwayat" >
                    <div id="riwayat"></div>
                    <hr class="garis2">
                    <p class="judul">Riwayat Pembayaran</p>
                    <div class="container8">
                        <div class="container9">
                                        </div>
                <div class="container7">
                                        </div>
                    </div>
            </div>
        </div>
                                    </div>
        <hr class="garis2">
        <div class="judul">
            <p>Tambah Produk Lainnya</p>
        </div>