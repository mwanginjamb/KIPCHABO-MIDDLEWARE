<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace backend\models;
use yii\base\Model;


class Requisitionline extends Model
{

public $Key;
public $Document_No;
public $Line_No;
public $Item_No;
public $Variant_Code;
public $Planning_Flexibility;
public $Description;
public $Unit;
public $Unit_Weight;
public $Pieces;
public $Transfer_from_Bin_Code;
public $Transfer_To_Bin_Code;
public $Quantity;
public $Reserved_Quantity_Inbnd;
public $Reserved_Quantity_Shipped;
public $Reserved_Quantity_Outbnd;
public $Unit_of_Measure_Code;
public $Unit_of_Measure;
public $Qty_to_Ship;
public $Quantity_Shipped;
public $Qty_to_Receive;
public $Quantity_Received;
public $Shipment_Date;
public $Receipt_Date;
public $Shipping_Agent_Code;
public $Shipping_Agent_Service_Code;
public $Shipping_Time;
public $Outbound_Whse_Handling_Time;
public $Inbound_Whse_Handling_Time;
public $Appl_to_Item_Entry;
public $Shortcut_Dimension_1_Code;
public $Shortcut_Dimension_2_Code;
public $ShortcutDimCode_x005B_3_x005D_;
public $ShortcutDimCode_x005B_4_x005D_;
public $ShortcutDimCode_x005B_5_x005D_;
public $ShortcutDimCode_x005B_6_x005D_;
public $ShortcutDimCode_x005B_7_x005D_;
public $ShortcutDimCode_x005B_8_x005D_;

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