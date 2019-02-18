<?php
add_action('init', 'add_my_rule');
function add_my_rule()
{
	global $wpdb, $post;
	$ssLang= get_bloginfo("language");
	
	$url = explode('/', 'http://'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
	$slug = $url[4];
	//$postid = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_status='publish' AND post_name = '$slug'");
	
	if($ssLang == 'en'){ 
		$customSlug = $wpdb->get_results("SELECT p.ID, p.post_status, p.post_type, p.post_name, p.post_title, pm.* FROM $wpdb->posts AS p INNER JOIN $wpdb->postmeta AS pm ON p.ID = pm.post_id WHERE pm.meta_key = 'en_slugs' AND p.post_type = 'page' AND p.post_type NOT IN ('revision') ");
	}else{
		$customSlug = $wpdb->get_results("SELECT p.ID, p.post_status, p.post_type, p.post_name, p.post_title, pm.* FROM $wpdb->posts AS p INNER JOIN $wpdb->postmeta AS pm ON p.ID = pm.post_id WHERE pm.meta_key = 'de_slugs' AND p.post_type = 'page' AND p.post_type NOT IN ('revision') ");
	}
	//echo"<pre>"; print_r($customSlug);  
	
	foreach($customSlug as $slugs){
		
		if($slug == $slugs->meta_value){
			
			if($ssLang == 'en'){ 				
				$englishSlug = get_field( "en_slugs", $slugs->ID );
				add_rewrite_rule('^'.$englishSlug.'.*$','index.php?pagename='.$slugs->post_name,'top');
			}else{
				$dutchSlug = get_field( "de_slugs", $slugs->ID ); 
				add_rewrite_rule('^'.$dutchSlug.'.*$','index.php?pagename='.$slugs->post_name,'top');
			}
			
		}
	}
}

?>