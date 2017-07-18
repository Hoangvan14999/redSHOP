<?php
/**
 * @package     RedShop
 * @subpackage  Cest
 * @copyright   Copyright (C) 2008 - 2015 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * Class ManageProductsCheckoutFrontEndCest
 *
 * @package  AcceptanceTester
 *
 * @link     http://codeception.com/docs/07-AdvancedUsage
 *
 * @since    1.4
 */
class ManageProductsCheckoutFrontEndCest
{
	/**
	 * Test to Verify the Payment Plugin
	 *
	 * @param   AcceptanceTester  $I         Actor Class Object
	 * @param   String            $scenario  Scenario Variable
	 *
	 * @return void
	 */
    public function __construct()
    {
        $this->categoryName = 'TestingCategory';
        $this->ramdoCategoryNameAssign = 'CategoryAssign' . rand(99, 999);
        $this->productName = 'Testing Products' . rand(99, 999);
        $this->minimumPerProduct = 2;
        $this->minimumQuantity = 3;
        $this->maximumQuantity = 5;
        $this->discountStart = "12-12-2016";
        $this->discountEnd = "23-05-2017";
        $this->randomProductNumber = rand(999, 9999);
        $this->randomProductNumberNew = rand(999, 9999);
        $this->randomProductAttributeNumber = rand(999, 9999);
        $this->randomProductNameAttribute = 'Testing Attribute' . rand(99, 999);
        $this->randomProductPrice = rand(99, 199);
        $this->discountPriceThanPrice =100;
        $this->statusProducts = 'Product on sale';
        $this->searchCategory = 'Category';
        $this->newProductName = 'New-Test Product' . rand(99, 999);
        $this->nameAttribute = 'Size';
        $this->valueAttribute = "Z";
        $this->priceAttribute = 12;
        $this->nameProductAccessories = "redFORM";
        $this->nameRelatedProduct = "redITEM";
        $this->quantityStock = 4;
        $this->PreorderStock = 2;
        $this->priceProductForThan=10;

    }


    public function testProductAdministrator(AcceptanceTester $I, $scenario)
    {
        $I->wantTo('Create Category in Administrator');
        $I->doAdministratorLogin();
        $I = new AcceptanceTester\CategoryManagerJoomla3Steps($scenario);
        $I->wantTo('Create a Category');
        $I->addCategorySave($this->categoryName);
    }
    public function createProductSave(AcceptanceTester $I, $scenario)
    {
        $I->wantTo('Test Product Save Manager in Administrator');
        $I->doAdministratorLogin();
        $I = new AcceptanceTester\ProductManagerJoomla3Steps($scenario);
        $I->wantTo('I Want to add product inside the category');
        $I->createProductSave($this->productName, $this->categoryName, $this->randomProductNumber, $this->randomProductPrice, $this->minimumPerProduct, $this->minimumQuantity, $this->maximumQuantity, $this->discountStart, $this->discountEnd);
    }


    public function testProductsCheckoutFrontEnd(AcceptanceTester $I, $scenario)
	{
		$I = new AcceptanceTester($scenario);
		$I->wantTo('Test Product Checkout on Front End with Bank Transfer');
		$customerInformation = array(
			"email" => "test@test" . rand() . ".com",
			"firstName" => "Tester",
			"lastName" => "User",
			"address" => "Some Place in the World",
			"postalCode" => "23456",
			"city" => "Bangalore",
			"country" => "India",
			"state" => "Karnataka",
			"phone" => "8787878787"
		);

		/*$randomNumber = rand(10, 1000);

		if (($randomNumber % 2) == 1)
		{
			$productRandomizer = rand(10, 1000);

			if (($productRandomizer % 2) == 1)
			{
				$productName = 'redSLIDER';
			}
			else
			{
				$productName = 'redCOOKIE';
			}

			$categoryName = 'Events and Forms';

		}
		else
		{
			$productRandomizer = rand(10, 1000);

			if (($productRandomizer % 2) == 1)
			{
				$productName = 'redSHOP';
			}
			else
			{
				$productName = 'redITEM';
			}

			$categoryName = 'CCK and e-Commerce';

		}*/


		$this->checkOutProductWithBankTransfer($I, $scenario, $customerInformation, $customerInformation, $this->productName, $this->categoryName);
	}

	/**
	 * Function to Checkout a Product with Bank Transfer
	 *
	 * @param   AcceptanceTester  $I               Actor Class Object
	 * @param   String            $scenario        Scenario Variable
	 * @param   Array             $addressDetail   Address Detail Array
	 * @param   Array             $shipmentDetail  Shipment Detail Array
	 * @param   string            $productName     Name of the Product which we are going to Checkout
	 * @param   string            $categoryName    Name of the Product Category
	 *
	 * @return void
	 */
	private function checkOutProductWithBankTransfer(AcceptanceTester $I, $scenario, $addressDetail, $shipmentDetail, $productName, $categoryName )
	{
        $I->amOnPage(\FrontEndProductManagerJoomla3Page::$URL);
        $I->waitForElement(\FrontEndProductManagerJoomla3Page::$categoryDiv,30);
        $I->checkForPhpNoticesOrWarnings();
        $productFrontEndManagerPage = new \FrontEndProductManagerJoomla3Page;
        $I->click($productFrontEndManagerPage->productCategory($categoryName));
        $I->waitForElement(\FrontEndProductManagerJoomla3Page::$productList,30);
        $I->click($productFrontEndManagerPage->product($productName));
        $I->click(\FrontEndProductManagerJoomla3Page::$addToCart);
        $I->waitForText("Product has been added to your cart.", 10, '.alert-message');
        $I->see("Product has been added to your cart.", '.alert-message');
        $I->amOnPage('index.php?option=com_redshop&view=cart');
        $I->checkForPhpNoticesOrWarnings();
        $I->seeElement(['link' => $productName]);
        $I->click(['xpath' => "//input[@value='Checkout']"]);
        $I->waitForElement(\FrontEndProductManagerJoomla3Page::$newCustomerSpan,30);
        $I->click(\FrontEndProductManagerJoomla3Page::$newCustomerSpan);
        $I = new AcceptanceTester\ProductCheckoutManagerJoomla3Steps($scenario);
        $I->addressInformation($addressDetail);
        $I->shippingInformation($shipmentDetail);
        $I->click("Proceed");
        $I->waitForElement(\FrontEndProductManagerJoomla3Page::$billingFinal);
        $I->click(['xpath' => "//div[@id='rs_payment_banktransfer']//label//input"]);
        $I->click("Checkout");
        $I->waitForElement($productFrontEndManagerPage->product($productName),30);
        $I->seeElement($productFrontEndManagerPage->product($productName));
        $I->click(\FrontEndProductManagerJoomla3Page::$termAndConditions);
        $I->click(\FrontEndProductManagerJoomla3Page::$checkoutFinalStep);
        $I->waitForText('Order Receipt', 10, \FrontEndProductManagerJoomla3Page::$orderReceiptTitle);
        $I->seeElement($productFrontEndManagerPage->finalCheckout($productName));
    }
}

