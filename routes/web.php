<?php
use App\User;
use App\Notifications\NewMessage;
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
    //User::find(1)->notify(new NewMessage());
    return view('welcome');
});
//les routes cars
Route::get('cars','CarsController@index');
Route::get('cars/create','CarsController@create');
Route::post('cars','CarsController@store');
Route::get('cars/{id}/edit','CarsController@edit');
Route::get('cars/{id}/details','CarsController@details');
Route::put('cars/{id}','CarsController@update');
Route::get('cars/{id}','CarsController@destroy');
//les routes categories des cars
Route::get('categories','Cars_categoriesController@index');
Route::get('categories/create','Cars_categoriesController@create');
Route::post('categories','Cars_categoriesController@store');
Route::get('categories/{id}/edit','Cars_categoriesController@edit');
Route::get('categories/{id}/details','Cars_categoriesController@details');
Route::put('categories/{id}','Cars_categoriesController@update');
Route::get('categories/{id}','Cars_categoriesController@destroy');
//les routes clients
Route::get('clients','ClientsController@index');
Route::get('clients/create','ClientsController@create');
Route::post('clients','ClientsController@store');
Route::get('clients/{id}/edit','ClientsController@edit');
Route::get('clients/{id}/details','ClientsController@details');
Route::put('clients/{id}','ClientsController@update');
Route::get('clients/{id}','ClientsController@destroy');
//les routes cities
Route::get('cities','CitiesController@index');
Route::get('cities/create','CitiesController@create');
Route::post('cities','CitiesController@store');
Route::get('cities/{id}/edit','CitiesController@edit');
Route::get('cities/{id}/details','CitiesController@details');
Route::put('cities/{id}','CitiesController@update');
Route::get('cities/{id}','CitiesController@destroy');
//les routes reservations
Route::get('reservations','ReservationsController@index');
Route::get('reservations/create','ReservationsController@create');
Route::get('reserver/{id}','ReservationsController@create_client');
Route::post('reservations','ReservationsController@store');
//Route::post('reservations_client','ReservationClientController@store_client');
Route::get('reservations/{id}/edit','ReservationsController@edit');
Route::get('reservations/{id}/annuler','ReservationsController@annuler');
Route::get('reservations/corbeille','ReservationsController@corbeille');
Route::get('reservations/{id}/details','ReservationsController@details');
Route::put('reservations/{id}','ReservationsController@update');
Route::get('reservations/{id}','ReservationsController@destroy');
//les routes supplement_cars
Route::get('supplement_cars','Cars_SupplementsController@index');
Route::get('supplement_cars/create','Cars_SupplementsController@create');
Route::post('supplement_cars','Cars_SupplementsController@store');
Route::get('supplement_cars/{id}/edit','Cars_SupplementsController@edit');
Route::get('supplement_cars/{id}/details','Cars_SupplementsController@details');
Route::put('supplement_cars/{id}','Cars_SupplementsController@update');
Route::get('supplement_cars/{id}','Cars_SupplementsController@destroy');
//msg
Route::get('messages','MessagesController@index');
Route::get('messages/create','MessagesController@create');
Route::post('messages','MessagesController@store');
Route::get('messages/{id}/details','MessagesController@details');
Route::get('messages/{id}','MessagesController@destroy');
Route::get('messages_re','MessagesController@index_re');
Route::get('messages_re/{id}/repondre','MessagesController@repondre');
Route::get('messages_re/{id}/details_re','MessagesController@details_re');
Route::get('messages_re/{id}','MessagesController@destroy_re');

//blogs_categories
Route::get('blog_categories','Blog_categoriesController@index');
Route::get('blog_categories/create','Blog_categoriesController@create');
Route::post('blog_categories','Blog_categoriesController@store');
Route::get('blog_categories/{id}/edit','Blog_categoriesController@edit');
Route::get('blog_categories/{id}/details','Blog_categoriesController@details');
Route::put('blog_categories/{id}','Blog_categoriesController@update');
//blogs_posts
Route::get('blog_posts','Blog_postsController@index');
//Route::get('blog_posts/{id}/consulter','Blog_postsController@index_client');
Route::get('blog_posts/create','Blog_postsController@create');
Route::post('blog_posts','Blog_postsController@store');
Route::get('blog_posts/{id}/edit','Blog_postsController@edit');
Route::get('blog_posts/{id}/details','Blog_postsController@details');
Route::get('blog_posts/{id}/consulter','Blog_postsController@consulter');
Route::put('blog_posts/{id}','Blog_postsController@update');
Route::get('blog_posts/{id}','Blog_postsController@destroy');
//blogs_comments
Route::get('blog_comments','Blog_commentsController@index');
Route::get('blog_comments/create','Blog_commentsController@create');
Route::get('blog_comments/create_c/{id}','Blog_commentsController@create_c');
Route::post('blog_comments','Blog_commentsController@store');
Route::post('blog_comments/{id}','Blog_commentsController@store');
Route::get('blog_comments/{id}/edit','Blog_commentsController@edit');
Route::get('blog_comments/{id}/details','Blog_commentsController@details');
Route::put('blog_comments/{id}','Blog_commentsController@update');
Route::get('blog_comments/{id}','Blog_commentsController@destroy');
Route::get('/post-data', 'AjaxController@receive')->name('ajax');
//res_cli
Route::get('/getComments/{id}','Blog_commentsController@getComments');
Route::get('/getPosts','Blog_postsController@getPosts');
Route::post('/addComment/{id}','Blog_commentsController@addComment');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('facture/{id}', 'PrincipaleController@facture');
Route::get('facture', 'PrincipaleController@fac');
Route::get('ajaxRequest', 'AjaxController@ajaxRequest');
Route::get('ajaxRecherche', 'AjaxController@ajaxRecherche');
Route::get('ajaxCars', 'AjaxController@ajaxCars');
Route::get('/principale','PrincipaleController@index');
Route::post('payment','PaymentController@payment');
Route::get('canceled','PaymentController@cancel');
Route::get('status/{id}/{price}','PaymentController@status');