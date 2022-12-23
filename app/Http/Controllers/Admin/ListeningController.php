<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listening;
use File;

class ListeningController extends Controller
{
    public function listening($quizId)
    {
        $listening = Listening::where('quiz_id', $quizId)->with('quiz')->get();
        return view('admin.listening.create', compact('quizId', 'listening'));
    }
    public function listeningStore(Request $request)
    {
        $quizId = $request->quiz_id;
        $title = $request->title;

        $file = $request->file('audio');
        $filename = time().'.'.$file->getClientOriginalExtension();
        //$location = public_path('listening/' .$file);
        $file->move('listening/uploads/', $filename);
        //$audioFile = Image::make($audio)->save($location);

        Listening::firstOrCreate([
            'quiz_id'=>$quizId,
            'title'=>$title,
            'audio'=>$filename,
        ]);
        return redirect()->back()->with('success', 'Passage Added Successfully');
    }
    public function listeningDelete($id) 
    {
        $listening = Listening::where('id',$id)->first();
        if(!is_null($listening))
        {
            if (File::exists('listening/uploads/'.$listening->audio)) {
                File::delete('listening/uploads/'.$listening->audio);
            }
            $listening->delete();
        }
        return redirect()->back()->with('success', 'Passage Delete Successfully.');
    }
}
