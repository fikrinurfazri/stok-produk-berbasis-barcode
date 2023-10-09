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
                        <form id="result-form" action="<?= base_url() ?>barang/kurang" method="post">
                            <!-- <div class="d-flex">
                            <div class="form-group col-lg-4">
                                <input type="text" name="barcode" class="form-control" placeholder="Pindai barcode disini" autofocus>
                            </div> -->
                            <!-- <div class="form-group col-lg-4">
                                <input type="submit" class="btn btn-primary" value="Tambah Jumlah">
                            </div> -->
                            <div class="form-group col-lg-12">
                                <input type="text" id="scanned-result" class="form-control" name="barcode" placeholder="Pindai barcode disini" autofocus>
                            </div>
                        </form>
                        <div class="form-group col-lg-4">
                            <button class="btn btn-primary" id="startButton"><i class="fas fa-camera"></i></button>
                        </div>
                    </div>
                </div>
                <!-- <a href="<?= base_url() ?>barcode/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Produk</a> -->
            </div>

            <div id="scanner-container">
                <video id="video" autoplay></video>
            </div>
        </div><!-- /.container-fluid -->
    </section>
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
                                    <th>JUMLAH</th>
                                    <!-- <th>ACT</th> -->
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($all as $p) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $p->models ?></td>
                                            <td><?= $p->collor ?></td>
                                            <td><?= $p->jumlah ?></td>


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
<script src="https://cdn.jsdelivr.net/npm/quagga/dist/quagga.min.js"></script>
<script>
    const scannerContainer = document.getElementById('scanner-container');
    const video = document.getElementById('video');
    const resultForm = document.getElementById('result-form');
    const scannedResultInput = document.getElementById('scanned-result');

    // Menggunakan getUserMedia untuk mengakses kamera belakang
    function startCamera() {
        navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: 'environment',
                    advanced: [{
                            zoom: {
                                exact: 2
                            }
                        } // Atur level zoom sesuai kebutuhan (misalnya, 2 untuk zoom 2x)
                    ]
                }
            })
            .then(function(stream) {
                video.srcObject = stream;
                scannerContainer.style.display = 'block';
                startScanner();
            })
            .catch(function(error) {
                console.error('Error accessing the camera: ', error);
            });
    }

    function startScanner() {
        Quagga.init({
            inputStream: {
                target: video,
                type: 'LiveStream'
            },
            decoder: {
                readers: ['code_128_reader'] // Anda dapat mengganti dengan jenis pembaca kode yang lain
            }
        }, function(err) {
            if (err) {
                console.error('Error initializing Quagga: ', err);
                return;
            }
            Quagga.start();
        });

        Quagga.onDetected(function(result) {
            // Hasil pemindaian ditemukan, masukkan ke dalam input form
            const scannedCode = result.codeResult.code;
            scannedResultInput.value = scannedCode;

            // Hentikan pemindaian setelah satu hasil ditemukan
            Quagga.stop();
            resultForm.submit();

        });
    }

    startButton.addEventListener('click', function() {
        startCamera();
    });
</script>