<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Properties');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Property'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'property_location',
                'format' => 'raw',
                'value' => function ($model) {
                        return $model->city->province->name.' - '.$model->city->name.' - '.$model->region->name.' - '.$model->address ;
                },
            ],
            // 'residence_status',
            // 'view_id',
            // 'geographical_pos',
            // 'proeperty_age',
            // 'descriptions:ntext',
            // 'cabinet_id',
            // 'bathrooms',
            // 'floor_covering_id',
            // 'user_id',
            // 'region_id',
            // 'city_id',
            [
                'attribute'=>'property_type_id',
                'value'=>'propertyType.name',
                //'contentOptions'=>['style'=>'width: 120px;']
            ],
            [
                'attribute'=>'dealing_type_id',
                'value'=>'dealingType.name',
                //'contentOptions'=>['style'=>'width: 120px;']
            ],
            // 'document_type_id',
            // 'address:ntext',
            // 'area_size',
            // 'number_of_rooms',
            // 'floor_num',
            // 'number_of_floors',
            // 'number_of_units_in_floor',
            // 'number_of_units',
            // 'price_per_meter_rent',
            // 'total_price',
            // 'number_of_parkings',
            // 'facilities_id',
            // 'total_area',
            // 'toilet_type',
            // 'telephone_line_count',
            // 'parking_count',
            // 'vila_type_id',
            // 'front_area',
            // 'alley_width',
            // 'owner_name',
            // 'activities_product',
            // 'building_sell',
            // 'height',
            // 'revisory',
            // 'balcony_area',
            // 'has_store',
            // 'water',
            // 'electric',
            // 'gas',
            // 'equipment',
            // 'pic:ntext',
            'created_at:date',
            'status:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
