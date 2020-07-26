<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace backend\models;
use yii\base\Model;


class Salesinvoice extends Model
{

    public $Key;
    public $No;
    public $Sell_to_Customer_Name;
    public $Sell_to_Address;
    public $Sell_to_Address_2;
    public $Sell_to_Post_Code;
    public $Sell_to_City;
    public $Sell_to_Contact_No;
    public $Sell_to_Contact;
    public $Your_Reference;
    public $Document_Date;
    public $Posting_Date;
    public $Due_Date;
    public $Incoming_Document_Entry_No;
    public $External_Document_No;
    public $Salesperson_Code;
    public $Campaign_No;
    public $Responsibility_Center;
    public $Assigned_User_ID;
    public $Status;
    public $Job_Queue_Status;
    public $WorkDescription;
    public $Currency_Code;
    public $Shipment_Date;
    public $Quote_No;
    public $Prices_Including_VAT;
    public $VAT_Bus_Posting_Group;
    public $Payment_Terms_Code;
    public $Payment_Method_Code;
    public $SelectedPayments;
    public $Transaction_Type;
    public $Shortcut_Dimension_1_Code;
    public $Shortcut_Dimension_2_Code;
    public $Payment_Discount_Percent;
    public $Pmt_Discount_Date;
    public $Direct_Debit_Mandate_ID;
    public $Location_Code;
    public $ShippingOptions;
    public $Ship_to_Code;
    public $Ship_to_Name;
    public $Ship_to_Address;
    public $Ship_to_Address_2;
    public $Ship_to_Post_Code;
    public $Ship_to_City;
    public $Ship_to_Country_Region_Code;
    public $Ship_to_Contact;
    public $Shipment_Method_Code;
    public $Shipping_Agent_Code;
    public $Shipping_Agent_Service_Code;
    public $Package_Tracking_No;
    public $BillToOptions;
    public $Bill_to_Name;
    public $Bill_to_Address;
    public $Bill_to_Address_2;
    public $Bill_to_Post_Code;
    public $Bill_to_City;
    public $Bill_to_Contact_No;
    public $Bill_to_Contact;
    public $EU_3_Party_Trade;
    public $Transaction_Specification;
    public $Transport_Method;
    public $Exit_Point;
    public $Area;

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