<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FieldLearningPlanDocumentController extends Controller
{
    public function get($filename){

        $entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->filename);

        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime);
    }
}
