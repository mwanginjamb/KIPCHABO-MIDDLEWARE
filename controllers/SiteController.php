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

/**
 * Site controller
 */
class SiteController extends Controller
{

   public function beforeAction($action)
    {            
        if ($action->id == 'addline' || $action->id == 'update-requisition' || $action->id == 'updaterequisitionline') {
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
                            'salesorder'
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
                    'salesorder'
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
        $service = Yii::$app->params['ServiceName']['RequisitionLines'];

        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

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




}
