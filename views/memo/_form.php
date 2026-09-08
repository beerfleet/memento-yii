<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Type;


/** @var yii\web\View $this */
/** @var app\models\Memo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="memo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'type')->dropDownList(
        Type::find()
            ->select(['name', 'id'])
            ->indexBy('id')
            ->column(),
        ['prompt' => 'Select a type']
    ) ?>

    <div class="form-group mt-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>