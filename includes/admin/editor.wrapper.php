<?php if($this->canEdit()){ ?>
<div class="editor-main-wrapper">
	<div class="editor-main-button text-right">
		<a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editorModal"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
	</div>
	<div class="editor-main-content">
<?php } ?>
		<?php echo $this->getContent($this->mui->views); ?>
<?php if($this->canEdit()){ ?>
	</div>
</div>
<?php } ?>