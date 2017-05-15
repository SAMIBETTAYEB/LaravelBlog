<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class ArticleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addArticle(Request $request){

        if($request->isMethod('post')){
        $article=new Article();
        $article->title=$request->input('title');
        $article->content=$request->input('description');
        $article->user_id=Auth::user()->id;
        $article->save();
        }
        $articles=Article::all();
        $arr=Array('articles',$articles);
        return view('articles/show',$arr);
    }

    public function show(){
        $articles=Article::all();
        $arr=Array('articles'=>$articles);
        return view('articles/show',$arr);
    }

    public function readArticle($id){
        try{
        $article=Article::find($id);
        }catch (Exception $e){
            $article=new Article();
            $article->id=$id;
            $article->title="Error";
            $article->content="Can't find the article";
            $article->comments=Array();
        }
        $arr=Array('article'=>$article,'comments'=>isset($article)?$article->comments:"No");
        return view('articles/read',$arr);
    }

    public function addComment(Request $request,$id){
        if($request->isMethod('post')){
            $comment=new Comment();
            $comment->content=$request->input('comment');
            $comment->user_id=Auth::user()->id;
            $comment->article_id=$id;
            $comment->save();
            return redirect('article/'.$id);
        }
    }

    public function editArticle(Request $request,$id=-1){
        $article=Article::find($id);
        $arr=Array('article'=>$article);
        if($request->isMethod('post')){
            $article=Article::find($request->input('id'));
            $article->title=$request->input('title');
            $article->content=$request->input('description');
            $article->user_id=Auth::user()->id;
            $article->update();
            return redirect('articles');
        }else{
            return view('articles.add',$arr);
        }
    }

}
