<div class="pos-f-t">
    <nav class="navbar navbar-dark bg-dark">
        <?php if ($this->session->userdata('name') == null) { ?>
            <a href="#" class="btn btn-dark btn-lg active" role="button" aria-pressed="true">Anda belum Login!</a>

            <a href="<?= base_url('auth') ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Login disini!</a>
        <?php } else { ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <img src="<?= base_url() ?>/assets/img/img_avatar.png" alt="Avatar" style="border-radius: 50%;width:50px;"> &nbsp;<?= $this->session->userdata('name'); ?>
            </button>
            <a href="<?= base_url('dashboard/home/') . $this->session->userdata('id') ?>" class="btn btn-success btn-lg active" role="button" aria-pressed="true">KEMBALI</a>
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">LOGOUT</a>
        <?php } ?>
    </nav>
    <div class="jumbotron">
        <center>
            <h1 class="display-4">History Detail</h1>
        </center>
    </div>

    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($getHistoryDetail as $value) {
                ?>
                    <tr>
                        <td><?= $value['trx_code']; ?></td>
                        <td><?= $value['product_name']; ?></td>
                        <td><?= $value['qty']; ?></td>
                        <td>Rp <?= number_format($value['price'], 0, ',', '.'); ?></td>
                        <td>Rp <?= number_format($value['total_price'], 0, ',', '.'); ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>