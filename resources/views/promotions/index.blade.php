@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{route('promotions.create')}}" class="btn btn-success">เพิ่มข้อมูลโปรโมชัน</a>
</div>

{{-- ส่วนของการแสดง --}}
<div class="card card-default">
    <div class="card-header">
        จัดการโปรโมชัน
    </div>
    <div class="card-body">
        @if($promotions->count()>0)
        <table class="table">
            <thead>
                <th>รูปโปรโมชัน</th>
                <th>หัวข้อ</th>
                <th>ส่วนลด%</th>
                <th>วันที่เริ่มต้น</th>
                <th>วันที่สิ้นสุด</th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($promotions as $promotion)
                <tr>
                    <td>
                        <img src="storage/{{$promotion->pro_image}}" alt="" width="120px" height="120px">
                    </td>
                    <td>{{$promotion->pro_name}}</td>
                    <td>{{$promotion->pro_cost}} %</td>
                    <td>{{$promotion->pro_start_date}}</td>
                    <td>{{$promotion->pro_due_date}}</td>
                    <td>
                        <a href="{{route('promotions.show',$promotion->id)}}" class="btn btn-warning btn-sm">รายละเอียด</a>
                    </td>
                    <td>
                        <a href="{{route('promotions.edit',$promotion->id)}}" class="btn btn-primary btn-sm">แก้ไข</a>
                    </td>
                    <td>
                        <form class="delete_form" action="{{route('promotions.destroy',$promotion->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" name="" value="ลบ" class="btn btn-danger btn-sm">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <h3 class="text text-center">ไม่มีข้อมูลโปรโมชัน</h3>
        @endif
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.delete_form').on('submit', function() {
            if (confirm("คุณต้องการลบข้อมูลหรือไม่")) {
                return true;
            } else {
                return false;
            }

        });
    });
</script>

@endsection
