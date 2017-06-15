<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "property".
 *
 * @property integer $id
 * @property string $residence_status
 * @property integer $view_id
 * @property string $geographical_pos
 * @property string $proeperty_age
 * @property string $descriptions
 * @property integer $cabinet_id
 * @property integer $floor_covering_id
 * @property integer $user_id
 * @property integer $region_id
 * @property integer $city_id
 * @property integer $property_type_id
 * @property integer $dealing_type_id
 * @property integer $document_type_id
 * @property string $address
 * @property integer $phone_number1
 * @property integer $phone_number2
 * @property integer $mobile_number
 * @property integer $area_size
 * @property integer $number_of_rooms
 * @property integer $floor_num
 * @property integer $number_of_floors
 * @property integer $number_of_units_in_floor
 * @property integer $number_of_units
 * @property integer $price_per_meter_rent
 * @property integer $total_price
 * @property integer $number_of_parkings
 * @property string $facilities_id
 * @property integer $total_area
 * @property string $toilet_type
 * @property integer $telephone_line_count
 * @property integer $vila_type_id
 * @property integer $front_area
 * @property integer $alley_width
 * @property string $owner_name
 * @property string $activities_product
 * @property string $building_sell
 * @property integer $height
 * @property integer $revisory
 * @property integer $balcony_area
 * @property integer $has_store
 * @property string $water
 * @property string $electric
 * @property string $gas
 * @property string $equipment
 * @property string $pic
 * @property integer $created_at
 * @property integer $status
 *
 * @property Inbox[] $inboxes
 * @property PropertyView $view
 * @property VilaType $vilaType
 * @property User $user
 * @property Cabinet $cabinet
 * @property City $city
 * @property FloorCovering $floorCovering
 * @property Region $region
 * @property PropertyType $propertyType
 * @property DealingType $dealingType
 * @property DocumentType $documentType
 */
class Property extends \yii\db\ActiveRecord
{
    public $province_id;
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                'value' => function() { return date('U'); },
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['view_id', 'cabinet_id', 'floor_covering_id', 'user_id', 'region_id', 'city_id', 'property_type_id', 'dealing_type_id', 'document_type_id', 'phone_number1', 'phone_number2', 'mobile_number', 'area_size', 'floor_num', 'number_of_floors', 'number_of_units_in_floor', 'number_of_units', 'price_per_meter_rent', 'total_price', 'total_area', 'vila_type_id', 'front_area', 'alley_width', 'height', 'revisory', 'balcony_area', 'has_store', 'created_at', 'status'], 'integer'],
            [['number_of_rooms', 'number_of_parkings', 'telephone_line_count'], 'string', 'max' => 2],
            [['descriptions', 'address'], 'string'],
            [['region_id', 'city_id', 'property_type_id', 'dealing_type_id', 'document_type_id', 'address', 'phone_number1', 'area_size', 'number_of_rooms', 'price_per_meter_rent', 'total_price', 'owner_name', 'province_id'], 'required'],
            [['residence_status', 'geographical_pos'], 'string', 'max' => 55],
            [['proeperty_age', 'activities_product', 'building_sell', 'water', 'electric', 'gas', 'equipment'], 'string', 'max' => 100],
            // [['facilities_id'], 'string', 'max' => 255],
            [['toilet_type'], 'string', 'max' => 50],
            [['owner_name'], 'string', 'max' => 75],
            [['view_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyView::className(), 'targetAttribute' => ['view_id' => 'id']],
            [['vila_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => VilaType::className(), 'targetAttribute' => ['vila_type_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['cabinet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cabinet::className(), 'targetAttribute' => ['cabinet_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['floor_covering_id'], 'exist', 'skipOnError' => true, 'targetClass' => FloorCovering::className(), 'targetAttribute' => ['floor_covering_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['property_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyType::className(), 'targetAttribute' => ['property_type_id' => 'id']],
            [['dealing_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => DealingType::className(), 'targetAttribute' => ['dealing_type_id' => 'id']],
            [['document_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => DocumentType::className(), 'targetAttribute' => ['document_type_id' => 'id']],


        ];
    }

    /**
     * @inheritdoc
     */

     public function attributeLabels()
     {
         return [
             'id' => Yii::t('app', 'کد ملک'),
             'residence_status' => Yii::t('app', 'وضعیت سکونت'),
             'view_id' => Yii::t('app', 'نما'),
             'geographical_pos' => Yii::t('app', 'موقعیت جغرافیایی'),
             'proeperty_age' => Yii::t('app', 'سن بنا'),
             'descriptions' => Yii::t('app', 'توضیحات'),
             'cabinet_id' => Yii::t('app', 'کابینت'),
             'floor_covering_id' => Yii::t('app', 'کف پوش'),
             'user_id' => Yii::t('app', 'کاربر'),
             'region_id' => Yii::t('app', 'منطقه'),
             'city_id' => Yii::t('app', 'شهر'),
             'property_type_id' => Yii::t('app', 'نوع ملک'),
             'dealing_type_id' => Yii::t('app', 'نوع قرارداد'),
             'document_type_id' => Yii::t('app', 'نوع سند'),
             'address' => Yii::t('app', 'آدرس'),
             'phone_number1' => Yii::t('app', 'Phone Number1'),
             'phone_number2' => Yii::t('app', 'Phone Number2'),
             'mobile_number' => Yii::t('app', 'Mobile Number'),
             'area_size' => Yii::t('app', 'متراژ'),
             'number_of_rooms' => Yii::t('app', 'تعداد اتاق'),
             'floor_num' => Yii::t('app', 'طبقه'),
             'number_of_floors' => Yii::t('app', 'تعداد طبقات'),
             'number_of_units_in_floor' => Yii::t('app', 'تعداد واحد در طبقه'),
             'number_of_units' => Yii::t('app', 'جمع واحد ها'),
             'price_per_meter_rent' => Yii::t('app', 'قیمت متری / اجاره'),
             'total_price' => Yii::t('app', 'قیمت کل / ودیعه'),
             'number_of_parkings' => Yii::t('app', 'تعداد پارکینگ'),
             'facilities_id' => Yii::t('app', 'امکانات'),
             'total_area' => Yii::t('app', 'مساحت / مساحت زمین'),
             'toilet_type' => Yii::t('app', 'سرویس بهداشتی'),
             'telephone_line_count' => Yii::t('app', 'Telephone Line Count'),
             'vila_type_id' => Yii::t('app', 'Vila Type ID'),
             'front_area' => Yii::t('app', 'Front Area'),
             'alley_width' => Yii::t('app', 'Alley Width'),
             'owner_name' => Yii::t('app', 'Owner Name'),
             'activities_product' => Yii::t('app', 'Activities Product'),
             'building_sell' => Yii::t('app', 'Building Sell'),
             'height' => Yii::t('app', 'Height'),
             'revisory' => Yii::t('app', 'Revisory'),
             'balcony_area' => Yii::t('app', 'Balcony Area'),
             'has_store' => Yii::t('app', 'Has Store'),
             'water' => Yii::t('app', 'Water'),
             'electric' => Yii::t('app', 'Electric'),
             'gas' => Yii::t('app', 'Gas'),
             'equipment' => Yii::t('app', 'Equipment'),
             'pic' => Yii::t('app', 'Pic'),
             'created_at' => Yii::t('app', 'تاریخ ثبت'),
             'status' => Yii::t('app', 'وضعیت'),
             'property_location' => Yii::t('app', 'موقعیت ملک'),
         ];
     }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInboxes()
    {
        return $this->hasMany(Inbox::className(), ['property_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getView()
    {
        return $this->hasOne(PropertyView::className(), ['id' => 'view_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVilaType()
    {
        return $this->hasOne(VilaType::className(), ['id' => 'vila_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabinet()
    {
        return $this->hasOne(Cabinet::className(), ['id' => 'cabinet_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFloorCovering()
    {
        return $this->hasOne(FloorCovering::className(), ['id' => 'floor_covering_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyType()
    {
        return $this->hasOne(PropertyType::className(), ['id' => 'property_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDealingType()
    {
        return $this->hasOne(DealingType::className(), ['id' => 'dealing_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentType()
    {
        return $this->hasOne(DocumentType::className(), ['id' => 'document_type_id']);
    }

}