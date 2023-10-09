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
                        <!-- <form id="result-form">
                            <div class="form-group col-lg-12">
                                <input type="text" id="scanned-result" class="form-control" name="barcode" placeholder="Pindai Kode disini" autofocus>
                            </div>
                        </form> -->
                        <div class="form-group col-lg-4">
                            <div id="notification">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div id="scanner-container">
                <video id="video" autoplay></video>
            </div>
            <h1>QR Code Scanner</h1>
            <video id="scanner" autoplay="true"></video>
            <div id="output"></div>


        </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-danger">
                        <div class="card-header">
                            <form id="result-form">
                                <div class="form-group col-lg-12">
                                    <input type="text" id="scanned-result" class="form-control" name="barcode" placeholder="Pindai Kode disini" autofocus>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <!-- Date dd/mm/yyyy -->
                            <table class="table table-striped" id="tampil">
                                <thead>
                                    <th>NO</th>
                                    <th>MODEL</th>
                                    <th>WARNA</th>
                                    <th>JUMLAH</th>
                                    <!-- <th>ACT</th> -->
                                </thead>
                                <tbody id="table-body">

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

<script src="https://cdn.jsdelivr.net/npm/quagga@0.12.1/dist/quagga.min.js"></script>
<script>
    navigator.mediaDevices.getUserMedia({
            video: true
        })
        .then(function(stream) {
            Quagga.init({
                inputStream: {
                    name: "Live",
                    type: "LiveStream",
                    target: document.querySelector("#scanner")
                },
                decoder: {
                    readers: ["code_128_reader", "ean_reader", "ean_8_reader", "code_39_reader", "qrcode_reader"]
                }
            });

            Quagga.onDetected(function(result) {
                var code = result.codeResult.code;
                document.querySelector("#output").textContent = "Kode QR: " + code;
            });

            Quagga.start();
        })
        .catch(function(error) {
            console.error('Tidak dapat mengakses kamera:', error);
        });
</script>