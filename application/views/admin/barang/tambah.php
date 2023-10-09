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
                        <li class="breadcrumb-item active"> <?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">

                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-warning">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif ?>
                    <div class="d-flex">
                        <div class="col-6">

                            <div class="card card-success">
                                <div class="card-header">
                                    <!-- <h3 class="card-title">Model</h3> -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelex">
                                        <i class="fa fa-plus"></i> Tambah Model
                                    </button>
                                </div>
                                <div class="card-body">
                                    <!-- Date dd/mm/yyyy -->
                                    <table class="table table-striped">
                                        <thead>
                                            <th>NO</th>
                                            <th>MODEL</th>
                                            <th>ACT</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($model as $p) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $p->model ?></td>
                                                    <td><a href="<?= base_url() ?>barang/deletemodel/<?= $p->id ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>
                        &nbsp;
                        <div class="col-6">
                            <div class="card card-success">
                                <div class="card-header">
                                    <!-- <h3 class="card-title">Warna</h3> -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#warnaex">
                                        <i class="fa fa-plus"></i> Tambah Warna
                                    </button>
                                </div>
                                <div class="card-body">
                                    <!-- Date dd/mm/yyyy -->
                                    <table class="table table-striped">
                                        <thead>
                                            <th>NO</th>
                                            <th>Warna</th>
                                            <th>ACT</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($warna as $p) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $p->warna ?></td>
                                                    <td><a href="<?= base_url() ?>barang/deletewarna/<?= $p->id ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-success">
                        <div class="card-header">
                            <div class="d-flex">
                                <!-- <h3 class="card-title">Product</h3> -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#produk">
                                    <i class="fa fa-plus"></i> Tambah Produk
                                </button>
                                &nbsp;
                                <form id="result-form">
                                    <div class="form-group col-lg-12">
                                        <input type="text" id="scanned-result" class="form-control" name="barcode" placeholder="Cari Produk" autofocus>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Date dd/mm/yyyy -->
                            <table class="table table-striped">
                                <thead>
                                    <th>NO</th>
                                    <th>BARCODE</th>
                                    <th>QRCODE</th>
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
                                            <td class="col-4"> <?php
                                                                require 'vendor/autoload.php';

                                                                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                                                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($p->barcode, $generator::TYPE_CODE_128)) . '" style="200px">'; ?>
                                            </td>
                                            <td>
                                                <img src="<?php echo site_url('Barcode/QRcode/' . $p->barcode); ?>" alt="">
                                            </td>

                                            <td><?= $p->models ?></td>
                                            <td><?= $p->collor ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>barang/deletebrg/<?= $p->id_product ?>" class="btn btn-danger"><i class="ti ti-trash"></i></a>
                                                <a href="<?= base_url() ?>barcode/print/<?= $p->id_product ?>" class="btn btn-success" target="_blank"><i class="ti ti-barcode" data-target="_blank"></i></a>
                                                <a href="<?= base_url() ?>barcode/qrcodeprt/<?= $p->id_product ?>" class="btn btn-success" target="_blank"><i class="ti ti-qrcode" data-target="_blank"></i></a>
                                                <!-- <a href="<?= base_url() ?>barcode/qrcode/<?= $p->id_product ?>" class="btn btn-success"><i class="fa fa-qrcode" data-target="_blank"></i></a> -->
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

</div>
<div class="modal fade" id="modelex" tabindex="-1" role="dialog" aria-labelledby="modelexLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelexLabel">Tambah Model</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>barang/prosesmodel" id="form_input" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" name="model" placeholder="Model">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="warnaex" tabindex="-1" role="dialog" aria-labelledby="warnaexLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="warnaexLabel">Tambah Warna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>barang/proseswarna" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" name="warna" placeholder="Warna">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="produk" tabindex="-1" role="dialog" aria-labelledby="produkLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="produkLabel">Tambah produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url() ?>barang/input">
                    <div class="form-group">
                        <label>Lantai</label>

                        <div class="input-group">

                            <!-- <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask> -->
                            <select name="lantai" id="lantai" class="form-control">
                                <option value="">-- Pilih Lantai --</option>
                                <option value="1">Lantai 1</option>
                                <option value="2">Lantai 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Model</label>
                        <div class="input-group">
                            <select name="model" class="form-control" id="">
                                <?php foreach ($model as $m) : ?>
                                    <option value="<?= $m->model ?>"><?= $m->model ?></option>
                                <?php endforeach ?>
                            </select>

                            <input type="hidden" class="form-control" value="<?= $id->id_product ?>" name="barcode">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Warna</label>
                        <div class="input-group">

                            <select name="warna" class="form-control" id="">
                                <?php foreach ($warna as $m) : ?>
                                    <option value="<?= $m->warna ?>"><?= $m->warna ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>