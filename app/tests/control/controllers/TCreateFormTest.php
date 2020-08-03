<?php
/**
 * SysGen - System Generator with Formdin Framework
 * Download Formdin Framework: https://github.com/bjverde/formDin
 *
 * @author  Bjverde <bjverde@yahoo.com.br>
 * @license https://github.com/bjverde/sysgen/blob/master/LICENSE GPL-3.0
 * @link    https://github.com/bjverde/sysgen
 *
 * PHP Version 5.6
 */

$path = __DIR__.'/../../';
require_once $path.'mockDatabase.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Error\Warning;

class TCreateFormTest extends TestCase
{	

	private $create;	
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp(): void {
		parent::setUp ();
		$listColumnsProperties  = array();
		$listColumnsProperties['COLUMN_NAME'][] = 'idTest';
		$listColumnsProperties['COLUMN_NAME'][] = 'nm_test';
		$listColumnsProperties['COLUMN_NAME'][] = 'tip_test';
		$this->create = new TCreateForm('modulos','test',$listColumnsProperties);
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown(): void {
		parent::tearDown ();
		$this->create = null;
	}
	
	public function testConvertDataType2FormDinType_DATETIME(){
	    $expected = TCreateForm::FORMDIN_TYPE_DATE;
	    $result = TCreateForm::convertDataType2FormDinType('DATETIME');
	    $this->assertSame($expected, $result);
	}
	
	public function testConvertDataType2FormDinType_DATETIME2(){
	    $expected = TCreateForm::FORMDIN_TYPE_DATE;
	    $result = TCreateForm::convertDataType2FormDinType('DATETIME2');
	    $this->assertSame($expected, $result);
	}
	
	public function testConvertDataType2FormDinType_DATE(){
	    $expected = TCreateForm::FORMDIN_TYPE_DATE;
	    $result = TCreateForm::convertDataType2FormDinType('DATE');
	    $this->assertSame($expected, $result);
	}
	
	public function testConvertDataType2FormDinType_TIMESTAMP(){
	    $expected = TCreateForm::FORMDIN_TYPE_DATE;
	    $result = TCreateForm::convertDataType2FormDinType('TIMESTAMP');
	    $this->assertSame($expected, $result);
	}
	
	public function testConvertDataType2FormDinType_BIGINT(){
	    $expected = TCreateForm::FORMDIN_TYPE_NUMBER;
	    $result = TCreateForm::convertDataType2FormDinType('BIGINT');
	    $this->assertSame($expected, $result);
	}
	
	public function testConvertDataType2FormDinType_DECIMAL(){
	    $expected = TCreateForm::FORMDIN_TYPE_NUMBER;
	    $result = TCreateForm::convertDataType2FormDinType('DECIMAL');
	    $this->assertSame($expected, $result);
	}
	
	public function testConvertDataType2FormDinType_DOUBLE(){
	    $expected = TCreateForm::FORMDIN_TYPE_NUMBER;
	    $result = TCreateForm::convertDataType2FormDinType('DOUBLE');
	    $this->assertSame($expected, $result);
	}
	
	public function testConvertDataType2FormDinType_FLOAT(){
	    $expected = TCreateForm::FORMDIN_TYPE_NUMBER;
	    $result = TCreateForm::convertDataType2FormDinType('FLOAT');
	    $this->assertSame($expected, $result);
	}
	
	public function testConvertDataType2FormDinType_INT(){
	    $expected = TCreateForm::FORMDIN_TYPE_NUMBER;
	    $result = TCreateForm::convertDataType2FormDinType('INT');
	    $this->assertSame($expected, $result);
	}
	
	public function testConvertDataType2FormDinType_INT64(){
	    $expected = TCreateForm::FORMDIN_TYPE_NUMBER;
	    $result = TCreateForm::convertDataType2FormDinType('INT64');
	    $this->assertSame($expected, $result);
	}
	
	public function testConvertDataType2FormDinType_INTEGER(){
	    $expected = TCreateForm::FORMDIN_TYPE_NUMBER;
	    $result = TCreateForm::convertDataType2FormDinType('INTEGER');
	    $this->assertSame($expected, $result);
	}
	
	public function testConvertDataType2FormDinType_NUMERIC(){
	    $expected = TCreateForm::FORMDIN_TYPE_NUMBER;
	    $result = TCreateForm::convertDataType2FormDinType('NUMERIC');
	    $this->assertSame($expected, $result);
	}
	
	public function testConvertDataType2FormDinType_NUMBER(){
	    $expected = TCreateForm::FORMDIN_TYPE_NUMBER;
	    $result = TCreateForm::convertDataType2FormDinType('NUMBER');
	    $this->assertSame($expected, $result);
	}
	
	public function testConvertDataType2FormDinType_REAL(){
	    $expected = TCreateForm::FORMDIN_TYPE_NUMBER;
	    $result = TCreateForm::convertDataType2FormDinType('REAL');
	    $this->assertSame($expected, $result);
	}
	
	public function testConvertDataType2FormDinType_SMALLINT(){
	    $expected = TCreateForm::FORMDIN_TYPE_NUMBER;
	    $result = TCreateForm::convertDataType2FormDinType('SMALLINT');
	    $this->assertSame($expected, $result);
	}
	
	public function testConvertDataType2FormDinType_TINYINT(){
	    $expected = TCreateForm::FORMDIN_TYPE_NUMBER;
	    $result = TCreateForm::convertDataType2FormDinType('TINYINT');
	    $this->assertSame($expected, $result);
	}
	
	public function testAddButtons(){
		$qtdTab = ESP.ESP.ESP;
	    $expected = array();
	    $expected[] = $qtdTab.'// O Adianti permite a Internacionalização - A função _t(\'string\') serve'.EOL;
	    $expected[] = $qtdTab.'//para traduzir termos no sistema. Veja ApplicationTranslator escrevendo'.EOL;
		$expected[] = $qtdTab.'//primeiro em ingles e depois traduzindo'.EOL;
		$expected[] = $qtdTab.'$frm->setAction( _t(\'Save\'), \'onSave\', null, \'fa:save\', \'green\' );'.EOL;
		$expected[] = $qtdTab.'$frm->setActionLink( _t(\'Clear\'), \'onClear\', null, \'fa:eraser\', \'red\');'.EOL;
	
	    $this->create->addButtons($qtdTab);
	    $result = $this->create->getLinesArray();
	    
	    $this->assertSame($expected[0], $result[0]);
	    $this->assertSame($expected[1], $result[1]);
		$this->assertSame($expected[2], $result[2]);
		$this->assertSame($expected[3], $result[3]);
		$this->assertSame($expected[4], $result[4]);
	}
	
	public function testShow_GridSimple_numlines(){
	    $expectedQtd = 23;
	    
	    $this->create->setGridType(FormDinHelper::GRID_SIMPLE);
	    $this->create->setTableType(TableInfo::TB_TYPE_TABLE);
	    $this->create->addGrid();
	    $result = $this->create->getLinesArray();
	    
	    $size = CountHelper::count($result);
	    $this->assertEquals( $expectedQtd, $size);
	}
	
	public function testAddGrid_GridSimple(){
	    $expected = array();
	    $expected[] = EOL;
	    $expected[] = '$controller = new Test();'.EOL;
	    $expected[] = '$dados = $controller->selectAll($primaryKey,$whereGrid);'.EOL;
	    $expected[] = '$mixUpdateFields = $primaryKey.\'|\'.$primaryKey'.EOL;
	    $expected[] = '                .\',NM_TEST|NM_TEST\''.EOL;
	    $expected[] = '                .\',TIP_TEST|TIP_TEST\''.EOL;
	    $expected[] = '                ;'.EOL;
	    
	    $this->create->setGridType(FormDinHelper::GRID_SIMPLE);
	    $this->create->setTableType(TableInfo::TB_TYPE_TABLE);
	    $this->create->addGrid();
	    $result = $this->create->getLinesArray();
	    
	    $this->assertSame($expected[0], $result[0]);
	    $this->assertSame($expected[1], $result[1]);
	    $this->assertSame($expected[2], $result[2]);
	    $this->assertSame($expected[3], $result[3]);
	    $this->assertSame($expected[4], $result[4]);
	    $this->assertSame($expected[5], $result[5]);
	}
	
	
	public function testShow_GridSqlPaginator_numlines(){
	    $expectedQtd = 65;
	    
	    $this->create->setGridType(FormDinHelper::GRID_SQL_PAGINATION);
	    $this->create->setTableType(TableInfo::TB_TYPE_TABLE);
	    $this->create->addGrid();
	    $result = $this->create->getLinesArray();
	    
	    $size = CountHelper::count($result);
	    $this->assertEquals( $expectedQtd, $size);
	}	
	
	public function testShow_GridScreenPaginator_numlines(){
	    $expectedQtd = 63;
	    
	    $this->create->setGridType(FormDinHelper::GRID_SCREEN_PAGINATION);
	    $this->create->setTableType(TableInfo::TB_TYPE_TABLE);
	    $this->create->addGrid();
	    $result = $this->create->getLinesArray();
	    
	    $size = CountHelper::count($result);
	    $this->assertEquals( $expectedQtd, $size);
	}
	
	public function testShow_numLines(){
	    $expectedQtd = 52;
	    
	    $this->create->setTableType(TableInfo::TB_TYPE_VIEW);
	    $resultArray = $this->create->show('array');
	    $size = CountHelper::count($resultArray);
	    $this->assertEquals( $expectedQtd, $size);
	}
	
	public function testShow(){
	    $expected = array();
	    $expected[12] = 'class testForm extends TPage'.EOL;
	    
	    $resultArray = $this->create->show('array');
	    $this->assertSame($expected[12], $resultArray[12]);
	}
}