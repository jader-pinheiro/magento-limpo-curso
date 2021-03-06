<?php

/**
 *
 * Copyright © 2015 Zemez. All rights reserved.
 * See COPYING.txt for license details.
 *
 */
namespace Zemez\FeaturedProduct\Test\Unit\Model\Data\Provider;

class ProductModelTest extends \PHPUnit_Framework_TestCase
{

    protected $_objectManager;

    protected $_productModel;

    protected function setUp()
    {
        $this->_objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->_productModel = $this->_objectManager->getObject('Zemez\FeaturedProduct\Model\Data\Provider\ProductModel');
    }

    /**
     * @dataProvider modelByTypeDataProvider
     */
    public function testGetModelByType($type,$result)
    {
        $productModel = $this->_productModel->getModelByType($type);
        $this->assertEquals($productModel,$result);
    }

    /**
     * @dataProvider modelByTypeDataProviderExp
     */
    public function testExceptionGetModelByType($type,$exception,$message)
    {
        $this->setExpectedException($exception,$message);
        $this->_productModel->getModelByType($type);
    }

    public function modelByTypeDataProvider()
    {
        return [
            'Product Type new_product' => ['new_product','Zemez\FeaturedProduct\Model\NewProducts'],
            'Product Type sale_product' => ['sale_product', 'Zemez\FeaturedProduct\Model\SaleProducts'],
            'Product Type viewed_product' => ['viewed_product','Zemez\FeaturedProduct\Model\ViewedProducts'],
            'Product Type bestsellers_product' => ['bestsellers_product','Zemez\FeaturedProduct\Model\BestsellersProducts'],
            'Product Type rated_product' => ['rated_product' ,'Zemez\FeaturedProduct\Model\RatedProducts'],
            'Product Type manual_product' => ['manual_product','Zemez\FeaturedProduct\Model\ManualProducts']
        ];
    }

    public function modelByTypeDataProviderExp()
    {
        return [
            'Product Type new_product' => ['new_products','Exception','Model does not exist.'],
            'Product Type Null' => [null,'Exception','Model does not exist.'],
            'Product Type 0' =>[0,'Exception','Model does not exist.'],
            'Product Type " "' => ['','Exception','Model does not exist.'],
            'Product Type false' => [false,'Exception','Model does not exist.'],
            //'Product Type Array' => [[],'Exception','Model does not exist.'],
        ];
    }
}