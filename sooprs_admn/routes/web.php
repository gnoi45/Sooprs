<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\GigController;

use App\Http\Controllers\Controller;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfessionalController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Admin panel dashboard 
    // Route::view('/admin', 'admin.index',['tabname'=>'Dashboard'])->name('admin.index'); 
    Route::get('/', [ DashboardController::class, 'index'])->name('admin.index');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Custom profile update page 
    Route::view('/profile-update/{user_id}', 'admin.profile.profile-edit-form')->name('user.profile.update');
    Route::post('/profile-update/{user_id}' , [ProfileController::class, 'updateUserNameEmail'])->name('name.email.update');;
    Route::post('/change-password', [ProfileController::class, 'updatePassword'])->name('update-password');

    // All customers list 
    Route::get('/customers', [CustomerController::class, 'allCustomers'])->name('all.customers');
    Route::get('/edit-customer/{id}', [CustomerController::class, 'geteditCustomer'])->name('geteditCustomer');
    Route::post('/edit-customer', [CustomerController::class, 'posteditCustomer'])->name('posteditCustomer');

   



    // All leads view 
    Route::get('/leads', [LeadController::class, 'allLeads'])->name('all.leads');
    Route::get('/view-lead', [LeadController::class, 'view_lead_page'])->name('view_lead_page');

    Route::post('/lead-assign', [LeadController::class, 'assignLead'])->name('assign.lead');
    Route::post('/lead-status', [LeadController::class, 'leadStatus'])->name('lead.status');

    Route::post('/leads', [LeadController::class, 'StatusFilter2'])->name('date-filter');
    Route::post('/lead-type', [LeadController::class, 'leadType'])->name('lead.type');

    Route::get('/lead/delete/{id}', [LeadController::class, 'deleteLead'])->name('delete.lead');

    Route::get('/leads-slug', [LeadController::class, 'allLeadsSlug'])->name('all.leads.slug');



    // All gigs view 
    Route::get('/gigs', [GigController::class, 'allGigs'])->name('all.gigs');
    Route::get('/view-gig/{gig_unique_id}', [GigController::class, 'view_gig_page'])->name('view.gig');
    Route::post('/edit-gig', [GigController::class, 'edit_gig'])->name('edit.gig.post');
    Route::get('/gig/delete/{id}', [GigController::class, 'deleteGig'])->name('delete.gig');

   

    // Join professionals 
    Route::get('/professionals', [ProfessionalController::class, 'getAllProfessionals'])->name('get.join.professionals');
    Route::get('/ajax-professionals', [ProfessionalController::class, 'allProfessionals'])->name('ajax.join.professionals');
    Route::get('/delete-professional/{id}', [ProfessionalController::class, 'deleteProfessional'])->name('deleteProfessional');
    Route::get('/edit-professional/{id}', [ProfessionalController::class, 'geteditProfessional'])->name('geteditProfessional');
    Route::get('/view-professional/{id}', [ProfessionalController::class, 'getViewProfessional'])->name('getViewProfessional');

    Route::post('/edit-professional', [ProfessionalController::class, 'posteditProfessional'])->name('posteditProfessional');

    Route::get('/add-professional',  [ProfessionalController::class, 'getAddProfessional'] )->name('add.professional');
    Route::post('/add-professional', [ProfessionalController::class, 'storeProfessional'])->name('store.professional');


    // Get verified
    Route::get('/kyc-verification', [ProfessionalController::class, 'getAllKycs'])->name('get.verified');
    Route::get('/edit-kyc-verification/{id}', [ProfessionalController::class, 'geteditKyc'])->name('getEditVerification');
    Route::post('/edit-kyc-verification', [ProfessionalController::class, 'saveKycStatus'])->name('saveKycStatus');



    // All banners 
    Route::get('/banners', [DashboardController::class, 'allBanners'])->name('all.banners');
    Route::post('/banners', [DashboardController::class, 'addBanner'])->name('add.banner');
    Route::get('/banner/delete/{id}', [DashboardController::class, 'deleteBanner'])->name('delete.banner');




    // All services 
    Route::get('/services', [ServiceController::class, 'allServices'])->name('all.services');
    Route::post('/service/edit', [ServiceController::class, 'editService'])->name('edit.service');
    Route::post('/services', [ServiceController::class, 'addServices'])->name('add.services');
    Route::get('/service/delete/{id}', [ServiceController::class, 'deleteservice'])->name('delete.service');


    // Services New table 
    Route::get('/all-services', [ServiceController::class, 'allNewServices'])->name('all.new.services');
    Route::get('/service-add', [ServiceController::class, 'showAddServicePage'])->name('add.new.service');
    Route::post('/service-add', [ServiceController::class, 'addNewServices'])->name('post.new.service');
    Route::get('/service-edit/{id}', [ServiceController::class, 'editNewServices'])->name('edit.new.service');
    Route::post('/service-edit', [ServiceController::class, 'editNewServiceSave'])->name('post.edit.service');
    Route::get('/service/remove/{id}', [ServiceController::class, 'removeService'])->name('remove.service');
    Route::get('/gig-technologies', [ServiceController::class, 'allnewMaincat'])->name('all_gig_technologies');
    // Route::get('/sub-categories', [ServiceController::class, 'allnewSubcat'])->name('all_sub_categories');



    // Countries
    Route::get('/all-countries', [DashboardController::class, 'allCountries'])->name('all.countries');
    Route::view('/country-add', 'admin.countries.add')->name('add.country');
    Route::post('/country-add', [DashboardController::class, 'addCountry'])->name('post.country');

    Route::get('/country-edit/{id}', [DashboardController::class, 'editCountry'])->name('edit.country');
    Route::post('/country-edit', [DashboardController::class, 'editCountrySave'])->name('post.edit.country');

    Route::get('/country/remove/{id}', [DashboardController::class, 'removeCountry'])->name('remove.country');





    // All Skills 
    Route::get('/skills', [ServiceController::class, 'allSkills'])->name('all.skills');
    Route::post('/skill/edit', [ServiceController::class, 'editSkill'])->name('edit.skill');
    Route::post('/skills', [ServiceController::class, 'addSkills'])->name('add.skills');
    Route::get('/skill/delete/{id}', [ServiceController::class, 'deleteskill'])->name('delete.skill');

    // All questions 
    Route::get('/questions/{id?}', [ServiceController::class, 'allQuestions'])->name('all.questions');
    Route::post('/add-questions', [ServiceController::class, 'addQuestions'])->name('add.questions');
    Route::post('/questions', [ServiceController::class, 'editQuestion'])->name('edit.question');
    Route::get('/question/delete/{id}', [ServiceController::class, 'deletequestion'])->name('delete.question');

    Route::get('/ques-filter/{id}', [ServiceController::class, 'quesFilter'])->name('ques_filter');





    // All answers 
    Route::get('/answers/{id?}/{serviceid?}', [ServiceController::class, 'allAnswers'])->name('all.answers');
    Route::post('/add-answers', [ServiceController::class, 'addAnswers'])->name('add.answers');
    Route::post('/answers', [ServiceController::class, 'editAnswer'])->name('edit.answer');

    Route::get('/answer/delete/{id}', [ServiceController::class, 'deleteanswer'])->name('delete.answer');




    Route::get('/permissions', [DashboardController::class, 'allPermissions'])->name('all.permissions');
    Route::post('/permissions', [DashboardController::class, 'addPermissions'])->name('add.permission');
    Route::post('/permission/edit', [DashboardController::class, 'editPermission'])->name('edit.permission');

    Route::get('/delete-permission/{id}', [DashboardController::class, 'deletePermission'])->name('delete.permission');


    Route::get('/categories',[ServiceController::class,'pageCategories'])->name('pageCategories');
    Route::post('/categories',[ServiceController::class,'storePagecategory'])->name('store.pageCategory');
    Route::post('/edit.pageCategory', [ServiceController::class, 'editPageCategory'])->name('edit.pageCategory');
    Route::get('/delete-category/{id}', [ServiceController::class, 'deleteCategory'])->name('delete.category');



    Route::get('/services-page',[ServiceController::class,'servicePage'])->name('services.page');
    Route::post('/services-page',[ServiceController::class,'storeservicePage'])->name('store.services.page');
    Route::get('/delete-page/{id}', [ServiceController::class, 'deletePage'])->name('delete.page');

    Route::get('/edit-page/{id}', [ServiceController::class, 'geteditPage'])->name('edit.page');
    Route::post('/edit-page/{id}', [ServiceController::class, 'updateServicePage'])->name('update.service.page');

    Route::get('/delete-content-image/{id}', [ServiceController::class, 'deleteContentImage'])->name('delete.content_image');
    Route::get('/delete-banner-image/{id}', [ServiceController::class, 'deleteBannerImage'])->name('delete.banner_image');





    Route::get('/all-services-page',[ServiceController::class,'allservicePage'])->name('all.services.page');
    Route::get('/settings',[ServiceController::class,'allSettings'])->name('all.settings');




    

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});



Route::get('/fooo', function(){
    \Artisan::call('make:model ProfessionalGig');
});


Route::get('/gigc', function(){
    \Artisan::call('make:controller GigController');
});

Route::get('/foo', function(){
    \Artisan::call('storage:link');
});

require __DIR__.'/auth.php';
