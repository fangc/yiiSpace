<?php

/**
* This is the model base class for the table "sys_friend_link".
* DO NOT MODIFY THIS FILE! It is automatically generated by giix.
* If any changes are necessary, you must set or override the required
* property or method in class "SysFriendLink".
*
* Columns in table "sys_friend_link" available as properties of the model,
* and there are no model relations.
*
* @property string $id
* @property string $name
* @property string $logo
* @property string $url
* @property integer $order
* @property integer $enable
*
*/
abstract class BaseSysFriendLink extends GxActiveRecord {

public static function model($className=__CLASS__) {
return parent::model($className);
}

public function tableName() {
return 'sys_friend_link';
}

public static function representingColumn() {
return 'name';
}

public function rules() {
return array(
array('name, url', 'required'),
array('order, enable', 'numerical', 'integerOnly'=>true),
array('name, logo, url', 'length', 'max'=>255),
array('logo, order, enable', 'default', 'setOnEmpty' => true, 'value' => null),
array('id, name, logo, url, order, enable', 'safe', 'on'=>'search'),
);
}

public function relations() {
return array(
);
}

public function pivotModels() {
return array(
);
}

public function attributeLabels() {
return array(
'id' => Yii::t('sys_friend_link', 'id'),
'name' => Yii::t('sys_friend_link', 'name'),
'logo' => Yii::t('sys_friend_link', 'logo'),
'url' => Yii::t('sys_friend_link', 'url'),
'order' => Yii::t('sys_friend_link', 'order'),
'enable' => Yii::t('sys_friend_link', 'enable'),
);
}

public function search() {
$criteria = new CDbCriteria;

$criteria->compare('id', $this->id, true);
$criteria->compare('name', $this->name, true);
$criteria->compare('logo', $this->logo, true);
$criteria->compare('url', $this->url, true);
$criteria->compare('order', $this->order);
$criteria->compare('enable', $this->enable);

return new CActiveDataProvider($this, array(
'criteria' => $criteria,
));
}
}