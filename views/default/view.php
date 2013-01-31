<?php
$this->breadcrumbs=array(
	$model->moduleName,
);
$this->pageTitle=$model->moduleName;
?>

<?php $this->renderPartial('_view', array(
	'data'=>$model,
)); ?>
