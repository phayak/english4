<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
class ArtcleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $articles = Article::paginate(10);
        return view('admin.article.index',compact('articles'));
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        Article::create($input);

        return redirect('es4p/article');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
