<div class="post">
	<div class="title">
		<?php echo CHtml::link(CHtml::encode($data->moduleName)); ?>
	</div>
	<div class="content">
		<?php
			$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
			echo $data->moduleDesc;
			$this->endWidget();
		?>
	</div>
</div>
