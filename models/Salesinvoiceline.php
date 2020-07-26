<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace backend\models;
use yii\base\Model;


class Salesinvoiceline extends Model
{

    public $Key;
    public $Type;
    public $No;
    public $Cross_Reference_No;
    public $IC_Partner_Code;
    public $IC_Partner_Ref_Type;
    public $IC_Partner_Reference;
    public $Variant_Code;
    public $Nonstock;
    public $VAT_Prod_Posting_Group;
    public $Description;
    public $Return_Reason_Code;
    public $Location_Code;
    public $Bin_Code;
    public $Quantity;
    public $Unit_of_Measure_Code;
    public $Unit_of_Measure;
    public $Unit_Cost_LCY;
    public $PriceExists;
    public $Unit_Price;
    public $Line_Discount_Percent;
    public $Line_Amount;
    public $LineDiscExists;
    public $Line_Discount_Amount;
    public $Allow_Invoice_Disc;
    public $Inv_Discount_Amount;
    public $Allow_Item_Charge_Assignment;
    public $Qty_to_Assign;
    public $Qty_Assigned;
    public $Job_No;
    public $Job_Task_No;
    public $Job_Contract_Entry_No;
    public $Tax_Category;
    public $Shipping_Agent_Code;
    public $Shipping_Agent_Service_Code;
    public $Work_Type_Code;
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