<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2017-2026
 */


namespace Aimeos\Controller\Frontend\Basket\Decorator;


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

		$this->stub = $this->createStub( \Aimeos\Controller\Frontend\Basket\Standard::class );

		$this->object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $this->stub, $this->context );
	}


	protected function tearDown() : void
	{
		unset( $this->context, $this->object, $this->stub );
	}


	public function testCall()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->onlyMethods( ['__call'] )
			->getMock();

		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( '__call' )->willReturn( true );

		$this->assertTrue( $object->invalid() );
	}


	public function testAdd()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'add' );
		$this->assertSame( $object, $object->add( [] ) );
	}


	public function testClear()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'clear' );
		$this->assertSame( $object, $object->clear() );
	}


	public function testGet()
	{
		$context = \TestHelper::context();
		$order = \Aimeos\MShop::create( $context, 'order' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'get' )->willReturn( $order );

		$this->assertInstanceOf( \Aimeos\MShop\Order\Item\Iface::class, $object->get() );
	}


	public function testSave()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'save' );
		$this->assertSame( $object, $object->save() );
	}


	public function testSetType()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'setType' );
		$this->assertSame( $object, $object->setType( 'test' ) );
	}


	public function testStore()
	{
		$basket = \Aimeos\MShop::create( $this->context, 'order' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'store' )->willReturn( $basket );

		$this->assertInstanceOf( \Aimeos\MShop\Order\Item\Iface::class, $object->store() );
	}


	public function testLoad()
	{
		$basket = \Aimeos\MShop::create( $this->context, 'order' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'load' )->willReturn( $basket );

		$this->assertInstanceOf( \Aimeos\MShop\Order\Item\Iface::class, $object->load( -1 ) );
	}


	public function testAddProduct()
	{
		$product = \Aimeos\MShop::create( $this->context, 'product' )->create();

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'addProduct' );

		$this->assertSame( $object, $object->addProduct( $product ) );
	}


	public function testDeleteProduct()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'deleteProduct' );

		$this->assertSame( $object, $object->deleteProduct( 0 ) );
	}


	public function testUpdateProduct()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'updateProduct' );

		$this->assertSame( $object, $object->updateProduct( 0, 1 ) );
	}


	public function testAddCoupon()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'addCoupon' );

		$this->assertSame( $object, $object->addCoupon( 'test' ) );
	}


	public function testDeleteCoupon()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'deleteCoupon' );

		$this->assertSame( $object, $object->deleteCoupon( 'test' ) );
	}


	public function testAddAddress()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'addAddress' );

		$this->assertSame( $object, $object->addAddress( 'payment', [] ) );
	}


	public function testDeleteAddress()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'deleteAddress' );

		$this->assertSame( $object, $object->deleteAddress( 'payment' ) );
	}


	public function testAddService()
	{
		$item = \Aimeos\MShop::create( $this->context, 'service' )->create()->setType( 'payment' );

		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'addService' );

		$this->assertSame( $object, $object->addService( $item ) );
	}


	public function testDeleteService()
	{
		$stub = $this->getMockBuilder( \Aimeos\Controller\Frontend\Basket\Standard::class )
			->disableOriginalConstructor()
			->getMock();
		$object = new \Aimeos\Controller\Frontend\Basket\Decorator\Example( $stub, $this->context );

		$stub->expects( $this->once() )->method( 'deleteService' );

		$this->assertSame( $object, $object->deleteService( 'payment' ) );
	}


	public function testGetController()
	{
		$result = $this->access( 'getController' )->invokeArgs( $this->object, [] );

		$this->assertSame( $this->stub, $result );
	}


	protected function access( $name )
	{
		$class = new \ReflectionClass( \Aimeos\Controller\Frontend\Basket\Decorator\Base::class );
		$method = $class->getMethod( $name );

		return $method;
	}
}
