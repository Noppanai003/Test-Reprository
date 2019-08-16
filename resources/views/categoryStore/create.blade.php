@extends('layouts.app')
@section('content')

        {{-- ส่วนของการแสดง --}}
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
                    {{isset($category_store)?"แก้ไขประเภทร้าน":"ประเภทร้าน"}}
                </div>
                  <div class="card-body">
                    <form action="{{route('categoryStore.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">ชื่อประเภทร้าน</label>
                                <input type="text" name="name_store" value="{{isset($category_store)?$category_store->name_store:''}}" class="form-control" placeholder="กรุณาใส่ข้อมูล">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="" value="{{isset($category_store)?'แก้ไขประเภทร้าน':'บันทึกข้อมูล'}}" class="btn btn-success">
                            </div>
                    </form>
                  </div>
        </div>
@endsection