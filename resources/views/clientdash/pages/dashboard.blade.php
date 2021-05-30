@extends('clientdash.layout.master')
@section('title', 'Map Client')
@section('headname','Dashboard')
@section('content')
<style>
span.select2.select2-container.select2-container--default {
    width: 100% !important;
}
</style>

<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Filter</h4>
                    <button class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target=".modal">Add Filter</button>
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
                        	<tr>
                        		<td>2</td>
                        		<td>Book</td>
                        		<td>
                        			<button title="send mail" class="btn-sm btn-primary send-qoute"> <i class="fa fa-send"></i></button>
                        		</td> 
                        	</tr>
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
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('add-filter')}}" method='post'>
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12  mt-1">
                <label>School Name</label>
                <select class="form-control">
                  <option>Select your school</option>
                </select>
            </div>
            <div class="col-md-12 mt-1">
              <label>Select Filter</label>
              <select class="js-example-basic-multiple form-control" multiple="multiple">
              <option value="AL">Alabama</option>
              <option value="WY">asd</option>
              <option value="WY">dasd</option>
              <option value="WY">Wyomasd</option>
              </select>
            </div>
            <div class="col-md-12 mt-1">
              <label>Select Duration</label>
              <select class="js-example-basic-multiple form-control" multiple="multiple">
              <option value="AL">Alabama</option>
              <option value="WY">asd</option>
              <option value="WY">dasd</option>
              <option value="WY">Wyomasd</option>
              </select>
            </div>
            <div class="col-md-12 mt-1">
              <label>Select Price</label>
              <select class="js-example-basic-multiple form-control" multiple="multiple">
              <option value="AL">Alabama</option>
              <option value="WY">asd</option>
              <option value="WY">dasd</option>
              <option value="WY">Wyomasd</option>
              </select>
            </div>
            <div class="col-md-12 mt-1">
              <label>Select Ratio</label>
              <select class="js-example-basic-multiple form-control" multiple="multiple">
              <option value="AL">Alabama</option>
              <option value="WY">asd</option>
              <option value="WY">dasd</option>
              <option value="WY">Wyomasd</option>
              </select>
            </div>
            <div class="col-md-12 mt-1">
              <label>Select Price Per Hour</label>
              <select class="js-example-basic-multiple form-control" multiple="multiple">
              <option value="AL">Alabama</option>
              <option value="WY">asd</option>
              <option value="WY">dasd</option>
              <option value="WY">Wyomasd</option>
              </select>
            </div>
            <div class="col-md-12 mt-1">
              <label>Association</label>
              <select class="js-example-basic-multiple form-control" multiple="multiple">
              <option value="AL">Alabama</option>
              <option value="WY">asd</option>
              <option value="WY">dasd</option>
              <option value="WY">Wyomasd</option>
              </select>
            </div>
            <div class="col-md-12 mt-1">
              <label>Handicamp</label>
              <select class="js-example-basic-multiple form-control" multiple="multiple">
              <option value="AL">Alabama</option>
              <option value="WY">asd</option>
              <option value="WY">dasd</option>
              <option value="WY">Wyomasd</option>
              </select>
            </div>
            <div class="col-md-12 mt-1">
              <label>Childern</label>
              <select class="js-example-basic-multiple form-control" multiple="multiple">
              <option value="AL">Alabama</option>
              <option value="WY">asd</option>
              <option value="WY">dasd</option>
              <option value="WY">Wyomasd</option>
              </select>
            </div>
          </div>  
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection
