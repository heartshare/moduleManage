<?php
$this->breadcrumbs=array(
	'Update',
);
?>

<h1>Update <i><?php echo CHtml::encode($model->moduleName); ?></i></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>