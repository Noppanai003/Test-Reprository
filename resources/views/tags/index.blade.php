@extends('layouts.app')
@section('content')
          <div class="d-flex justify-content-end mb-2">
                  <a href="{{route('tags.create')}}" class="btn btn-success">Add Tags</a>
          </div>
          <div class="card card-default">
            <div class="card-header">
                  Tags
            </div>
            <div class="card-body">
                  @if($tags->count()>0)
                  <table class="table">
                        <thead>
                            <th>Name</th>
                            <th>Count</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                                  <tr>
                                    <td>{{$tag->name}}</td>
                                    <td>{{$tag->posts->count()}}</td>
                                    <td>
                                      <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-info btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <form class="delete_form" action="{{route('tags.destroy',$tag->id)}}" method="post">
                                              @csrf
                                              <input type="hidden" name="_method" value="DELETE">
                                              <input type="submit" name="" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                  </tr>
                            @endforeach
                        </tbody>
                  </table>
                  @else
                        <h3 class="text text-center">No Tags</h3>
                  @endif
            </div>
          </div>
          <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
          <script type="text/javascript">
                  $(document).ready(function(){
                        $('.delete_form').on('submit',function(){
                              if(confirm("คุณต้องการลบข้อมูลหรือไม่")){
                                    return true;
                              }else{
                                    return false;
                              }

                        });
                  });
          </script>
@endsection
