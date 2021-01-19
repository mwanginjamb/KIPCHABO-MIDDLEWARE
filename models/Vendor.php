<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Vendor".
 *
 * @property int $id
 *
 */
class Vendor extends \yii\db\ActiveRecord
{
   

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return Yii::$app->params['DBCompanyName'].'Vendor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
           
        ];
    }

  
}
