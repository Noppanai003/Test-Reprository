@extends('layouts.app')
@section('content')

<div class="card card-default">
    <div class="card-header">
        รายละเอียด
    </div>

    <div class="card-body">
        <div class="pull-left">
        <a class="btn btn-dark btn-sm" href="{{ route('promotions.index') }}">
            <i class="fa fa-arrow-left"></i> <span>กลับ</span>
        </a>
        </div>
<br><br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="container">
                    <div class="form-group">
                    <img src="storage/{{$promotion->pro_image}}" width="120px" height="120px">
                    </div>
                    <div class="form-group">
                        <strong>หัวข้อ : </strong>
                        {{ $promotion->pro_name}}
                    </div>
                    <div class="form-group">
                        <strong>รายละเอียดร้าน : </strong>
                        {{ $promotion->pro_detail}}
                    </div>
                    <div class="form-group">
                        <strong>ส่วนลด : </strong>
                        {{ $promotion->pro_cost}}%
                    </div>
                    <div class="form-group">
                        <strong>วันที่เริ่มต้น : </strong>
                        {{ $promotion->pro_start_date}}
                    </div>
                    <div class="form-group">
                        <strong>วันที่สิ้นสุด : </strong>
                        {{ $promotion->pro_due_date}}
                    </div>

                </div>
            </div>
        </form>

    </div>

</div>

@endsection
