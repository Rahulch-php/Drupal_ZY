<?php
// $Id: template.php,v 1.16.2.3 2010/05/11 09:41:22 goba Exp $

/**
 * Sets the body-tag class attribute.
 *
 * Adds 'sidebar-left', 'sidebar-right' or 'sidebars' classes as needed.
 */
function phptemplate_body_class($left, $right, $class) {
  if ($left != '' && $right != '') {
    $class = 'sidebars';
  }
  else {
    if ($left != '') {
      $class = 'sidebar-left';
    }
    if ($right != '') {
      $class = 'sidebar-right';
    }
  }

  if (isset($class)) {
    print ' class="'. $class .'"';
  }
}

 /*To change the http header cache control for particular pages mention in vt testing   */
function  zytiga_uk_page_headers(){
 
 drupal_set_html_head('<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">');
 drupal_set_html_head('<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">');
 
}

/**
 * Override or insert PHPTemplate variables into the templates.
 */
function zytiga_uk_preprocess_page(&$vars ,$hook) {

//	echo "<pre>" . print_r($vars, true) . "</pre>"; exit;
  if (isset($vars['node'])) {
  	if ($vars['node']->type == 'video_block') { 
  	  $vars['template_files'][] = 'page-video';
  	}
  } 
  
  $path = drupal_get_path_alias($_GET['q']);
   
   /*To change the http header cache control for particular pages mention in vt testing   */
   if(($path =="contactus") ||( $path =="user/password") ||($path =="request-a-rep-visit") 
        ||($path =="forward") ||($path =="user"))
   {
  
		  zytiga_uk_page_headers();
		  $vars['head'] =  drupal_get_html_head();
 
   }
   /* End */
  
  $vars['tabs2'] = menu_secondary_local_tasks();

  //Template files for different pages 
 
  if($path == 'home')
  	$vars['template_files'][] = "node-home-video";  
  if($path == 'language')
  	$vars['template_files'][] = "page-front-language";
  if($path == 'contactus')
    $vars['head_title'] = "Contact Us";		
  if(arg(0) == 'display_video')
  	$vars['template_files'][] = "search-video-content";  
  // Hook into color.module
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
  //$vars['primary_links'][] =  "<a href=\"?q=user\">Login</a>";
  // echo "<pre>"; print_r($vars['footer_menu2']['type']); echo "</pre>"; exit;
}
  
/**
 * alter the menu link
 * @param $link
 * @return link
 */

function zytiga_uk_menu_item_link($link) {
	if($link['menu_name'] == 'menu-footer-menu2' && $link['link_title'] == 'Share with a colleague') {
	   $link['href'] = 'forward'; 
       $array = $link['localized_options']; 
       
       if(arg(1) == '' && arg(0) != 'node')
	   	 $array['query'] = array('path' => $_GET['q']);
	   else
	     $array['query'] = array('path' => 'node/'.arg(1));
	 
	   return '<!-- googleoff: index -->'. l($link['title'], $link['href'], $array) .'<!-- googleon: index -->';
	  }
	  else if($link['menu_name'] == 'menu-footer-menu2') {
	  	if($link['link_title'] == 'Contact us' || $link['link_title'] == 'Request a representative visit')
	  		return '<!-- googleoff: index -->'. l($link['title'], $link['href']) .'<!-- googleon: index -->';
	  	else
	  		return l($link['title'], $link['href']);	
	  }
	  else if($link['menu_name'] == 'menu-leftmenu' && $link['link_title'] == 'Resources') {	  
	  		return '<!-- googleoff: index -->'. l($link['title'], $link['href']) .'<!-- googleon: index -->';
	  }
	  else {
	  	$options = array(
              'attributes' => array(),
              'html' => TRUE,
	  	);
	   return l($link['title'], $link['href'], $options);
	   
	  }
}

/**
 * Add a "Comments" heading above comments except on forum pages.
 */
function phptemplate_preprocess_comment_wrapper(&$vars) {
  if ($vars['content'] && $vars['node']->type != 'forum') {
    $vars['content'] = '<h2 class="comments">'. t('Comments') .'</h2>'.  $vars['content'];
  }
}

/**
 * Returns the rendered local tasks. The default implementation renders
 * them as tabs. Overridden to split the secondary tasks.
 *
 * @ingroup themeable
 */
function phptemplate_menu_local_tasks() {
  return menu_primary_local_tasks();
}

/**
 * Returns the themed submitted-by string for the comment.
 */
function phptemplate_comment_submitted($comment) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $comment),
      '!datetime' => format_date($comment->timestamp)
    ));
}

/**
 * Returns the themed submitted-by string for the node.
 */
function phptemplate_node_submitted($node) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $node),
      '!datetime' => format_date($node->created),
    ));
}

/**
 * Generates IE CSS links for LTR and RTL languages.
 */
function phptemplate_get_ie_styles() {
  global $language;

  $iecss = '<link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/fix-ie.css" />';
  if ($language->direction == LANGUAGE_RTL) {
    $iecss .= '<style type="text/css" media="all">@import "'. base_path() . path_to_theme() .'/fix-ie-rtl.css";</style>';
  }

  return $iecss;
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */
function zytiga_uk_breadcrumb($breadcrumb) {
  // Determine if we are to display the breadcrumb.
  $show_breadcrumb = theme_get_setting('zytiga_breadcrumb');
  if ($show_breadcrumb == 'yes' || $show_breadcrumb == 'admin' && arg(0) == 'admin') {

    // Optionally get rid of the homepage link.
    $show_breadcrumb_home = theme_get_setting('zytiga_breadcrumb_home');
    if (!$show_breadcrumb_home) {
      array_shift($breadcrumb);
    }
    
    // Return the breadcrumb with separators.
    if (!empty($breadcrumb)) {
      //parent item
      $menu = menu_get_active_title();
      $path = $_GET['q'];
      
      if(arg(0) == "contactus") {
      	drupal_set_title('Contact Us');
      	if(arg(1) == 'error')
      		array_pop($breadcrumb);
      	if(arg(1) == 'success')
      		array_pop($breadcrumb);	
      }
      
      $plid = db_result(db_query("SELECT plid FROM {menu_links} WHERE link_title = '%s' AND link_path = '%s'", array($menu, $path)));
      $parent_path = db_result(db_query("SELECT link_path FROM {menu_links} WHERE mlid = '%s'", array($plid)));
      $menu_item = menu_get_item($parent_path);
      $parent_item = $menu_item['page_arguments'][0]->title;
      
      if($parent_item != '') {
      	if($parent_item == 'About ZYTIGA') $parent_item = 'About ZYTIGA <sup>&trade;</sup>';
      	$breadcrumb[] = "<a href='/". drupal_get_path_alias($parent_path) ."'>". $parent_item ."</a>";
      }
      
      $breadcrumb_separator = theme_get_setting('zytiga_breadcrumb_separator');
      $breadcrumb_separator = "<span>". $breadcrumb_separator ."</span>";
      $trailing_separator = $title = '';
      if (theme_get_setting('zytiga_breadcrumb_title')) {
        if ($title = drupal_get_title()) {
          $trailing_separator = $breadcrumb_separator;
        }
      }
      elseif (theme_get_setting('zytiga_breadcrumb_trailing')) {
        $trailing_separator = $breadcrumb_separator;
      }
      
      if(count($breadcrumb) > 0)
      	$breadcrumb[0] = "<a href='". base_path() ."home'> Home </a>";
      	
      if($title == 'About ZYTIGA')
      	$title = t('About ZYTIGA <sup>&trade;</sup>');
      return '<div id="breadcrumb">' . implode($breadcrumb_separator, $breadcrumb) . $trailing_separator . $title . $trailing_separator. '</div>';
    }
  }
  // Otherwise, return an empty string.
  return '';
}

/**
 * Implementation of hook_theme
 */
function zytiga_uk_theme() {
	return array(
		'exit_disclaimer_message' => array(
			'arguments' => array('message' => NULL, 'buttons' => NULL),
			'template' => 'exit-disclaimer',
		),
	);
}

/**
 * Format a query pager.
 *
 * Menu callbacks that display paged query results should call theme('pager') to
 * retrieve a pager control so that users can view other results.
 * Format a list of nearby pages with additional query results.
 *
 * @param $tags
 *   An array of labels for the controls in the pager.
 * @param $limit
 *   The number of query results to display per page.
 * @param $element
 *   An optional integer to distinguish between multiple pagers on one page.
 * @param $parameters
 *   An associative array of query string parameters to append to the pager links.
 * @param $quantity
 *   The number of pages in the list.
 * @return
 *   An HTML string that generates the query pager.
 *
 * @ingroup themeable
 */
function zytiga_uk_pager($tags = array(), $limit = 3, $element = 0, $parameters = array(), $quantity = 9) {
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

    
  $li_previous = theme('pager_next', (isset($tags[3]) ? $tags[3] : t('')), $limit, $element, 1, $parameters);
  $li_next = theme('pager_previous', (isset($tags[1]) ? $tags[1] : t('')), $limit, $element, 1, $parameters);
  
  $li_first = theme('pager_first', (isset($tags[0]) ? $tags[0] : t('« first')), $limit, $element, $parameters);
  $li_last = theme('pager_last', (isset($tags[4]) ? $tags[4] : t('last »')), $limit, $element, $parameters);
 
  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => 'pager-first',
        'data' => $li_first,
      );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => 'pager-previous',
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => 'pager-ellipsis',
          'data' => '…',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => 'pager-item',
            'data' => theme('pager_previous', $i, $limit, $element, ($pager_current - $i), $parameters),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => 'pager-current',
            'data' => $i,
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => 'pager-item',
            'data' => theme('pager_next', $i, $limit, $element, ($i - $pager_current), $parameters),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => 'pager-ellipsis',
          'data' => '…',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => 'pager-next',
        'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
        'class' => 'pager-last',
        'data' => $li_last,
      );
    }
    return theme('item_list', $items, NULL, 'ul', array('class' => 'pager'));
  }
}
