<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Admin secret page';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $photos,
        'columns' => [
            'id',
            [
                'format' => 'raw',
                'label' => 'photo_id',
                'value' => function ($model) {
                    return Html::a($model->photo_id, "https://picsum.photos/id/$model->photo_id/500/500");
                }
            ],
            'decision',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{cancel}',
                'buttons' => [
                    'cancel' => function ($url, $model, $key) {
                        return Html::a('Cancel', 'cancel?xyz123&photo_id=' . $model->photo_id);
                    }
                ]
            ],
        ],
    ]);
    ?>
</div>
