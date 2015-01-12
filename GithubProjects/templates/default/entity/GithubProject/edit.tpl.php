<?= $this->draw('entity/edit/header'); ?>
<form action="<?= $vars['object']->getURL() ?>" method="post" enctype="multipart/form-data">

    <div class="row">

	<div class="span8 offset2 edit-pane">

	    <h4>
		<?php
		if (empty($vars['object']->_id)) {
		    ?>New Project<?php
		} else {
		    ?>Edit Project<?php
		}
		?>
	    </h4>

	    <p>
		<label>
		    Name<br/>
		    <input type="text" name="title" id="title"
			   value="<?= htmlspecialchars($vars['object']->title) ?>" class="span8"
			   placeholder="Project title" required />
		</label>
	    </p>

	    <p style="text-align: right">
		<small>
		    <a href="#" onclick="$('.wysiwyg').destroy();
			    $('#plainTextSwitch').hide();
			    $('#richTextSwitch').show();
			    return false;" id="plainTextSwitch">Switch to plain text editor</a>
		    <a href="#" onclick="makeRichText('.wysiwyg');
			    $('#plainTextSwitch').show();
			    $('#richTextSwitch').hide();
			    return false;" id="richTextSwitch" style="display:none">Switch to rich text editor</a>
		</small>
	    </p>

	    <p>
		<label>
		    <textarea name="body"  placeholder="Describe your project" required
			      class="span8 bodyInput mentionable wysiwyg" id="body"><?= (htmlspecialchars($this->autop($vars['object']->body))) ?></textarea>
		</label>
	    </p>

	    <p>
		<label>
		    Github project<br/>
		    <input type="url" name="project" id="project" placeholder="Enter your project's Github name"
			   value="<?= htmlspecialchars($vars['object']->project) ?>" class="span8" required />
		</label>
	    </p>



	    <p>
		<label>
		    Website<br/>
		    <input type="url" name="website" id="website"
			   value="<?= htmlspecialchars($vars['object']->website) ?>" class="span8"
			   placeholder="Project website / blog post about it" />
		</label>
	    </p>



	    <p class="button-bar ">
		<?= \Idno\Core\site()->actions()->signForm('/githubprojects/edit') ?>
		<input type="button" class="btn btn-cancel" value="Cancel" onclick="hideContentCreateForm();"/>
		<input type="submit" class="btn btn-primary" value="Publish"/>
		<?= $this->draw('content/access'); ?>
	    </p>
	</div>
    </div>
</form>
<?= $this->draw('entity/edit/footer'); ?>