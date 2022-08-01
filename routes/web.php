<?php

use App\Http\Controllers\DefaultersController;
use App\Http\Controllers\HousesController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OccupancyController;
use App\Http\Controllers\PayHistoryController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\RecieptController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TenantsController;
use Illuminate\Support\Facades\Route;

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

Route::post('GenerateTenantReciept', [RecieptController::class, 'GenerateTenantReciept'])->middleware('auth')->name('GenerateTenantReciept');

Route::post('SelectTenantReciepts', [RecieptController::class, 'SelectTenantReciepts'])->middleware('auth')->name('SelectTenantReciepts');

Route::get('RecieptSelectHouses', [RecieptController::class, 'RecieptSelectHouses'])->middleware('auth')->name('RecieptSelectHouses');

Route::post('CreateNewAdmin', [MainController::class, 'CreateNewAdmin'])->middleware('auth')->name('CreateNewAdmin');

Route::get('DeleteAdmins/{id}', [MainController::class, 'DeleteAdmins'])->middleware('auth')->name('DeleteAdmins');

Route::get('MgtAdmins', [MainController::class, 'MgtAdmins'])->middleware('auth')->name('MgtAdmins');

Route::get('PartialOcc', [OccupancyController::class, 'PartialOcc'])->middleware('auth')->name('PartialOcc');

Route::get('FullyOccupied', [OccupancyController::class, 'FullyOccupied'])->middleware('auth')->name('FullyOccupied');

Route::post('RevenueReport', [ReportController::class, 'RevenueReport'])->middleware('auth')->name('RevenueReport');

Route::get('ReportSelectHouse', [ReportController::class, 'ReportSelectHouse'])->middleware('auth')->name('ReportSelectHouse');

Route::get('DeleteAssignment/{id}', [TenantsController::class, 'DeleteAssignment'])->middleware('auth')->name('DeleteAssignment');

Route::get('/VirtualOffice', [MainController::class, 'VirtualOffice'])->middleware('auth');

Route::get('/', [MainController::class, 'VirtualOffice'])->middleware('auth')->name('VirtualOffice');

Route::post('DefReport', [DefaultersController::class, 'DefReport'])->middleware('auth')->name('DefReport');

Route::post('DefLocSelect', [DefaultersController::class, 'DefLocSelect'])->middleware('auth')->name('DefLocSelect');

Route::get('DefSelectHouse', [DefaultersController::class, 'DefSelectHouse'])->middleware('auth')->name('DefSelectHouse');

Route::post('PayHistoryReport', [PayHistoryController::class, 'PayHistoryReport'])->middleware('auth')->name('PayHistoryReport');

Route::post('SelectLocationHist', [PayHistoryController::class, 'SelectLocationHist'])->middleware('auth')->name('SelectLocationHist');

Route::get('PayHistSelectHouse', [PayHistoryController::class, 'PayHistSelectHouse'])->middleware('auth')->name('PayHistSelectHouse');

Route::post('ReversePayment', [PaymentsController::class, 'ReversePayment'])->middleware('auth')->name('ReversePayment');

Route::get('ReturnRecordPayGet/{id}/{Payment_Year}', [PaymentsController::class, 'ReturnRecordPayGet'])->middleware('auth')->name('ReturnRecordPayGet');

Route::post('SubmitPay', [PaymentsController::class, 'SubmitPay'])->middleware('auth')->name('SubmitPay');

Route::post('ReturnRecordPay', [PaymentsController::class, 'ReturnRecordPay'])->middleware('auth')->name('ReturnRecordPay');

Route::get('ConfirmNotUsed/{id}', [PaymentsController::class, 'ConfirmNotUsed'])->middleware('auth')->name('ConfirmNotUsed');

Route::get('RecordPaymentGET/{id}', [PaymentsController::class, 'RecordPaymentGET'])->middleware('auth')->name('RecordPaymentGET');

Route::post('ManageMonthsPay', [PaymentsController::class, 'ManageMonthsPay'])->middleware('auth')->name('ManageMonthsPay');

Route::get('MarkNotUsed', [PaymentsController::class, 'MarkNotUsed'])->middleware('auth')->name('MarkNotUsed');

Route::post('PaymentHistory', [PaymentsController::class, 'PaymentHistory'])->middleware('auth')->name('PaymentHistory');

Route::get('SelectPayHistory', [PaymentsController::class, 'SelectPayHistory'])->middleware('auth')->name('SelectPayHistory');

Route::get('GetRecordPayment/{id}', [PaymentsController::class, 'GetRecordPayment'])->middleware('auth')->name('GetRecordPayment');

Route::post('SubmitPayment', [PaymentsController::class, 'SubmitPayment'])->middleware('auth')->name('SubmitPayment');

Route::post('RecordPayment', [PaymentsController::class, 'RecordPayment'])->middleware('auth')->name('RecordPayment');

Route::get('SelectTenantPay', [PaymentsController::class, 'SelectTenantPay'])->middleware('auth')->name('SelectTenantPay');

Route::post('AssignmentReport', [TenantsController::class, 'AssignmentReport'])->middleware('auth')->name('AssignmentReport');

Route::get('AssignPropertySelect', [TenantsController::class, 'AssignPropertySelect'])->middleware('auth')->name('AssignPropertySelect');

Route::get('AssignReportSelectTenant/{id}', [TenantsController::class, 'AssignReportSelectTenant'])->middleware('auth')->name('AssignReportSelectTenant');

Route::post('Assignment', [TenantsController::class, 'Assignment'])->middleware('auth')->name('Assignment');

Route::post('AssignmentRoom', [TenantsController::class, 'AssignmentRoom'])->middleware('auth')->name('AssignmentRoom');

Route::get('SelectTenant', [TenantsController::class, 'SelectTenant'])->middleware('auth')->name('SelectTenant');

Route::post('/UpdateTenant', [TenantsController::class, 'UpdateTenant'])->middleware('auth')->name('UpdateTenant');

Route::get('/DeleteTenant/{id}', [TenantsController::class, 'DeleteTenant'])->middleware('auth')->name('DeleteTenant');

Route::post('/NewTenant', [TenantsController::class, 'NewTenant'])->middleware('auth')->name('NewTenant');

Route::get('/MgtTenants', [TenantsController::class, 'MgtTenants'])->middleware('auth')->name('MgtTenants');

Route::get('/DeleteProperty/{hid}', [HousesController::class, 'DeleteProperty'])->middleware('auth')->name('DeleteProperty');

Route::post('/CreateHouses', [HousesController::class, 'CreateHouses'])->middleware('auth')->name('CreateHouses');

Route::get('/MgtHouses', [HousesController::class, 'MgtHouses'])->middleware('auth')->name('MgtHouses');

Route::get('/DeleteRooms/{id}', [HousesController::class, 'DeleteRooms'])->middleware('auth')->name('DeleteRooms');

Route::post('/CreateRooms', [HousesController::class, 'CreateRooms'])->middleware('auth')->name('CreateRooms');

Route::get('/MgtRooms', [HousesController::class, 'MgtRooms'])->middleware('auth')->name('MgtRooms');

Route::get('/DeleteLocation/{id}', [LocationsController::class, 'DeleteLocation'])->middleware('auth')->name('DeleteLocation');

Route::post('/AddLocation', [LocationsController::class, 'AddLocation'])->middleware('auth')->name('AddLocation');

Route::get('/ManageLocations', [LocationsController::class, 'ManageLocations'])->middleware('auth')->name('ManageLocations');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
