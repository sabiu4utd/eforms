<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use Smalot\PdfParser\PDFObject;
use Smalot\PdfParser\Document;
use Smalot\PdfParser\Element;
use Smalot\PdfParser\Encoding;
use Smalot\PdfParser\Font;
use Smalot\PdfParser\Header;
use Smalot\PdfParser\Page;
use Smalot\PdfParser\Pages;
use Smalot\PdfParser\Parser;

use setasign\fpdi\src\FpdfTpl;
use setasign\Fpdi\Fpdi;



class PDFParser_Lib  {

	public function __construct(){
		log_message('Debug', 'PDFParser loaded successfully');
	}

	public function initializeParser(){
		require_once APPPATH.'third_party/Smalot/PdfParser/Parser.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/Document.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/Header.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/Element.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/PDFObject.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/Encoding.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/Font.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/Page.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/Pages.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/Encoding/PostScriptGlyphs.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/Element/ElementBoolean.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/Element/ElementName.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/Element/ElementXRef.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/Element/ElementArray.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/Element/ElementNumeric.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/Element/ElementMissing.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/Element/ElementString.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/Element/ElementDate.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/XObject/Form.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/XObject/Image.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/RawData/RawDataParser.php';
		require_once APPPATH.'third_party/Smalot/PdfParser/RawData/FilterHelper.php';

		return new Parser();
	}

	public function initializeSplitter(){
		require_once( APPPATH.'third_party/setasign/fpdi/src/autoload.php');
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/CrossReference/CrossReference.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/CrossReference/ReaderInterface.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/CrossReference/AbstractReader.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/CrossReference/FixedReader.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/Type/PdfType.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/Type/PdfBoolean.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/Type/PdfString.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/Type/PdfNull.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/Type/PdfHexString.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/Type/PdfStream.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/Type/PdfArray.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/Type/PdfIndirectObject.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/Type/PdfIndirectObjectReference.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/Type/PdfName.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/Type/PdfDictionary.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/Type/PdfToken.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/Type/PdfNumeric.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/Filter/FilterInterface.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/Filter/Flate.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/Tokenizer.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/PdfParser.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfParser/StreamReader.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfReader/DataStructure/Rectangle.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfReader/Page.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfReader/PdfReader.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/PdfReader/PageBoundaries.php';
		require_once APPPATH.'third_party/setasign/fpdf/fpdf.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/FpdfTplTrait.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/FpdiTrait.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/FpdfTpl.php';
		require_once APPPATH.'third_party/setasign/fpdi/src/Fpdi.php';
	
		return new FPDI();
	}

	public function getFPDI(){
		return $this->initializeSplitter();
	}
}
