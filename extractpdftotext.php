<?php
ini_set('max_execution_time', (1 * 60 * 60));
include 'pdf2text.php';
include 'class.pdf2text.php.php';
include 'PdfParser.php';
include 'pdf_parser.php';
include 'pdftotext.php';

$array_filename = glob('fileupload/*.pdf');

foreach($array_filename as $filename)
{
    $split_name = explode('/', $filename)[1];
    $nama_file = str_replace('.pdf', '', $split_name);
    $text = pdf2text($filename);
    $handle = fopen($nama_file.'.txt', 'w'); // open/create txt file

    //REGULER EXPRESION
    $text = preg_replace('/[^ ]{14}[^ ]*/', '', $text);
    $text = preg_replace('/[^a-zA-Z0-9\s]/', "", $text);
    $text = preg_replace('/\n[\s]*/',"\n",$text); // remove all leading blanks]
    $text = wordwrap($text,150);
   
    $text = str_replace("\n", "\n", $text);
    $text = preg_replace('/<br>..?.?\n/',"",$text);// remove lines with 1,2, or 3 characters

    fwrite($handle, $text); // write file
    unset($text);
    fclose($handle);        // close file
    unset($handle);
}
?>
