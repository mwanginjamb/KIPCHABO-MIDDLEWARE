<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace backend\models;
use yii\base\Model;


class Requisition extends Model
{

public $Key;
public $No;
public $Transfer_from_Code;
public $Transfer_to_Code;
public $In_Transit_Code;
public $Posting_Date;
public $voucher_No;
public $Shortcut_Dimension_1_Code;
public $Shortcut_Dimension_2_Code;
public $Assigned_User_ID;
public $Status;
public $Transfer_from_Name;
public $Transfer_from_Name_2;
public $Transfer_from_Contact;
public $Shipment_Date;
public $Outbound_Whse_Handling_Time;
public $Shipment_Method_Code;
public $Shipping_Agent_Code;
public $Shipping_Agent_Service_Code;
public $Shipping_Time;
public $Shipping_Advice;
public $Transfer_to_Name;
public $Transfer_to_Name_2;
public $Transfer_to_Contact;
public $Receipt_Date;
public $Inbound_Whse_Handling_Time;

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