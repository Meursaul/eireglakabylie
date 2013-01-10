    <div class="PageBackgroundGlare">
      <div class="PageBackgroundGlareImage"></div>
    </div>
    <div class="Main">
      <div class="Sheet">
        <div class="Sheet-tl"></div>
        <div class="Sheet-tr"></div>
        <div class="Sheet-bl"></div>
        <div class="Sheet-br"></div>
        <div class="Sheet-tc"></div>
        <div class="Sheet-bc"></div>
        <div class="Sheet-cl"></div>
        <div class="Sheet-cr"></div>
        <div class="Sheet-cc"></div>
        <div class="Sheet-body">
          <div class="Header">
            <div class="logo">
              <?php if ($logo): ?>
                <div id="logo">
                  <a href="<?php print check_url($front_page); ?>" title="<?php echo t('Home'); ?>"><img src="<?php echo $logo; ?>" alt="<?php echo t('Home'); ?>" /></a>
                </div>
              <?php endif; ?>
            </div>
	    </div>
          <?php if (!empty($page['navigation'])): ?>
            <div class="nav">
              <div class="l"></div>
              <div class="r"></div>
	       <?php print render($page['navigation']); ?>
            </div>
          <?php endif; ?>
          <div class="cleared"></div>
          <div class="contentLayout">
            <?php if (!empty($page['sidebar_first'])): ?>
	      <div id="sidebar-left" class="sidebar">
	        <?php print render($page['sidebar_first']) ?>
	      </div>
            <?php endif; ?>
            <div id="main">
              <div class="Post">
                <div class="Post-body">
                  <div class="Post-inner">
                    <div class="PostContent">
                      <?php if ($is_front): ?>
                        <div id="featured"></div>
                      <?php endif; ?>
                      <?php if (!empty($banner1)) print $banner1; ?>
                      <?php if (!$is_front) print $breadcrumb; ?>
                      <?php if (!empty($tabs)) print render($tabs) . '<div class="cleared"></div>'; ?>
		      <?php print render($title_prefix); ?>
		      <?php if ($title): ?>
                        <h1<?php print $tabs ? ' class="with-tabs"' : '' ?>><?php print $title ?></h1>
		      <?php endif; ?>
		      <?php print render($title_suffix); ?>
                      <?php if (!empty($page['help'])) print render($page['help']); ?>
                      <?php if (!empty($messages)) print $messages; ?>
                     <?php print render($page['content']); ?>
		     <?php if (!empty($page['content_bottom'])) print render($page['content_bottom']); ?>
                    </div>
                    <div class="cleared"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="cleared"></div>
          <div class="Footer">
            <div class="Footer-inner">
              <a href="<?php echo $base_path; ?>rss.xml" class="rss-tag-icon" title="RSS"></a>
              <div class="Footer-text">
       <?php if (!empty($page['copyright']))print render($page['copyright']); ?>
              </div>
            </div>
            <div class="Footer-background"></div>
          </div>
        </div>
      </div>
      <div class="cleared"></div>
       <p class="page-footer"><?php print render($page['footer_message']); ?> Theme developed by <a href="http://agileware.net">Agileware Pty Ltd</a></p>
    </div>