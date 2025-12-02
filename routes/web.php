<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Route::get('/formato', function(){
    set_time_limit(0);

    $archivo = uniqid('formato', true) . '.docx';
    $ruta_archivo = storage_path('app/' . $archivo);
    exec('"C:\\Program Files\\nodejs\\node.exe" "C:\\xampp\\htdocs\\laravelreact\\reportes\\reporte.js" 1 "' . $ruta_archivo . '"', $salida, $retorno);

    if(Illuminate\Support\Facades\Storage::exists($archivo)){
        return Illuminate\Support\Facades\Storage::download($archivo, 'formato-de-uso-de-laboratorio.docx');
    }
    echo 'No encontrado'.$archivo;

    // print_r($salida, $retorno, $ruta_archivo);

})->name('formato'); */


// ! Bien
Route::get('/formato', function(){
    set_time_limit(0);

    // Generar el nombre del archivo y la ruta
    $archivo = uniqid('formato', true) . '.docx';
    $ruta_archivo = storage_path('app/' . $archivo);

    // Ejecutar el script de Node.js
    exec('"C:\\Program Files\\nodejs\\node.exe" "C:\\xampp\\htdocs\\laravelreact\\reportes\\reporte.js" 1 "' . $ruta_archivo . '"', $salida, $retorno);

    // DEBUG: Muestra si el archivo realmente existe
    if (file_exists($ruta_archivo)) {
        return response()->download($ruta_archivo, 'formato-de-uso-de-laboratorio.docx')->deleteFileAfterSend(true);
    }

    return response()->json(['error' => 'Archivo no encontrado', 'ruta' => $ruta_archivo], 404);
})->name('formato');


/* Route::get('/formato', function(){
    set_time_limit(0);

    // 📌 Generar nombre de archivo y ruta en storage
    $archivo = uniqid('formato', true) . '.docx';
    $ruta_archivo = storage_path('app/' . $archivo);

    // 📌 Ejecutar Node.js con la ruta del archivo
    $comando = '"C:\\Program Files\\nodejs\\node.exe" "C:\\xampp\\htdocs\\laravelreact\\reportes\\index.js" "' . $ruta_archivo . '"';
    exec($comando, $salida, $retorno);

    // 📌 Verificar si el archivo se generó correctamente
    if (file_exists($ruta_archivo)) {
        return response()->download($ruta_archivo, 'certificado-llenado.docx')->deleteFileAfterSend(true);
    }

    return response()->json([
        'error' => 'Archivo no encontrado',
        'ruta' => $ruta_archivo,
        'salida' => $salida,
        'retorno' => $retorno
    ], 404);
})->name('formato');
 */

Route::any('/{a?}', function () {
    return view('/app');
})->where('a', '^(?!api\/).*$')->name('reactjs');