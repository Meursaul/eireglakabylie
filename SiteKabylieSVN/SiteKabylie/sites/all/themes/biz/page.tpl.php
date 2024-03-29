﻿<?php
/**
* @file page.tpl.php
* Default theme implementation to display a single Drupal page.

Available variables:

General utility variables:

    * $base_path: The base URL path of the Drupal installation. At the very least, this will always default to /.
    * $directory: The directory the template is located in, e.g. modules/system or themes/bartik.
    * $is_front: TRUE if the current page is the front page.
    * $logged_in: TRUE if the user is registered and signed in.
    * $is_admin: TRUE if the user has permission to access administration pages.

Site identity:

    * $front_page: The URL of the front page. Use this instead of $base_path, when linking to the front page. This includes the language domain or prefix.
    * $logo: The path to the logo image, as defined in theme configuration.
    * $site_name: The name of the site, empty when display has been disabled in theme settings.
    * $site_slogan: The slogan of the site, empty when display has been disabled in theme settings.

Navigation:

    * $main_menu (array): An array containing the Main menu links for the site, if they have been configured.
    * $secondary_menu (array): An array containing the Secondary menu links for the site, if they have been configured.
    * $breadcrumb: The breadcrumb trail for the current page.

Page content (in order of occurrence in the default page.tpl.php):

    * $title_prefix (array): An array containing additional output populated by modules, intended to be displayed in front of the main title tag that appears in the template.
    * $title: The page title, for use in the actual HTML content.
    * $title_suffix (array): An array containing additional output populated by modules, intended to be displayed after the main title tag that appears in the template.
    * $messages: HTML for status and error messages. Should be displayed prominently.
    * $tabs (array): Tabs linking to any sub-pages beneath the current page (e.g., the view and edit tabs when displaying a node).
    * $action_links (array): Actions local to the page, such as 'Add menu' on the menu administration interface.
    * $feed_icons: A string of all feed icons for the current page.
    * $node: The node object, if there is an automatically-loaded node associated with the page, and the node ID is the second argument in the page's path (e.g. node/12345 and node/12345/revisions, but not comment/reply/12345).

Regions:

    * $page['help']: Dynamic help text, mostly for admin pages.
    * $page['highlighted']: Items for the highlighted content region.
    * $page['content']: The main content of the current page.
    * $page['sidebar_first']: Items for the first sidebar.
    * $page['sidebar_second']: Items for the second sidebar.
    * $page['header']: Items for the header region.
    * $page['footer']: Items for the footer region.

*/
?>
     <div id="theme-body">
     <table border="0" cellpadding="0" cellspacing="0" id="toplinks">
      <tr>
       <td class="header-navbar">
        <?php if ($main_menu):
         $main_menu_links = variable_get('menu_main_links_source', 'main-menu');
         $main_menu_tree = menu_tree($main_menu_links);
         $main_menu_render = drupal_render($main_menu_tree);
         print str_replace('class="menu', 'class="sf-menu', $main_menu_render); 
         endif;
        ?>
       </td>
      </tr>
     </table>
     <table border="0" cellpadding="0" cellspacing="0" id="header">
       <tr>
        <td class="header-left">
         <div class="name-slogan">
          <?php if ($site_name) { ?><h1 class='site-name'><a href="<?php print $front_page ?>" title="<?php print $site_name ?> : <?php print t('Home') ?>"><?php print $site_name ?></a></h1><?php } ?>
         <?php if ($site_slogan) { ?><div class='site-slogan'><?php print $site_slogan ?></div><?php } ?>
         </div>
        </td>
        <td class="header-right">         
         <?php if ($logo) { ?><div class="header-logo"><a href="<?php print $front_page ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home') ?>" /></a></div><?php } ?>
        </td>
       </tr>
     </table>
     <table border="0" cellpadding="0" cellspacing="0" id="sublinks">
       <tr>
        <td class="header-navbar">
         <?php if ($secondary_menu):
          $secondary_menu_links = variable_get('menu_secondary_links_source', 'secondary-menu');
          $secondary_menu_tree = menu_tree($secondary_menu_links);
          $secondary_menu_render = drupal_render($secondary_menu_tree);
          print str_replace('class="menu', 'class="sf-menu', $secondary_menu_render); 
          endif;
         ?>
        </td>
       </tr>
     </table>
     <table border="0" cellpadding="0" cellspacing="0" id="content">
       <tr>
        <?php if ($page['sidebar_first']): ?><td id="sidebar-first">
      <?php print render($page['sidebar_first']); ?>
        </td><?php endif; ?>
        <td valign="top" id="main">
        <?php if ($page['highlighted']) { ?>
       <div id="mission"><?php print render($page['highlighted']); ?>
       </div><?php } ?>
        <div id="main-content">
        <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="title" id="page-title">
          <?php print $title; ?>
        </h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
         </div>
        </td>
        <?php if ($page['sidebar_second']) { ?><td id="sidebar-second">
        <?php print render($page['sidebar_second']); ?>
        </td><?php } ?>
       </tr>
     </table>
     <table border="0" cellpadding="0" cellspacing="0" id="footer">
       <tr>
        <td class="footer">
        <?php if($page['footer']){ ?>
        <div id="footer-inner">
        <?php print render($page['footer']); ?>
        </div>
        <?php } ?>
        </td>
       </tr>
     </table>
    </div>
<!-- !Don't remove footer links! -->
<!-- Footer links-->
 <div><center><br>1997-2013 © eireglakabylie.fr -  Tél. +33 6 74 56 60 16 <br>
   Plan du site - C.G.U. - Charte - eireglakabylie.fr est développé par Meursaul - Paris </center></div>
 <!-- <div class="footer-info"><ul><li>Drupal Theme sponsored by <a href="http://sw.bi3.biz" target="_blank" title="Kostenlose Software Downloads">BI3: kostenlose Software Downloads</a></li><li>| <a href="http://drupal.org/project/biz" target="_blank" rel="nofollow" title="BIZ-Theme Download">Theme Download</a></li></ul></div> -->
<!-- Footer links END-->
