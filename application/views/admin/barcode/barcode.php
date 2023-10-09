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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Barcode</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-sm-4">
                                <p>
                                    <b>Nama Produk</b> &nbsp; : <?= $barcode->models ?>
                                </p>
                                <b>Barcode</b> <br>
                                <?php
                                require 'vendor/autoload.php';

                                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                echo $generator->getBarcode($barcode->barcode, $generator::TYPE_CODE_128); ?>
                                <?= $barcode->barcode ?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>