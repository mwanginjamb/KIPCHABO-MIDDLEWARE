<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace backend\models;
use yii\base\Model;


class Leafcollection extends Model
{

public $Key;
public $No;
public $Posting_Date;
public $Shade_No;
public $Shade_Name;
public $Farmer_No;
public $Farmer_Name;
public $Clerk_Name;
public $Net_Kg;
public $Gross_Kgs;
public $Created_By;

    public function rules()
    {
        return [
            [],
        ];
    }

    public function attributeLabels()
    {
        return [

        ];
    }
}