<?php
/**
* @package Pages
* @copyright Copyright 2003-2019 Zen Cart Development Team
* @copyright Portions Copyright 2003 osCommerce
* @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
* @version $Id: loader_tpp.php 2019-09-03 18:23:35Z webchills $
*/   

$loaders[] = array('conditions' => array('pages' => array('product_info','product_music_info','document_general_info','document_product_info','product_free_shipping_info')),
                    'jscript_files' => array(
	                    'tpp.js' => 5
	                    
                    ),
                    'css_files' => array(
                    	'tpp/alt_tpp_tabs6.css' => 10,
                       'tpp.css'	=> 	11)
                );

              