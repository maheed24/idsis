<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\Cert_typeController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ChangeHomeportController;
use App\Http\Controllers\CityMunicipalityController;
use App\Http\Controllers\CO_CPRController;
use App\Http\Controllers\Ship_typeController;
use App\Http\Controllers\Stem_typeController;
use App\Http\Controllers\Stern_typeController;
use App\Http\Controllers\Trading_areaController;
use App\Http\Controllers\HullMaterialsController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\PDFCertController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RigtypeController;
use App\Http\Controllers\ShipClassificationController;
use App\Http\Controllers\Ship_classification_typeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsertypeController;
use App\Http\Controllers\Ship_propulsionController;
use App\Models\Cert_type;
use GuzzleHttp\Psr7\Request;

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
 Route::redirect('/', 'login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
Route::resource('/Cert_type', Cert_typeController::class)->middleware('can:admin');
Route::resource('/Status', StatusController::class)->middleware('can:admin');
Route::resource('/Hull_material', HullMaterialsController::class)->middleware('can:admin');
Route::resource('/Ship_Classification', ShipClassificationController::class)->middleware('can:admin');
Route::resource('/Ship_classification_type', Ship_classification_typeController::class)->middleware('can:admin');
Route::get('/edit-ship/{id}', [Ship_classification_typeController::class, 'edit']);
Route::resource('/Ship_type', Ship_typeController::class)->middleware('can:admin');
Route::resource('/Stem_type', Stem_typeController::class)->middleware('can:admin');
Route::resource('/Stern_type', Stern_typeController::class)->middleware('can:admin');
Route::resource('/Trading_area', Trading_areaController::class)->middleware('can:admin');
Route::resource('/Office', OfficeController::class)->middleware('can:admin');
Route::resource('/User_type', UsertypeController::class)->middleware('can:admin');
Route::resource('/User', UserController::class)->middleware('can:admin');
Route::resource('/Province', ProvinceController::class)->middleware('can:admin');
Route::get('/edit-province/{id}', [ProvinceController::class, 'edit']);
Route::resource('/City_municipality', CityMunicipalityController::class)->middleware('can:admin');
Route::get('/edit-city/{id}', [CityMunicipalityController::class, 'edit']);
Route::resource('/Rig_type', RigtypeController::class)->middleware('can:admin');
Route::resource('/Operation', OperationController::class)->middleware('can:admin');
Route::resource('/co_cpr', CO_CPRController::class)->middleware('can:user');
Route::resource('/change_homeport', ChangeHomeportController::class)->middleware('can:user');
// Route::get('/edit-detail/{id}', [CO_CPRController::class, 'edit']);

Route::get('/edit-certificate/{id}', [CertificateController::class, 'edit']);
Route::get('/add-cert', [CO_CPRController::class, 'add']);

Route::resource('/Ship_propulsion', Ship_propulsionController::class);
Route::get('/show', [Ship_propulsionController::class, 'index']);
//Route::get('/co_cpr/{Ship_propulsion}', [CO_CPRController::class, 'add']);

// Route::get('posts/{post}', [ProvinceController::class, 'show'])->name('posts.show');
//Route::get('/Province/{post}', 'ProvinceController@getData')->name('get.data');

// Route::get('/change_home', [ChangeHomeportController::class,'update']);

Route::get('generate-pdf', [PDFCertController::class,'generatePdf'])->name('generate-pdf');
// Route::post('/post',[CaptchaController::class]);
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
   
});

Route::get('/logouts', function () {
    Auth::logout();
    return redirect('/');
})->name('logouts');
