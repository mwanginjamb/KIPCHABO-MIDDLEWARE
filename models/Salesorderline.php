<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace backend\models;
use yii\base\Model;


class SalesOrderLine extends Model
{

public $Key;
public $Type;
public $No;
public $Cross_Reference_No;
public $IC_Partner_Code;
public $IC_Partner_Ref_Type;
public $IC_Partner_Reference;
public $Variant_Code;
public $Substitution_Available;
public $Purchasing_Code;
public $Nonstock;
public $VAT_Prod_Posting_Group;
public $Description;
public $Drop_Shipment;
public $Special_Order;
public $Return_Reason_Code;
public $Location_Code;
public $Bin_Code;
public $Reserve;
public $Quantity;
public $Qty_to_Assemble_to_Order;
public $Reserved_Quantity;
public $Unit_of_Measure_Code;
public $Unit_of_Measure;
public $Unit_Cost_LCY;
public $SalesPriceExist;
public $Unit_Price;
public $Line_Amount;
public $SalesLineDiscExists;
public $Line_Discount_Percent;
public $Line_Discount_Amount;
public $Prepayment_Percent;
public $Prepmt_Line_Amount;
public $Prepmt_Amt_Inv;
public $Allow_Invoice_Disc;
public $Inv_Discount_Amount;
public $Qty_to_Ship;
public $Quantity_Shipped;
public $Qty_to_Invoice;
public $Quantity_Invoiced;
public $Prepmt_Amt_to_Deduct;
public $Prepmt_Amt_Deducted;
public $Allow_Item_Charge_Assignment;
public $Qty_to_Assign;
public $Qty_Assigned;
public $Requested_Delivery_Date;
public $Promised_Delivery_Date;
public $Planned_Delivery_Date;
public $Planned_Shipment_Date;
public $Shipment_Date;
public $Shipping_Agent_Code;
public $Shipping_Agent_Service_Code;
public $Shipping_Time;
public $Work_Type_Code;
public $Whse_Outstanding_Qty;
public $Whse_Outstanding_Qty_Base;
public $ATO_Whse_Outstanding_Qty;
public $ATO_Whse_Outstd_Qty_Base;
public $Outbound_Whse_Handling_Time;
public $Blanket_Order_No;
public $Blanket_Order_Line_No;
public $FA_Posting_Date;
public $Depr_until_FA_Posting_Date;
public $Depreciation_Book_Code;
public $Use_Duplication_List;
public $Duplicate_in_Depreciation_Book;
public $Appl_from_Item_Entry;
public $Appl_to_Item_Entry;
public $Deferral_Code;
public $Shortcut_Dimension_1_Code;
public $Shortcut_Dimension_2_Code;
public $ShortcutDimCode_x005B_3_x005D_;
public $ShortcutDimCode_x005B_4_x005D_;
public $ShortcutDimCode_x005B_5_x005D_;
public $ShortcutDimCode_x005B_6_x005D_;
public $ShortcutDimCode_x005B_7_x005D_;
public $ShortcutDimCode_x005B_8_x005D_;
public $Document_No;
public $Line_No;
public $TotalSalesLine_Line_Amount;
public $Invoice_Discount_Amount;
public $Invoice_Disc_Pct;
public $Total_Amount_Excl_VAT;
public $Total_VAT_Amount;
public $Total_Amount_Incl_VAT;

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