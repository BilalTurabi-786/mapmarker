<section class="sign" x-data="filterForm()" x-init="init()">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="sign__area">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
                <form class="add-listing__form" action="{{route('list-process')}}" wire:submit.prevent="saveChanges" method="post">
                    <!-- form box -->
                    @foreach ($filters as $key => $course)
                        <div class="add-listing__form-box" id="general-info-{{$key}}">
                            <div class="add-listing__form-content">
                                <div class="row m-0 p-0">
                                    <div class="col-1">{{ $loop->iteration }}.</div>
                                    <div class="col-2 offset-10">
                                        <span class="btn btn-danger float-right ml-1" wire:click="removeFilter({{ $key }})">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </span>
                                        <span class="btn btn-success float-right ml-1" wire:click="addFilter">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
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
                                        @error("filters.$key.start_date") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <label class="add-listing__label" for="list-title">
                                            End Date:
                                        </label>
                                        <input type="date" class="form-control" wire:model.lazy="filters.{{$key}}.end_date">
                                        @error("filters.$key.end_date") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <label class="add-listing__label" for="list-title">
                                            Price:
                                        </label>
                                        <input type="number" class="form-control" wire:model.lazy="filters.{{$key}}.price">
                                        @error("filters.$key.price") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <label class="add-listing__label" for="list-title">
                                            Student Teacher Ratio (Students per Teacher):
                                        </label>
                                        <input type="number" class="form-control" wire:model.lazy="filters.{{$key}}.student_teacher_ratio">
                                        @error("filters.$key.student_teacher_ratio") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <div wire:ignore>
                                            <label class="add-listing__label" for="list-title">
                                                Association:
                                            </label>
                                            <select class="form-control select2" data-name="association" data-key="{{$key}}" multiple>
                                                @foreach ($filter->association() as $association)
                                                    <option>{{ $association }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error("filters.$key.association") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <div wire:ignore>
                                            <label class="add-listing__label" for="list-title">
                                                Handicap:
                                            </label>
                                            <select class="form-control select2" data-name="handicap" data-key="{{$key}}" multiple>
                                                <option>No</option>
                                                @foreach ($filter->handicap() as $handicap)
                                                    <option>{{ $handicap }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error("filters.$key.handicap") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <div wire:ignore>
                                            <label class="add-listing__label" for="list-title">
                                                Rental Per Person ( Rental ):
                                            </label>
                                            <select class="form-control select2" data-name="rental.rentalPerPerson" data-key="{{$key}}" multiple>
                                                @foreach ($filter->rentalPerPerson() as $rentalPerPerson)
                                                <option>{{ $rentalPerPerson }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error("filters.$key.rental.rentalPerPerson") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <div wire:ignore>
                                            <label class="add-listing__label" for="list-title">
                                                Duration ( Rental ):
                                            </label>
                                            <select class="form-control select2" data-name="rental.duration" data-key="{{$key}}" multiple>
                                                @foreach ($filter->duration() as $duration)
                                                <option>{{ $duration }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error("filters.$key.rental.duration") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <div wire:ignore>
                                            <label class="add-listing__label" for="list-title">
                                                Rental Per Person ( Storage ):
                                            </label>
                                            <select class="form-control select2" data-name="storage.rentalPerPerson" data-key="{{$key}}" multiple>
                                                @foreach ($filter->rentalPerPerson() as $rentalPerPerson)
                                                <option>{{ $rentalPerPerson }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error("filters.$key.storage.rentalPerPerson") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <div wire:ignore>
                                            <label class="add-listing__label" for="list-title">
                                                Duration ( Storage ):
                                            </label>
                                            <select class="form-control select2" data-name="storage.duration" data-key="{{$key}}" multiple>
                                                @foreach ($filter->duration() as $duration)
                                                <option>{{ $duration }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error("filters.$key.storage.duration") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <div wire:ignore>
                                            <label class="add-listing__label" for="list-title">
                                                Children:
                                            </label>
                                            <select class="form-control select2" data-name="children" data-key="{{$key}}" multiple>
                                                <option>No</option>
                                                @for ($i = 5; $i <= 17; $i++)
                                                    <option>Age {{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        @error("filters.$key.children") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <div wire:ignore>
                                            <label class="add-listing__label" for="list-title">
                                                Language:
                                            </label>
                                            <select class="form-control select2" data-name="language" data-key="{{$key}}" multiple>
                                                <option>English</option>
                                                <option>French</option>
                                                <option>Urdu</option>
                                                <option>Spanish</option>
                                                <option>Hindi</option>
                                            </select>
                                        </div>
                                        @error("filters.$key.language") <span class="text-danger">{{ $message }}</span> @enderror
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
                                        @error("filters.$key.course_level") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <label class="add-listing__label" for="list-title">
                                            &nbsp;
                                        </label>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" wire:model="filters.{{$key}}.lesson" id="lesson">
                                                Lesson
                                            </label>
                                        </div>
                                        @error("filters.$key.lesson") <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-3 mt-3">
                                        <label class="add-listing__label" for="list-title">
                                            &nbsp;
                                        </label>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" wire:model="filters.{{$key}}.camp" id="camp">
                                                Camp
                                            </label>
                                        </div>
                                        @error("filters.$key.camp") <span class="text-danger">{{ $message }}</span> @enderror
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
                association(key){
                    console.log(key);
                },
                handicap(key){
                    console.log(key);
                },
                rentalPerPersonRental(key){
                    console.log(key);
                },
                durationRental(key){
                    console.log(key);
                },
                rentalPerPersonStorage(key){
                    console.log(key);
                },
                durationStorage(key){
                    console.log(key);
                },
                children(key){
                    console.log(key);
                },
                language(key){
                    console.log(key);
                },
                init(){
                    this.filters.forEach((filter, i) => {
                        $("[data-name=association]").eq(i).val(filter.association);
                        $("[data-name=children]").eq(i).val(filter.children);
                        $("[data-name=handicap]").eq(i).val(filter.handicap);
                        $("[data-name=language]").eq(i).val(filter.language);
                        $("[data-name='rental.rentalPerPerson']").eq(i).val(filter.rental.rentalPerPerson);
                        $("[data-name='rental.duration']").eq(i).val(filter.rental.duration);
                        $("[data-name='storage.rentalPerPerson']").eq(i).val(filter.storage.rentalPerPerson);
                        $("[data-name='storage.duration']").eq(i).val(filter.storage.duration);
                    });
                    this.$watch('filters', () => {
                        // console.log(this.filters);
                    });
                    this.$watch('association', value => {
                        console.log(value);
                    })
                    console.log("");
                }
            }
        }
        // set Select2 values
        $(document).on('change', '.select2', e => {
            let i = $(e.target).data('key');
            let name = $(e.target).data('name');
            let values = $(e.target).val();
            let path = "filters."+i+"."+name;
            @this.set(path, values);
            console.log(@this.filters);
        })
        window.Livewire.on('removeFilter', event => {
            console.log(event);
        })
    </script>
@endpush
