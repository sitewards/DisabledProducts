<?php
/**
 * Sitewards_DisabledProducts_Helper_Data
 *
 * A helper class for the DisabledProducts extension
 * Returns the id of the cms block and checks if the product is disabled
 *
 * @category    Sitewards
 * @package     Sitewards_DisabledProducts
 * @copyright   Copyright (c) 2012 Sitewards GmbH (http://www.sitewards.com/de/)
 */
class Sitewards_DisabledProducts_Helper_Data extends Mage_Core_Helper_Abstract {

	/**
	 * Variable to hold if the extension is active
	 */
	private $bEnabledExtension = null;

	/**
	 * Returns cms block for disabled products defined in the extension config
	 *
	 * @return string
	 */
	public function getDisabledProductsBlock() {
		return Mage::getStoreConfig('sitewards_disabledproducts_config/sitewards_disabledproducts_general/disabled_product_block');
	}

	/**
	 * Returns if the extension is enabled and the given product disabled
	 *
	 * @param Mage_Catalog_Model_Product $oProduct
	 * @return boolean
	 */
	public function isProductDisabled(Mage_Catalog_Model_Product $oProduct){
		$this->bEnabledExtension = Mage::getStoreConfig('sitewards_disabledproducts_config/sitewards_disabledproducts_general/enable_ext');
		if ( $this->bEnabledExtension == true ) {
			$oProduct = Mage::getModel('catalog/product')->load($oProduct->getId());
			return $oProduct->getIsDisabled();
		} else {
			return false;
		}
	}
}