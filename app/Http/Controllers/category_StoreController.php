<?php

namespace App\Http\Controllers;
use App\category_store;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryStoreRequest;
class category_StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categoryStore.index')->with('category_store',category_store::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoryStore.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryStoreRequest $request)
    {

        // insert data to db
        category_store::create(['name_store' => $request->name_store]);
        Session()->flash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        return redirect(route('categoryStore.index'));
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
    public function edit(category_store $category_store)
    {
        // dd($id);
        return view('categoryStore.create')->with('category_store',$category_store);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(category_store $category_store)
    {
        $category_store->delete();
        Session()->flash('success', 'ลบข้อมูลเรียบร้อยแล้ว');
        return redirect(route('categoryStore.index'));
    }
}
