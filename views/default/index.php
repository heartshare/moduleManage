<?php
$this->breadcrumbs=array(
	'Manage Moduels',
);
?>
<h1>Manage Moduels</h1>
<a href="<?php echo $this->createUrl('create')?>">Create Module</a>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'moduleName',
		),
		array(
			'name'=>'moduleDesc',
		),
		array(
			'name'=>'moduleStatus'
		),
		array(
				'name'=>'moduleConfig'
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}&nbsp;&nbsp;{update}'
		),
	),
)); ?>
