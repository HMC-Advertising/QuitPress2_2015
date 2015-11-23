<?php 
	class menu_with_description extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';

			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

			$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '<br /><small>' . $item->description . '</small>';
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
		}
	}

	class page_list_with_icons extends Walker_Page {

		function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0){
			$title_lower = strtolower($page->post_title);

			switch($title_lower){
				case "quit to improve your health":
					$title_lower = "wellness";
					break;
				case "quit because of an illness":
					$title_lower ="illness";
					break;
				case "quit for the health of a baby":
					$title_lower = "baby";
					break;
				case "quit for your family":
					$title_lower ="family";
					break;
				case "quit to honor a lost loved one":
					$title_lower ="loss";
					break;
				case "quit to save money":
					$title_lower = "money";
					break;					
			}

			if ( $depth )
			        $indent = str_repeat("\t", $depth);
			else
			        $indent = '';
			extract($args, EXTR_SKIP);
			$css_class = array('page_item', 'page-item-'.$page->ID);
			if( isset( $args['pages_with_children'][ $page->ID ] ) )
			        $css_class[] = 'page_item_has_children';
			if ( !empty($current_page) ) {
			        $_current_page = get_post( $current_page );
			        if ( in_array( $page->ID, $_current_page->ancestors ) )
			                $css_class[] = 'current_page_ancestor';
			        if ( $page->ID == $current_page )
			                $css_class[] = 'current_page_item';
			        elseif ( $_current_page && $page->ID == $_current_page->post_parent )
			                $css_class[] = 'current_page_parent';
			} elseif ( $page->ID == get_option('page_for_posts') ) {
			        $css_class[] = 'current_page_parent';
			}
			$css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
			if ( '' === $page->post_title )
			        $page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );

			$output .= $indent . '<li class="' . $css_class . ' item-' . $title_lower . '"><a href="' . get_permalink($page->ID) . '">' . $link_before . apply_filters( 'the_title', $page->post_title, $page->ID ) . $link_after . '<img src="' . get_bloginfo('template_url') .'/assets/img/icon-' . $title_lower . '.png"></a>';
			if ( !empty($show_date) ) {
			        if ( 'modified' == $show_date )
			                $time = $page->post_modified;
			        else
			                $time = $page->post_date;
			        $output .= " " . mysql2date($date_format, $time);
			}
		}
	}

	//extending the walker function to change the LI to divs in mobile
class page_list_with_icons_Mobile extends Walker_Page {

		function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0){
			$title_lower = strtolower($page->post_title);

			if ( $depth )
			        $indent = str_repeat("\t", $depth);
			else
			        $indent = '';
			extract($args, EXTR_SKIP);
			$css_class = array('page_item', 'page-item-'.$page->ID);
			if( isset( $args['pages_with_children'][ $page->ID ] ) )
			        $css_class[] = 'page_item_has_children';
			if ( !empty($current_page) ) {
			        $_current_page = get_post( $current_page );
			        if ( in_array( $page->ID, $_current_page->ancestors ) )
			                $css_class[] = 'current_page_ancestor';
			        if ( $page->ID == $current_page )
			                $css_class[] = 'current_page_item';
			        elseif ( $_current_page && $page->ID == $_current_page->post_parent )
			                $css_class[] = 'current_page_parent';
			} elseif ( $page->ID == get_option('page_for_posts') ) {
			        $css_class[] = 'current_page_parent';
			}
			$css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
			if ( '' === $page->post_title )
			        $page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );

			//$output .="<i class='fa fa-caret-left'></i>";    

			$output .= $indent . '<div class="mobile ' . $css_class . ' item-' . $title_lower . '"><a href="' . get_permalink($page->ID) . '">' . $link_before . apply_filters( 'the_title', $page->post_title, $page->ID ) . $link_after . '<img src="' . get_bloginfo('template_url') .'/assets/img/icon-' . $title_lower . '.png"></a></div>';
			if ( !empty($show_date) ) {
			        if ( 'modified' == $show_date )
			                $time = $page->post_modified;
			        else
			                $time = $page->post_date;
			        $output .= " " . mysql2date($date_format, $time);
			}

			//$output .="<i class='fa fa-caret-right'></i>";  
		}
}


?>