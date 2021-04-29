<?php

use App\ED;
use App\Attr;
use App\AttrValues;
use App\DocumentType;
use App\Dossier;
use App\File;
use App\Http\Controllers\FileRolesController;
use App\RelFiles;
use App\Source;
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

// Route::get('/', function () {
//     $attr = Attr::all();
//     $attrValues = AttrValues::all();
//     $eDs = ED::all();
//     $documentType = DocumentType::all();
//     $source = Source::all();
//     $dossiers = Dossier::all();
//     $files = File::all();
//     $relFiles = RelFiles::all();

//     return view('welcome', compact('attr', 'attrValues', 'eDs', 'documentType', 'source', 'dossiers', 'files', 'relFiles'));
// });

Route::get('/', function () {
    return view('welcome');
});

Route::resource('file/roles', 'FileRolesController');
Route::resource('file/extensions', 'FileExtensionsController');
Route::resource('document-type', 'DocumentTypeController');
Route::resource('attrs', 'AttrController');