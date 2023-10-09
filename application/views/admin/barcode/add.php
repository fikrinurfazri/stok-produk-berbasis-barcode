<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">

                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Input Product</h3>
                        </div>
                        <div class="card-body">
                            <!-- Date dd/mm/yyyy -->
                            <form action="<?= base_url() ?>barcode/input" method="post">
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

                                        <input type="text" class="form-control" name="model">
                                        <input type="hidden" class="form-control" value="<?= $id->id_product ?>" name="barcode">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Warna</label>
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="warna">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="btn-group w-100">
                                        <button type="submit" class="btn btn-primary col start">
                                            <i class="fas fa-upload"></i>
                                            <span>Start upload</span>
                                        </button>
                                        <button type="reset" class="btn btn-warning col cancel">
                                            <i class="fas fa-times-circle"></i>
                                            <span>Cancel upload</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- /.form group -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>