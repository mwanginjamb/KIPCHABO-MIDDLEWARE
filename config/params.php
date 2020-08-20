<?php
return [
    'adminEmail' => 'customer@softeboard.com',
    'supportEmail' => 'customer@softeboard.com',
    'senderEmail' => 'customer@softeboard.com',
    'senderName' => 'HRMIS mailer',
    'user.passwordResetTokenExpire' => 3600,
    'powered' => 'Iansoft Ltd',
    'NavisionUsername'=>'HP ELITEBOOK 840 G5',
    'NavisionPassword'=>'@francis123#',


    'NavTestApprover' => 'Approver',
    'NavTestApproverPassword' => '@Approver123',

    'server'=>'FRANCIS',//'app-svr-dev.rbss.com',//Navision Server
    'WebServicePort'=>'5047',//Nav server Port
    'ServerInstance'=>'DynamicsNAV100',//Nav Server Instance
    'CompanyName'=>'Commercial',//Nav Company,
    'CompanyNameStripped' => 'Commercial$',
    'ldPrefix'=>'francis',//ACTIVE DIRECTORY prefix
    'adServer' => 'DC2SVR.AASCIENCES.AC.KE', //Active directory domain controller

    //sharepoint config
    'sharepointUrl' => 'https://aaofsciences.sharepoint.com',//'https://ackads.sharepoint.com',
    'sharepointUsername' => 'Navision@aasciences.africa',//'francis@ackads.onmicrosoft.com',
    'sharepointPassword' => 'Nav9orta7',//'@crm1220#*',
    'library' => 'Portal',//'Mydocs',
    'clientID' => '7e92ce54-e4bf-491a-bef6-eb94044ce297',
    'clientSecret' => 'Q6UJkB3bRlPkGBjWNgrQVCyyjL2vgi5rtP7THpLwJ+s=',

    'profileControllers' => [

    ],
    'codeUnits' => [
        'MobileCodeunit'
    ],
    'ServiceName' =>[


        'ItemList' => 'ItemList', // Page 31 (Page)
        'ItemCard' => 'ItemCard', // Page 30 (Page)

        'SalesOrdersList' => 'SalesOrdersList', //9305 (Page)
        'SalesOrder' => 'SalesOrder', // 42 (Page)
        'SalesOrderLine' => 'SalesOrderLine', // 46(Page)

        'SalesInvoiceList' => 'SalesInvoiceList', //9301
        'SalesInvoice' => 'SalesInvoice', // 43
        'SalesInvoiceLine' =>  'SalesInvoiceLine', // 47
        'PostedSalesInvoices' => 'PostedSalesInvoices', // 143 --> List
        'PostedSalesInvoice' => 'PostedSalesInvoice', //132 --> Card
        'PostedSalesInvoicesMobile' => 'PostedSalesInvoicesMobile', // 50000 List Page
        'PostedCashReceiptMobile' => 'PostedCashReceiptMobile', //50045 List Page

        'RequisitionList' => 'RequisitionList', // 60025 (Page)
        'ReleasedRequisitionList' => 'ReleasedRequisitionList', // 60026 (Page)
        'RequisitionCard' => 'RequisitionCard', // 60023 (Page)
        'RequisitionLines' => 'RequisitionLines', // 5741 (Page)
        'LocationList' => 'LocationList', // 15 (Page)
        'UnitMeasure' => 'UnitMeasure', //5404 (Page)

        'Payments' => 'Payments', //70309 (Page)
        'ReceiptCard' => 'ReceiptCard', // 70310 (Page)
        'CashReceiptLines' => 'CashReceiptLines', // (Page) 70311
        'CustomerLedgerEntries' => 'CustomerLedgerEntries', // Page 25
        'BankAccounts' => 'BankAccounts', // 371 (Page)

        'Dimensions' => 'Dimensions', // 560 (Page)
        'CustomerList' => 'CustomerList', //22 (Page)
        'ItemBalanceByLocation' => 'ItemBalanceByLocation', //492 (Page)


        'MobileCodeunit' => 'MobileCodeunit', // 50014 - Codeunit

    ],
    'QualificationsMimeTypes' => [

        'application/pdf',

    ],
    'Microsoft' => [
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
        'application/vnd.ms-word.document.macroEnabled.12',
        'application/vnd.ms-word.template.macroEnabled.12',
        'application/vnd.ms-excel',
        'application/vnd.ms-excel',
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
        'application/vnd.ms-excel.sheet.macroEnabled.12',
        'application/vnd.ms-excel.template.macroEnabled.12',
        'application/vnd.ms-excel.addin.macroEnabled.12',
        'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
        'application/vnd.ms-powerpoint',
        'application/vnd.ms-powerpoint',
        'application/vnd.ms-powerpoint',
        'application/vnd.ms-powerpoint',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'application/vnd.openxmlformats-officedocument.presentationml.template',
        'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
        'application/vnd.ms-powerpoint.addin.macroEnabled.12',
        'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
        'application/vnd.ms-powerpoint.template.macroEnabled.12',
        'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
        'application/vnd.ms-access',
        'application/rtf',
        'application/octet-stream'
    ]

];
