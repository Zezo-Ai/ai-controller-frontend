<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2016-2018
 * @package Controller
 * @subpackage Frontend
 */


namespace Aimeos\Controller\Frontend\Basket\Decorator;


/**
 * Base for basket frontend controller decorators
 *
 * @package Controller
 * @subpackage Frontend
 */
abstract class Base
	extends \Aimeos\Controller\Frontend\Basket\Base
	implements \Aimeos\Controller\Frontend\Common\Decorator\Iface, \Aimeos\Controller\Frontend\Basket\Iface
{
	private $controller;


	/**
	 * Initializes the controller decorator.
	 *
	 * @param \Aimeos\Controller\Frontend\Iface $controller Controller object
	 * @param \Aimeos\MShop\Context\Item\Iface $context Context object with required objects
	 */
	public function __construct( \Aimeos\Controller\Frontend\Iface $controller, \Aimeos\MShop\Context\Item\Iface $context )
	{
		parent::__construct( $context );

		$iface = \Aimeos\Controller\Frontend\Basket\Iface::class;
		$this->controller = \Aimeos\MW\Common\Base::checkClass( $iface, $controller );
	}


	/**
	 * Passes unknown methods to wrapped objects.
	 *
	 * @param string $name Name of the method
	 * @param array $param List of method parameter
	 * @return mixed Returns the value of the called method
	 * @throws \Aimeos\Controller\Frontend\Exception If method call failed
	 */
	public function __call( $name, array $param )
	{
		return @call_user_func_array( array( $this->controller, $name ), $param );
	}


	/**
	 * Adds values like comments to the basket
	 *
	 * @param array $values Order base values like comment
	 * @return \Aimeos\Controller\Frontend\Basket\Iface Basket frontend object for fluent interface
	 */
	public function add( array $values )
	{
		$this->controller->add( $values );
		return $this;
	}


	/**
	 * Empties the basket and removing all products, addresses, services, etc.
	 *
	 * @return \Aimeos\Controller\Frontend\Basket\Iface Basket frontend object for fluent interface
	 */
	public function clear()
	{
		$this->controller->clear();
		return $this;
	}


	/**
	 * Returns the basket object.
	 *
	 * @return \Aimeos\MShop\Order\Item\Base\Iface Basket holding products, addresses and delivery/payment options
	 */
	public function get()
	{
		return $this->controller->get();
	}


	/**
	 * Explicitely persists the basket content
	 *
	 * @return \Aimeos\Controller\Frontend\Basket\Iface Basket frontend object for fluent interface
	 */
	public function save()
	{
		$this->controller->save();
		return $this;
	}


	/**
	 * Sets the new basket type
	 *
	 * @param string $type Basket type
	 * @return \Aimeos\Controller\Frontend\Basket\Iface Basket frontend object for fluent interface
	 */
	public function setType( $type )
	{
		$this->controller->setType( $type );
		return $this;
	}


	/**
	 * Creates a new order base object from the current basket
	 *
	 * @return \Aimeos\MShop\Order\Item\Base\Iface Order base object including products, addresses and services
	 */
	public function store()
	{
		return $this->controller->store();
	}


	/**
	 * Returns the order base object for the given ID
	 *
	 * @param string $id Unique ID of the order base object
	 * @param integer $parts Constants which parts of the order base object should be loaded
	 * @param boolean $default True to add default criteria (user logged in), false if not
	 * @return \Aimeos\MShop\Order\Item\Base\Iface Order base object including the given parts
	 */
	public function load( $id, $parts = \Aimeos\MShop\Order\Item\Base\Base::PARTS_ALL, $default = true )
	{
		return $this->controller->load( $id, $parts, $default );
	}


	/**
	 * Adds a product to the basket of the customer stored in the session
	 *
	 * @param \Aimeos\MShop\Product\Item\Iface $product Product to add including texts, media, prices, attributes, etc.
	 * @param integer $quantity Amount of products that should by added
	 * @param array $variant List of variant-building attribute IDs that identify an article in a selection product
	 * @param array $config List of configurable attribute IDs the customer has chosen from
	 * @param array $custom Associative list of attribute IDs as keys and arbitrary values that will be added to the ordered product
	 * @param string $stocktype Unique code of the stock type to deliver the products from
	 * @param string|null $supplier Unique supplier code the product is from
	 * @return \Aimeos\Controller\Frontend\Basket\Iface Basket frontend object for fluent interface
	 * @throws \Aimeos\Controller\Frontend\Basket\Exception If the product isn't available
	 */
	public function addProduct( \Aimeos\MShop\Product\Item\Iface $product, $quantity = 1,
		array $variant = [], array $config = [], array $custom = [], $stocktype = 'default', $supplier = null )
	{
		$this->controller->addProduct( $product, $quantity, $variant, $config, $custom, $stocktype, $supplier );
		return $this;
	}


	/**
	 * Deletes a product item from the basket.
	 *
	 * @param integer $position Position number (key) of the order product item
	 * @return \Aimeos\Controller\Frontend\Basket\Iface Basket frontend object for fluent interface
	 */
	public function deleteProduct( $position )
	{
		$this->controller->deleteProduct( $position );
		return $this;
	}


	/**
	 * Edits the quantity of a product item in the basket.
	 *
	 * @param integer $position Position number (key) of the order product item
	 * @param integer $quantity New quantiy of the product item
	 * @return \Aimeos\Controller\Frontend\Basket\Iface Basket frontend object for fluent interface
	 */
	public function updateProduct( $position, $quantity )
	{
		$this->controller->updateProduct( $position, $quantity );
		return $this;
	}


	/**
	 * Adds the given coupon code and updates the basket.
	 *
	 * @param string $code Coupon code entered by the user
	 * @return \Aimeos\Controller\Frontend\Basket\Iface Basket frontend object for fluent interface
	 * @throws \Aimeos\Controller\Frontend\Basket\Exception if the coupon code is invalid or not allowed
	 */
	public function addCoupon( $code )
	{
		$this->controller->addCoupon( $code );
		return $this;
	}


	/**
	 * Removes the given coupon code and its effects from the basket.
	 *
	 * @param string $code Coupon code entered by the user
	 * @return \Aimeos\Controller\Frontend\Basket\Iface Basket frontend object for fluent interface
	 * @throws \Aimeos\Controller\Frontend\Basket\Exception if the coupon code is invalid
	 */
	public function deleteCoupon( $code )
	{
		$this->controller->deleteCoupon( $code );
		return $this;
	}


	/**
	 * Adds the delivery/payment service item based on the service ID.
	 *
	 * @param string $type Address type constant from \Aimeos\MShop\Order\Item\Base\Address\Base
	 * @param \Aimeos\MShop\Common\Item\Address\Iface|array|null $value Address object or array with key/value pairs of address or null to remove address from basket
	 * @return \Aimeos\Controller\Frontend\Basket\Iface Basket frontend object for fluent interface
	 * @throws \Aimeos\Controller\Frontend\Basket\Exception If the billing or delivery address is not of any required type of
	 * 	if one of the keys is invalid when using an array with key/value pairs
	 */
	public function setAddress( $type, $value )
	{
		$this->controller->setAddress( $type, $value );
		return $this;
	}


	/**
	 * Sets the delivery/payment service item based on the service ID.
	 *
	 * @param string $type Service type code like 'payment' or 'delivery'
	 * @param string $id Unique ID of the service item
	 * @param array $attributes Associative list of key/value pairs containing the attributes selected or
	 * 	entered by the customer when choosing one of the delivery or payment options
	 * @return \Aimeos\Controller\Frontend\Basket\Iface Basket frontend object for fluent interface
	 * @throws \Aimeos\Controller\Frontend\Basket\Exception If there is no price to the service item attached
	 */
	public function addService( $type, $id, array $attributes = [] )
	{
		$this->controller->addService( $type, $id, $attributes );
		return $this;
	}


	/**
	 * Removes the delivery or payment service items from the basket
	 *
	 * @param string $type Service type code like 'payment' or 'delivery'
	 * @return \Aimeos\Controller\Frontend\Basket\Iface Basket frontend object for fluent interface
	 */
	public function deleteService( $type )
	{
		$this->controller->deleteService( $type );
		return $this;
	}


	/**
	 * Returns the frontend controller
	 *
	 * @return \Aimeos\Controller\Frontend\Basket\Iface Frontend controller object
	 */
	protected function getController()
	{
		return $this->controller;
	}
}
