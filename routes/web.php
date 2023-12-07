<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'FrontendController@index')->name("home");
Route::post('/register', 'RegisterController@register')->name("signup");
Route::get('/register-agent', 'FrontendController@agent')->name("register-agent");
Route::get('/register-corporation', 'FrontendController@corporation')->name("register-corporation");
Route::get('/register-agent-renewal', 'FrontendController@renwal')->name("register-agent-renewal");


// Route::get('/run-renewal', function () {
//     // Run the specific migration
//     Artisan::call('migrate', ['--path' => 'database/migrations/2023_11_06_065509_create_approval_rejects_table.php']);

//     return 'Specific migration executed successfully.';
// });


Route::get('/clear',function(){
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
     Artisan::call('route:clear');
    Artisan::call('view:clear');

});



Route::get('stripe', 'Client\PaymentController@stripe');
Route::post('stripe', 'Client\PaymentController@stripePost')->name('stripe.post');
Route::get('/main', function () {
    return view('frontend.success');
})->name('main');
Route::post('checkout-paypal', 'Client\PaymentController@ProcessPayPalCheckout')->name('processCheckoutPaypal');
// route for check status of the payment
Route::get('status/{id}', 'Client\PaymentController@getPaymentStatus');
Auth::routes();

Route::group([
    'middleware'    => ['auth'],
    'prefix'        => 'client',
    'namespace'     => 'Client'
], function ()
{
    Route::get('/dashboard', 'ClientController@index')->name('client.dashboard');
	Route::get('/profile', 'ClientController@edit')->name('client-profile');
	Route::post('/user-update', 'ClientController@update')->name('client.update');


    //Client Orders Routes..
    Route::get('/orders', 'OrderController@index')->name('orders');
    Route::get('orders-client-show/{id}','OrderController@show')->name('orders.client.show');
    Route::get('/get-client-orders', 'OrderController@getClientOrder')->name('client.orders');
    Route::get('/edit-client-orders/{id}', 'OrderController@editClientOrder')->name('edit.client.orders');
    Route::post('/store_client_orders', 'OrderController@storeClientOrder')->name('store.client.orders');

    Route::get('approval-reject-notify', 'OrderController@approvalRejectNotify')->name('client.approval.reject.notify');
    Route::get('get-content', 'OrderController@getContent')->name('client.get.content');


});

Route::group([
    'middleware'    => ['auth','is_admin'],
    'prefix'        => 'admin',
    'namespace'     => 'Admin'
], function ()
{
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    Route::get('/filter-user-date', 'AdminController@userDateFilter')->name('admin.user.date');
    Route::get('/date', 'AdminController@dateFilter')->name('admin.date');
    Route::get('/filter-agent-date', 'AdminController@filterAgentDate')->name('admin.agent.date');
    Route::get('/filter-company-date', 'AdminController@filterCompanyDate')->name('admin.company.date');
    Route::get('/filter-annual-date', 'AdminController@filterAnnualDate')->name('admin.annual.date');

    Route::get('/profile', 'AdminController@edit')->name('admin-profile');
    Route::post('/admin-update', 'AdminController@update')->name('admin-update');
    //Setting Routes
    Route::resource('setting','SettingController');

	//Clients Routes
	Route::resource('clients','ClientController');
	Route::post('get-clients', 'ClientController@getClients')->name('admin.getClients');
	Route::post('get-client', 'ClientController@clientDetail')->name('admin.getClient');
	Route::get('get-client-detail/{id}', 'ClientController@getClientDetail')->name('admin.client.detail');
	Route::get('client/delete/{id}', 'ClientController@destroy');
	Route::post('delete-selected-clients', 'ClientController@deleteSelectedClients')->name('admin.delete-selected-clients');

	//Service Routes
	Route::resource('service-items','ServiceItemController');
	Route::post('get-service-items', 'ServiceItemController@getClients')->name('admin.getServices');
	Route::post('get-service-item', 'ServiceItemController@clientDetail')->name('admin.getService');
	Route::get('service-item/delete/{id}', 'ServiceItemController@destroy');
	Route::post('delete-selected-services', 'ServiceItemController@deleteSelectedClients')->name('admin.delete-selected-services');



    //Orders Routes
    Route::any('orders','OrderController@index')->name('orders.index');
    Route::get('orders-show/{id}','OrderController@show')->name('orders.show');
    Route::get('edit-orders/{id}', 'OrderController@editOrder')->name('edit.orders');
    Route::post('orders-update','OrderController@updateOrder')->name('orders.update');
    // Route::post('orders-update','OrderController@update')->name('orders.update');
    Route::post('get-orders', 'OrderController@getClients')->name('admin.getOrders');


    Route::post('get-order', 'OrderController@clientDetail')->name('admin.getOrder');
    Route::get('order/delete/{id}', 'OrderController@destroy');
    Route::post('delete-selected-orders', 'OrderController@deleteSelectedClients')->name('admin.delete-selected-orders');


    Route::get('orders-requests', 'OrderController@ordersRequests')->name('admin.orders.requests');
    Route::get('get-orders-requests', 'OrderController@getOrderRequest')->name('admin.get.orders.requests');


    //register agent requests
    Route::get('agent-register-orders','OrderController@agentRegisterOrders')->name('agent.register.order');
    Route::get('form-company-orders','OrderController@formCompanyOrders')->name('form.company.order');
    Route::get('file-annual-orders','OrderController@fileAnnualOrders')->name('file.annual.order');

    Route::get('orders-edit-requests', 'OrderController@ordersEditRequests')->name('admin.orders.edit.requests');
    Route::get('orders-edit-pending', 'OrderController@ordersEditPending')->name('admin.orders.edit.pending');
    Route::get('orders-edit-approved', 'OrderController@ordersEditApproved')->name('admin.orders.edit.approved');
    Route::get('view-changes/{order_id}', 'OrderController@viewChanges')->name('admin.view.changes');


    //ajax call route
    Route::get('orders-request-status', 'OrderController@orderRequestStatus')->name('admin.request.approved.personal');
    Route::post('approval-reject', 'OrderController@approvalReject')->name('admin.approval.reject');
//   Updated by Zain
    Route::get('get-reject-orders-request', 'OrderController@getRejectOrders')->name('admin.get.reject.order-request');


    //Document Routes...
    Route::get('documents','DocumentController@index')->name('admin.documents');
    Route::post('store_document','DocumentController@storeDocument')->name('admin.store.document');

});









