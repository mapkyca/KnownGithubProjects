<?php
    if (\Idno\Core\site()->currentPage()->isPermalink()) {
        $rel = 'rel="in-reply-to" class="u-in-reply-to"';
    } else {
        $rel = '';
    }
    if (!empty($vars['object']->tags)) {
        $vars['object']->body .= '<p class="tag-row"><i class="icon-tag"></i>' . $vars['object']->tags . '</p>';
    }
?>
<div>
    <?php
        if (\Idno\Core\site()->template()->getTemplateType() == 'default') {
            ?>
            <h2 class="p-name"><a
                    href="<?= $vars['object']->getURL() ?>"><?= htmlentities(strip_tags($vars['object']->getTitle()), ENT_QUOTES, 'UTF-8'); ?></a>
            </h2>
        <?php

        }

    ?>
    
    <?php echo $this->autop($this->parseURLs($this->parseHashtags($vars['object']->body),$rel)); //TODO: a better rendering algorithm ?>
    
    <?php
    if (\Idno\Core\site()->currentPage()->isPermalink()) {
	?>
	
    <?php
    if ($vars['object']->project) {
	
	?>
    <p>
	<span><i class="icon-github"> </i> <a href="<?= htmlentities(strip_tags($vars['object']->project), ENT_QUOTES, 'UTF-8'); ?>"><?= htmlentities(strip_tags($vars['object']->project), ENT_QUOTES, 'UTF-8'); ?></a></span>
    </p>
    <?php
    }
    ?>
    <?php
    if ($vars['object']->website) {
	
	?>
    <p>
	<span><i class="icon-link"> </i> <a href="<?= htmlentities(strip_tags($vars['object']->website), ENT_QUOTES, 'UTF-8'); ?>"><?= htmlentities(strip_tags($vars['object']->website), ENT_QUOTES, 'UTF-8'); ?></a></span>
    </p>
    <?php
    }
    ?>
    
    <?php
    if (($vars['object']->webhook_code) && ($vars['object']->getOwnerID() == \Idno\Core\site()->session()->currentUserUUID())) {
	
	$hook_url = $vars['object']->getUrl() . "/" . $vars['object']->webhook_code;
	?>
    <hr />
    <p>Your github webhook endpoint to post updates to this project is:
	<span><i class="icon-link"> </i> <a href="<?= htmlentities(strip_tags($hook_url), ENT_QUOTES, 'UTF-8'); ?>"><?= htmlentities(strip_tags($hook_url), ENT_QUOTES, 'UTF-8'); ?></a></span>
    </p>
    <?php
    }
    ?>
    
	<?php
    }
    ?>
</div>