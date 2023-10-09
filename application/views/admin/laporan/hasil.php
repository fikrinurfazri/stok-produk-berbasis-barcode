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
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Laporan Barang Masuk <?= $awal ?> s.d <?= $akhir ?></h3>
                </div>
                <div class="card-body">
                    <?php if (!empty($laporan)) : ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>NO</th>
                                <th>Tanggal</th>
                                <th>Model</th>
                                <th>Warna</th>
                                <th>Jumlah</th>
                            </tr>
                            <?php
                            $jml = 0;
                            $no = 1;
                            foreach ($laporan as $item) {
                                $jml += $item->total_jumlah;
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $item->tanggal; ?></td>
                                    <td><?php echo $item->models; ?></td>
                                    <td><?php echo $item->collor; ?></td>
                                    <td><?php echo $item->total_jumlah; ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th colspan="4">JUMLAH</th>
                                <th><?= $jml ?></th>
                            </tr>

                        </table>
                    <?php else : ?>
                        <p>Tidak ada laporan yang ditemukan.</p>
                    <?php endif; ?>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Laporan Barang Keluar <?= $awal ?> s.d <?= $akhir ?></h3>
                </div>
                <div class="card-body">
                    <?php if (!empty($laporan)) : ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>NO</th>
                                <th>Tanggal</th>
                                <th>Model</th>
                                <th>Warna</th>
                                <th>Jumlah</th>
                            </tr>
                            <?php
                            $jml = 0;
                            $no = 1;
                            foreach ($keluar as $k) {
                                $jml += $k->total_jumlah;
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $k->tanggal; ?></td>
                                    <td><?php echo $k->models; ?></td>
                                    <td><?php echo $k->collor; ?></td>
                                    <td><?php echo $k->total_jumlah; ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th colspan="4">JUMLAH</th>
                                <th><?= $jml ?></th>
                            </tr>

                        </table>
                    <?php else : ?>
                        <p>Tidak ada laporan yang ditemukan.</p>
                    <?php endif; ?>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
</div>