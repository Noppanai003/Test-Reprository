<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Promotion;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('promotions.index')->with('promotions' ,Promotion::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePromotionRequest $request)
    {
        // dd($request->all());
        $pro_image=$request->pro_image->store('posts2');
        // dd($pro_image);
        Promotion::create([
            'pro_name' => $request->pro_name,
            'pro_detail' => $request->pro_detail,
            'pro_image' => $pro_image,
            'pro_cost' => $request->pro_cost,
            'pro_start_date' => $request->pro_start_date,
            'pro_due_date' => $request->pro_due_date
        ]);
        Session()->flash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        return redirect(route('promotions.index'));
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('promotions.show');

        $promotion = Promotion::find($id);
        return view('promotions.show',compact('promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        return view('promotions.create')->with('promotion', $promotion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePromotionRequest $request, Promotion $promotion)
    {
        $data=$request->only([
            'pro_name',
            'pro_detail',
            // 'pro_image',
            'pro_cost',
            'pro_start_date',
            'pro_due_date'
        ]);
            // ลบภาพเก่า เพิ่มภาพใหม่
        if($request->hasFile('pro_image')){
            $pro_image=$request->pro_image->store('posts2');
            $promotion->deleteImage();
            $data['pro_image']=$pro_image;
        }
        $promotion->update($data);
        Session()->flash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว!');
        return redirect(route('promotions.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete(); //ลบข้อมูลในฐานข้อมูล
        $promotion->deleteImage(); //ลบรูปภาพ

        Session()->flash('success', 'ลบข้อมูลเรียบร้อยแล้ว!');
        return redirect(route('promotions.index'));
    }
}
