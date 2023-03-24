<div class="pos-f-t">

    <!-- <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
                <h5 class="text-white h4">Webhozz Shop</h5>
                <span class="text-muted">Menjawab Kebutuhan IT Anda</span>
            </div>
        </div> -->
    <nav class="navbar navbar-dark bg-dark">
        <?php if ($this->session->userdata('name') == null) { ?>
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    Anda belum Login!
                </button> -->
            <a href="#" class="btn btn-dark btn-lg active" role="button" aria-pressed="true">Anda belum Login!</a>

            <a href="<?= base_url('auth') ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Login disini!</a>
        <?php } else { ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <img src="<?= base_url() ?>/assets/img/img_avatar.png" alt="Avatar" style="border-radius: 50%;width:50px;"> &nbsp;<?= $this->session->userdata('name'); ?>
            </button>
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">LOGOUT</a>
        <?php } ?>
    </nav>
    <div class="jumbotron">
        <center>
            <h1 class="display-4"><?= $title; ?></h1>
        </center>
    </div>

    <div class="container">

        <div class="card" style="width: 18rem; float: none; margin: 0 auto;margin-bottom: 10px;">
            <img src="<?= base_url() . $getProductId['product_image'] ?>" class="card-img-top" alt="">
        </div>

        <table class="table">
            <tbody>
                <tr>
                    <td class="text-center" style="font-weight:bold;">Product Code</td>
                    <td class="text-center"><?= $getProductId['product_code'] ?></td>
                </tr>
                <tr>
                    <td class="text-center" style="font-weight:bold;">Product Name</td>
                    <td class="text-center"><?= $getProductId['product_name'] ?></td>
                </tr>
                <tr>
                    <td class="text-center" style="font-weight:bold;">Price</td>
                    <td class="text-center">Rp <?= number_format($getProductId['price'], 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="text-center" style="font-weight:bold;">Dimension</td>
                    <td class="text-center"><?= $getProductId['dimension'] ?></td>
                </tr>
                <tr>
                    <td class="text-center" style="font-weight:bold;">Unit</td>
                    <td class="text-center"><?= $getProductId['unit'] ?></td>
                </tr>
            </tbody>
        </table>

        <div class="card-body">
            <div class="text-center">
                <a href="<?= base_url('dashboard/home') ?>" class="btn btn-primary">Kembali ke halaman awal</a>
            </div>
        </div>

    </div>