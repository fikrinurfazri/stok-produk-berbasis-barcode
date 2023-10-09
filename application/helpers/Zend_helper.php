// Zend_helper.php
<?php
class Zend_helper
{
    private $zendLoaded = false;

    public function __construct()
    {
        $this->loadZend();
    }

    public function loadZend()
    {
        if (!$this->zendLoaded) {
            require_once(APPPATH . 'libraries/Zend/Loader/Autoloader.php');
            Zend_Loader_Autoloader::getInstance();
            $this->zendLoaded = true;
        }
    }

    public function generateBarcode($text)
    {
        $this->loadZend(); // Memuat library Zend jika belum dimuat

        $barcodeOptions = array(
            'text' => $text,
            'barThickWidth' => 3,
            'barThinWidth' => 1
        );

        $barcodeImage = Zend_Barcode::draw('code128', 'image', $barcodeOptions);

        return $barcodeImage;
    }
}
