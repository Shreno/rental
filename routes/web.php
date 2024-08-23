<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\AdminController;
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





Route::get('/', "ForntEndController@home")->name('homepage');

// Auth::routes();
Route::group(['middleware' => ['web']] , function () {
    Route::get('admin-login', [LoginController::class, 'showloginform'])->name('show.login');
    Route::post('admin-login', [LoginController::class, 'login'])->name('admin-login');
});

Route::group(['middleware' => ['auth',  'admin-lang' , 'web' , 'check-role'] , 'namespace' => 'Dashboard'], function () {

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('edit-profile', [AdminController::class, 'editProfile'])->name('edit-profile');
    Route::put('update-profile', [AdminController::class, 'updateProfile'])->name('update-profile');
    Route::get('home', [
        'uses'      => 'HomeController@index',
        'as'        => 'home',
        'title'     => 'dashboard.home',
        'type'      => 'parent'
    ]);
/*------------ start Of roles ----------*/
    Route::get('roles', [
        'uses'      => 'RoleController@index',
        'as'        => 'roles.index',
        'title'     => 'dashboard.roles',
        'type'      => 'parent',
        'child'     => [ 'roles.store','roles.edit', 'roles.update', 'roles.destroy'  ,'roles.deleteAll']
    ]);

    # roles store
    Route::get('roles/create', [
        'uses'  => 'RoleController@create',
        'as'    => 'roles.create',
        'type'      => 'child',
        'title' => ['actions.add', 'dashboard.role']
    ]);

    # roles store
    Route::post('roles/store', [
        'uses'  => 'RoleController@store',
        'as'    => 'roles.store',
        'type'      => 'child',
        'title' => ['actions.add', 'dashboard.role']
    ]);

    # roles update
    Route::get('roles/{id}/edit', [
        'uses'  => 'RoleController@edit',
        'as'    => 'roles.edit',
        'type'      => 'child',
        'title' => ['actions.edit', 'dashboard.role']
    ]);

    # roles update
    Route::put('roles/{id}', [
        'uses'  => 'RoleController@update',
        'as'    => 'roles.update',
        'type'      => 'child',
        'title' => ['actions.edit', 'dashboard.role']
    ]);

    # roles delete
    Route::delete('roles/{id}', [
        'uses'  => 'RoleController@destroy',
        'as'    => 'roles.destroy',
        'type'      => 'child',
        'title' => ['actions.delete', 'dashboard.role']
    ]);
    #delete all roles
    Route::post('delete-all-roles', [
        'uses'  => 'RoleController@deleteAll',
        'as'    => 'roles.deleteAll',
        'title' => ['actions.delete_all', 'dashboard.roles']
    ]);
/*------------ end Of roles ----------*/
/*------------ start Of admins ----------*/
    Route::get('admins', [
        'uses'      => 'AdminController@index',
        'as'        => 'admins.index',
        'title'     => 'dashboard.admins',
        'type'      => 'parent',
        'child'     => [ 'admins.store','admins.edit', 'admins.update', 'admins.destroy'  ,'admins.deleteAll' , 'activations-status' ,'admin-permission']
    ]);

    # admins store
    Route::get('admins/create', [
        'uses'  => 'AdminController@create',
        'as'    => 'admins.create',
        'title' => ['actions.add', 'dashboard.admin']
    ]);

    # admins store
    Route::post('admins/store', [
        'uses'  => 'AdminController@store',
        'as'    => 'admins.store',
        'title' => ['actions.add', 'dashboard.admin']
    ]);

    # admins update
    Route::get('admins/{id}/edit', [
        'uses'  => 'AdminController@edit',
        'as'    => 'admins.edit',
        'title' => ['actions.edit', 'dashboard.admin']
    ]);

    # admins update
    Route::put('admins/{id}', [
        'uses'  => 'AdminController@update',
        'as'    => 'admins.update',
        'title' => ['actions.edit','dashboard.admin']
    ]);

    # admins delete
    Route::delete('admins/{id}', [
        'uses'  => 'AdminController@destroy',
        'as'    => 'admins.destroy',
        'title' => ['actions.delete', 'dashboard.admin']
    ]);
    #delete all admins
    Route::post('delete-all-admins', [
        'uses'  => 'AdminController@deleteAll',
        'as'    => 'admins.deleteAll',
        'title' => ['actions.delete_all', 'dashboard.admins']
    ]);

    Route::get('admin-permissions/{admin_id}', [
        'uses'  => 'AdminController@adminPermissions',
        'as'    => 'admin-permission',
        'title' => ['actions.show', 'dashboard.permissions']
    ]);
    Route::post('activations-status/{admin_id}', [
        'uses'  => 'AdminController@activationStatus',
        'as'    => 'activations-status',
        'title' => ['actions.change', 'dashboard.account_status']
    ]);

/*------------ end Of admins ----------*/

/*------------ start Of categories ----------*/
    Route::get('categories', [
        'uses'      => 'CategoryController@index',
        'as'        => 'categories.index',
        'title'     => 'dashboard.categories',
        'type'      => 'parent',
        'child'     => [ 'categories.store','categories.edit', 'categories.update', 'categories.destroy'  ,'categories.deleteAll']
    ]);

    # categories store
    Route::get('categories/create', [
        'uses'  => 'CategoryController@create',
        'as'    => 'categories.create',
        'title' => ['actions.add', 'dashboard.category']
    ]);

    # categories store
    Route::post('categories/store', [
        'uses'  => 'CategoryController@store',
        'as'    => 'categories.store',
        'title' => ['actions.add', 'dashboard.category']
    ]);

    # categories update
    Route::get('categories/{id}/edit', [
        'uses'  => 'CategoryController@edit',
        'as'    => 'categories.edit',
        'title' => ['actions.edit', 'dashboard.category']
    ]);

    # categories update
    Route::put('categories/{id}', [
        'uses'  => 'CategoryController@update',
        'as'    => 'categories.update',
        'title' => ['actions.edit', 'dashboard.category']
    ]);

    # categories delete
    Route::delete('categories/{id}', [
        'uses'  => 'CategoryController@destroy',
        'as'    => 'categories.destroy',
        'title' => ['actions.delete', 'dashboard.category']
    ]);
    #delete all categories
    Route::post('delete-all-categories', [
        'uses'  => 'CategoryController@deleteAll',
        'as'    => 'categories.deleteAll',
        'title' => ['actions.delete_all', 'dashboard.categories']
    ]);
/*------------ end Of categories ----------*/
/*------------ start Of banners ----------*/
Route::get('banners', [
    'uses'      => 'BannerController@index',
    'as'        => 'banners.index',
    'title'     => 'dashboard.banners',
    'type'      => 'parent',
    'child'     => [ 'banners.store','banners.edit', 'banners.update', 'banners.destroy'  ,'banners.deleteAll']
]);

# banners store
Route::get('banners/create', [
    'uses'  => 'BannerController@create',
    'as'    => 'banners.create',
    'title' => ['actions.add', 'dashboard.banner']
]);

# banners store
Route::post('banners/store', [
    'uses'  => 'BannerController@store',
    'as'    => 'banners.store',
    'title' => ['actions.add', 'dashboard.banner']
]);

# banners update
Route::get('banners/{id}/edit', [
    'uses'  => 'BannerController@edit',
    'as'    => 'banners.edit',
    'title' => ['actions.edit', 'dashboard.banner']
]);

# banners update
Route::put('banners/{id}', [
    'uses'  => 'BannerController@update',
    'as'    => 'banners.update',
    'title' => ['actions.edit', 'dashboard.banner']
]);

# banners delete
Route::delete('banners/{id}', [
    'uses'  => 'BannerController@destroy',
    'as'    => 'banners.destroy',
    'title' => ['actions.delete', 'dashboard.banner']
]);
#delete all banners
Route::post('delete-all-banners', [
    'uses'  => 'BannerController@deleteAll',
    'as'    => 'banners.deleteAll',
    'title' => ['actions.delete_all', 'dashboard.banners']
]);
/*------------ end Of banners ----------*/

/*------------ start Of cities ----------*/
Route::get('cities', [
    'uses'      => 'CitiesController@index',
    'as'        => 'cities.index',
    'title'     => 'dashboard.cities',
    'type'      => 'parent',
    'child'     => [ 'cities.store','cities.edit', 'cities.update', 'cities.destroy'  ,'cities.deleteAll']
]);

# cities store
Route::get('cities/create', [
    'uses'  => 'CitiesController@create',
    'as'    => 'cities.create',
    'title' => ['actions.add', 'dashboard.category']
]);

# cities store
Route::post('cities/store', [
    'uses'  => 'CitiesController@store',
    'as'    => 'cities.store',
    'title' => ['actions.add', 'dashboard.category']
]);

# cities update
Route::get('cities/{id}/edit', [
    'uses'  => 'CitiesController@edit',
    'as'    => 'cities.edit',
    'title' => ['actions.edit', 'dashboard.category']
]);

# cities update
Route::put('cities/{id}', [
    'uses'  => 'CitiesController@update',
    'as'    => 'cities.update',
    'title' => ['actions.edit', 'dashboard.category']
]);

# cities delete
Route::delete('cities/{id}', [
    'uses'  => 'CitiesController@destroy',
    'as'    => 'cities.destroy',
    'title' => ['actions.delete', 'dashboard.category']
]);
#delete all cities
Route::post('delete-all-cities', [
    'uses'  => 'CitiesController@deleteAll',
    'as'    => 'cities.deleteAll',
    'title' => ['actions.delete_all', 'dashboard.cities']
]);
/*------------ end Of cities ----------*/
/*------------ start Of neighborhoods ----------*/
Route::get('neighborhoods', [
    'uses'      => 'NeighborhoodsController@index',
    'as'        => 'neighborhoods.index',
    'title'     => 'dashboard.neighborhoods',
    'type'      => 'parent',
    'child'     => [ 'neighborhoods.store','neighborhoods.edit', 'neighborhoods.update', 'neighborhoods.destroy'  ,'neighborhoods.deleteAll']
]);

# neighborhoods store
Route::get('neighborhoods/create', [
    'uses'  => 'NeighborhoodsController@create',
    'as'    => 'neighborhoods.create',
    'title' => ['actions.add', 'dashboard.neighborhoods']
]);

# neighborhoods store
Route::post('neighborhoods/store', [
    'uses'  => 'NeighborhoodsController@store',
    'as'    => 'neighborhoods.store',
    'title' => ['actions.add', 'dashboard.neighborhoods']
]);

# neighborhoods update
Route::get('neighborhoods/{id}/edit', [
    'uses'  => 'NeighborhoodsController@edit',
    'as'    => 'neighborhoods.edit',
    'title' => ['actions.edit', 'dashboard.neighborhoods']
]);

# neighborhoods update
Route::put('neighborhoods/{id}', [
    'uses'  => 'NeighborhoodsController@update',
    'as'    => 'neighborhoods.update',
    'title' => ['actions.edit', 'dashboard.neighborhoods']
]);

# neighborhoods delete
Route::delete('neighborhoods/{id}', [
    'uses'  => 'NeighborhoodsController@destroy',
    'as'    => 'neighborhoods.destroy',
    'title' => ['actions.delete', 'dashboard.neighborhoods']
]);
#delete all neighborhoods
Route::post('delete-all-neighborhoods', [
    'uses'  => 'NeighborhoodsController@deleteAll',
    'as'    => 'neighborhoods.deleteAll',
    'title' => ['actions.delete_all', 'dashboard.neighborhoods']
]);
/*------------ end Of neighborhoods ----------*/
/*------------ start Of properties ----------*/
Route::get('properties', [
    'uses'      => 'PropertyController@index',
    'as'        => 'properties.index',
    'title'     => 'dashboard.properties',
    'type'      => 'parent',
    'child'     => [ 'properties.store','properties.edit', 'properties.update', 'properties.destroy'  ,'properties.deleteAll']
]);

# properties store
Route::get('properties/create', [
    'uses'  => 'PropertyController@create',
    'as'    => 'properties.create',
    'title' => ['actions.add', 'dashboard.category']
]);

# properties store
Route::post('properties/store', [
    'uses'  => 'PropertyController@store',
    'as'    => 'properties.store',
    'title' => ['actions.add', 'dashboard.category']
]);

# properties update
Route::get('properties/{id}/edit', [
    'uses'  => 'PropertyController@edit',
    'as'    => 'properties.edit',
    'title' => ['actions.edit', 'dashboard.category']
]);

# properties update
Route::put('properties/{id}', [
    'uses'  => 'PropertyController@update',
    'as'    => 'properties.update',
    'title' => ['actions.edit', 'dashboard.category']
]);

# properties delete
Route::delete('properties/{id}', [
    'uses'  => 'PropertyController@destroy',
    'as'    => 'properties.destroy',
    'title' => ['actions.delete', 'dashboard.category']
]);
#delete all properties
Route::post('delete-all-properties', [
    'uses'  => 'PropertyController@deleteAll',
    'as'    => 'properties.deleteAll',
    'title' => ['actions.delete_all', 'dashboard.properties']
]);
/*------------ end Of properties ----------*/
/*********************************************/
/*------------ start Of primary-amenities ----------*/
Route::get('primary-amenities', [
    'uses'      => 'PrimaryAmenitiesController@index',
    'as'        => 'primary-amenities.index',
    'title'     => 'dashboard.primary-amenities',
    'type'      => 'parent',
    'child'     => ['primary-amenities.show']
]);

# sub-amenities update
Route::get('primary-amenities/{id}/show', [
    'uses'  => 'PrimaryAmenitiesController@show',
    'as'    => 'primary-amenities.show',
    'title' => ['actions.show', 'dashboard.primary-amenities']
]);

/*------------ end Of primary-amenities ----------*/
/*------------ start Of sub-amenities ----------*/
Route::get('sub-amenities', [
    'uses'      => 'SubAmenitiesController@index',
    'as'        => 'sub-amenities.index',
    'title'     => 'dashboard.sub-amenities',
    'type'      => 'parent',
    'child'     => [ 'sub-amenities.store','sub-amenities.edit', 'sub-amenities.update', 'sub-amenities.destroy'  ,'sub-amenities.deleteAll']
]);

# sub-amenities store
Route::get('sub-amenities/create', [
    'uses'  => 'SubAmenitiesController@create',
    'as'    => 'sub-amenities.create',
    'title' => ['actions.add', 'dashboard.sub-amenities']
]);

# sub-amenities store
Route::post('sub-amenities/store', [
    'uses'  => 'SubAmenitiesController@store',
    'as'    => 'sub-amenities.store',
    'title' => ['actions.add', 'dashboard.sub-amenities']
]);

# sub-amenities update
Route::get('sub-amenities/{id}/edit', [
    'uses'  => 'SubAmenitiesController@edit',
    'as'    => 'sub-amenities.edit',
    'title' => ['actions.edit', 'dashboard.sub-amenities']
]);

# sub-amenities update
Route::put('sub-amenities/{id}', [
    'uses'  => 'SubAmenitiesController@update',
    'as'    => 'sub-amenities.update',
    'title' => ['actions.edit', 'dashboard.sub-amenities']
]);

# sub-amenities delete
Route::delete('sub-amenities/{id}', [
    'uses'  => 'SubAmenitiesController@destroy',
    'as'    => 'sub-amenities.destroy',
    'title' => ['actions.delete', 'dashboard.sub-amenities']
]);
#delete all sub-amenities
Route::post('delete-all-sub-amenities', [
    'uses'  => 'SubAmenitiesController@deleteAll',
    'as'    => 'sub-amenities.deleteAll',
    'title' => ['actions.delete_all', 'dashboard.sub-amenities']
]);
/*------------ end Of sub-amenities ----------*/
/*------------ start Of property-features ----------*/
Route::get('property-features', [
    'uses'      => 'PropertyFeaturesController@index',
    'as'        => 'property-features.index',
    'title'     => 'dashboard.property-features',
    'type'      => 'parent',
    'child'     => [ 'property-features.store','property-features.edit', 'property-features.update', 'property-features.destroy'  ,'property-features.deleteAll']
]);

# property-features store
Route::get('property-features/create', [
    'uses'  => 'PropertyFeaturesController@create',
    'as'    => 'property-features.create',
    'title' => ['actions.add', 'dashboard.property-features']
]);

# property-features store
Route::post('property-features/store', [
    'uses'  => 'PropertyFeaturesController@store',
    'as'    => 'property-features.store',
    'title' => ['actions.add', 'dashboard.property-features']
]);

# property-features update
Route::get('property-features/{id}/edit', [
    'uses'  => 'PropertyFeaturesController@edit',
    'as'    => 'property-features.edit',
    'title' => ['actions.edit', 'dashboard.property-features']
]);

# property-features update
Route::put('property-features/{id}', [
    'uses'  => 'PropertyFeaturesController@update',
    'as'    => 'property-features.update',
    'title' => ['actions.edit', 'dashboard.property-features']
]);

# property-features delete
Route::delete('property-features/{id}', [
    'uses'  => 'PropertyFeaturesController@destroy',
    'as'    => 'property-features.destroy',
    'title' => ['actions.delete', 'dashboard.property-features']
]);
#delete all property-features
Route::post('delete-all-property-features', [
    'uses'  => 'PropertyFeaturesController@deleteAll',
    'as'    => 'property-features.deleteAll',
    'title' => ['actions.delete_all', 'dashboard.property-features']
]);
/*------------ end Of property-features ----------*/

/*------------ start Of Settings----------*/
    Route::get('settings', [
        'uses'      => 'SettingController@index',
        'as'        => 'settings',
        'title'     => 'dashboard.settings',
        'type'      => 'parent',
        'child'     => [
            'update-settings','sms-update' ,
        ]
    ]);

    #update
    Route::post('settings', [
        'uses' => 'SettingController@update',
        'as' => 'update-settings', 
        'title' =>  ['actions.edit', 'dashboard.settings']
    ]);

    #message all
    Route::post('settings/{type}/message-all', [
        'uses'  => 'SettingController@messageAll',
        'as'    => 'settings.message.all',
        'title' => ['actions.send', 'dashboard.all_users']
    ])->where('type','email|sms|notification');

    #message one
    Route::post('settings/{type}/message-one', [
        'uses'  => 'SettingController@messageOne',
        'as'    => 'settings.message.one',
        'title' => ['actions.send', 'dashboard.user']
    ])->where('type','email|sms|notification');

    #send email
    Route::post('settings/send-email', [
        'uses'  => 'SettingController@sendEmail',
        'as'    => 'settings.send_email',
        'title' =>  ['actions.send_email', 'dashboard.user']
    
    ]);

    Route::post('sms-update',[
        'uses'  => 'SettingController@updateSms',
        'as'    => 'sms-update',
        'title' => ['actions.edit', 'dashboard.sms_providers']
    ]);
    
    Route::get('set-lang/{lang}', [
        'uses'  => 'SettingController@SetLanguage',
        'as'    => 'set-lang',
        'title' => 'dashboard.set_lang'
    ]);

/*------------ end Of Settings ----------*/




/*------------ start Of notifications ----------*/
    Route::get('notifications', [
        'uses'      => 'NotificationController@index',
        'as'        => 'notifications.index',
        'title'     => 'dashboard.notifications',
        'type'      => 'parent',
        'child'     => ['notifications.store', 'notifications.destroy'  ,'notifications.deleteAll']
    ]);

    # notifications store
    Route::get('notifications/create', [
        'uses'  => 'NotificationController@create',
        'as'    => 'notifications.create',
        'title' => ['actions.add', 'dashboard.notification']
    ]);

    # notifications store
    Route::post('notifications/store', [
        'uses'  => 'NotificationController@store',
        'as'    => 'notifications.store',
        'title' => ['actions.add', 'dashboard.notification']
    ]);


    # notifications delete
    Route::delete('notifications/{id}', [
        'uses'  => 'NotificationController@destroy',
        'as'    => 'notifications.destroy',
        'title' => ['actions.delete', 'dashboard.notification']
    ]);
    #delete all notifications
    Route::post('delete-all-notifications', [
        'uses'  => 'NotificationController@deleteAll',
        'as'    => 'notifications.deleteAll',
        'title' => ['actions.delete_all', 'dashboard.notifications']
    ]);

    Route::post('send-notification', [

        'uses'  => 'NotificationController@sendNotification',
        'as'    => 'send-notification',
        'title' => 'dashboard.send_notification'
    ]);

    Route::post('storeToken', [
        'uses'  => 'NotificationController@storeToken',
        'as'    => 'notifications.storeToken',
        'title' => 'dashboard.store_token'
    ]);
    Route::post('notify', [
        'uses'  => 'NotificationController@notify',
        'as'    => 'notify',
        'title' => 'dashboard.send_one_notification'
    ]);
    
/*------------ end Of notifications ----------*/

/*------------ start Of clients ----------*/
Route::get('clients', [
    'uses'      => 'ClientController@index',
    'as'        => 'clients.index',
    'title'     => 'dashboard.clients',
    'type'      => 'parent',
    'child'     => [ 'clients.create','clients.edit', 'clients.destroy'  ,'clients.deleteAll']
]);

# categories store
Route::get('clients/create', [
    'uses'  => 'ClientController@create',
    'as'    => 'clients.create',
    'title' => ['actions.add', 'dashboard.clients']
]);

# categories store
Route::post('clients/store', [
    'uses'  => 'ClientController@store',
    'as'    => 'clients.store',
    'title' => ['actions.add', 'dashboard.clients']
]);

# clients update
Route::get('clients/{id}/edit', [
    'uses'  => 'ClientController@edit',
    'as'    => 'clients.edit',
    'title' => ['actions.edit', 'dashboard.clients']
]);

# clients update
Route::put('clients/{id}', [
    'uses'  => 'ClientController@update',
    'as'    => 'clients.update',
    'title' => ['actions.edit', 'dashboard.clients']
]);

# clients delete
Route::delete('clients/{id}', [
    'uses'  => 'ClientController@destroy',
    'as'    => 'clients.destroy',
    'title' => ['actions.delete', 'dashboard.clients']
]);
#delete all clients
Route::post('delete-all-clients', [
    'uses'  => 'ClientController@deleteAll',
    'as'    => 'clients.deleteAll',
    'title' => ['actions.delete_all', 'dashboard.clients']
]);
/*------------ end Of clients ----------*/


/*------------ start Of bookingsCondition ----------*/
Route::get('booking-conditions', [
    'uses'      => 'BookingConditionController@index',
    'as'        => 'booking-conditions.index',
    'title'     => 'dashboard.booking-conditions',
    'type'      => 'parent',
    'child'     => [ 'booking-conditions.create','booking-conditions.edit', 'booking-conditions.destroy'  ,'booking-conditions.deleteAll']
]);

# booking-conditions store
Route::get('booking-conditions/create', [
    'uses'  => 'BookingConditionController@create',
    'as'    => 'booking-conditions.create',
    'title' => ['actions.add', 'dashboard.booking-conditions']
]);

# booking-conditions store
Route::post('booking-conditions/store', [
    'uses'  => 'BookingConditionController@store',
    'as'    => 'booking-conditions.store',
    'title' => ['actions.add', 'dashboard.booking-conditions']
]);

# booking-conditions update
Route::get('booking-conditions/{id}/edit', [
    'uses'  => 'BookingConditionController@edit',
    'as'    => 'booking-conditions.edit',
    'title' => ['actions.edit', 'dashboard.booking-conditions']
]);

# booking-conditions update
Route::put('booking-conditions/{id}', [
    'uses'  => 'BookingConditionController@update',
    'as'    => 'booking-conditions.update',
    'title' => ['actions.edit', 'dashboard.booking-conditions']
]);

# booking-conditions delete
Route::delete('booking-conditions/{id}', [
    'uses'  => 'BookingConditionController@destroy',
    'as'    => 'booking-conditions.destroy',
    'title' => ['actions.delete', 'dashboard.booking-conditions']
]);
#booking-conditions all clients
Route::post('delete-all-booking-conditions', [
    'uses'  => 'BookingConditionController@deleteAll',
    'as'    => 'booking-conditions.deleteAll',
    'title' => ['actions.delete_all', 'dashboard.booking-conditions']
]);
/*------------ end Of bookingsCondition ----------*/
/*------------ start Of Banks ----------*/
Route::get('banks', [
    'uses'      => 'BankController@index',
    'as'        => 'banks.index',
    'title'     => 'dashboard.banks',
    'type'      => 'parent',
    'child'     => [ 'banks.create','banks.edit', 'banks.destroy'  ,'banks.deleteAll']
]);

# banks store
Route::get('banks/create', [
    'uses'  => 'BankController@create',
    'as'    => 'banks.create',
    'title' => ['actions.add', 'dashboard.banks']
]);

# banks store
Route::post('banks/store', [
    'uses'  => 'BankController@store',
    'as'    => 'banks.store',
    'title' => ['actions.add', 'dashboard.banks']
]);

# banks update
Route::get('banks/{id}/edit', [
    'uses'  => 'BankController@edit',
    'as'    => 'banks.edit',
    'title' => ['actions.edit', 'dashboard.banks']
]);

# banks update
Route::put('banks/{id}', [
    'uses'  => 'BankController@update',
    'as'    => 'banks.update',
    'title' => ['actions.edit', 'dashboard.banks']
]);

# banks delete
Route::delete('banks/{id}', [
    'uses'  => 'BankController@destroy',
    'as'    => 'banks.destroy',
    'title' => ['actions.delete', 'dashboard.banks']
]);
#banks all clients
Route::post('delete-all-banks', [
    'uses'  => 'BankController@deleteAll',
    'as'    => 'banks.deleteAll',
    'title' => ['actions.delete_all', 'dashboard.banks']
]);
/*------------ end Of Banks ----------*/

/*------------ start Of bookings ----------*/
Route::get('bookings', [
    'uses'      => 'BookingController@index',
    'as'        => 'bookings.index',
    'title'     => 'dashboard.bookings',
    'type'      => 'parent',
    'child'     => [ 'bookings.create','bookings.edit', 'bookings.destroy'  ,'bookings.deleteAll']
]);

# banks store
Route::get('bookings/create', [
    'uses'  => 'BookingController@create',
    'as'    => 'bookings.create',
    'title' => ['actions.add', 'dashboard.bookings']
]);

# banks store
Route::post('bookings/store', [
    'uses'  => 'BookingController@store',
    'as'    => 'bookings.store',
    'title' => ['actions.add', 'dashboard.bookings']
]);

# banks update
Route::get('bookings/{id}/edit', [
    'uses'  => 'BookingController@edit',
    'as'    => 'bookings.edit',
    'title' => ['actions.edit', 'dashboard.bookings']
]);

# banks update
Route::put('bookings/{id}', [
    'uses'  => 'BookingController@update',
    'as'    => 'bookings.update',
    'title' => ['actions.edit', 'dashboard.bookings']
]);

# banks delete
Route::delete('bookings/{id}', [
    'uses'  => 'BookingController@destroy',
    'as'    => 'bookings.destroy',
    'title' => ['actions.delete', 'dashboard.bookings']
]);
#banks all clients
Route::post('delete-all-bookings', [
    'uses'  => 'BookingController@deleteAll',
    'as'    => 'bookings.deleteAll',
    'title' => ['actions.delete_all', 'dashboard.bookings']
]);
/*------------ end Of bookings ----------*/

/*------------ start Of payments ----------*/
Route::get('payments', [
    'uses'      => 'PaymentController@index',
    'as'        => 'payments.index',
    'title'     => 'dashboard.payments',
    'type'      => 'parent',
    'child'     => [ 'payments.create','payments.edit', 'payments.destroy'  ,'payments.deleteAll']
]);

# banks store
Route::get('payments/create', [
    'uses'  => 'PaymentController@create',
    'as'    => 'payments.create',
    'title' => ['actions.add', 'dashboard.payments']
]);

# banks store
Route::post('payments/store', [
    'uses'  => 'PaymentController@store',
    'as'    => 'payments.store',
    'title' => ['actions.add', 'dashboard.payments']
]);

# banks update
Route::get('payments/{id}/edit', [
    'uses'  => 'PaymentController@edit',
    'as'    => 'payments.edit',
    'title' => ['actions.edit', 'dashboard.payments']
]);

# banks update
Route::put('payments/{id}', [
    'uses'  => 'PaymentController@update',
    'as'    => 'payments.update',
    'title' => ['actions.edit', 'dashboard.payments']
]);

# banks delete
Route::delete('payments/{id}', [
    'uses'  => 'PaymentController@destroy',
    'as'    => 'payments.destroy',
    'title' => ['actions.delete', 'dashboard.payments']
]);
#banks all clients
Route::post('delete-all-payments', [
    'uses'  => 'PaymentController@deleteAll',
    'as'    => 'payments.deleteAll',
    'title' => ['actions.delete_all', 'dashboard.payments']
]);
/*------------ end Of payments ----------*/

/*------------ start Of payments ----------*/
# List all bank accounts
Route::get('bank-accounts', [
    'uses'      => 'BankAccountController@index',
    'as'        => 'bank-accounts.index',
    'title'     => 'dashboard.bank_accounts',
    'type'      => 'parent',
    'child'     => ['bank-accounts.create', 'bank-accounts.edit', 'bank-accounts.destroy', 'bank-accounts.deleteAll']
]);

# Create a bank account
Route::get('bank-accounts/create', [
    'uses'  => 'BankAccountController@create',
    'as'    => 'bank-accounts.create',
    'title' => ['actions.add', 'dashboard.bank_accounts']
]);

# Store a bank account
Route::post('bank-accounts/store', [
    'uses'  => 'BankAccountController@store',
    'as'    => 'bank-accounts.store',
    'title' => ['actions.add', 'dashboard.bank_accounts']
]);

# Edit a bank account
Route::get('bank-accounts/{id}/edit', [
    'uses'  => 'BankAccountController@edit',
    'as'    => 'bank-accounts.edit',
    'title' => ['actions.edit', 'dashboard.bank_accounts']
]);

# Update a bank account
Route::put('bank-accounts/{id}', [
    'uses'  => 'BankAccountController@update',
    'as'    => 'bank-accounts.update',
    'title' => ['actions.edit', 'dashboard.bank_accounts']
]);

# Delete a bank account
Route::delete('bank-accounts/{id}', [
    'uses'  => 'BankAccountController@destroy',
    'as'    => 'bank-accounts.destroy',
    'title' => ['actions.delete', 'dashboard.bank_accounts']
]);

# Delete all bank accounts
Route::post('delete-all-bank-accounts', [
    'uses'  => 'BankAccountController@deleteAll',
    'as'    => 'bank-accounts.deleteAll',
    'title' => ['actions.delete_all', 'dashboard.bank_accounts']
]);
/*------------ end Of payments ----------*/




  

/*------------ Never remove this line ----------*/
    

    #new_routes_here
                     
         

});




/*** update route if i added new routes  */
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

Route::get('update-routes', function (){
    $routes_data    = [];

    foreach (Route::getRoutes() as $route) {
        if ($route->getName()){
            
            $check_permission = Permission::where('name',$route->getName())->count();

            if(!$check_permission)
            {
                $routes_data []   = [ 'name' => $route->getName() , 
                    'nickname_en' =>  $route->getName() ,
                    'nickname_ar' =>  $route->getName() ,
                    'guard_name' => 'web'
                ];
            }
            
        }
    }
    Permission::insert( $routes_data );

    $admin = App\Models\User::find(1);
    $role = Role::find(1);

    $role->givePermissionTo(Permission::all());
    $admin->assignRole('super-admin');

});


Route::get('files/storage/{filePath}', [AdminController::class,'fileStorageServe'])->where(['filePath' => '.*'])->name('serve.file');





 /*** USE AUTH AREA  */
 Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
 Route::post('login', [LoginController::class, 'login']);
 // REHIESTER
 Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
 Route::post('register', [RegisterController::class, 'register']);
 // routes/web.php
 Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
 Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
 Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
 Route::post('reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');
/*** USE AUTH AREA  */



