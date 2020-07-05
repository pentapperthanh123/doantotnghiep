<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use Validator;
use Auth;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $filters = request()->only('action', 'key');
        if ($filters && $filters['action']  == 'search') {
            $tagsList = DB::table('tags')->where('value', 'like', '%'.$filters['key'].'%')->orderBy('id','ASC')->paginate(15);
        }
        else{
            $itemperPage = 15;
            $tagsList = DB::table('tags')->paginate($itemperPage);
        }
        return view('tags.index',['tagsList' => $tagsList]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'value' => 'required|max:50'
        ]);
        if ($validate->fails()) {
            return redirect('tags/create')->withInput()->withErrors($validate);
        } else {
            Tag::create($request->all());
            return redirect('tags')->with(['add' => trans('tags/langTag.addSuccess')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)   
    {
        $tag = Tag::findOrFail($id);
        // $tag = DB::table('tags')->where('id',$id)->first();
        return view('tags.show', ['tag', $tag]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::where('id',$id)->first();
        return view('tags.edit',['tags' => $tags]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Reqest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tags = Tag::findOrFail($id);
        $validate = $request->validate([
            'value' => 'required|max:50'
        ]);
        $tags->Update($request->all());
        return redirect('tags')->with(['edit' => trans('tags/langTag.updateSuccess')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);
        return redirect('tags')->with(['delete' => trans('tags/langTag.delSuccess')]);
    }

}

