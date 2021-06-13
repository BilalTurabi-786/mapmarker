<section class="sign">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="sign__area">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
                <form class="add-listing__form" action="{{route('list-process')}}" wire:submit.prevent="saveChanges" method="post">
                    <!-- form box -->
                    @foreach ($filters as $key => $course)
                        <div class="add-listing__form-box" id="general-info">
                            <div class="add-listing__form-content" x-data="filterForm()" x-init="init()">
                                <div class="row m-0 p-0">
                                    <div class="col-2 offset-11">
                                        <span class="btn btn-success" wire:click="addFilter">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </span>
                                        <span class="btn btn-danger" wire:click="removeFilter({{ $key }})">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    @php
                                        $filter = new \App\Models\School\Filter();
                                    @endphp
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <label class="add-listing__label" for="list-title">
                                            Sports:
                                        </label>
                                        <select wire:model="filters.{{$key}}.sports" class="form-control">
                                            <option value="">Select an option</option>
                                            @foreach ($filter->sports() as $sport)
                                                <option>{{ $sport }}</option>
                                            @endforeach
                                        </select>
                                        @error("filters.$key.sports") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <label class="add-listing__label" for="list-title">
                                            Start Date:
                                        </label>
                                        <input type="date" class="form-control" wire:model.lazy="filters.{{$key}}.start_date">
                                        @error("filters.$key.sports") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <label class="add-listing__label" for="list-title">
                                            End Date:
                                        </label>
                                        <input type="date" class="form-control" wire:model.lazy="filters.{{$key}}.end_date">
                                        @error("filters.$key.sports") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <label class="add-listing__label" for="list-title">
                                            Price:
                                        </label>
                                        <input type="number" class="form-control" wire:model.lazy="filters.{{$key}}.price">
                                        @error("filters.$key.sports") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <label class="add-listing__label" for="list-title">
                                            Student Teacher Ratio (Students per Teacher):
                                        </label>
                                        <input type="number" class="form-control" wire:model.lazy="filters.{{$key}}.student_teacher_ratio">
                                        @error("filters.$key.sports") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3" wire:ignore>
                                        <label class="add-listing__label" for="list-title">
                                            Association:
                                        </label>
                                        <select class="form-control select2" x-model="association" multiple>
                                            @foreach ($filter->association() as $association)
                                                <option>{{ $association }}</option>
                                            @endforeach
                                        </select>
                                        @error("filters.$key.sports") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3" wire:ignore>
                                        <label class="add-listing__label" for="list-title">
                                            Handicap:
                                        </label>
                                        <select class="form-control select2" x-model="handicap" multiple>
                                            <option>No</option>
                                            @foreach ($filter->handicap() as $handicap)
                                                <option>{{ $handicap }}</option>
                                            @endforeach
                                        </select>
                                        @error("filters.$key.sports") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3" wire:ignore>
                                        <label class="add-listing__label" for="list-title">
                                            Rental Per Person ( Rental ):
                                        </label>
                                        <select class="form-control select2" x-model="rentalPerPersonRental" multiple>
                                            @foreach ($filter->rentalPerPerson() as $rentalPerPerson)
                                            <option>{{ $rentalPerPerson }}</option>
                                            @endforeach
                                        </select>
                                        @error("filters.$key.sports") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3" wire:ignore>
                                        <label class="add-listing__label" for="list-title">
                                            Duration ( Rental ):
                                        </label>
                                        <select class="form-control select2" x-model="durationRental" multiple>
                                            @foreach ($filter->duration() as $duration)
                                            <option>{{ $duration }}</option>
                                            @endforeach
                                        </select>
                                        @error("filters.$key.sports") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3" wire:ignore>
                                        <label class="add-listing__label" for="list-title">
                                            Rental Per Person ( Storage ):
                                        </label>
                                        <select class="form-control select2" x-model="rentalPerPersonStorage" multiple>
                                            @foreach ($filter->rentalPerPerson() as $rentalPerPerson)
                                            <option>{{ $rentalPerPerson }}</option>
                                            @endforeach
                                        </select>
                                        @error("filters.$key.sports") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3" wire:ignore>
                                        <label class="add-listing__label" for="list-title">
                                            Duration ( Storage ):
                                        </label>
                                        <select class="form-control select2" x-model="durationStorage" multiple>
                                            @foreach ($filter->duration() as $duration)
                                            <option>{{ $duration }}</option>
                                            @endforeach
                                        </select>
                                        @error("filters.$key.sports") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3" wire:ignore>
                                        <label class="add-listing__label" for="list-title">
                                            Children:
                                        </label>
                                        <select class="form-control select2" x-model="children" multiple>
                                            <option>No</option>
                                            @for ($i = 5; $i <= 17; $i++)
                                                <option>Age {{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error("filters.$key.sports") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3" wire:ignore>
                                        <label class="add-listing__label" for="list-title">
                                            Language:
                                        </label>
                                        <select class="form-control select2" x-model="language" multiple>
                                            <option>English</option>
                                            <option>French</option>
                                            <option>Urdu</option>
                                            <option>Spanish</option>
                                            <option>Hindi</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <label class="add-listing__label" for="list-title">
                                            Course Level:
                                        </label>
                                        <select wire:model="filters.{{$key}}.course_level" class="form-control">
                                            <option value="">Select an option</option>
                                            <option>Beginner</option>
                                            <option>Intermediate</option>
                                        </select>
                                        @error("filters.$key.sports") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <label class="add-listing__label" for="list-title">
                                            &nbsp;
                                        </label>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="filters.{{$key}}.lesson" id="lesson">
                                                Lesson
                                            </label>
                                        </div>
                                        @error("filters.$key.sports") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <label class="add-listing__label" for="list-title">
                                            &nbsp;
                                        </label>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="filters.{{$key}}.camp" id="camp">
                                                Camp
                                            </label>
                                        </div>
                                        @error("filters.$key.sports") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="center-button">
                        <button class="add-listing__submit" type="submit">
                            Submit
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                            {{-- Preview and Submit Listing --}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="sign__background"></div>
</section>
@push('scripts')
    <script>
        function filterForm(){
            return {
                filters: @entangle('filters'),
                init(){
                    this.$watch('filters', () => {
                        console.log(this.filters);
                    });
                    console.log("");
                }
            }
        }
    </script>
@endpush
