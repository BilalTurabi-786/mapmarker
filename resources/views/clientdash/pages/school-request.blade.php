@extends('clientdash.layout.master')
@section('title', 'Map Contact')
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
                    <h4 class="card-title">School Requests</h4>
                    {{-- <div class="float-right">
                        <button type="button" class="btn btn-outline-primary">Create</button>
                    </div> --}}
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="row">
                            @livewire('contact.school-request')
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                   <button type="button" value="save" class="btn btn-lg btn-primary upload">Save</button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
