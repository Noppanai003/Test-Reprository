@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('categoryStore.create')}}" class="btn btn-success">เพิ่มประเภทร้าน</a>
    </div>
        {{-- ส่วนของการแสดง --}}
        <div class="card card-default">
                <div class="card-header">
                      ประเภทร้าน
                </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>ชื่อประเภท</th>
                        <th>จำนวนที่ผู้ใช้เลือก</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($category_store as $category_store)
                            <tr>
                                <td>{{$category_store->name_store}}</td>
                                <td>{{$category_store->posts->count()}}</td>
                                <td><a href="{{route('categoryStore.edit',$category_store->id)}}" class="btn btn-info btn-sm">แก้ไข</a></td>
                                <td>
                                    <form class="delete_form" action="{{route('categoryStore.destroy',$category_store->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" name="" value="ลบ" class="btn btn-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                  $('.delete_form').on('submit',function(){
                        if(confirm("คุณต้องการลบข้อมูลหรือไม่"))
                        {
                              return true;
                        }
                        else
                        {
                              return false;
                        }

                  });
            });
        </script>
@endsection