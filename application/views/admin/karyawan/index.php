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
                <div class="col-sm-12">
                    <div class="d-flex">
                        <div class="form-group col-lg-4">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus"></i> Tambah Karyawan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Daftar User</h3>
                        </div>
                        <div class="card-body">
                            <!-- Date dd/mm/yyyy -->
                            <table class="table table-striped">
                                <thead>
                                    <th>NO</th>
                                    <th>USERNAME</th>
                                    <th>LEVEL</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($admin as $p) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $p->username ?></td>

                                            <td> <?php if ($p->level == 1) {
                                                        echo  "Administrator";
                                                    } else {
                                                        echo "Karyawan";
                                                    } ?>
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
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action=""></form>
                <form action="<?= base_url() ?>karyawan/proses" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <select name="level" id="lantai" class="form-control">
                                <option value="">-- Pilih Level --</option>
                                <option value="2">Karyawan</option>
                                <option value="1">Pemilik</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" class="form-control" name="kon_password" placeholder="Konfirmasi Password">
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