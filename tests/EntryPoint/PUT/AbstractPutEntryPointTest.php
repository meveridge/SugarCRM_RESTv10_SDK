<?php
/**
 * ©[2016] SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.
 */

namespace SugarAPI\SDK\Tests\EntryPoint\PUT;

use SugarAPI\SDK\Tests\Stubs\EntryPoint\PutEntryPointStub;

/**
 * Class AbstractEntryPointTest
 * @package SugarAPI\SDK\Tests\EntryPoint
 * @coversDefaultClass SugarAPI\SDK\EntryPoint\Abstracts\PUT\AbstractPutEntryPoint
 * @group entrypoints
 */
class AbstractPutEntryPointTest extends \PHPUnit_Framework_TestCase {

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
     * @return PutEntryPointStub $Stub
     * @covers ::__construct
     * @group abstractEP
     */
    public function testConstructor(){
        $Stub = new PutEntryPointStub($this->url);
        $this->assertInstanceOf('SugarAPI\\SDK\\Request\\PUT',$Stub->getRequest());
        $this->assertEquals('http://localhost/rest/v10/$test',$Stub->getUrl());
        $this->assertEquals(array(),$Stub->getOptions());
        $this->assertEmpty($Stub->getData());
        $this->assertEmpty($Stub->getResponse());

        unset($Stub);
        $Stub = new PutEntryPointStub($this->url,$this->options);
        $this->assertInstanceOf('SugarAPI\\SDK\\Request\\PUT',$Stub->getRequest());
        $this->assertEquals($this->url.'foo',$Stub->getUrl());
        $this->assertEquals($this->options,$Stub->getOptions());
        $this->assertEmpty($Stub->getData());
        $this->assertEmpty($Stub->getResponse());

        return $Stub;
    }

    /**
     * @param PutEntryPointStub $Stub
     * @depends testConstructor
     * @covers ::execute
     * @group abstractEP
     */
    public function testExecute($Stub){
        $Stub->execute($this->data);
        $this->assertInstanceOf('SugarAPI\\SDK\\Response\\JSON',$Stub->getResponse());
    }

}