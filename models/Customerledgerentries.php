<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace backend\models;
use yii\base\Model;


class Customerledgerentries extends Model
{

public $Key;
public $Posting_Date;
public $Document_Type;
public $Document_No;
public $Customer_No;
public $Message_to_Recipient;
public $External_Document_No;
public $Description;
public $Global_Dimension_1_Code;
public $Global_Dimension_2_Code;
public $IC_Partner_Code;
public $Salesperson_Code;
public $Currency_Code;
public $Original_Amount;
public $Original_Amt_LCY;
public $Amount;
public $Amount_LCY;
public $Remaining_Amount;
public $Remaining_Amt_LCY;
public $Bal_Account_Type;
public $Bal_Account_No;
public $Due_Date;
public $Pmt_Discount_Date;
public $Pmt_Disc_Tolerance_Date;
public $Original_Pmt_Disc_Possible;
public $Remaining_Pmt_Disc_Possible;
public $Max_Payment_Tolerance;
public $Payment_Method_Code;
public $Open;
public $On_Hold;
public $User_ID;
public $Source_Code;
public $Reason_Code;
public $Reversed;
public $Reversed_by_Entry_No;
public $Reversed_Entry_No;
public $Entry_No;
public $Exported_to_Payment_File;
public $Direct_Debit_Mandate_ID;

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