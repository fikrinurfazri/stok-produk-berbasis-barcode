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
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Pertanggal</h3>
            </div>
            <div class="card-body">

                <form action="<?php echo base_url('laporan/generate'); ?>" method="post">
                    <div class="d-flex">
                        <div class="form-group">
                            <label for="start_date">Tanggal Awal:</label>
                            <input type="date" class="form-control" name="start_date" required>
                        </div>
                        &nbsp;
                        <div class="form-group">
                            <label for="end_date">Tanggal Akhir:</label>
                            <input type="date" class="form-control" name="end_date" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Generate Laporan">
                    </div>

                </form>
            </div>
        </div>

        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Bulan</h3>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('laporan/bulan'); ?>">
                    <div class="d-flex">
                        <div class="form-group col-2">
                            <!-- <label for="bulan">Bulan:</label> -->
                            <!-- <input type="month" class="form-control" name="bulan" id="bulan" required> -->
                            <!-- <input type="submit" value="Tampilkan"> -->
                            <select name="bulan" id="" class="form-control">
                                <option>== Pilih Bulan ==</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Tampilkan</button>
                        </div>
                    </div>
                </form>
                <br>
                <h1>Laporan Barang Masuk</h1>
                <br>
                <?php if (!empty($perbulan)) : ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>NO</th>
                            <th>Model</th>
                            <th>Warna</th>
                            <th>Jumlah</th>
                            <th>Sisa</th>
                        </tr>
                        <?php
                        $jml = 0;
                        $no = 1;
                        foreach ($perbulan as $item) {
                            $jml += $item->total_jumlah;
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $item->models; ?></td>
                                <td><?php echo $item->collor; ?></td>
                                <td><?php echo $item->total_jumlah; ?></td>
                                <td><?php echo $item->jumlah; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th colspan="3">JUMLAH</th>
                            <th><?= $jml ?></th>
                        </tr>

                    </table>
                <?php else : ?>
                    <p>Tidak ada laporan yang ditemukan.</p>
                <?php endif; ?>
            </div>

        </div>
</div>
</div><!-- /.container-fluid -->
</section>
</div>