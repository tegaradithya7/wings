<div class="pos-f-t">
    <nav class="navbar navbar-dark bg-dark">
        <?php if ($this->session->userdata('name') == null) { ?>
            <a href="#" class="btn btn-dark btn-lg active" role="button" aria-pressed="true">Anda belum Login!</a>

            <a href="<?= base_url('auth') ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Login disini!</a>
        <?php } else { ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <img src="<?= base_url() ?>/assets/img/img_avatar.png" alt="Avatar" style="border-radius: 50%;width:50px;"> &nbsp;<?= $this->session->userdata('name'); ?>
            </button>
            <a href="<?= base_url('dashboard/getHistory/') . $this->session->userdata('id') ?>" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">HISTORY PEMESANAN</a>
            <a href="<?= base_url('dashboard/getCart/') . $this->session->userdata('id') ?>" class="btn btn-success btn-lg active" role="button" aria-pressed="true">LIHAT KERANJANG</a>
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">LOGOUT</a>
        <?php } ?>
    </nav>
    <div class="jumbotron">
        <center>
            <h1 class="display-4">Semua Produk</h1>
        </center>
    </div>

    <div class="container">
        <?php
        foreach ($getProduct as $value) {
        ?>
            <div class="card" style="width: 20rem; float: left; margin: 25px;">
                <img src="<?= base_url() . $value['product_image'] ?>" class="card-img-top" alt="Kemeja Adj">
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $value['product_name'] ?></h5>
                    <p class="card-text">Rp <?= number_format($value['price'], 0, ',', '.'); ?></p>
                    <div class="text-center">
                        <a href="<?= base_url('dashboard/detailProduct/') . $value['id'] ?>" class="btn btn-warning"><i class="fas fa-info-circle"></i> Detail</a> <br> <br>
                        <button type="button" class="btn btn-primary open-modal" data-id="<?= $value['id']; ?>"><i class="fas fa-cart-plus"></i> Tambah ke Keranjang</button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url('dashboard/addCart') ?>" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Jumlah</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="produk_id" id="produk_id">
                        <!-- <p>Data ID: <span id="modal-data-id"></span></p> -->
                        <input type="number" name="quantitas" placeholder="qty" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.open-modal').click(function() {
                var id = $(this).data('id');
                $('#modal-data-id').text(id);
                $('#produk_id').val(id);
                $('#myModal').modal('show');
            });
        });
    </script>