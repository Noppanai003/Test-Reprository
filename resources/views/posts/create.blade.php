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
            {{isset($post)?'แก้ไขข้อมูล':'ข้อมูลอู่ซ่อม'}}
    </div>
    <div class="card-body">
            <form action="{{isset($post)?route('posts.update',$post->id):route('posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif
                    <div class="form-group">
                        <label for="title">ชื่ออู่ซ่อม <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                        
                        <input type="text" name="title" value="{{isset($post)?$post->title:''}}" class="form-control" placeholder="กรุณาใส่ข้อมูล">
                    </div>
                    <div class="form-group">
                        <label for="title">ชื่อ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                        <input type="text" name="fname" value="{{isset($post)?$post->fname:''}}" class="form-control" placeholder="กรุณาใส่ข้อมูล">
                    </div>
                    <div class="form-group">
                        <label for="title">นามสกุล <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                        <input type="text" name="lname" value="{{isset($post)?$post->lname:''}}" class="form-control" placeholder="กรุณาใส่ข้อมูล">
                    </div>
                    <div class="form-group">
                            <label for="title">รายละเอียดร้าน <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                            <input id="x" type="hidden" name="description" value="{{isset($post)?$post->description:''}}" >
                            <trix-editor input="x" placeholder="กรุณาใส่ข้อมูล"></trix-editor>
                    </div>
                    <div class="form-group">
                            <label for="title">บ้านเลขที่อยู่ปัจจุบัน <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                            <textarea name="content" rows="4" cols="4" class="form-control" placeholder="กรุณาใส่ข้อมูล">{{isset($post)?$post->content:''}}</textarea>
                    </div>

                      <div class="form-group">
                        <label for="title">จังหวัด <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                        <input type="text" name="city_name" value="{{isset($post)?$post->city_name:''}}" id="city_name" class="form-control" placeholder="กรุณาใส่ข้อมูล" />
                          <div id="cityList">
                          </div>
                      </div>
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="title">อำเภอ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                            <input type="text" name="amphur" value="{{isset($post)?$post->amphur:''}}" id="city_name1" class="form-control" placeholder="กรุณาใส่ข้อมูล" />
                              <div id="cityList">
                              </div>
                        </div>
                            {{ csrf_field() }}  

                        <div class="form-group">
                            <label for="title">ตำบล <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                            <input type="text" name="district" value="{{isset($post)?$post->district:''}}" id="city_name2" class="form-control" placeholder="กรุณาใส่ข้อมูล" />
                                <div id="cityList">
                                </div>
                        </div>
                            {{ csrf_field() }}
                            
                        <div class="form-group">
                            <label for="title">รหัสไปรษณีย์ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                            <input type="text" name="postcode" value="{{isset($post)?$post->postcode:''}}" class="form-control" placeholder="กรุณาใส่ข้อมูล">
                        </div>

                        <div class="form-group">
                            <label for="title">เบอร์โทรร้าน <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                            <input type="text" name="tel" value="{{isset($post)?$post->tel:''}}" class="form-control" placeholder="กรุณาใส่ข้อมูล">
                        </div>

                        <div class="form-group">
                                <label for="title">ประเภทร้าน <a class="text-danger">*</a></label>
                                <select class="form-control" name="category_s">
                                        @foreach($category_s as $category_store)
                                                <option value="{{$category_store->id}}"
                                                  @if(isset($post))
                                                      @if($category_store->id == $post->category_store_id)
                                                          selected
                                                      @endif
                                                  @endif
                                                  >{{$category_store->name_store}}</option>
                                        @endforeach
                                </select>
                        </div>
    
                        <div class="form-group">
                            <label for="title">ประเภทการซ่อม <a class="text-danger">*</a></label>
                            <select class="form-control" name="category">
                                    @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                @if(isset($post))
                                                    @if($category->id == $post->category_id)
                                                        selected
                                                    @endif
                                                @endif
                                                >{{$category->name}}</option>
                                        @endforeach
                                </select>
                        </div>

                        @if($tags->count()>0)
                        <div class="form-group">
                          <label for="title">Tags <a class="text-danger">*</a></label>
                          <select class="form-control" name="tags[]" id="select-tags" multiple>
                                  @foreach($tags as $tag)
                                          <option value="{{$tag->id}}"
                                            @if(isset($post))
                                                @if($post->hasTag($tag->id))
                                                    selected
                                                @endif
                                            @endif

                                            >{{$tag->name}}</option>
                                  @endforeach
                          </select>
                        </div>
                        @endif
                            
                        <div class="form-group">
                            <label for="title">รูปอู่ซ่อม<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                            <input type="file" name="image" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title">รูปใบประกอบกิจการร้าน<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                            <input type="file" name="image1" value="" class="form-control">
                        </div>

                        <div class="form-group">
                                <input type="submit" name="" value="{{isset($post)?'แก้ไขข้อมูล':'เพิ่มข้อมูลอู่ซ่อม'}}" class="btn btn-success">
                        </div>
                   
            </form>
    </div>
</div>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js" charset="utf-8"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
          
          <script type="text/javascript">
                $(document).ready(function(){
                        $('#select-tags').select2();
                });
          </script>

            <script type="text/javascript">
                $(document).ready(function(){
                    $('#city_name').keyup(function(){
                    var query = $(this).val();

                    if(query != ''){
                    var _token = $('input[name="_token"]').val();
                    }

                    $.ajax({
                        url:"{{ route('autocomplete.show') }}",
                        method:"POST",
                        data:{query:query,_token:_token},
                        success:function(data){
                            $('#cityList').fadeIn();
                            $('#cityList').html(data);
                        }
                    })
                    });
                });
                $(document).on('click', 'li', function(){
                    $('#cityList').fadeOut();
                    $('#city_name').val($(this).text());
                    
                });
            </script>

@endsection