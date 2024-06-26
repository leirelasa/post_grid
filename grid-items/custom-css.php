<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access
	
	
	$class_post_grid_functions = new class_post_grid_functions();
	$items_bg_color_values = $class_post_grid_functions->items_bg_color_values();
	
	//var_dump($items_bg_color_values);
	
	
	$post_grid_layout_content = get_option( 'post_grid_layout_content' );
	
	if(empty($post_grid_layout_content)){
		$layout = $class_post_grid_functions->layout_content($layout_content);
		}
	else{
		
		if(!empty($post_grid_layout_content[$layout_content])){
			$layout = $post_grid_layout_content[$layout_content];
			}
		else{
			$layout =array();
			}
		
		
		}
	
	$html.= '<style type="text/css">';	
	




	
	foreach($layout as $item_id=>$item_info){
		$item_css = $item_info['css'];
		$item_key = $item_info['key'];		
		
		//var_dump($item_key);	
		
		if($item_key=='categories' || $item_key=='tags'){
			
			$html.= '#post-grid-'.$post_id.' .element_'.$item_id.' a{'.$item_css.'}';
			
			}
			
		elseif($item_key=='down_arrow'){
			
			//var_dump($item_info);
			
			$arrow_size = $item_info['arrow_size'];
			$arrow_bg_color = $item_info['arrow_bg_color'];			
			
			$html.= '#post-grid-'.$post_id.' .element_'.$item_id.'{'.$item_css.'}';
			
			$html.= '#post-grid-'.$post_id.' .element_'.$item_id.'{
				

				  border-left: '.$arrow_size.' solid rgba(0, 0, 0, 0);
				  border-right: '.$arrow_size.' solid rgba(0, 0, 0, 0);
				  border-top: '.$arrow_size.' solid '.$arrow_bg_color.';
				  height: 0;
				  width: 0;
				}';			
			
			
			}	
			
			
		elseif($item_key=='up_arrow'){
			
			//var_dump($item_info);
			
			$arrow_size = $item_info['arrow_size'];
			$arrow_bg_color = $item_info['arrow_bg_color'];			
			
			$html.= '#post-grid-'.$post_id.' .element_'.$item_id.'{'.$item_css.'}';
			
			$html.= '#post-grid-'.$post_id.' .element_'.$item_id.'{
				
				  border-bottom: '.$arrow_size.' solid '.$arrow_bg_color.';
				  border-left: '.$arrow_size.' solid transparent;
				  border-right: '.$arrow_size.' solid transparent;
				  height: 0;
				  width: 0;

				
				}';			
			
			
			}			
			
			
					
			
		else{
			
			$html.= '#post-grid-'.$post_id.' .element_'.$item_id.'{'.$item_css.'}';
			
			}
		
		
		
		}
		
	foreach($layout as $item_id=>$item_info){
		$item_css_hover = $item_info['css_hover'];
		
		$html.= '#post-grid-'.$post_id.' .element_'.$item_id.':hover{'.$item_css_hover.'}';
		
		}		
		
	if($items_bg_color_type=='fixed'){
		
		$html.= '#post-grid-'.$post_id.' .item{
			background:'.$items_bg_color.';
	
			}';
			
		}
	elseif($items_bg_color_type=='random'){
		
		$max_count = count($items_bg_color_values);
		$max_count = ($max_count - 1);		
		
		$i=0;
		foreach($items_bg_color_values as $value){
			
			
			$rand = rand(0,$max_count);
			$html.= '#post-grid-'.$post_id.' .item:nth-child('.$i.'){
				background:'.$items_bg_color_values[$rand].';
		
				}';
				
				$i++;
			}
		
		}
	
		
		if($lazy_load_enable=='yes'){
			
			//$html.= '#post-grid-'.$post_id.'{display: none;}';
		
			}
		
	$html.= '</style>';

	if(!empty($custom_css)){
		$html.= '<style type="text/css">'.$custom_css.'</style>';	
		}
		
		$html.= '<style type="text/css">';
		
		
	$html.= '#post-grid-'.$post_id.' .pagination .page-numbers, #post-grid-'.$post_id.' .pagination .pager{
		
		font-size:'.$pagination_font_size.';		
		color:'.$pagination_font_color.';		
		background:'.$pagination_bg_color.';
		
		
		}';	

		if($pagination_type=='loadmore'){
			
			$html.= '#post-grid-'.$post_id.' #load-more-'.$post_id.'{
				
				font-size:'.$pagination_font_size.';		
				color:'.$pagination_font_color.';		
				background:'.$pagination_bg_color.';
				
				
				}';
			
			$html.= '#post-grid-'.$post_id.' #load-more-'.$post_id.'.loading{
					
				background:'.$pagination_active_bg_color.';
				}';			

			}


	$html.= '#post-grid-'.$post_id.' .pagination .page-numbers:hover, #post-grid-'.$post_id.' .pagination .page-numbers.current, #post-grid-'.$post_id.' .pagination .pager.active{
		background:'.$pagination_active_bg_color.';
		}';	
	
	
	$html.= '#post-grid-'.$post_id.' .nav-filter .filter{
		
		font-size:'.$filterable_font_size.';		
		color:'.$filterable_font_color.';		
		background:'.$filterable_bg_color.';

		}';		
	
	
	$html.= '#post-grid-'.$post_id.' .nav-filter .filter:hover, #post-grid-'.$post_id.' .nav-filter .filter.active{
		background:'.$filterable_active_bg_color.';
		}';		
	
	$html.= '#post-grid-'.$post_id.' .owl-dots .owl-dot {
			background: '.$slider_dots_bg_color.' none repeat scroll 0 0;
				 
			}';		
		
		$html.= '#post-grid-'.$post_id.' {
			padding:'.$container_padding.';
			background: '.$container_bg_color.' url('.$container_bg_image.') repeat scroll 0 0;
		}';

	
/*

	if($skin=='flip-y' || $skin=='flip-x'){
		
		$html.= '#post-grid-'.$post_id.' .item{
			height:'.$items_fixed_height.' !important;
			}';	
		
		}

*/
		
		
	if($items_media_height_style == 'auto_height'){
		$items_media_height = 'auto';
		}
	elseif($items_media_height_style == 'fixed_height'){
		$items_media_height = $items_media_fixed_height;
		}
		
	elseif($items_media_height_style == 'max_height'){
		$items_media_height = $items_media_fixed_height;
		}		
		
	else{
		$items_media_height = '220px';
		}
		
	$html.= '#post-grid-'.$post_id.' .item .layer-media{';
		
		if($items_media_height_style == 'fixed_height' || $items_media_height_style == 'auto_height'){
			
			$html.= 'height:'.$items_media_height.';';
			}
		elseif($items_media_height_style=='max_height'){
			$html.= 'max-height:'.$items_media_height.';';
			}
		else{
			$html.= 'height:'.$items_media_height.';';
			
			}

		$html.= 'overflow: hidden;
		}';	



	if($items_height_style == 'auto_height'){
		$items_height = 'auto';
		}
	elseif($items_height_style == 'fixed_height'){
		$items_height = $items_fixed_height;
		}
		
	elseif($items_height_style == 'max_height'){
		$items_height = $items_fixed_height;
		}		
		
	else{
		$items_height = '220px';
		}





	$html.= '#post-grid-'.$post_id.' .item{
		margin:'.$items_margin.';';

	$html.= '}';
	

	$html.= '@media only screen and (min-width: 1024px ) {';

	$html.= '#post-grid-'.$post_id.' .item{';

		if($items_height_style == 'fixed_height' || $items_height_style == 'auto_height'){
			
			$html.= 'height:'.$items_height.';';
			}
		elseif($items_height_style=='max_height'){
			$html.= 'max-height:'.$items_height.';';
			}
		else{
			$html.= 'height:'.$items_height.';';
			
			}


	$html.= '}';
	$html.= '}';



	$html.= '@media only screen and ( min-width: 768px ) and ( max-width: 1023px ) {';

	$html.= '#post-grid-'.$post_id.' .item{';

		if($items_height_style == 'fixed_height' || $items_height_style == 'auto_height'){
			
			$html.= 'height:'.$items_fixed_height_tablet.';';
			}
		elseif($items_height_style=='max_height'){
			$html.= 'max-height:'.$items_fixed_height_tablet.';';
			}
		else{
			$html.= 'height:'.$items_fixed_height_tablet.';';
			
			}


	$html.= '}';
	$html.= '}';



	$html.= '@media only screen and ( min-width: 0px ) and ( max-width: 767px ){';

	$html.= '#post-grid-'.$post_id.' .item{';

		if($items_height_style == 'fixed_height' || $items_height_style == 'auto_height'){
			
			$html.= 'height:'.$items_fixed_height_mobile.';';
			}
		elseif($items_height_style=='max_height'){
			$html.= 'max-height:'.$items_fixed_height_mobile.';';
			}
		else{
			$html.= 'height:'.$items_fixed_height_mobile.';';
			
			}


	$html.= '}';
	$html.= '}';


if($grid_type!='slider'){
	
	
	
	if($grid_layout_name=='layout_grid'){
		
		}
		
	elseif($grid_layout_name=='layout_1_N'){
		
		$width = intval($items_width_desktop*$grid_layout_col_multi)+intval($items_margin*2*($grid_layout_col_multi-1));
		
		$html.= '
		
		@media only screen and (min-width: 1024px ) {
		
		#post-grid-'.$post_id.' .item:first-child{
			width: '.($width).'px;
			}
		}
			
			';
			
			
		}		
		
	elseif($grid_layout_name=='layout_N_1'){
		
		$width = intval($items_width_desktop*$grid_layout_col_multi)+intval($items_margin*2*($grid_layout_col_multi-1));
		
		$html.= '
		
		@media only screen and (min-width: 1024px ) {
		
		#post-grid-'.$post_id.' .item:last-child{
			width: '.($width).'px;
			}
		}
			
			';
			
		}
	
			
	elseif($grid_layout_name=='layout_3'){
		
		$width = intval($items_width_desktop)+intval($items_margin);
		
		$html.= '
		
		@media only screen and (min-width: 1024px ) {
		
		#post-grid-'.$post_id.' .item:first-child{
			float: left;
			}
			
		#post-grid-'.$post_id.' .item{
			float: right;
			}		

			
		}
			
			';
			
		}	
	
	
	elseif($grid_layout_name=='layout_L_R'){
		
		$html.= '
		
		@media only screen and (min-width: 1024px ) {
		
		#post-grid-'.$post_id.' .item.odd .layer-media{
			float: right;

			}
		}
			
			';
			
		}	

	elseif($grid_layout_name=='layout_1_N_1'){
		
		$width = intval($items_width_desktop*$grid_layout_col_multi)+intval($items_margin*2*($grid_layout_col_multi-1));
		
		$html.= '
		
		@media only screen and (min-width: 1024px ) {
		
		#post-grid-'.$post_id.' .item:nth-child(1),
		#post-grid-'.$post_id.' .item:nth-child('.($grid_layout_col_multi+2).') {
			width: '.($width).'px;
			}
		}
			
			';
			
		}

	$html.= '
	@media only screen and (min-width: 1024px ) {
	#post-grid-'.$post_id.' .item{width:'.$items_width_desktop.'}
	
	}
	
	@media only screen and ( min-width: 768px ) and ( max-width: 1023px ) {
	#post-grid-'.$post_id.' .item{width:'.$items_width_tablet.'}
	}
	
	@media only screen and ( min-width: 320px ) and ( max-width: 767px ) {
	#post-grid-'.$post_id.' .item{width:'.$items_width_mobile.'}
	}';
	
	}
			
			$html.= '</style>';	