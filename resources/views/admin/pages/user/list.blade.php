@extends('admin.layout.master')
@section('title', 'Map Admin')
@section('headname','Dashboard')
@section('content')
<style type="text/css">
  .dt-buttons.btn-group {
    display: none;
}
</style>
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Contact Details</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <table class="table">
                        <thead><tr><th>Name</th><th>Email</th><th>Available Date & Time</th><th>Altenate Date & Time</th><th>Action</th></tr></thead>
                        <tbody>@if($contacts->count()>0) @foreach($contacts as $contact)<tr><td>{{$contact->name}}</td><td>{{$contact->email}}</td><td>{{date('H:i:A',strtotime($contact->ava_time_one))}} {{$contact->ava_date_one}}</td><td>{{date('H:i:A',strtotime($contact->ava_time_one))}} {{$contact->ava_date_two}}</td><td><button title="send mail" class="btn-sm btn-primary send-qoute" data-email="{{$contact->email}}" data-token="{{$contact->token}}"> <i class="fa fa-send"></i></button></td> </tr>@endforeach @endif</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script>
$(".send-qoute").click(function(){
  email=$(this).data("email");
  token=$(this).data("token");
  // alert(token);
  $.ajax({
    url:"{{route('admin.send-qoute')}}",
    data:{token:token,email:email,"_token":"{{csrf_token()}}"},
    type:"post",
    success:function(res){
      console.log(res);
    }
  })

})
</script>
@endsection
