<?php Flasher::flash(); ?>
<a class="judul back1 kembali"><i data-feather="arrow-left"></i></a>
    <p class="judul">Tambah Produk</p>

    <form action="<?= BASEURL.'/create/add' ?>" method="post" enctype="multipart/form-data">
    <table class="product-table">
        <tr>
            <th>Nama Produk</th>
            <td>
                <input type="text" name="nama" id="nama" required value="">
            </td>
        </tr>
        <tr>
            <th>Harga Produk</th>
            <td>
                <input type="text" name="harga" id="harga" required value="">
            </td>
        </tr>
        <tr>
            <th>Stock Produk</th>
            <td>
                <input type="text" name="stock" id="stock" required value="">
            </td>
        </tr>
        <tr>
            <th>Gambar Produk</th>
            <td>
                <input type="file" name="gambar" id="gambar" value="">
            </td>
        </tr>
        <tr>
            <th>Aksi</th>
            <td>
                <button type="submit" name="submit">Tambah Produk</button>
            </td>
        </tr>
    </table>
</form>