<?php
/**
 * Sitewards_DisabledProducts_Model_System_Config_Source_Cms_Block
 *
 * Backend model for cms blocks dropdown in the configuration section
 *
 * @category    Sitewards
 * @package     Sitewards_DisabledProducts
 * @copyright   Copyright (c) 2012 Sitewards GmbH (http://www.sitewards.com/de/)
 */
class Sitewards_DisabledProducts_Model_System_Config_Source_Cms_Block {

	protected $_options;

	/**
	 * Returns all cms blocks as an array of values (block ids) and labels (block names)
	 * used in the admin config to select a block to be displayed instead of add-to-cart button
	 *
	 * @return array
	 */
	public function toOptionArray()
	{
		if (!$this->_options) {
			$aBlockOptionsArray = array();
			$aBlocksCollection = Mage::getResourceModel('cms/block_collection')->load();

			foreach($aBlocksCollection as $oBlock){
				$aOption = array(
					'value' => $oBlock->getIdentifier(),
					'label' => $oBlock->getTitle()
				);
				$aBlockOptionsArray[] = $aOption;
			}
			$this->_options = $aBlockOptionsArray;

		}
		return $this->_options;
	}
}