<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'type'=> 'horizontal', // TbActiveForm::TYPE_HORIZONTAL,
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
    //'focus'=>array(\$model,''),
	 'htmlOptions' => array(
                    // 'class' => ' form-horizontal'
                    'class'=>'well',
                    ),
     'clientOptions' => array(
                    'validateOnSubmit'=>true
                    ),

)); ?>\n"; ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

 <fieldset>

     <legend>Legend</legend>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<?php echo "<?php echo ".$this->generateActiveRow($this->modelClass,$column)."; ?>\n"; ?>

<?php
}
?>
	<div class="form-actions">
		<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>\$model->isNewRecord ? 'Create' : 'Save',
		)); ?>\n"; ?>
	</div>

     </fieldset>
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
