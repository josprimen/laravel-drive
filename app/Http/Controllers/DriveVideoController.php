<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_Drive;
use Illuminate\Http\Request;
use App\Models\Productos;
use Illuminate\Support\Facades\Route;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;
use DateTime;


class DriveVideoController extends Controller
{

    /**
     * Rutas utilizadas por el controlador
     *
     * @return void
     */
    public static function routes()
    {

        Route::group(['prefix' => 'drive-video', 'as' => 'drive-video.'], static function () {

            Route::get('/', 'DriveVideoController@index')->name('index');


        });
    }

    // Listar todos los productos en la vista principal
    public function index()
    {

        //Crear nuevo proyecto, añadirle la api de google drive y crear en credenciales una credencial de tipo 'cuentas de servicio'

        $client = new Google_Client();
        $client->setAuthConfig(storage_path('app/credentials/credentials.json'));
        $client->addScope(Google_Service_Drive::DRIVE_READONLY);
        $client->setAccessType('offline');

        $service = new Google_Service_Drive($client);
        $folderId = env('GOOGLE_FOLDER_ID'); // Reemplaza con el ID de la carpeta de Google Drive que deseas explorar

        $videos = [];

//        $results = $service->files->listFiles([
//            'q' => "'$folderId' in parents",
//        ]);

        $results = $service->files->listFiles([
            'q' => "'$folderId' in parents and trashed = false",
            'includeItemsFromAllDrives' => true,
            'supportsAllDrives' => true,
        ]);


        foreach ($results->getFiles() as $file) {

            $videoObject = new \stdClass();
            $videoObject->name = $file->getName();
            $videoObject->url = 'https://drive.google.com/file/d/' . $file->getId() . '/preview';
            $videos[] = $videoObject;


        }


//        dd($videos, $results, $service->files);

        return view('video', compact('videos'));
    }


}


