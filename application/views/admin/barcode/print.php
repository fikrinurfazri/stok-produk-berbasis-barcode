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

    <?php require 'vendor/autoload.php';

    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    $generate = new Picqer\Barcode\BarcodeGeneratorPNG();
    $code = $generator->getBarcode($barcode->barcode, $generator::TYPE_CODE_128); ?>
    <br>
    <table>

        <?php for ($i = 0; $i < 6; $i++) { ?>
            <tr>

                <td><?= '<img src="data:image/png;base64,' . base64_encode($generate->getBarcode($barcode->barcode, $generate::TYPE_CODE_128)) . '" style="width:150px; height: 50px;">'; ?></td>
            </tr>
            <hr>
        <?php } ?>


    </table>

</body>

</html>