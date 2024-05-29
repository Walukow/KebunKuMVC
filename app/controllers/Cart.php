<?php

class Cart extends Controller {
    public function act() {
        if (!isset($_POST)) {
            header('Location:'.BASEURL);
            exit;
        }
        if (isset($_POST['hapus'])) {
            $data = [
                'idproduk' => $_POST['id'],
                'username' => $_SESSION['login']['username']
            ];
            $model = $this->model('Cart_model');
            if (is_string($model->deleteCart($data))) {
                Flasher::setFlash('', $model->deleteCart($data), 'gagal', '/cart');
                header('Location:'.BASEURL.'/cart');
                exit;
            } else if ($model->deleteCart($data) > 0) {
                Flasher::setFlash('GAGAL', ' menghapus produk dari keranjang', 'gagal', '/cart');
                header('Location:'.BASEURL.'/cart');
                exit;
            } else {
                Flasher::setFlash('Berhasil', ' menghapus produk dari keranjang', '', '/cart');
                header('Location:'.BASEURL.'/cart');
                exit;
            }
        } elseif (isset($_POST['beli'])) {
            $username = $_SESSION['login']['username'];
            $model = $this->model('History_model');
            if ($model->buy($_POST, $username) == 0) {
                Flasher::setFlash('GAGAL', ' membeli produk', 'gagal', '/cart');
                header('Location:'.BASEURL.'/cart');
                exit;
            } else {
                Flasher::setFlash('Terima kasih', ' telah membeli produk', '', '/cart');
                header('Location:'.BASEURL.'/cart');
                exit;
            }
        }
    }
    public function index($page = 1) {
        $data['produk'] = $this->model('Product_model')->getAllProduk();
        
        if (!isset($_SESSION['login'])) {
            $this->view('templates/header');
            $this->view('templates/navbar');
            $this->view('cart/index');
            $this->view('catalog/index', $data);
            $this->view('templates/footer');
            $this->view('templates/script');
        } else {
            $username = $_SESSION['login']['username'];
            $user = $this->model('User_model')->getUser($username);

            $data_perhalaman = 3;
            $jumlah_data = $this->model('History_model')->countRiwayat($username);
            $jumlah_hal = ceil($jumlah_data / $data_perhalaman);
            if ($page < 0 || $page > $jumlah_hal || is_int($page)) {
                $page = 1;
            }
            $halaman_aktif = $page;
            $awal_data = ($data_perhalaman * $halaman_aktif) - $data_perhalaman;

            $keranjang = $this->model('Cart_model')->getAllKeranjang($username);
            $produk_keranjang = [];

            foreach ($keranjang as $item) {
                if (isset($item['idproduk'])) {
                    $idproduk = $item['idproduk'];
                    $result = $this->model('Product_model')->getReadyProduk($idproduk);
                    if ($result) {
                        $produk_keranjang[] = $result;
                    }
                }
            }

            $riwayat = $this->model('History_model')->getAllRiwayat($username, $awal_data, $data_perhalaman);
            $produk_riwayat = [];

            foreach ($riwayat as $d) {
                $produk_riwayat[] = $this->model('Product_model')->getProduk($d['idproduk']);
            }

            $history = [];

            foreach ($riwayat as $d1) {
                foreach ($produk_riwayat as $d2) {
                    if ($d1['idproduk'] == $d2['id']) {
                        $gabung1 = array_merge($d1, $d2);
                        $history[] = $gabung1;
                        break;
                    }
                }
            }

            $data['keranjang'] = $produk_keranjang;
            $data['history'] = $history;
            $data['jumlah_data'] = $jumlah_data;
            $data['jumlah_hal'] = $jumlah_hal;
            $data['halaman_aktif'] = $halaman_aktif;
            $data['user'] = $user;

            $this->view('templates/header');
            $this->view('templates/navbar');

            if (empty($produk_keranjang) && empty($history)) {
                $this->view('cart/cart_not', $data);
            } elseif (empty($produk_keranjang)) {
                $this->view('cart/cart_notkeranjang', $data);
            } elseif (empty($history)) {
                $this->view('cart/cart_notriwayat', $data);
            } else {
                $this->view('cart/cart', $data);
            }

            $this->view('catalog/index', $data);
            $this->view('templates/footer');
            $this->view('templates/script');
        }
    }
        public function unset() {
        unset($_SESSION['flash']);
        header('Location:'.BASEURL.'/cart');
        exit;
    }
}
