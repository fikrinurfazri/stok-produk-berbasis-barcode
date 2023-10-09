<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <style type="text/css">
        p {
            margin: 5px 0 0 0;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            /* border-top: 1px solid #D0D0D0; */
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
            display: block;
        }

        .bold {
            font-weight: bold;
        }

        #footer {
            clear: both;
            position: relative;
            height: 40px;
            margin-top: -40px;
        }
    </style>
</head>

<body style="font-size: 11px">
    <!-- <p style="text-align: right;">
        KODE : <?= $barcode->barcode ?>
    </p>
    <p>Model : <?= $barcode->models ?></p>
    <p>Warna : <?= $barcode->collor ?></p> -->


    <br>
    <table>
        <hr>
        <tr>
            <td> <img src="<?php echo site_url('Barcode/QRcode/' . $barcode->barcode); ?>" alt=""></td>
        </tr>
        <hr>

        <tr>
            <td> <img src="<?php echo site_url('Barcode/QRcode/' . $barcode->barcode); ?>" alt="">
        </tr>
        <hr>
        <tr>
            <td> <img src="<?php echo site_url('Barcode/QRcode/' . $barcode->barcode); ?>" alt="">
        </tr>
        <hr>

        <tr>
            <td> <img src="<?php echo site_url('Barcode/QRcode/' . $barcode->barcode); ?>" alt="">
        </tr>
        <hr>
        <tr>
            <td> <img src="<?php echo site_url('Barcode/QRcode/' . $barcode->barcode); ?>" alt="">
        </tr>
        <hr>

        <tr>
            <td> <img src="<?php echo site_url('Barcode/QRcode/' . $barcode->barcode); ?>" alt="">
        </tr>
        <hr>
        <tr>
            <td> <img src="<?php echo site_url('Barcode/QRcode/' . $barcode->barcode); ?>" alt="">
        </tr>
        <hr>
        <tr>
            <td> <img src="<?php echo site_url('Barcode/QRcode/' . $barcode->barcode); ?>" alt="">
        </tr>
        <hr>
        <tr>
            <td> <img src="<?php echo site_url('Barcode/QRcode/' . $barcode->barcode); ?>" alt="">
        </tr>


    </table>

</body>

</html>