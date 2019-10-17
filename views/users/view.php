<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

    <h1><?= Html::encode($this->title . " " . $model->surname) ?></h1>

      <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Добавить адрес', ['address/create', 'user_id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить этого пользователя?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'login',
            'password',
            'name',
            'surname',
            'gender',
            'date',
            'email:email',
            'index',
            'country',
            'city',
            'street',
            'house',
            'apartment',
        ],
    ]) ?>

    
</div>
    
<?php  

if ($model2) {

for($i = 0; $i < count($model2); $i++) {    
?>
<div class="address-view">
<h4> <?= Html::encode($this->title) ?> - дополнительный адрес пользователя </h4>
<p>
        <?= Html::a('Обновить', ['address/update', 'id' => $model2[$i]->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['address/delete', 'id' => $model2[$i]->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить этот адрес?',
                'method' => 'post',
            ],
        ]) ;
?>
      
</p>

<?= DetailView::widget([
        'model' => $model2[$i],
        'attributes' => [
            //'id',
            'index',
            'country',
            'city',
            'street',
            'house',
            'apartment',
            //'user_id',
        ],
    ]) ;
    }
}
?>
</div>
    
<?= LinkPager::widget(['pagination' => $pages,]); ?>

