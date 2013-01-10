<?php // $Id $ ?>
<?php if($block->region == 'sidebar_first') {?>
<div class="Block">
  <div class="Block-tl"></div>
  <div class="Block-tr"></div>
  <div class="Block-bl"></div>
  <div class="Block-br"></div>
  <div class="Block-tc"></div>
  <div class="Block-bc"></div>
  <div class="Block-cl"></div>
  <div class="Block-cr"></div>
  <div class="Block-cc"></div>
  <div class="Block-body">
    <?php if ($block->subject): ?>
      <div class="BlockHeader">
	 <div class="l"></div>
	 <div class="r"></div>
	 <div class="header-tag-icon">
	 <div class="t">
	 <?php echo $block->subject; ?>
      </div>
        </div>
	  </div>
	  <?php endif; ?>
	  <div class="BlockContent">
	     <div class="BlockContent-body">
	     <?php echo $content; ?>
	     </div>
		 </div>
		 </div>
</div>
		 <?php } else {?>
    <div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="block block-<?php print $block->module ?><?php print (!empty($block->subject) ? ' block-title' : '') ?><?php print ($zebra ? ' block-'.$zebra : '') ?>">  
      <div class="blockinner">
      <?php if (!empty($block->subject)): ?><h2 class="title"><?php print $block->subject; ?></h2><?php endif; ?>
        <div class="content">
	<?php print $content; ?>
    </div>    
	</div>
	</div>
	<?php }?>