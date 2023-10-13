<?php

namespace App\Services;

use App\Helpers\UnitHelpers;
use App\Jobs\ImportRegister;
use Illuminate\Support\Facades\Storage;

class ImportFileService
{

    public static function availableFiles(){
        return collect(Storage::disk('import')->allFiles())->map(function ($file){
            if(pathinfo(mb_strtolower($file), PATHINFO_EXTENSION) == 'json'){
                $arr = explode("_",$file);
                return [
                    'processing' => $arr[0] == 'processing',
                    'file' => $file,
                    'size' => UnitHelpers::bytesToSizeString(Storage::disk('import')->size($file))
                ];
            }
            return null;
        })->filter()->unique()->toArray();
    }

    public static function processFile($file){
        // Add "processing" on the file
        Storage::disk('import')->move($file, "processing_".$file);
        // new file name
        $file = "processing_".$file;
        sleep(3); // Wait 3 seconds just for "Loading Visual" in this test.
        // Read the json file
        $json = json_decode(Storage::disk('import')->get($file),true);
        // Enqueue the job to create a new registers
        foreach($json['documentos'] as $document){
            ImportRegister::dispatch(year: $json['exercicio'], category: $document['categoria'], title: $document['titulo'], content: $document['conteúdo'])->onQueue('import_file');
        }
        // "Delete the imported file"
        Storage::disk('import')->delete($file);
        // Done
        return true;
    }

}
