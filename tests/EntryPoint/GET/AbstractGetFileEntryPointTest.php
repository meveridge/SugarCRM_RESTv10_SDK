<?php

namespace SugarAPI\SDK\Tests\EntryPoint\GET;

use SugarAPI\SDK\Tests\Stubs\EntryPoint\GetFileEntryPointStub;

/**
 * Class AbstractEntryPointTest
 * @package SugarAPI\SDK\Tests\EntryPoint
 * @coversDefaultClass SugarAPI\SDK\EntryPoint\Abstracts\GET\AbstractGetFileEntryPoint
 * @group entrypoints
 */
class AbstractGetFileEntryPointTest extends \PHPUnit_Framework_TestCase {

    public static function setUpBeforeClass()
    {
    }

    public static function tearDownAfterClass()
    {
    }

    protected $url = 'http://localhost/rest/v10/';
    protected $options = array('foo');
    protected $data = array(
        'foo' => 'bar'
    );

    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @return GetFileEntryPointStub $Stub
     * @covers ::__construct
     * @group abstractEP
     */
    public function testConstructor(){
        $Stub = new GetFileEntryPointStub($this->url);
        $this->assertInstanceOf('SugarAPI\\SDK\\Request\\GETFile',$Stub->getRequest());
        $this->assertEquals('http://localhost/rest/v10/$test',$Stub->getUrl());
        $this->assertEquals(array(),$Stub->getOptions());
        $this->assertEmpty($Stub->getData());
        $this->assertEmpty($Stub->getResponse());

        unset($Stub);
        $Stub = new GetFileEntryPointStub($this->url,$this->options);
        $this->assertInstanceOf('SugarAPI\\SDK\\Request\\GET',$Stub->getRequest());
        $this->assertEquals($this->url.'foo',$Stub->getUrl());
        $this->assertEquals($this->options,$Stub->getOptions());
        $this->assertEmpty($Stub->getData());
        $this->assertEmpty($Stub->getResponse());

        unset($Delete);
        return $Stub;
    }

    /**
     * @param GetFileEntryPointStub $Stub
     * @depends testConstructor
     * @covers ::downloadTo
     * @covers ::getDownloadDir
     * @covers ::execute
     * @group abstractEP
     */
    public function testExecute($Stub){
        $Stub->downloadTo(__DIR__);
        $this->assertEquals(__DIR__,$Stub->getDownloadDir());
        $Stub->execute($this->data);
        $this->assertInstanceOf('SugarAPI\\SDK\\Response\\File',$Stub->getResponse());
    }

}
