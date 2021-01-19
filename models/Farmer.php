<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace backend\models;
use yii\base\Model;


class Farmer extends Model
{

public $Key;
public $No;
public $Name;
public $Address;
public $City;
public $Phone_No;
public $E_Mail;
public $Preferred_Bank_Account_Code;
public $Registration_Date;
public $Total_acreage;
public $National_ID_No;
public $Huduma_Number;
public $Zone_Code;
public $Zone_Name;
public $Route_code;
public $Route_Name;
public $Buying_Center_Code;
public $Buying_Centre_Name;
public $PIN_No;
public $Land_Rgistration;
public $Inspection_Date;
public $Type_Of_Tea_Planted;
public $GPS_Coordinates;
public $PHOTO;
public $IDFRONT;
public $IDBACK;

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