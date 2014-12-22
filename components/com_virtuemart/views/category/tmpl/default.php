<?php
/**
 *
 * Show the products in a category
 *
 * @package    VirtueMart
 * @subpackage
 * @author RolandD
 * @author Max Milbers
 * @todo add pagination
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default.php 8508 2014-10-22 18:57:14Z Milbo $
 */

defined ('_JEXEC') or die('Restricted access');
JHtml::_ ('behavior.modal');

$js = "
jQuery(document).ready(function () {
	jQuery('.orderlistcontainer').hover(
		function() { jQuery(this).find('.orderlist').stop().show()},
		function() { jQuery(this).find('.orderlist').stop().hide()}
	)
});
";

vmJsApi::addJScript('vm.hover',$js);

if (empty($this->keyword) and !empty($this->category)) {
	?>
<div class="category_description">
	<?php echo $this->category->category_description; ?>
</div>
<?php
}

// Show child categories
if (VmConfig::get ('showCategory', 1) and empty($this->keyword)) {
	if (!empty($this->category->haschildren)) {

		//echo ShopFunctionsF::renderVmSubLayout('categories',array('categories'=>$this->category->children));

	}
}

if($this->showproducts){
?>
<div class="browse-view">

<?php

if (!empty($this->keyword)) {?>
	<h3><?php echo $this->keyword; ?></h3>

	<form action="<?php echo JRoute::_ ('index.php?option=com_virtuemart&view=category&limitstart=0', FALSE); ?>" method="get">

		<!--BEGIN Search Box -->
		<div class="virtuemart_search">
			<?php echo $this->searchcustom ?>
			<br/>
			<?php echo $this->searchCustomValues ?>
			<input name="keyword" class="inputbox" type="text" size="20" value="<?php echo $this->keyword ?>"/>
			<input type="submit" value="<?php echo vmText::_ ('COM_VIRTUEMART_SEARCH') ?>" class="button" onclick="this.form.keyword.focus();"/>
		</div>
		<input type="hidden" name="search" value="true"/>
		<input type="hidden" name="view" value="category"/>
		<input type="hidden" name="option" value="com_virtuemart"/>
		<input type="hidden" name="virtuemart_category_id" value="<?php echo $this->categoryId; ?>"/>

	</form>
	<!-- End Search Box -->
<?php  } ?>

<?php // Show child categories

	?>
<!--div class="orderby-displaynumber">
	<div class="floatleft vm-order-list">
		<?php //echo $this->orderByList['orderby']; ?>
		<?php //echo $this->orderByList['manufacturer']; ?>
	</div>
	<div class="vm-pagination vm-pagination-top">
		<?php //echo $this->vmPagination->getPagesLinks (); ?>
		<span class="vm-page-counter"><?php //echo $this->vmPagination->getPagesCounter (); ?></span>
	</div>
	<div class="floatright display-number"><?php //echo $this->vmPagination->getResultsCounter ();?><br/><?php //echo $this->vmPagination->getLimitBox ($this->category->limit_list_step); ?></div>


	<div class="clear"></div>
</div> <!-- end of orderby-displaynumber -->
<div class="page-header relative_enqre"><h2 itemprop="name">Cut & Price</h2>
<div class="enqr_now_btn">
  <a href="javascript:void(0);">ENQUIRE
NOW</a>
</div>
</div>
<h1><?php echo $this->category->category_name; ?></h1>

	<?php
	if (!empty($this->products)) {
	$products = array();
	$products[0] = $this->products;	
	//echo shopFunctionsF::renderVmSubLayout($this->productsLayout,array('products'=>$products,'currency'=>$this->currency,'products_per_row'=>$this->perRow,'showRating'=>$this->showRating));

	?>
<div class="vm-pagination vm-pagination-bottom"><?php echo $this->vmPagination->getPagesLinks (); ?><span class="vm-page-counter"><?php echo $this->vmPagination->getPagesCounter (); ?></span></div>

<?php
} elseif (!empty($this->keyword)) {
	//echo vmText::_ ('COM_VIRTUEMART_NO_RESULT') . ($this->keyword ? ' : (' . $this->keyword . ')' : '');
} ?>


<!--===cut & price html start here===-->
  <!--div class="col-md-12 cut-heading">    
  <ul>
    <?php
    // Get a db connection.
    $db = JFactory::getDbo();
    // Create a new query object.
    $query = $db->getQuery(true);
    $query = "SELECT `virtuemart_category_id` FROM `#__virtuemart_categories` LIMIT 0 , 30" ;
    $db->setQuery($query);
    $rows = $db->loadObjectList();
    foreach ($rows as $key => $value){
      $category_id = $value->virtuemart_category_id;
      /*--get category name--*/
      $query = 'SELECT * FROM `#__virtuemart_categories_en_gb` WHERE `virtuemart_category_id` = '.$category_id;
      $db->setQuery($query);
      $rows = $db->loadObjectList();  
      $category_name = $rows[0]->category_name;
      $category_slug = $rows[0]->slug;?>
      <li><a href="<?php echo JURI::current().'/'.$category_slug; ?>"><?php echo $category_name; ?></a></li>
    <?php } ?>
  </ul>
  </div-->
  <div class="col-md-12 cut-heading">    
  <ul>
          <li><a href="#Springbok">Springbok</a></li>
          <li><a href="#BLESBOK">BLESBOK</a></li>
          <li><a href="#IMPALA">IMPALA</a></li>
          <li><a href="#Red Hartebeest">Red Hartebeest</a></li>
          <li><a href="#Wildebeest">Wildebeest</a></li>
          <li><a href="#Black Wildebees">Black Wildebees</a></li>
          <li><a href="#Gemsbok">Gemsbok</a></li>
          <li><a href="#Kudu">Kudu</a></li>
          <li><a href="#Eland">Eland</a></li>
      </ul>
  </div>
<?php 
// Get a db connection.
$db = JFactory::getDbo();
// Create a new query object.
$query = $db->getQuery(true);
$query = "SELECT `virtuemart_category_id` FROM `#__virtuemart_categories` LIMIT 0 , 30" ;
$db->setQuery($query);
$rows = $db->loadObjectList();
foreach ($rows as $key => $value){
?>
 <!--====content-start-->
  <div class="row">
  <div class="col-md-12 sping-bok">  
  <div class="col-md-4">
  <div class="main-spring">  
  <!--===content close===-->
  <?php  
  $category_id = $value->virtuemart_category_id;
  /*--get category name--*/
  $query = 'SELECT * FROM `#__virtuemart_categories_en_gb` WHERE `virtuemart_category_id` = '.$category_id;
  $db->setQuery($query);
  $rows = $db->loadObjectList();  
  $category_name = $rows[0]->category_name;
  $category_slug = $rows[0]->slug;
  $category_description = $rows[0]->category_description;
  ?>
  <h3 id="<?php echo $category_name; ?>"><?php echo $category_name; ?></h3>
  </div>
  </div>  
  <div class="col-md-8">
  <div class="spring-paraph">
  <?php echo $category_description; ?>
  </div>
  </div>
  </div>
  </div>  
  <div class="row">
  <div class="col-md-12 table-part"> 
  <div class="cut_prc_hd_t"> Cuts & Price</div> 
  <table class="price-list">
  
  <tr> 
  <?php
  $query = 'SELECT `virtuemart_product_id` FROM `#__virtuemart_product_categories` WHERE `virtuemart_category_id` = '.$category_id;
  $db->setQuery($query);
  $rows = $db->loadObjectList();
  foreach ($rows as $key => $value) {    
    $product_id = $value->virtuemart_product_id;
    /*--get product name and slug--*/
    $query = 'SELECT * FROM `#__virtuemart_products_en_gb` WHERE `virtuemart_product_id` = '.$product_id;
    $db->setQuery($query);
    $rows = $db->loadObjectList();    
    $product_name = $rows[0]->product_name;
    $product_slug = $rows[0]->slug;
    /*--get product price--*/
    $query = 'SELECT * FROM `#__virtuemart_product_prices` WHERE `virtuemart_product_id` = '.$product_id;
    $db->setQuery($query);
    $rows = $db->loadObjectList();
    $price = $rows[0]->product_price;
    $price = number_format($price);
    ?>    
      <td><a href="<?php echo JURI::current().'/'.$category_slug.'/'.$product_slug.'-detail'; ?>"><?php echo $product_name; ?></a><br>
        <span class="rate-p">R<?php echo $price; ?>p/k</span>
      </td>
  <?php } ?>
    </tr>
   </table>

  </div>
  </div>
  
<!--===cut & price html end here===-->


<?php } ?>
</div>

<?php } ?>

<!-- end browse-view -->