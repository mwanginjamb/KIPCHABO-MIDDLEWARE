<?php
namespace backend\controllers;

use Yii;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\Response;

use backend\models\Requisitionline;
use backend\models\Requisition;
use backend\models\Salesinvoiceline;
use backend\models\Salesinvoice;
use backend\models\Receipt;
use backend\models\Cashreceiptline;
/**
 * Site controller
 */
class SiteController extends Controller
{

   public function beforeAction($action)
    {            
        if (
            $action->id == 'addline' || 
            $action->id == 'update-requisition' || 
            $action->id == 'updaterequisitionline' ||
            $action->id == 'update-invoice' ||
            $action->id == 'updatesalesinvoiceline' ||
            $action->id == 'addsalesinvoiceline' ||
            $action->id == 'create-invoice' ||
            $action->id == 'updatecashreceipt' ||
            $action->id == 'updatecashreceiptline' ||
            $action->id == 'updateamounttoreceipt'
        ) {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {

        return [


            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [
                            'index',
                            'get-orders',
                            'getone',
                            'items',
                            'itemcard',
                            'requisitions',
                            'requisitioncard',
                            'locationlist',
                            'unitmeasure',
                            'addline',
                            'releasedrequisitions',
                            'create-requisition',
                            'get',
                            'update-requisition',
                            'departments',
                            'projects',
                            'getline',
                            'updaterequisitionline',
                            'saleorders',
                            'salesorder',
                            'saleinvoices',
                            'saleinvoice',
                            'getsalesinvoiceline',
                            'update-invoice',
                            'updatesalesinvoiceline',
                            'addsalesinvoiceline',
                            'create-invoice',
                            'receipt',
                            'receipting-customers',
                            'customerledgerentries',
                            'newpayment',
                            'updatecashreceipt',
                            'suggestlines',
                            'refreshreceipt',
                            'updatecashreceiptline',
                            'updateamounttoreceipt',
                            'sale',
                            'postreceipt',
                            'postsaleinvoice',
                            'filtersales',
                            'filterpayments'
                        ],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'contentNegotiator' =>[
                'class' => ContentNegotiator::class,
                'only' => [
                    'getone',
                    'get-orders',
                    'items',
                    'itemcard', 
                    'requisitions',
                    'requisitioncard',
                    'locationlist',
                    'unitmeasure',
                    'addline',
                    'releasedrequisitions',
                    'create-requisition',
                    'get',
                    'update-requisition',
                    'departments',
                    'projects',
                    'getline',
                    'updaterequisitionline',
                    'saleorders',
                    'salesorder',
                    'saleinvoices',
                    'saleinvoice',
                    'getsalesinvoiceline',
                    'update-invoice',
                    'updatesalesinvoiceline',
                    'addsalesinvoiceline',
                    'create-invoice',
                    'receipt',
                    'receipting-customers',
                    'customerledgerentries',
                    'newpayment',
                    'updatecashreceipt',
                    'suggestlines',
                    'updatecashreceiptline',
                    'updateamounttoreceipt',
                    'sale',
                    'postreceipt',
                    'postsaleinvoice',
                    'filtersales',
                    'filterpayments'
                ],
                'formatParam' => '_format',
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                    //'application/xml' => Response::FORMAT_XML,
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],

            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    // restrict access to
                    //'Origin' => ['capacitor://localhost','http://localhost'],
                    // Allow only POST and PUT methods
                    'Access-Control-Request-Method' => ['POST', 'PUT', 'GET'],
                    // Allow only headers 'X-Wsse'
                    'Access-Control-Request-Headers' => ['*'],
                    // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                    'Access-Control-Allow-Credentials' => false,
                    // Allow OPTIONS caching
                    'Access-Control-Max-Age' => 3600,
                    // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                    'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                ],

             ],
    
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }





    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    
    public function actionSaleorders() {
        $service = Yii::$app->params['ServiceName']['SalesOrdersList'];
        $filter = [];

        $results = Yii::$app->Navhelper->getData($service, $filter );

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }

    }

    public function actionSalesorder($id )
    {

        $service = Yii::$app->params['ServiceName']['SalesOrder'];
        $filter = [
            'No' => $id ,
            ];

        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results[0];
        }else
        {
            return $results;
        }
    }

    /* Get a list of all Sale Invoices */

    public function actionSaleinvoices() {
        $service = Yii::$app->params['ServiceName']['SalesInvoiceList'];
        $filter = [];

        $results = Yii::$app->Navhelper->getData($service, $filter );

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }

    }


    /* Get a Sales Invoice Card */

    public function actionSaleinvoice($id )
    {

        $service = Yii::$app->params['ServiceName']['SalesInvoice'];
        $filter = [
            'No' => $id ,
            ];

        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results[0];
        }else
        {
            return $results;
        }
    }

    // Returns a List of Items

    public function actionItems() {
        $service = Yii::$app->params['ServiceName']['ItemList'];
        $filter = [];

        $results = Yii::$app->Navhelper->getData($service, $filter );

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }

    }

    // Returns Item card

    public function actionItemcard($id )
    {

        $service = Yii::$app->params['ServiceName']['ItemCard'];
        $filter = [
            'No' => $id ,
        ];

        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    // Get Requisition List

    public function actionRequisitions() {
        $service = Yii::$app->params['ServiceName']['RequisitionList'];
        $filter = [];

        $results = Yii::$app->Navhelper->getData($service, $filter );

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }

    }

    // Get Released Requsitions List

    public function actionReleasedrequisitions() {
        $service = Yii::$app->params['ServiceName']['ReleasedRequisitionList'];
        $filter = [
            'Status' => 'Released'
        ];

        $results = Yii::$app->Navhelper->getData($service, $filter );

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }

    }

    // Get Requisition Card


    public function actionRequisitioncard($id )
    {

        $service = Yii::$app->params['ServiceName']['RequisitionCard'];
        $filter = [
            'No' => $id ,
        ];

        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }


    // Get Location List

    public function actionLocationlist() {
        $service = Yii::$app->params['ServiceName']['LocationList'];
        $filter = [];

        $results = Yii::$app->Navhelper->getData($service, $filter );

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }

    }

    // Get Units of Measure


    public function actionUnitmeasure() {
        $service = Yii::$app->params['ServiceName']['UnitMeasure'];
        $filter = [
            'Item_No' => Yii::$app->request->get('itemNo')
        ];

        $results = Yii::$app->Navhelper->getData($service, $filter );

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }

    }

    // Posting RFequisition Lines Data

    public function actionAddline() {

        $model = new Requisitionline();
        $service = Yii::$app->params['ServiceName']['MobileCodeunit'];

        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);


         // Call Mobile Code Unit

        $args = [
            'itemNo'=> $data->Item_No,
            'piecesVar' => $data->Pieces,
            'unitOfMeasure' => $data->Unit,
            'docNo' => $data->Document_No,
        ];

        $res = Yii::$app->Navhelper->Mobile($service,$args,'IanCreateTransferOrderLines');
        return $res;

        // Update the model with data from POS

        $model->Document_No = $data->Document_No;
        
        $initial = Yii::$app->Navhelper->postData($service,$model);
       

        //Update Rest of the line info, if initial request to ERP is successfull
       
        if(!is_string($initial))
        {
            $model->Key = $initial->Key;            
            $model->Item_No = $data->Item_No;
            $model->Planning_Flexibility = $data->Planning_Flexibility;
            $model->Unit = $data->Unit;

            // $model->Pieces = $data->Pieces; Not Updating on Model
            $model = Yii::$app->Navhelper->loadmodel($initial,$model);
        }else{
            return ['error' => $initial];
        }
         
        $model->Pieces = $data->Pieces; // Updates Pieces Property Here

        $results = Yii::$app->Navhelper->updateData($service, $model); // Complete line requisition 
        return $results;
        
    }

    /* Add Sales Invoice Line */

    public function actionAddsalesinvoiceline() {

        $model = new Salesinvoiceline();
        $service = Yii::$app->params['ServiceName']['MobileCodeunit'];

        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        // Call Mobile Code Unit

        $args = [
            'itemNo'=> $data->No,
            'location' => $data->Location_Code,
            'quantityVar' => $data->Quantity,
            'unitPrice' => $data->Unit_Price,
            'unitOfMeasure' => $data->Unit_of_Measure_Code,
            'docNo' => $data->Document_No
        ];

        $res = Yii::$app->Navhelper->Mobile($service,$args,'IanCreateSalesInvoiceLines');
        return $res;

        // Update the model with data from POS

        $model->Document_No = $data->Document_No;
        $model->Type = 'Item';
        $initial = Yii::$app->Navhelper->postData($service,$model);
       
        //return $initial;
        //Update Rest of the line info, if initial request to ERP is successfull
       
        if(!is_string($initial))
        {
            $model->Key = $initial->Key;            
            $model->No = $data->No;
            $model->Unit_of_Measure_Code = $data->Unit_of_Measure_Code;
            $model->Quantity = $model->Quantity;
           

            // $model->Pieces = $data->Pieces; Not Updating on Model
            $model = Yii::$app->Navhelper->loadmodel($initial,$model);
        }else{
            return ['error' => $initial];
        }
         
        $results = Yii::$app->Navhelper->updateData($service, $model); // Complete line requisition 
        return $results;
        
    }

    public function actionUpdaterequisitionline()
    {
        $model = new Requisitionline();
        $service = Yii::$app->params['ServiceName']['RequisitionLines'];
        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

          

        $model = Yii::$app->Navhelper->loadmodel($data,$model);

        //get New Key Before Updating        

        $results = Yii::$app->Navhelper->updateData($service, $model); // update  requisition line
        return $results;

    }

    /* Update Sales Invoice Line */

    public function actionUpdatesalesinvoiceline()
    {
        $model = new Salesinvoiceline();
        $service = Yii::$app->params['ServiceName']['SalesInvoiceLine'];
        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        /* Read only fields that you wanna skip on model data bind */
        $skip = [
            'TotalSalesLine_Line_Amount',
            'Total_Amount_Excl_VAT',
            'Total_VAT_Amount',
            'Total_Amount_Incl_VAT'
        ] ;

        $model = Yii::$app->Navhelper->loadmodel($data,$model,$skip);

        //get New Key Before Updating        

        $results = Yii::$app->Navhelper->updateData($service, $model); // update  requisition line
        return $results;

    }

    /* Get Requisition Line */
    public function actionGetline($Document_No, $Line_No)
    {
         $service = Yii::$app->params['ServiceName']['RequisitionLines'];

         $filter = [
            'Document_No' => $Document_No,
            'Line_No' => $Line_No
         ];

         $result = Yii::$app->Navhelper->getData($service, $filter);
         return $result[0];
    }

    /* Get Salesinvoice line to update */

    public function actionGetsalesinvoiceline($Document_No, $Line_No)
    {
         $service = Yii::$app->params['ServiceName']['SalesInvoiceLine'];

         $filter = [
            'Document_No' => $Document_No,
            'Line_No' => $Line_No
         ];

         $result = Yii::$app->Navhelper->getData($service, $filter);
         return $result[0];
    }


    // Create Requisition

    public function actionCreateRequisition()
    {
        $service = Yii::$app->params['ServiceName']['RequisitionCard'];
        $data = [];
            
        $results = Yii::$app->Navhelper->postData($service, $data);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    // Create a New Sales Invoice

    public function actionCreateInvoice()
    {
        $service = Yii::$app->params['ServiceName']['SalesInvoice'];
        $data = [];
            
        // Create a post request to the Nav Service with empty params -> for initial data initialization like no. series    
        $results = Yii::$app->Navhelper->postData($service, $data);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }


    /* Generic Getter Method just supply service name as a get param*/
     public function actionGet($service)
    {
        $service = Yii::$app->params['ServiceName'][$service];
        $data = [];
            
        $results = Yii::$app->Navhelper->getData($service, $data);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    public function actionDepartments()
    {
        $service = Yii::$app->params['ServiceName']['Dimensions'];
        $filter = [
            'Global_Dimension_No' => 1
        ];
            
        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    // Get projects

    public function actionProjects()
    {
        $service = Yii::$app->params['ServiceName']['Dimensions'];
        $filter = [
            'Global_Dimension_No' => 2
        ];
            
        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }



    // Post a new requisition

     public function actionUpdateRequisition() {

        $model = new Requisition();
        $service = Yii::$app->params['ServiceName']['RequisitionCard'];

        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        
       

        $model = Yii::$app->Navhelper->loadmodel($data,$model);
               
        $results = Yii::$app->Navhelper->updateData($service, $model); // Complete line requisition 
        return $results;
        
    }

    // Post a new Invoice Header

     public function actionUpdateInvoice() {

        $model = new Salesinvoice();
        $service = Yii::$app->params['ServiceName']['SalesInvoice'];

        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        
       

        $model = Yii::$app->Navhelper->loadmodel($data,$model);
               
        $results = Yii::$app->Navhelper->updateData($service, $model); // Complete line requisition 
        return $results;
        
    }

    // Get Customers for Receipting

     public function actionReceiptingCustomers()
    {
        $service = Yii::$app->params['ServiceName']['CustomerList'];
        $filter = [
            'Has_Invoice' => true
        ];
            
        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    // Get The receipt card

    public function actionReceipt($id)
    {
        $service = Yii::$app->params['ServiceName']['ReceiptCard'];
        $filter = [
            'Receipt_No' => $id
        ];
            
        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results[0];
        }else
        {
            return $results;
        }
    }

    // Customer Ledger Entries that are open


    public function actionCustomerledgerentries($Customer_No)
    {
        $service = Yii::$app->params['ServiceName']['CustomerLedgerEntries'];
        $filter = [
            'Customer_No' => $Customer_No,
            'Open' => true
        ];
            
        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    public function actionNewpayment()
    {
        $service = Yii::$app->params['ServiceName']['ReceiptCard'];
        $filter = [];
            
        $results = Yii::$app->Navhelper->postData($service, $filter);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    public function actionSuggestlines($receiptNo,$customerNo)
    {

        $service = Yii::$app->params['ServiceName']['MobileCodeunit'];

         // Call Mobile Code Unit

        $args = [
            'receiptNo'=> $receiptNo,
            'customerNo' => $customerNo,
        ];

        $res = Yii::$app->Navhelper->Mobile($service,$args,'IanSuggestCustLedLinesInReceiptLines');
        return $res;
    }

    // Update Cash Receipt Card

    public function actionUpdatecashreceipt() {

        $model = new Receipt();
        $service = Yii::$app->params['ServiceName']['ReceiptCard'];

        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);
        // return $data;

        $model = Yii::$app->Navhelper->loadmodel($data,$model);

        $key = $this->refreshreceipt($data->Receipt_No);
        
        $model->Key = $key;
               
        $results = Yii::$app->Navhelper->updateData($service, $model); // Complete line requisition 
        return $results;
        
    }

    public function refreshreceipt($receiptNo)
    {
         $service = Yii::$app->params['ServiceName']['Payments'];
         $filter = [
            'Receipt_No' => $receiptNo
         ];

         $result = Yii::$app->Navhelper->getData($service,$filter);
         return $result[0]->Key;

    }

    public function actionUpdatecashreceiptline()
    {
        $service = Yii::$app->params['ServiceName']['CashReceiptLines'];
        $model = new Cashreceiptline();
        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

         $filter = [
            'Receipt_No' => $data->Receipt_No,
            'Customer_No' => $data->Customer_No,
            'Line_No' => $data->Line_No
         ];

         // Get Line to Update

         $Line = Yii::$app->Navhelper->getData($service, $filter);

         //Load model with Line Data
         if(!is_string($Line)){ // Array of Object Was Returned
            $model = Yii::$app->Navhelper->loadmodel($Line[0],$model);
            $model->Select = !$model->Select; //Toggle Select Status
            if(!empty($data->Amount_To_Receipt)){
                $model->Amount_To_Receipt = $data->Amount_To_Receipt;  
            }
            // Do actual update
            $update = Yii::$app->Navhelper->updateData($service, $model);
            return $update;
        }else{ // Return Navision Error
            return $Line;
        }
         
    }

    public function actionUpdateamounttoreceipt()
    {
        $service = Yii::$app->params['ServiceName']['CashReceiptLines'];
        $model = new Cashreceiptline();
        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

         $filter = [
            'Receipt_No' => $data->Receipt_No,
            'Customer_No' => $data->Customer_No,
            'Line_No' => $data->Line_No
         ];

         // Get Line to Update

         $Line = Yii::$app->Navhelper->getData($service, $filter);

         //Load model with Line Data
         if(!is_string($Line)){ // Array of Object Was Returned
            $model = Yii::$app->Navhelper->loadmodel($Line[0],$model);
            
            
            $model->Amount_To_Receipt = $data->Amount_To_Receipt;  
            
            // Do actual update
            $update = Yii::$app->Navhelper->updateData($service, $model);
            return $update;
        }else{ // Return Navision Error
            return $Line;
        }
         
    }

    public function actionSale($id)
    {

         $service = Yii::$app->params['ServiceName']['PostedSalesInvoice'];
         $filter = [
            'No' => $id
         ];

         $result = Yii::$app->Navhelper->getData($service,$filter);

         if(is_array($result)){
            return $result[0];
         }else{
            $result;
         }
         
    }

    public function actionPostreceipt($No){
        $service = Yii::$app->params['ServiceName']['MobileCodeunit'];
        $args = [
            'receiptNo' => $No
        ];
        $res = Yii::$app->Navhelper->Mobile($service,$args,'IanPostCustomerReceipt');
        return $res;

    }

    public function actionPostsaleinvoice($No){
        $service = Yii::$app->params['ServiceName']['MobileCodeunit'];
        $args = [
            'invoiceNo' => $No
        ];
        $res = Yii::$app->Navhelper->Mobile($service,$args,'IanPostSalesInvoice');
        return $res;

    }

    // Get posted sales by date

    public function actionFiltersales($startdate, $enddate="")
    {
        
        $service1 = Yii::$app->params['ServiceName']['MobileCodeunit'];
        $service2 = Yii::$app->params['ServiceName']['PostedSalesInvoicesMobile'];

         $enddate = empty(trim($enddate))?$startdate:$enddate;

        // Generate Filtered Sales List

        $args = [
            'startDate' => $startdate,
            'endDate' => $enddate
        ];

        $coderes = Yii::$app->Navhelper->Mobile($service1,$args,'IanGenerateFilteredSales');


        // Read Filtered List

         $results = $this->actionGet($service2);

         return $results;


    }

    // Get and Filter Posted Payments by date

     public function actionFilterpayments($startdate, $enddate="")
    {
        
        $service1 = Yii::$app->params['ServiceName']['MobileCodeunit'];
        $service2 = Yii::$app->params['ServiceName']['PostedCashReceiptMobile'];

        $enddate = empty(trim($enddate))?$startdate:$enddate;

        // Generate Filtered Sales List

        $args = [
            'startDate' => $startdate,
            'endDate' => $enddate
        ];



        $coderes = Yii::$app->Navhelper->Mobile($service1,$args,'IanGenerateFilteredCashReceipts');
        if(is_string($coderes)){
            return $coderes;
        }

        // Read Filtered List

         $results = $this->actionGet($service2);

         return $results;


    }
        



}
