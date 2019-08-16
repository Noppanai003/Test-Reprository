@extends('layouts.app')
@section('content')

<div class="card card-default">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach($errors->all() as $error)
            <li class="list-group-item">{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card-header">
        {{isset($promotion)?'แก้ไขข้อมูลโปรโมชัน':'เพิ่มข้อมูลโปรโมชัน'}}
    </div>

    <div class="card-body">
        <form action="{{isset($promotion)?route('promotions.update',$promotion->id):route('promotions.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($promotion))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="title">หัวข้อ</label>
                <input type="text" name="pro_name" value="{{isset($promotion)?$promotion->pro_name:''}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">รายละเอียดร้าน</label>
                <input id="x" type="hidden" name="pro_detail" value="{{isset($promotion)?$promotion->pro_detail:''}}">
                <trix-editor input="x"></trix-editor>
            </div>
            <div class="form-group">
                <label for="title">รูปโปรโมชัน</label>
                <input type="file" name="pro_image" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">ส่วนลด%</label>
                <input type="text" name="pro_cost" value="{{isset($promotion)?$promotion->pro_cost:''}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">วันที่เริ่มต้น</label>
                <input type="date" name="pro_start_date" value="{{isset($promotion)?$promotion->pro_start_date:''}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">วันที่สิ้นสุด</label>
                <input type="date" name="pro_due_date" value="{{isset($promotion)?$promotion->pro_due_date:''}}" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
            </div>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">

@endsection
