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
                        <form id="result-form" action="<?= base_url() ?>barcode/tambah" method="post">
                            <!-- <div class="d-flex">
                            <div class="form-group col-lg-4">
                                <input type="text" name="barcode" class="form-control" placeholder="Pindai barcode disini" autofocus>
                            </div> -->
                            <!-- <div class="form-group col-lg-4">
                                <input type="submit" class="btn btn-primary" value="Tambah Jumlah">
                            </div> -->
                            <div class="form-group col-lg-12">
                                <input type="text" id="scanned-result" class="form-control" name="barcode" placeholder="Suplier">
                            </div>
                            <div class="d-flex">
                                <div class="form-group col-lg-12">
                                    <input type="text" id="scanned-result" class="form-control" name="barcode" placeholder="Pindai barcode disini" autofocus>
                                </div>
                                <div class="form-group col-lg-2">
                                    <input type="number" id="scanned-result" class="form-control" name="barcode">
                                </div>
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
                    facingMode: 'environment'
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