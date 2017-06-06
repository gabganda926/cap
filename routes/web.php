<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function (){
   return view('cimis');
});

//Logins

Route::get('/sign-in', 'SignInController@index');

Route::post('/sign-in/login', 'SignInController@Signin');

Route::get('/sign-up', 'SignUpController@index');

Route::post('/sign-up/submit', 'SignUpController@create_account');

//Form Controller
Route::resource('form','FormController');

// Employee Routes
Route::get('/admin/maintenance/employee', 'maint_employeeController@index');

Route::post('/admin/maintenance/employee/submit','maint_employeeController@add_employee');

Route::post('/admin/maintenance/employee/update','maint_employeeController@update_employee');

Route::post('/admin/maintenance/employee/delete','maint_employeeController@delete_employee');

Route::post('/admin/maintenance/employee/ardelete','maint_employeeController@ardelete_employee');

// Job Title Routes

Route::get('/admin/maintenance/job/title', 'maint_JobTitleController@index');

Route::post('/admin/maintenance/job/title/submit','maint_JobTitleController@add_job');

Route::post('/admin/maintenance/job/title/update','maint_JobTitleController@update_job');

Route::post('/admin/maintenance/job/title/delete','maint_JobTitleController@delete_job');

Route::post('/admin/maintenance/job/title/ardelete','maint_JobTitleController@ardelete_job');

// Bank Routes

Route::get('/admin/maintenance/bank', 'maint_bankController@index');

Route::post('/admin/maintenance/bank/submit', 'maint_bankController@add_bank');

Route::post('/admin/maintenance/bank/update', 'maint_bankController@update_bank');

Route::post('/admin/maintenance/bank/delete', 'maint_bankController@delete_bank');

Route::post('/admin/maintenance/bank/ardelete', 'maint_bankController@ardelete_bank');

// Installment Type Routes

Route::get('/admin/maintenance/installment/type', 'maint_installmentTypeController@index');

Route::post('/admin/maintenance/installment/type/submit', 'maint_installmentTypeController@add_installment');

Route::post('/admin/maintenance/installment/type/update', 'maint_installmentTypeController@update_installment');

Route::post('/admin/maintenance/installment/type/delete', 'maint_installmentTypeController@delete_installment');

Route::post('/admin/maintenance/installment/type/ardelete', 'maint_installmentTypeController@ardelete_installment');

// Insurance Company Routes

Route::get('/admin/maintenance/insurance/company', 'maint_insuranceCompanyController@index');

Route::post('/admin/maintenance/insurance/company/submit','maint_insuranceCompanyController@add_inscomp');

Route::post('/admin/maintenance/insurance/company/update','maint_insuranceCompanyController@update_inscomp');

Route::post('/admin/maintenance/insurance/company/delete','maint_insuranceCompanyController@delete_inscomp');

Route::post('/admin/maintenance/insurance/company/ardelete','maint_insuranceCompanyController@ardelete_inscomp');

// Policy Number Routes

Route::get('/admin/maintenance/policyno', 'maint_policyNumberController@index');

Route::post('/admin/maintenance/policyno/submit', 'maint_policyNumberController@add_policy');

Route::post('/admin/maintenance/policyno/update', 'maint_policyNumberController@update_policy');

Route::post('/admin/maintenance/policyno/delete', 'maint_policyNumberController@delete_policy');

Route::post('/admin/maintenance/policyno/ardelete', 'maint_policyNumberController@ardelete_policy');

// Account Routes

Route::get('/admin/maintenance/user/account', 'accountsController@index');

Route::post('/admin/maintenance/user/account/submit', 'accountsController@add_useracc');

Route::post('/admin/maintenance/user/account/update', 'accountsController@update_useracc');

Route::post('/admin/maintenance/user/account/delete', 'accountsController@delete_useracc');

// User Access Routes

Route::get('/admin/maintenance/user/type', 'usertypeController@index');

Route::post('/admin/maintenance/user/type/submit', 'usertypeController@add_usertypes');

Route::post('/admin/maintenance/user/type/update', 'usertypeController@update_usertypes');

Route::post('/admin/maintenance/user/type/delete', 'usertypeController@delete_usertypes');

// Vehicle Acce Routes

Route::get('/admin/maintenance/vehicle/accessories', 'maint_vAccessoriesController@index');

Route::post('/admin/maintenance/vehicle/accessories/submit', 'maint_vAccessoriesController@add_vAcce');

Route::post('/admin/maintenance/vehicle/accessories/update', 'maint_vAccessoriesController@update_vAcce');

Route::post('/admin/maintenance/vehicle/accessories/delete', 'maint_vAccessoriesController@delete_vAcce');

Route::post('/admin/maintenance/vehicle/accessories/ardelete', 'maint_vAccessoriesController@ardelete_vAcce');

// Vehicle Make Routes

Route::get('/admin/maintenance/vehicle/make', 'maint_vMakeController@index');

Route::post('/admin/maintenance/vehicle/make/submit', 'maint_vMakeController@add_vMake');

Route::post('/admin/maintenance/vehicle/make/update', 'maint_vMakeController@update_vMake');

Route::post('/admin/maintenance/vehicle/make/delete', 'maint_vMakeController@delete_vMake');

Route::post('/admin/maintenance/vehicle/make/ardelete', 'maint_vMakeController@ardelete_vMake');

// Vehicle Model Routes

Route::get('/admin/maintenance/vehicle/model', 'maint_vModelController@index');

Route::post('/admin/maintenance/vehicle/model/submit', 'maint_vModelController@add_vModel');

Route::post('/admin/maintenance/vehicle/model/update', 'maint_vModelController@update_vModel');

Route::post('/admin/maintenance/vehicle/model/delete', 'maint_vModelController@delete_vModel');

Route::post('/admin/maintenance/vehicle/model/ardelete', 'maint_vModelController@ardelete_vModel');

// Vehicle Types Routes

Route::get('/admin/maintenance/vehicle/types', 'maint_vTypeController@index');

Route::post('/admin/maintenance/vehicle/types/submit', 'maint_vTypeController@add_vType');

Route::post('/admin/maintenance/vehicle/types/update', 'maint_vTypeController@update_vType');

Route::post('/admin/maintenance/vehicle/types/delete', 'maint_vTypeController@delete_vType');

Route::post('/admin/maintenance/vehicle/types/ardelete', 'maint_vTypeController@ardelete_vType');


//Quote Status

Route::get('/admin/maintenance/quote/status', 'quoteController@index');

Route::post('/admin/maintenance/quote/status/submit', 'quoteController@add_quote');

Route::post('/admin/maintenance/quote/status/update', 'quoteController@update_quote');

Route::post('/admin/maintenance/quote/status/delete', 'quoteController@delete_quote');

//Client Types

Route::get('/admin/maintenance/client/type', 'maint_clientTypeController@index');

Route::post('/admin/maintenance/client/type/submit', 'maint_clientTypeController@add_ctype');

Route::post('/admin/maintenance/client/type/update', 'maint_clientTypeController@update_ctype');

Route::post('/admin/maintenance/client/type/delete', 'maint_clientTypeController@delete_ctype');

Route::post('/admin/maintenance/client/type/ardelete', 'maint_clientTypeController@ardelete_ctype');

//Debt status

Route::get('/admin/maintenance/debt/status', 'debtStatusController@index');

Route::post('/admin/maintenance/debt/status/submit', 'debtStatusController@add_debt');

Route::post('/admin/maintenance/debt/status/update', 'debtStatusController@update_debt');

Route::post('/admin/maintenance/debt/status/delete', 'debtStatusController@delete_debt');

//Check status

Route::get('/admin/maintenance/check/status', 'checkStatusController@index');

Route::post('/admin/maintenance/check/status/submit', 'checkStatusController@add_check');

Route::post('/admin/maintenance/check/status/update', 'checkStatusController@update_check');

Route::post('/admin/maintenance/check/status/delete', 'checkStatusController@delete_check');

//Insurance Status

Route::get('/admin/maintenance/insurance/status', 'insuranceStatusController@index');

Route::post('/admin/maintenance/insurance/status/submit', 'insuranceStatusController@add_ins');

Route::post('/admin/maintenance/insurance/status/update', 'insuranceStatusController@update_ins');

Route::post('/admin/maintenance/insurance/status/delete', 'insuranceStatusController@delete_ins');

//Policy Status

Route::get('/admin/maintenance/policyno/status','policyStatusController@index');

Route::post('/admin/maintenance/policyno/status/submit', 'policyStatusController@add_pstat');

Route::post('/admin/maintenance/policyno/status/update', 'policyStatusController@update_pstat');

Route::post('/admin/maintenance/policyno/status/delete', 'policyStatusController@delete_pstat');

//Transmittal Status

Route::get('/admin/maintenance/transmittal/status', 'transmittalStatusController@index');

Route::post('/admin/maintenance/transmittal/status/submit', 'transmittalStatusController@add_trans');

Route::post('/admin/maintenance/transmittal/status/update', 'transmittalStatusController@update_trans');

Route::post('/admin/maintenance/transmittal/status/delete', 'transmittalStatusController@delete_trans');

//Claim Status

Route::get('/admin/maintenance/claim/status', 'claimStatusController@index');

Route::post('/admin/maintenance/claim/status/submit', 'claimStatusController@add_claim');

Route::post('/admin/maintenance/claim/status/update', 'claimStatusController@update_claim');

Route::post('/admin/maintenance/claim/status/delete', 'claimStatusController@delete_claim');

//Complaint Type

Route::get('/admin/maintenance/complaint/type', 'maint_complaintTypeController@index');

Route::post('/admin/maintenance/complaint/type/submit', 'maint_complaintTypeController@add_ctype');

Route::post('/admin/maintenance/complaint/type/update', 'maint_complaintTypeController@update_ctype');

Route::post('/admin/maintenance/complaint/type/delete', 'maint_complaintTypeController@delete_ctype');

Route::post('/admin/maintenance/complaint/type/ardelete', 'maint_complaintTypeController@ardelete_ctype');

//Sales Agent Route

Route::get('/admin/maintenance/salesagent', 'maint_salesAgentController@index');

Route::post('/admin/maintenance/salesagent/submit', 'maint_salesAgentController@add_agent');

Route::post('/admin/maintenance/salesagent/update', 'maint_salesAgentController@update_agent');

Route::post('/admin/maintenance/salesagent/delete', 'maint_salesAgentController@delete_agent');

Route::post('/admin/maintenance/salesagent/ardelete', 'maint_salesAgentController@ardelete_agent');

//Client Route

// Route::get('/admin/maintenance/client', 'trans_clientController@index');
//
// Route::post('/admin/maintenance/client/submit', 'trans_clientController@add_client');
//
// Route::post('/admin/maintenance/client/update', 'trans_clientController@update_client');
//
// Route::post('/admin/maintenance/client/delete', 'trans_clientController@delete_client');

//Courier Route

Route::get('/admin/maintenance/courier', 'maint_courierController@index');

Route::post('/admin/maintenance/courier/submit', 'maint_courierController@add_courier');

Route::post('/admin/maintenance/courier/update', 'maint_courierController@update_courier');

Route::post('/admin/maintenance/courier/delete', 'maint_courierController@delete_courier');

Route::post('/admin/maintenance/courier/ardelete', 'maint_courierController@ardelete_courier');

//Employee Type Route

Route::get('/admin/maintenance/employee/type', 'maint_employeeTypeController@index');

Route::post('/admin/maintenance/employee/type/submit', 'maint_employeeTypeController@add_emptype');

Route::post('/admin/maintenance/employee/type/update', 'maint_employeeTypeController@update_emptype');

Route::post('/admin/maintenance/employee/type/delete', 'maint_employeeTypeController@delete_emptype');

Route::post('/admin/maintenance/employee/type/ardelete', 'maint_employeeTypeController@ardelete_emptype');

//Sender Route

Route::get('/admin/maintenance/sender', 'senderController@index');

Route::post('/admin/maintenance/sender/submit', 'senderController@add_sender');

Route::post('/admin/maintenance/sender/update', 'senderController@update_sender');

Route::post('/admin/maintenance/sender/delete', 'senderController@delete_sender');

//Archives

//Bank Routes

Route::get('/admin/archives/bank','arch_bankController@index');

Route::post('/admin/archives/bank/reactive','arch_bankController@reactivate_bank');

Route::post('/admin/archives/bank/areactive','arch_bankController@areactivate_bank');

//Client Type Routes

Route::get('/admin/archives/client/type','arch_clientTypeController@index');

Route::post('/admin/archives/client/type/reactive','arch_clientTypeController@reactivate_ctype');

Route::post('/admin/archives/client/type/areactive','arch_clientTypeController@areactivate_ctype');

//Complaint Type Routes

Route::get('/admin/archives/complaint/type','arch_complaintTypeController@index');

Route::post('/admin/archives/complaint/type/reactive','arch_complaintTypeController@reactivate_ctype');

Route::post('/admin/archives/complaint/type/areactive','arch_complaintTypeController@areactivate_ctype');


//Courier Routes

Route::get('/admin/archives/courier','arch_courierController@index');

Route::post('/admin/archives/courier/reactive','arch_courierController@reactivate_courier');

Route::post('/admin/archives/courier/areactive','arch_courierController@areactivate_courier');

//Employee Routes

Route::get('admin/archives/employee','arch_employeeController@index');

Route::post('/admin/archives/employee/reactive','arch_employeeController@reactivate_employee');

Route::post('/admin/archives/employee/areactive','arch_employeeController@areactivate_employee');

//Employee Type Routes

Route::get('admin/archives/employee/type','arch_employeeTypeController@index');

Route::post('/admin/archives/employee/type/reactive','arch_employeeTypeController@reactivate_emptype');

Route::post('/admin/archives/employee/type/areactive','arch_employeeTypeController@areactivate_emptype');

//Installment Type Routes

Route::get('admin/archives/installment/type','arch_installmentTypeController@index');

Route::post('/admin/archives/installment/type/reactive','arch_installmentTypeController@reactivate_installment');

Route::post('/admin/archives/installment/type/areactive','arch_installmentTypeController@areactivate_installment');

//Insurance Company Routes

Route::get('admin/archives/insurance/company','arch_insuranceCompanyController@index');

Route::post('/admin/archives/insurance/company/reactive','arch_insuranceCompanyController@reactivate_inscomp');

Route::post('/admin/archives/insurance/company/areactive','arch_insuranceCompanyController@areactivate_inscomp');

//Policy Number Routes

Route::get('admin/archives/policyno','arch_policyNumberController@index');

Route::post('/admin/archives/policyno/reactive','arch_policyNumberController@reactivate_policy');

Route::post('/admin/archives/policyno/areactive','arch_policyNumberController@areactivate_policy');

//Sales Agent Routes

Route::get('admin/archives/salesagent','arch_salesAgentController@index');

Route::post('/admin/archives/salesagent/reactive','arch_salesAgentController@reactivate_agent');

Route::post('/admin/archives/salesagent/areactive','arch_salesAgentController@areactivate_agent');

//Vehicle accessories Routes

Route::get('admin/archives/vehicle/accessories','arch_vAccessoriesController@index');

Route::post('/admin/archives/vehicle/accessories/reactive','arch_vAccessoriesController@reactivate_vAcce');

Route::post('/admin/archives/vehicle/accessories/areactive','arch_vAccessoriesController@areactivate_vAcce');

//Vehicle Make Routes

Route::get('admin/archives/vehicle/make','arch_vMakeController@index');

Route::post('/admin/archives/vehicle/make/reactive','arch_vMakeController@reactivate_vMake');

Route::post('/admin/archives/vehicle/make/areactive','arch_vMakeController@reactivate_vMake');

//Vehicle Model Routes

Route::get('admin/archives/vehicle/model','arch_vModelController@index');

Route::post('/admin/archives/vehicle/model/reactive','arch_vModelController@reactivate_vModel');

Route::post('/admin/archives/vehicle/model/areactive','arch_vModelController@areactivate_vModel');

//Vehicle Type Routes

Route::get('admin/archives/vehicle/type','arch_vTypeController@index');

Route::post('/admin/archives/vehicle/type/reactive','arch_vTypeController@reactivate_vType');

Route::post('/admin/archives/vehicle/type/areactive','arch_vTypeController@areactivate_vType');

//Vehicle Type Routes

Route::get('admin/archives/job/title','arch_JobTitleController@index');

Route::post('/admin/archives/job/title/reactive','arch_JobTitleController@reactivate_job');

Route::post('/admin/archives/job/title/areactive','arch_JobTitleController@areactivate_job');

//TRANSACTIONS ROUTE//

//Insurance
Route::get('/admin/transaction/adm/insurance', function (){
   return view('pages.transaction.adm.insurance');
});

//Insurance - Notify Client
Route::get('/admin/transaction/adm/insurance-notify-client', function (){
   return view('pages.transaction.adm.insurance-notify-client');
});

//Insurance - Client Info
Route::get('/admin/transaction/adm/insurance-client-info-fpg', function (){
   return view('pages.transaction.adm.insurance-client-info-fpg');
});


//Insurance - Expiring Accounts
Route::get('/admin/transaction/adm/insurance-expiring-accounts', function (){
   return view('pages.transaction.adm.insurance-expiring-accounts');
});

//Insurance - Sent notifications
Route::get('/admin/transaction/adm/insurance-notification-list', function (){
   return view('pages.transaction.adm.insurance-notification-list');
});

//Claims
Route::get('/admin/transaction/adm/claims', function (){
   return view('pages.transaction.adm.claims');
});

//Claims - claim request
Route::get('/admin/transaction/adm/claim-request', function (){
   return view('pages.transaction.adm.claim-request');
});

//Claims - validate
Route::get('/admin/transaction/adm/claim-validate', function (){
   return view('pages.transaction.adm.claim-validate');
});

//Claims - request info
Route::get('/admin/transaction/adm/claim-info', function (){
   return view('pages.transaction.adm.claim-info');
});

//Claims - approved info
Route::get('/admin/transaction/adm/claim-info-approved', function (){
   return view('pages.transaction.adm.claim-info-approved');
});

//Complaint
Route::get('/admin/transaction/adm/complaint', function (){
   return view('pages.transaction.adm.complaint');
});

//Complaint-info
Route::get('/admin/transaction/adm/complaint-info', function (){
   return view('pages.transaction.adm.complaint-info');
});

//Complaint-validate
Route::get('/admin/transaction/adm/complaint-validate', function (){
   return view('pages.transaction.adm.complaint-validate');
});

//Tally
Route::get('/admin/transaction/adm/tally', function (){
   return view('pages.transaction.adm.tally');
});

//Tally
Route::get('/admin/transaction/adm/tally-info', function (){
   return view('pages.transaction.adm.tally-info');
});

//Transmittal
Route::get('/admin/transaction/adm/transmittal', function (){
   return view('pages.transaction.adm.transmittal');
});

//Transmittal - documents
Route::get('/admin/transaction/adm/transmittal-documents', function (){
   return view('pages.transaction.adm.transmittal-documents');
});

//Transmittal - request
Route::get('/admin/transaction/adm/transmittal-request', function (){
   return view('pages.transaction.adm.transmittal-request');
});

//Transmittal - validate
Route::get('/admin/transaction/adm/transmittal-validate', function (){
   return view('pages.transaction.adm.transmittal-validate');
});

//Transmittal - info
Route::get('/admin/transaction/adm/transmittal-info-approved', function (){
   return view('pages.transaction.adm.transmittal-info-approved');
});