<?php

class DefaultController extends Controller
{
	private $_model;
	
	public function actionIndex()
	{
		$model = new ModuleManage('search');
		$model->unsetAttributes();
		if(isset($_GET['ModuleManage'])){
			$model->attributes = $_GET['ModuleManage'];
		}
		$this->render('index',array('model'=>$model));
	}
	
	public function actionView()
	{
		$module=$this->loadModel();
		
		$this->render('view',array(
				'model'=>$module,
		));
	}
	
	public function actionUpdate(){
		
		$model=$this->loadModel();
		if(isset($_POST['ModuleManage']))
		{
			$model->attributes=$_POST['ModuleManage'];
			if($model->save()){
				$model->setStatus();//modify the status for modules
				$this->redirect(array('view','id'=>$model->moduleId));
			}
		}
		
		$this->render('update',array(
				'model'=>$model,
		));
	}

	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=ModuleManage::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ModuleManage();

		if(isset($_POST['ModuleManage']))
		{
			$model->attributes=$_POST['ModuleManage'];
			if($model->save()){
				$model->setStatus();//modify the status for modules
				$this->redirect(array('view','id'=>$model->moduleId));
			}
		}
	
		$this->render('create',array(
			'model'=>$model,
		));
	}
}