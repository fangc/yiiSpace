<?php

/**
* This is the model base class for the table "group_member".
* DO NOT MODIFY THIS FILE! It is automatically generated by giix.
* If any changes are necessary, you must set or override the required
* property or method in class "GroupMember".
*
* Columns in table "group_member" available as properties of the model,
* and there are no model relations.
*
* @property integer $id
* @property integer $group_id
* @property integer $user_id
* @property integer $approved
* @property integer $requested
* @property integer $invited
* @property integer $requested_time
* @property integer $invited_time
* @property integer $join_time
* @property integer $inviter_id
*
*/
abstract class BaseGroupMember extends YsActiveRecord {

public static function model($className=__CLASS__) {
return parent::model($className);
}

public function tableName() {
return 'group_member';
}

public static function representingColumn() {
return 'id';
}

public function rules() {
return array(
array('group_id, user_id, requested_time, invited_time, join_time, inviter_id', 'required'),
array('group_id, user_id, approved, requested, invited, requested_time, invited_time, join_time, inviter_id', 'numerical', 'integerOnly'=>true),
array('approved, requested, invited', 'default', 'setOnEmpty' => true, 'value' => null),
array('id, group_id, user_id, approved, requested, invited, requested_time, invited_time, join_time, inviter_id', 'safe', 'on'=>'search'),
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
'id' => Yii::t('group_member', 'id'),
'group_id' => Yii::t('group_member', 'group_id'),
'user_id' => Yii::t('group_member', 'user_id'),
'approved' => Yii::t('group_member', 'approved'),
'requested' => Yii::t('group_member', 'requested'),
'invited' => Yii::t('group_member', 'invited'),
'requested_time' => Yii::t('group_member', 'requested_time'),
'invited_time' => Yii::t('group_member', 'invited_time'),
'join_time' => Yii::t('group_member', 'join_time'),
'inviter_id' => Yii::t('group_member', 'inviter_id'),
);
}

public function search() {
$criteria = new CDbCriteria;

$criteria->compare('id', $this->id);
$criteria->compare('group_id', $this->group_id);
$criteria->compare('user_id', $this->user_id);
$criteria->compare('approved', $this->approved);
$criteria->compare('requested', $this->requested);
$criteria->compare('invited', $this->invited);
$criteria->compare('requested_time', $this->requested_time);
$criteria->compare('invited_time', $this->invited_time);
$criteria->compare('join_time', $this->join_time);
$criteria->compare('inviter_id', $this->inviter_id);

return new CActiveDataProvider($this, array(
'criteria' => $criteria,
));
}
}