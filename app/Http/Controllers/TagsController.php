<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateTagsRequest;
use App\Http\Requests\UpdateTagsRequest;
use Illuminate\Http\Request;
use App\Tag;


class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with('tags', Tag::all());
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
    public function store(CreateTagsRequest $request)
    {
          Tag::create(['name'=>$request->name]);
          Session()->flash('success','บันทึกข้อมูลเรียบร้อยแล้ว');
          return redirect(route('tags.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Tag $tag)
    {
        return view('tags.create')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagsRequest $request, Tag $tag)
    {
            $tag->update([
                  'name'=>$request->name
            ]);
            Session()->flash('success','อัพเดทข้อมูลเรียบร้อยแล้ว');
            return redirect(route('tags.index'));
            // return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
            if($tag->posts->count()>0){
                session()->flash('error','ไม่สามารถลบได้เนื่องจากถูกใช้งานอยู่');
                return redirect()->back();
            }

            $tag->delete();
            Session()->flash('success','ลบข้อมูลเรียบร้อยแล้ว');
            return redirect(route('tags.index'));
    }
}
