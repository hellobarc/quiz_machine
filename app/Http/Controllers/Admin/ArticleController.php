<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Listening;
use Image;
use File;

class ArticleController extends Controller
{
    public function article($quizType, $quizId)
    {
        $articles = Article::where('quiz_id', $quizId)->with('quiz')->get();
        return view('admin.article.create', compact('quizType', 'quizId', 'articles'));
    }
    public function articleStore(Request $request)
    {
        $quizId = $request->quiz_id;
        $title = $request->title;
        $passage = $request->passage;

        $image = $request->file('image');
        $img = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('image/uploads/article/' .$img);
        $imgFile = Image::make($image)->save($location);

        Article::firstOrCreate([
            'quiz_id'=>$quizId,
            'title'=>$title,
            'passage'=>$passage,
            'image'=>$img,
        ]);
        return redirect()->back()->with('success', 'Passage Added Successfully');
    }

    public function articleDelete($id) 
    {
        $article = Article::where('id',$id)->first();
        if(!is_null($article))
        {
            if (File::exists('image/uploads/article/'.$article->image)) {
                File::delete('image/uploads/article/'.$article->image);
            }
            $article->delete();
        }
        return redirect()->back()->with('success', 'Passage Delete Successfully.');
    }
    

    
}
