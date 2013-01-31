<?php

/**
 * This is the model class for table "module_manage".
 *
 * The followings are the available columns in table 'module_manage':
 * @property string $moduleId
 * @property string $moduleName
 * @property string $moduleDesc
 * @property integer $moduleStatus
 */
class ModuleManage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ModuleManage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'module_manage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('moduleName','required'),
			array('moduleStatus', 'numerical', 'integerOnly'=>true),
			array('moduleName,moduleConfig moduleDesc', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('moduleId, moduleName, moduleDesc, moduleStatus', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'moduleId' => 'Module',
			'moduleName' => 'Module Name',
			'moduleDesc' => 'Module Desc',
			'moduleStatus' => 'Module Status',
			'moduleConfig' => 'Module Config'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('moduleId',$this->moduleId,true);
		$criteria->compare('moduleName',$this->moduleName,true);
		$criteria->compare('moduleDesc',$this->moduleDesc,true);
		$criteria->compare('moduleStatus',$this->moduleStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function setStatus(){
		$modules = @include(Yii::app()->getModule('moduleManage')->moduleConfigFile);
		$config = create_function('','return '.$this->moduleConfig.';');
		if(!$modules) throwException('500','could not open ther modules config file');
		
		$modules[$this->moduleName]['params'] =$config();
		$modules[$this->moduleName]['params']['status'] = $this->moduleStatus;
		$newModules = '<?php return '.var_export($modules,TRUE).';';
		file_put_contents(Yii::app()->getModule('moduleManage')->moduleConfigFile, $newModules);
	}
}