@extends('clientdash.layout.master')
@section('title', 'Map Client')
@section('headname','Dashboard')
@section('content')

<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Filter</h4>
                    <button class="btn btn-primary">Add Filter</button>
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


@endsection