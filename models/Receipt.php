<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace backend\models;
use yii\base\Model;


class Receipt extends Model
{

public $Key;
public $Receipt_No;
public $Posting_Date;
public $Receive_From_Customer_No;
public $Customer_Name;
public $Receiving_Bank_Account_No;
public $Bank_Account_Name;
public $Amount_To_Receive;
public $Start_Date;
public $End_Date;
public $Total_Balance;
public $Total_Amount;
public $Created_By;
public $Created_On;

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