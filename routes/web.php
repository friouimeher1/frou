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


Route::get('welcome',function(){
  return view('welcome1');
});
Route::resource('/', 'WelcomeController');//THE MAIN PAGE
Route::resource('/front','FrontController'); //CONTAIN THE PRODUCT
Route::get('/profile/{id}','FrontController@profile')->name('profile');//GET THE
Route::get('/add-to-cart/{id}', 'CommercantAuth\ProduitController@getAddToCart')->name('produit.addToCart');
//ADD A PARTICLUAR PRODUCT INTO THE CARD SHOPPING
Route::resource('/cart', 'CommercantAuth\ProduitController');
// Route::get('/single1',function(){
//   return view('user.front.single1');
// });

//ALL ABOUT NOTIFICATION FOR ADMIN





  Route::get('admin/index', 'AdminAuth\NotificationController@index');
  Route::get('admin/notification', 'AdminAuth\NotificationController@notification');
  Route::get('admin/notification/{id}', 'AdminAuth\NotificationController@markAsRead');
  Route::get('admin/notification/delete/{id}', 'AdminAuth\NotificationController@delete');




  Route::get('admin/produit','AdminAuth\ProduitController@produit')->name('admin.produit');
  Route::delete('admin/produit/{id}','AdminAuth\ProduitController@delete')->name('admin.destroy');
  Route::get('admin/chercherproduit','AdminAuth\ProduitController@search')->name('admin.search');
  Route::get('admin/promotion','AdminAuth\ProduitController@ProduitPromotion')->name('admin.promotion');
  Route::get('admin/profile','UserAuth\UserProfil@profileadmin')->name('admin.profile');
  Route::get('admin/modifierprofile','UserAuth\UserProfil@modifyprofileadmin')->name('admin.modifypofile');
  Route::post('admin/updateprofile','UserAuth\UserProfil@updateyprofileadmin')->name('admin.updateProfile');

  //ALL ABOUT ADMIN LIKE FOR EXEMPLE LOGIN LOGOUT
Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');



});
//BEFORE ADMIN MAKE SOMETHING HE MUST LOGIN
 Route::group(['middleware' => 'admin'], function () {
  Route::resource('admin/Categorie','AdminAuth\GererCategorieController');
  Route::resource('admin/User','AdminAuth\GererUserController');
  Route::resource('admin/Customer','AdminAuth\GererCommercantController');
  Route::post('admin/User/approve1','AdminAuth\GererUserController@approve');
  Route::post('/admin/Commercant/approve1','AdminAuth\GererCommercantController@approve');



    // ADMIN WANT  Contact OR REPLY TO  user
    Route::get('admin/getContact','AdminAuth\GererUserController@getContactUser')->name('admin.getContact');
    Route::get('admin/replytouser/{id}','AdminAuth\GererUserController@replyToUser')->name('replyContact');
    Route::delete('admin/getContact/{id}','AdminAuth\GererUserController@destroyContactUser')->name('contact.destroy');
    Route::post('admin/storereply/{id}','AdminAuth\GererUserController@storereply')->name('admin.storereply');
    Route::delete('admin/deletereply/{id}','AdminAuth\GererUserController@destroyreply')->name('destroyreply');
      Route::get('admin/charts', 'AdminAuth\GererUserController@charts')->name('charts');
      Route::get('admin/chartscustomer', 'AdminAuth\GererUserController@chartscutomer')->name('chartscustomer');

 });

 //THIS ALL ABOUT USER FOR EXEMPLE TO LOGIN OR RESITER

Route::group(['prefix' => 'user'], function () {
  Route::get('/login', 'UserAuth\LoginController@showLoginForm');
  Route::post('/login', 'UserAuth\LoginController@login');
  Route::post('/logout', 'UserAuth\LoginController@logout');

  Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'UserAuth\RegisterController@register');

  Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');
});
Route::get('visiteur/chercheproduit','VisiteurController@search')->name('cherche');
//USER WANT TO ENTER ADDRESS TO FOR PAYEMENT
Route::resource('/livraision','UserAuth\LivraisionController');
Route::get('payment','UserAuth\PayementController@payment')->name('payment');

Route::post('storePayment','UserAuth\PayementController@storePayment')->name('payment.store');
Route::get('user/getProfile','UserAuth\PayementController@getProfile')->name('getProfile');
Route::get('user/getProfile/{id}','UserAuth\PayementController@getPDF')->name('commande.pdf');
//pour contacter admin
//Route::get('user/contacter','UserAuth\ContacterAdminController@index')->name('contacteradmin');

//send mail
Route::get('user/contacter','MailController@email')->name('email');
Route::post('user/contacter','MailController@send')->name('send');
//Route::post('user/contacter','UserAuth\ContacterAdminController@store')->name('user.store');
Route::get('user/showmessage','AdminAuth\GererUserController@showmessagetouser')->name('admin.showmessagetouser');
Route::get('user/profile','UserAuth\UserProfil@profileuser')->name('user.profile');
Route::get('user/modifierprofile','UserAuth\UserProfil@modifyprofileuser')->name('user.modifypofile');
Route::post('user/updateprofile','UserAuth\UserProfil@updateyprofileuser')->name('user.updateProfileuser');
//middleware for user
Route::group(['middleware' => 'user'], function () {
      Route::get('user/produit/{id}',  'CommercantAuth\ProduitController@show');

// Route::get('/shop/{id}',function(){
//   return view('user.front.cart')->name('shop');
// });
Route::get('/single',function(){
  return view('user.front.single')->name('single');
});

//MANAGER THE SHOPPING CARD

Route::get('/shop', 'CommercantAuth\ProduitController@getCart')->name('produit.shoppingCart');
Route::get('/remove/{id}', 'CommercantAuth\ProduitController@getRemoveItem')->name('produit.remove');
Route::get('/reduce/{id}', 'CommercantAuth\ProduitController@getReductByOne')->name('produit.reduceByOne');
Route::get('/add/{id}', 'CommercantAuth\ProduitController@getAddByOne')->name('produit.addByOne');

});


Route::group(['prefix' => 'commercant'], function () {
  Route::get('/chercherproduit','CommercantAuth\ProduitController@search')->name('commercant.search');
  Route::get('/login', 'CommercantAuth\LoginController@showLoginForm');
  Route::post('/login', 'CommercantAuth\LoginController@login');
  Route::post('/logout', 'CommercantAuth\LoginController@logout');

  Route::get('/register', 'CommercantAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'CommercantAuth\RegisterController@register');

  Route::post('/password/email', 'CommercantAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'CommercantAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'CommercantAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'CommercantAuth\ResetPasswordController@showResetForm');

//middleware for customer
  Route::group(['middleware' => 'commercant'], function () {
      Route::resource('/produit',  'CommercantAuth\ProduitController');
     Route::post('/produit1',  'CommercantAuth\ProduitController@storepromo')->name('produit.storepromo');
       Route::get('/produit1/affiche', 'CommercantAuth\ProduitController@affichepromo')->name('promotion.affiche');
       Route::delete('/produit1/affiche/{id}', 'CommercantAuth\ProduitController@deletepromotion')->name('deletepromotion');
      Route::get('/produit1/{id}', 'CommercantAuth\ProduitController@promotion');
      Route::get('commercant/profile','UserAuth\UserProfil@profilecommercant')->name('commercant.profile');
      Route::post('commercant/contacter','UserAuth\ContacterCommercantController@store')->name('commercant.store');
      Route::get('commercant/show','UserAuth\ContacterCommercantController@show')->name('commercant.show');
      Route::get('commercant/replytouser/{id}','UserAuth\ContacterCommercantController@replyToUser')->name('commercant.reply');
      Route::post('commercant/storereply/{id}','UserAuth\ContacterCommercantController@storereply')->name('commercant.storereply');
      Route::delete('commercant/supprimer/{id}','UserAuth\ContacterCommercantController@delete')->name('commercant.destroy');
      Route::post('commercant/replytouser/{id}','UserAuth\ContacterCommercantController@replyToUser')->name('commercant.reply');
      Route::get('commercant/modifierprofile','UserAuth\UserProfil@modifyprofilecommercant')->name('commercant.modifypofilecommercant');
  Route::post('commercant/updateprofile','UserAuth\UserProfil@updateyprofilecommercant')->name('commercant.updateProfilecommercant');
  Route::resource('commercant/commande','CommercantAuth\CommandeController');
  Route::get('commercant/commande','CommercantAuth\CommandeController@commande')->name('commercant.commande');

  Route::get('notification', 'CommercantAuth\NotificationController@notification')->name('notification');
  Route::get('notification/{id}', 'CommercantAuth\NotificationController@markAsRead');
  Route::get('notification/delete/{id}', 'CommercantAuth\NotificationController@delete');
  Route::post('/approve','CommercantAuth\CommandeController@approve');
  Route::get('events', 'CommercantAuth\EventController@index')->name('calender');
  Route::get('notificationclient','CommercantAuth\ProduitController@promonotification')->name('notificationproduit');
  Route::post('notificationclient/{id}','CommercantAuth\ProduitController@sendtification')->name('sendnotif');


});
});
