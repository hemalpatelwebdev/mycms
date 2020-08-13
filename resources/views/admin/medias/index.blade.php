@extends('layouts.admin')

@section('content')

    @if(Session::has('select_error') )
        <p class='bg-info'>{{Session::get('select_error')}} </p>
    @elseif(Session::has('delete_success'))
        <p class='bg-info'>{{Session::get('delete_success')}} </p>
    @endif

    @if($photos)
        <h1>All Medias</h1>
        <form action="{{route('bulkdelete')}}" method="POST" class="form-inline">
            {{ csrf_field() }}
            {{method_field('delete')}}
            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
            <table class="table">
                <thead>
                    <th><input type="checkbox" id="options"></th>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Created</th>
                </thead>
                @foreach($photos as $photo)
                    <tr>
                        <td><input class="checkBoxes" type="checkbox" name="CheckBoxArray[]" value="{{$photo->id}}"></td>
                        <td>{{$photo->id}}</td>
                        <td><img height="40px" width="100px" src="{{$photo->path}}"></td>
                        <td>{{$photo->created_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            </table>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    {{$photos->render()}}
                </div>
            </div>
        </form>

    @endif

@endsection

@section('scripts')

        <script>
            $(document).ready(function(){
                $('#options').click(function(){
                    if(this.checked){
                        $('.checkBoxes').each(function(){
                            this.checked = true;
                        })
                    }
                    else{
                        $('.checkBoxes').each(function(){
                            this.checked = false;
                        })
                    }
                });
            });
        </script>

@endsection