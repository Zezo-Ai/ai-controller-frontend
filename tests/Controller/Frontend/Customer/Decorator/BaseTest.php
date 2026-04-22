<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2017-2026
 */


namespace Aimeos\Controller\Frontend\Customer\Decorator;


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

		$this->stub = $this->createStub( \Aimeos\Controller\Frontend\Customer\Standard::class );

		$this->object = new \Aimeos\Controller\Frontend\Customer\Decorator\Example( $this->stub, $this->context );
	}


	protected function tearDown() : void
	{
		unset( $this->context, $this->object, $this->stub );
	}


	public function testCall()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Customer\Standard::class )
			->disableOriginalConstructor()
			->onlyMethods( ['__call'] )
			->getMock();

		$object = new \Aimeos\Controller\Frontend\Customer\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( '__call' )->willReturn( true );

		$this->assertTrue( $object->invalid() );
	}


	public function testAdd()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Customer\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Customer\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'add' );
		$this->assertSame( $object, $object->add( [] ) );
	}


	public function testAddAddressItem()
	{
		$item = \Aimeos\MShop::create( $this->context, 'customer/address' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Customer\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Customer\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'addAddressItem' );
		$this->assertSame( $object, $object->addAddressItem( $item ) );
	}


	public function testAddListItem()
	{
		$listItem = \Aimeos\MShop::create( $this->context, 'customer/lists' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Customer\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Customer\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'addListItem' );
		$this->assertSame( $object, $object->addListItem( 'customer', $listItem ) );
	}


	public function testAddPropertyItem()
	{
		$item = \Aimeos\MShop::create( $this->context, 'customer/property' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Customer\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Customer\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'addPropertyItem' );
		$this->assertSame( $object, $object->addPropertyItem( $item ) );
	}


	public function testCreateAddressItem()
	{
		$item = \Aimeos\MShop::create( $this->context, 'customer/address' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Customer\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Customer\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'createAddressItem' )->willReturn( $item );
		$this->assertInstanceOf( \Aimeos\MShop\Common\Item\Address\Iface::class, $object->createAddressItem() );
	}


	public function testCreateListItem()
	{
		$item = \Aimeos\MShop::create( $this->context, 'customer/lists' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Customer\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Customer\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'createListItem' )->willReturn( $item );
		$this->assertInstanceOf( \Aimeos\MShop\Common\Item\Lists\Iface::class, $object->createListItem() );
	}


	public function testCreatePropertyItem()
	{
		$item = \Aimeos\MShop::create( $this->context, 'customer/property' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Customer\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Customer\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'createPropertyItem' )->willReturn( $item );
		$this->assertInstanceOf( \Aimeos\MShop\Common\Item\Property\Iface::class, $object->createPropertyItem() );
	}


	public function testDeleteItem()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Customer\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Customer\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'delete' );
		$this->assertSame( $object, $object->delete() );
	}


	public function testDeleteAddressItem()
	{
		$item = \Aimeos\MShop::create( $this->context, 'customer/address' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Customer\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Customer\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'deleteAddressItem' );
		$this->assertSame( $object, $object->deleteAddressItem( $item ) );
	}


	public function testDeleteListItem()
	{
		$listItem = \Aimeos\MShop::create( $this->context, 'customer/lists' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Customer\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Customer\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'deleteListItem' );
		$this->assertSame( $object, $object->deleteListItem( 'customer', $listItem ) );
	}


	public function testDeletePropertyItem()
	{
		$item = \Aimeos\MShop::create( $this->context, 'customer/property' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Customer\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Customer\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'deletePropertyItem' );
		$this->assertSame( $object, $object->deletePropertyItem( $item ) );
	}


	public function testFind()
	{
		$item = \Aimeos\MShop::create( $this->context, 'customer' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Customer\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Customer\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'find' )
			->willReturn( $item );

		$this->assertInstanceOf( \Aimeos\MShop\Customer\Item\Iface::class, $object->find( 'test' ) );
	}


	public function testGet()
	{
		$item = \Aimeos\MShop::create( $this->context, 'customer' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Customer\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Customer\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'get' )
			->willReturn( $item );

		$this->assertInstanceOf( \Aimeos\MShop\Customer\Item\Iface::class, $object->get() );
	}


	public function testStore()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Customer\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Customer\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'store' );
		$this->assertSame( $object, $object->store() );
	}


	public function testUses()
	{
		$this->assertSame( $this->object, $this->object->uses( ['text'] ) );
	}


	public function testGetController()
	{
		$this->assertSame( $this->stub, $this->access( 'getController' )->invokeArgs( $this->object, [] ) );
	}


	protected function access( $name )
	{
		$class = new \ReflectionClass( \Aimeos\Controller\Frontend\Customer\Decorator\Base::class );
		$method = $class->getMethod( $name );

		return $method;
	}
}
