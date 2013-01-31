<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'moduleName'); ?>
		<?php echo $form->textField($model,'moduleName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'moduleName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'moduleDesc'); ?>
		<?php echo CHtml::activeTextArea($model,'moduleDesc',array('rows'=>8, 'cols'=>60)); ?>
		<?php echo $form->error($model,'moduleDesc'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'moduleConfig'); ?>
		<?php echo CHtml::activeTextArea($model,'moduleConfig',array('rows'=>8, 'cols'=>60,'value'=>'array(
"maintain"=>"",//the url to redirect when the module is on maintaining
"stopService"=>""//the url to redirect when the module is stopService
)')); ?>
		<p class="hint">You may use as PHP array().</p>
		<?php echo $form->error($model,'moduleConfig'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'moduleStatus'); ?>
		<?php echo $form->dropDownList($model,'moduleStatus',array('0'=>'unservice','1'=>'use','2'=>'maintain')); ?>
		<?php echo $form->error($model,'moduleStatus'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->