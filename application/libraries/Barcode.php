<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Picqer\Barcode\BarcodeGeneratorPNG;

class Barcode
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function generate($text)
    {
        $barcode = new BarcodeGeneratorPNG();
        header('Content-Type: image/png');
        echo $barcode->getBarcode($text, $barcode::TYPE_CODE_128);
        exit;
    }
}
