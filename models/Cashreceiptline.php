<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace backend\models;
use yii\base\Model;


class Cashreceiptline extends Model
{

public $Key;
public $Customer_No;
public $Customer_Name;
public $Invoice_No;
public $External_Document_No;
public $Amount;
public $Amount_To_Receipt;
public $Amount_WthHold;
public $Remaining_Amount;
public $Select;
public $Description;
public $Tax_WithHold;
public $V_A_T_Percent;
public $Reference_No;

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