<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <a href="<?= base_url() ?>barcode/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Produk</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Product</h3>
                        </div>
                        <div class="card-body">
                            <!-- Date dd/mm/yyyy -->
                            <table class="table table-striped">
                                <thead>
                                    <th>NO</th>
                                    <th>MODEL</th>
                                    <th>WARNA</th>
                                    <th>ACT</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($product as $p) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $p->models ?></td>
                                            <td><?= $p->collor ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>barcode/delete/<?= $p->id_product ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                <a href="<?= base_url() ?>barcode/print/<?= $p->id_product ?>" class="btn btn-success"><i class="fa fa-qrcode"></i></a>
                                            </td>

                                        </tr>
                                    <?php endforeach ?>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>