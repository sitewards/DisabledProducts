DisabledProducts
===============

Magento extension to disable the add-to-cart button on products and to display a static cms block instead.

Customization
-------------

* You can define the cms block to be displayed instead of the add-to-cart button
* You can set products as disabled in the products details

Installation instructions
-------------------------

1. Copy all files in the root of Magento directory.
2. Manually adjust following files by replacing all blocks with "-" by blocks with "+"
   This is required, because the standard magento theme doesn't always use blocks for the add-to-cart button, but contains it directly in other template files

app\design\frontend\base\default\template\catalog\product\list.phtml
line 60 - 64
<pre>
\-	<?php if($_product->isSaleable()): ?>
\-		<p><button type="button" title="<?php echo $this->__('Add to Cart') ?>" class="button btn-cart" onclick="setLocation('<?php echo $this->getAddToCartUrl($_product) ?>')"><span><span><?php echo $this->__('Add to Cart') ?></span></span></button></p>
\-	<?php else: ?>
\-		<p class="availability out-of-stock"><span><?php echo $this->__('Out of stock') ?></span></p>
\-	<?php endif; ?>
\+	<?php if (!Mage::helper('sitewards_disabledproducts')->isProductDisabled($_product)): ?>
\+		<?php if($_product->isSaleable()): ?>
\+			<p><button type="button" title="<?php echo $this->__('Add to Cart') ?>" class="button btn-cart" onclick="setLocation('<?php echo $this->getAddToCartUrl($_product) ?>')"><span><span><?php echo $this->__('Add to Cart') ?></span></span></button></p>
\+		<?php else: ?>
\+			<p class="availability out-of-stock"><span><?php echo $this->__('Out of stock') ?></span></p>
\+		<?php endif; ?>
\+	<?php else: ?>
\+		<?php
\+		$sBlockId = Mage::helper('sitewards_disabledproducts')->getDisabledProductsBlock();
\+		echo $this->getLayout()->createBlock('cms/block')->setBlockId($sBlockId)->toHtml();
\+		?>
\+	<?php endif; ?>
</pre>

app\design\frontend\base\default\template\catalog\product\compare\list.phtml
line 67-71
<pre>
\-	<?php if($_item->isSaleable()): ?>
\-		<p><button type="button" title="<?php echo $this->__('Add to Cart') ?>" class="button btn-cart" onclick="setPLocation('<?php echo $this->helper('catalog/product_compare')->getAddToCartUrl($_item) ?>', true)"><span><span><?php echo $this->__('Add to Cart') ?></span></span></button></p>
\-	<?php else: ?>
\-		<p class="availability out-of-stock"><span><?php echo $this->__('Out of stock') ?></span></p>
\-	<?php endif; ?>
\+	<?php if (!Mage::helper('sitewards_disabledproducts')->isProductDisabled($_item)): ?>
\+		<?php if($_item->isSaleable()): ?>
\+			<p><button type="button" title="<?php echo $this->__('Add to Cart') ?>" class="button btn-cart" onclick="setPLocation('<?php echo $this->helper('catalog/product_compare')->getAddToCartUrl($_item) ?>', true)"><span><span><?php echo $this->__('Add to Cart') ?></span></span></button></p>
\+		<?php else: ?>
\+			<p class="availability out-of-stock"><span><?php echo $this->__('Out of stock') ?></span></p>
\+		<?php endif; ?>
\+	<?php else: ?>
\+		<?php
\+		$sBlockId = Mage::helper('sitewards_disabledproducts')->getDisabledProductsBlock();
\+		echo $this->getLayout()->createBlock('cms/block')->setBlockId($sBlockId)->toHtml();
\+		?>
\+	<?php endif; ?>
</pre>

app\design\frontend\base\default\template\catalog\product\compare\list.phtml
line 127-131
<pre>
\-	<?php if($_item->isSaleable()): ?>
\-		<p><button type="button" title="<?php echo $this->__('Add to Cart') ?>" class="button btn-cart" onclick="setPLocation('<?php echo $this->helper('catalog/product_compare')->getAddToCartUrl($_item) ?>', true)"><span><span><?php echo $this->__('Add to Cart') ?></span></span></button></p>
\-	<?php else: ?>
\-		<p class="availability out-of-stock"><span><?php echo $this->__('Out of stock') ?></span></p>
\-	<?php endif; ?>
\+	<?php if (!Mage::helper('sitewards_disabledproducts')->isProductDisabled($_item)): ?>
\+		<?php if($_item->isSaleable()): ?>
\+			<p><button type="button" title="<?php echo $this->__('Add to Cart') ?>" class="button btn-cart" onclick="setPLocation('<?php echo $this->helper('catalog/product_compare')->getAddToCartUrl($_item) ?>', true)"><span><span><?php echo $this->__('Add to Cart') ?></span></span></button></p>
\+		<?php else: ?>
\+			<p class="availability out-of-stock"><span><?php echo $this->__('Out of stock') ?></span></p>
\+		<?php endif; ?>
\+	<?php else: ?>
\+		<?php
\+		$sBlockId = Mage::helper('sitewards_disabledproducts')->getDisabledProductsBlock();
\+		echo $this->getLayout()->createBlock('cms/block')->setBlockId($sBlockId)->toHtml();
\+		?>
\+	<?php endif; ?>
</pre>

app\design\frontend\base\default\template\wishlist\item\column\cart.phtml
line 34-47
<pre>
\-	<div class="add-to-cart-alt">
\-	<?php if ($item->canHaveQty() && $item->getProduct()->isVisibleInSiteVisibility()): ?>
\-		<input type="text" class="input-text qty validate-not-negative-number" name="qty[<?php echo $item->getId() ?>]" value="<?php echo $this->getAddToCartQty($item) * 1 ?>" />
\-	<?php endif; ?>
\-	<?php if ($product->isSaleable()): ?>
\-		<button type="button" title="<?php echo $this->__('Add to Cart') ?>" onclick="addWItemToCart(<?php echo $item->getId()?>);" class="button btn-cart"><span><span><?php echo $this->__('Add to Cart') ?></span></span></button>
\-	<?php else: ?>
\-		<?php if ($product->getIsSalable()): ?>
\-			<p class="availability in-stock"><span><?php echo $this->__('In stock') ?></span></p>
\-		<?php else: ?>
\-			<p class="availability out-of-stock"><span><?php echo $this->__('Out of stock') ?></span></p>
\-		<?php endif; ?>
\-	<?php endif; ?>
\-	</div>
\+	<?php if (!Mage::helper('sitewards_disabledproducts')->isProductDisabled($product)): ?>
\+		<div class="add-to-cart-alt">
\+		<?php if ($item->canHaveQty() && $item->getProduct()->isVisibleInSiteVisibility()): ?>
\+			<input type="text" class="input-text qty validate-not-negative-number" name="qty[<?php echo $item->getId() ?>]" value="<?php echo $this->getAddToCartQty($item) * 1 ?>" />
\+		<?php endif; ?>
\+		<?php if ($product->isSaleable()): ?>
\+			<button type="button" title="<?php echo $this->__('Add to Cart') ?>" onclick="addWItemToCart(<?php echo $item->getId()?>);" class="button btn-cart"><span><span><?php echo $this->__('Add to Cart') ?></span></span></button>
\+		<?php else: ?>
\+			<?php if ($product->getIsSalable()): ?>
\+				<p class="availability in-stock"><span><?php echo $this->__('In stock') ?></span></p>
\+			<?php else: ?>
\+				<p class="availability out-of-stock"><span><?php echo $this->__('Out of stock') ?></span></p>
\+			<?php endif; ?>
\+		<?php endif; ?>
\+		</div>
\+	<?php else: ?>
\+		<div class="add-to-cart-alt">
\+			<?php
\+			$sBlockId = Mage::helper('sitewards_disabledproducts')->getDisabledProductsBlock();
\+			echo $this->getLayout()->createBlock('cms/block')->setBlockId($sBlockId)->toHtml();
\+			?>
\+		</div>
\+	<?php endif; ?>
</pre>

contact: http://www.sitewards.com