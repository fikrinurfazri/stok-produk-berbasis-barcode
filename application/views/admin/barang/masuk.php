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
<!-- <script src="https://cdn.jsdelivr.net/npm/quagga/dist/quagga.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/quagga@0.12.1/dist/quagga.min.js"></script>

<script>
    const scannerContainer = document.getElementById('scanner-container');
    const video = document.getElementById('video');
    const resultForm = document.getElementById('result-form');
    const scannedResultInput = document.getElementById('scanned-result');
    const toggleFlashBtn = document.getElementById('toggle-flash-btn');


    // Menggunakan getUserMedia untuk mengakses kamera belakang
    function startCamera() {
        navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: 'environment',
                    advanced: [{
                            zoom: {
                                exact: 1
                            },
                            torch: true

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

    var scanning = false;

    function startScanner() {
        Quagga.init({
            inputStream: {
                target: video,
                type: 'LiveStream'
            },
            decoder: {
                readers: ['qrcode_reader']
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
            // Quagga.stop();
            // resultForm.submit();
            processScanResult(scannedCode);
        });
    }

    function processScanResult(scannedCode) {
        console.log('Nilai scannedCode:', scannedCode);


        if (scanning) {
            console.log('Pemindaian sedang berlangsung, tunggu beberapa detik.');
            return;
        }
        scanning = true;

        // Kirim data hasil pemindaian ke server menggunakan permintaan Ajax

        var data = $('#result-form').serialize();
        $.ajax({
            type: 'POST',
            url: "<?= base_url(); ?>barang/tambah",
            data: data,
            cache: false,
            success: function(data) {
                scannedResultInput.value = '';
                scannedResultInput.focus();
                if (data.status === 'berhasil') {
                    showNotification('Input berhasil.', 'success');
                    updateTable();
                    // Mainkan suara notifikasi
                    const successSound = document.getElementById('success-sound');
                    successSound.play();

                    setTimeout(function() {
                        scanning = false;
                        startScanner();
                    }, 3000);

                } else {
                    showNotification('Gagal!, BARCODE tidak ditemukan', 'danger');
                    const successSound = document.getElementById('failed-sound');
                    successSound.play();
                    setTimeout(function() {
                        scanning = false;
                        startScanner();
                    }, 3000);

                }

            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan saat menambahkan data:', error);
                alert('Terjadi kesalahan saat menambahkan data.');
            }
        });

    }

    function showNotification(message, type) {
        const notification = document.getElementById('notification');
        notification.innerHTML = `<div class="alert alert-${type}" role="alert">${message}</div>`;
        // Hapus notifikasi setelah beberapa detik (opsional)
        setTimeout(() => {
            notification.innerHTML = '';
        }, 5000); // Hapus notifikasi setelah 5 detik, sesuaikan waktu sesuai kebutuhan
    }


    resultForm.addEventListener('submit', function(event) {
        event.preventDefault();
    });

    scannedResultInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            // Ambil nilai hasil pemindaian
            const scannedCode = scannedResultInput.value;
            // Proses hasil pemindaian dengan Ajax
            processScanResult(scannedCode);
        }
    });




    startCamera();


    function renderTable(data) {
        const tableBody = $('#table-body');
        tableBody.empty(); // Hapus semua isi tabel

        // Tambahkan baris baru ke tabel dengan data terbaru
        data.forEach(function(item, index) {
            const row = $('<tr>');
            row.append('<td>' + (index + 1) + '</td>');
            row.append('<td>' + item.models + '</td>');
            row.append('<td>' + item.collor + '</td>');
            row.append('<td>' + item.jumlah + '</td>');
            tableBody.append(row);
        });
    }

    function updateTable() {
        // Ambil data dari controller Product menggunakan permintaan AJAX
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url("barang/get"); ?>',
            dataType: 'json',
            success: function(response) {
                // Panggil fungsi renderTable untuk menampilkan data dalam tabel
                renderTable(response);
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan saat mengambil data:', error);
            }
        });
    }

    // Atur interval pembaruan (misalnya, setiap 5 detik)
    setInterval(function() {
        updateTable();
    }, 1000); // Ganti angka "5000" dengan interval (dalam milidetik) sesuai kebutuhan Anda

    // Panggil fungsi updateTable saat halaman pertama kali dimuat
    $(document).ready(function() {
        updateTable();
    });
</script>