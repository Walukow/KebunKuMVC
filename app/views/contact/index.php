<div class="isi1">
<?php Flasher::flash(); ?>
        <div class="jarak1"></div>
        <p class="judul">
            Kontak Kami
        </p>
        <p class="tengah">Butuh bantuan? Tim dukungan kami siap membantu Anda dengan setiap pertanyaan.</p>
        <div class="container6">
            <div class="tengah">
                <hr class="garis">
                <p class="judul">Opsi Dukungan</p>
                <p><strong>Live Chat:</strong> Tersedia 24/7</p>
                <p><strong>Email:</strong> support@namatoko.com</p>
                <p><strong>Telepon:</strong> (021) 456-7890 (08.00 - 20.00)</p>
            </div>
            <div>
                <hr class="garis">
                <p class="judul">Pelacakan Pesanan</p>
                <p class="tengah">Periksa status pemesanan anda</p>
                <div class="jarak1"></div>
                <div class="learn1">
                    <a href="">
                        <p><strong>Klik Disini</strong></p>
                    </a>
                </div>
            </div>
            <div>
                <hr class="garis">
                <p class="judul">Tautan Cepat</p>
                <div class="tengah">
                    <div class="learn1">
                        <a href="<?= BASEURL; ?>/logout">
                            <p><strong>FAQ</strong></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <hr class="garis">
            <p class="judul">Kirim Pertanyaan Anda</p>
            <form action="<?= BASEURL; ?>/contact/msg" method="post">
                <ul class="form-list">
                    <li class="form-item">
                        <label for="name">Nama:</label>
                        <input type="text" id="name" name="nama" class="form-input" required>
                    </li>
                    <li class="form-item">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-input" required>
                    </li>
                    <li class="form-item">
                        <label for="message">Pesan:</label>
                        <textarea id="message" name="pesan" class="form-textarea" required></textarea>
                    </li>
                    <li class="form-item">
                        <button type="submit" name="submit" class="form-button">Kirim</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>