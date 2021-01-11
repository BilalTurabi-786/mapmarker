@extends('admin.layout.master')
@section('title', 'Map Admin')
@section('headname','Dashboard')
@section('content')

<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Filter</h4>
                    <button class="btn btn-primary" class="btn btn-primary add-filter" id="add-filter">Add Filter</button>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <table class="table">
                        <thead>
                        	<tr>
                        		<th>S.no</th>
                        		<th>Filter Keyword</th>
                        		<th>Action</th>
                        	</tr>
                        </thead>
                        <tbody>
                        @if($filters->count()>0)
                        @foreach($filters as $filter)
                        	<tr>
                        		<td>{{$filter->id}}</td>
                        		<td>{{$filter->name}}</td>
                        		<td>
                        			<button title="send mail" class="btn-sm btn-success edit" data-id="{{$filter->id}}" data-name="{{$filter->name}}"> <i class="fa fa-edit" ></i></button>
                        		</td> 
                        	</tr>
                            @endforeach
                            @endif
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Sports</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('add-filter')}}" method='post'>
      <div class="modal-body">
      <input type="hidden" class="id" value="">
        <input type="text" class='form-control filter' name='filter' value="{{old('filter')}}">
        <span class="alert text-danger">{{$errors->first('filter')}}</span>
        @csrf
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>

@endsection
@section('scripts')
<script>
$(document).ready(function(){
   var name="{{old('name')}}";
   if (name!="") {
      $(".modal").modal("show"); 
   }
   $(".edit").click(function(){
     $(".id").val($(this).data("id"));
     $(".filter").val($(this).data("name"));

    $(".modal").modal("show"); 

   })
   $("#add-filter").click(function(){
     
    $(".id").val("");
     $(".filter").val("");
    $(".modal").modal("show"); 

   })

})
</script>
@endsection
