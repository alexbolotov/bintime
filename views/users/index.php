<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= \yii\widgets\LinkPager::widget(['pagination'=>$dataProvider->pagination,]); ?>

<div class="users-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'login',
            //'password',
            'name',
            'surname',
            //'gender',
            //'date',
            //'email:email',
            //'index',
            'country',
            'city',
            //'street',
            //'house',
            //'apartment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
