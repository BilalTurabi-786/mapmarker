@extends('clientside.layout.master')
@section('title', 'Map')
@section('headname','Map')
@section('content')
    <style type="text/css">
        .sign__area {
            padding: 12.5rem 10.625rem;
            background: #fff;
            width: 100%;
        }
        .multipleChosen, .multipleSelect2{
            width: 300px;
        }
        .add-listing__input {
            margin-bottom: 5px;
        }
        span.text-danger{
            margin-bottom: 15px;
        }
        .add-listing__form-content{
            padding-bottom: 20px;
        }
    </style>
    <!-- add-listing
        ================================================== -->
        @livewire('contact.school.filter', compact('school'))
		<!-- <section class="add-listing">
			<div class="add-listing__title-box">
				<div class="container">
					<h1 class="add-listing__title">
						Add Your School Listing
					</h1>
				</div>
			</div>
		</section> -->
    <!-- End add-listing -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            let searchParams = new URLSearchParams(window.location.search)
            let token = searchParams.get("token");

            $("#token").val(token);
        })
        $(document).ready(function(){
            //Chosen
            $(".multipleChosen").chosen({
                placeholder_text_multiple: "What's your rating" //placeholder
            });
        });
    </script>
@endsection
