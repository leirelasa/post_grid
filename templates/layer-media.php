<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access


		
		$html_media = '';

		$is_image = false;
		foreach($media_source as $source_info){
		 
			$media = post_grid_get_media($item_post_id, $source_info['id'], $featured_img_size, $thumb_linked);
			
			//var_dump($media);
			
			if ( $is_image ) continue;
		
			if(!empty($source_info['checked'])){
				if(!empty($media)){
			
					$html_media = post_grid_get_media($item_post_id, $source_info['id'], $featured_img_size, $thumb_linked);
					$is_image = true;
				}
			   else{
				   $html_media = '';
				   }
			}
		}



	$html_media = apply_filters('post_grid_filter_html_media', $html_media);
	
	echo'';	
	
	
	?>
	
    <div class="layer-media"><?php echo $html_media; ?></div>