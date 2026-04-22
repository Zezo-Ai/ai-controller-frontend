<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2021-2026
 */


namespace Aimeos\Controller\Frontend\Site\Decorator;


class Example extends Base
{
}


class BaseTest extends \PHPUnit\Framework\TestCase
{
	private $context;
	private $object;
	private $stub;


	protected function setUp() : void
	{
		$this->context = \TestHelper::context();

		$this->stub = $this->createStub( \Aimeos\Controller\Frontend\Site\Standard::class );

		$this->object = new \Aimeos\Controller\Frontend\Site\Decorator\Example( $this->stub, $this->context );
	}


	protected function tearDown() : void
	{
		unset( $this->context, $this->object, $this->stub );
	}


	public function testCall()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Site\Standard::class )
			->disableOriginalConstructor()
			->onlyMethods( ['__call'] )
			->getMock();

		$object = new \Aimeos\Controller\Frontend\Site\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( '__call' )->willReturn( true );

		$this->assertTrue( $object->invalid() );
	}


	public function testCompare()
	{
		$this->assertSame( $this->object, $this->object->compare( '==', 'locale.site.code', 'test' ) );
	}


	public function testFind()
	{
		$item = \Aimeos\MShop::create( $this->context, 'locale/site' )->create();
		$expected = \Aimeos\MShop\Locale\Item\Site\Iface::class;

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Site\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Site\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'find' )
			->willReturn( $item );

		$this->assertInstanceOf( $expected, $object->find( 'test', ['text'] ) );
	}


	public function testGet()
	{
		$item = \Aimeos\MShop::create( $this->context, 'locale/site' )->create();
		$expected = \Aimeos\MShop\Locale\Item\Site\Iface::class;

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Site\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Site\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'get' )
			->willReturn( $item );

		$this->assertInstanceOf( $expected, $object->get( 1, ['text'] ) );
	}


	public function testParse()
	{
		$this->assertSame( $this->object, $this->object->parse( [] ) );
	}


	public function testGetPath()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Site\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Site\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'getPath' )
			->willReturn( [] );

		$this->assertEquals( [], $object->getPath( -1 ) );
	}


	public function testGetTree()
	{
		$catItem = \Aimeos\MShop::create( $this->context, 'locale/site' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Site\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Site\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'getTree' )
			->willReturn( $catItem );

		$this->assertInstanceOf( \Aimeos\MShop\Locale\Item\Site\Iface::class, $object->getTree() );
	}


	public function testRoot()
	{
		$this->assertSame( $this->object, $this->object->root( -1 ) );
	}


	public function testSearch()
	{
		$total = 0;
		$item = \Aimeos\MShop::create( $this->context, 'locale/site' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Site\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Site\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'search' )
			->willReturn( map( [$item] ) );

		$this->assertEquals( [$item], $object->search( $total )->toArray() );
	}


	public function testSlice()
	{
		$this->assertSame( $this->object, $this->object->slice( 0, 1 ) );
	}


	public function testSort()
	{
		$this->assertSame( $this->object, $this->object->sort( 'locale.site.label' ) );
	}


	public function testGetController()
	{
		$result = $this->access( 'getController' )->invokeArgs( $this->object, [] );

		$this->assertSame( $this->stub, $result );
	}


	protected function access( $name )
	{
		$class = new \ReflectionClass( \Aimeos\Controller\Frontend\Site\Decorator\Base::class );
		$method = $class->getMethod( $name );

		return $method;
	}
}
