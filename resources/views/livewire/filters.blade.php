<div class="" x-data="filters()">

    <div class="row px-5 mb-2">

        <div class="col-md-4">

            <div class="table_center">

                <div class="drop-down drop-down--active {{ $activePerson!=0?:'active' }}" :class="{ 'drop-down--active':showToggle(0) === true }">

                    <div id="dropDown" class="dropDown drop-down__button" wire:click="$set('activePerson', 0)">

                        <span class="drop-down__name">Person 1</span>

                    </div>

                    <div class="drop-down__menu-box">

                        <ul class="drop-down__menu filter-wrapper">

                            @foreach ($persons[0] as $item => $value)

                                @if (is_array($value))
                                    @if(in_array($item, ["storage", "rental"])) @continue @endif

                                    @foreach ($value as $index => $val)
                                        @if (empty($val)) @continue @endif
                                        @if ($val == $sample[$item][0]) @continue @endif

                                        <li class="filter-item drop-down__item">

                                            <span class="filter-name">{{ $item." ".$loop->iteration.": ".$val }}</span>
                                            <i class="fa fa-times ml-1 remove-filter cursor-pointer float-right" wire:click="resetFilter('{{$item}}', '{{$index}}')"></i>

                                        </li>
                                    @endforeach

                                    @continue
                                @endif

                                @if (empty($value)) @continue @endif

                                @if ($value == $sample[$item]) @continue @endif

                                <li class="filter-item drop-down__item">

                                    <span class="filter-name">{{ $item.": ".$value }}</span><i class="fa fa-times ml-1 remove-filter cursor-pointer float-right" wire:click="resetFilter('{{$item}}')"></i>

                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="table_center">

                <div class="drop-down {{ $activePerson!=1?:'active' }}" :class="{ 'drop-down--active':showToggle(1) === true }">

                    <div id="dropDown" class="dropDown drop-down__button" wire:click="$set('activePerson', 1)">

                        <span class="drop-down__name">Person 2</span>

                    </div>



                    <div class="drop-down__menu-box">

                        <ul class="drop-down__menu filter-wrapper">

                            @foreach ($persons[1] as $item => $value)

                                @if (is_array($value))
                                    @if(in_array($item, ["storage", "rental"])) @continue @endif

                                    @foreach ($value as $index => $val)
                                        @if (empty($val)) @continue @endif
                                        @if ($val == $sample[$item][0]) @continue @endif

                                        <li class="filter-item drop-down__item">

                                            <span class="filter-name">{{ $item." ".$loop->iteration.": ".$val }}</span>
                                            <i class="fa fa-times ml-1 remove-filter cursor-pointer float-right" wire:click="resetFilter('{{$item}}', '{{$index}}')"></i>

                                        </li>
                                    @endforeach

                                    @continue
                                @endif

                                @if (empty($value)) @continue @endif

                                @if ($value == $sample[$item]) @continue @endif

                                <li class="filter-item drop-down__item">

                                    <span class="filter-name">{{ $item.": ".$value }}</span><i class="fa fa-times ml-1 remove-filter cursor-pointer float-right" wire:click="resetFilter('{{$item}}')"></i>

                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="table_center">

                <div class="drop-down {{ $activePerson!=2?:'active' }}" :class="{ 'drop-down--active':showToggle(2) === true }">

                    <div id="dropDown" class="dropDown drop-down__button" wire:click="$set('activePerson', 2)">

                        <span class="drop-down__name">Person 3</span>

                    </div>



                    <div class="drop-down__menu-box third-person">

                        <ul class="drop-down__menu filter-wrapper">

                            @foreach ($persons[2] as $item => $value)

                                @if (is_array($value))
                                    @if(in_array($item, ["storage", "rental"])) @continue @endif

                                    @foreach ($value as $index => $val)
                                        @if (empty($val)) @continue @endif
                                        @if ($val == $sample[$item][0]) @continue @endif

                                        <li class="filter-item drop-down__item">

                                            <span class="filter-name">{{ $item." ".$loop->iteration.": ".$val }}</span>
                                            <i class="fa fa-times ml-1 remove-filter cursor-pointer float-right" wire:click="resetFilter('{{$item}}', '{{$index}}')"></i>

                                        </li>
                                    @endforeach

                                    @continue
                                @endif

                                @if (empty($value)) @continue @endif

                                @if ($value == $sample[$item]) @continue @endif

                                <li class="filter-item drop-down__item">

                                    <span class="filter-name">{{ $item.": ".$value }}</span><i class="fa fa-times ml-1 remove-filter cursor-pointer float-right" wire:click="resetFilter('{{$item}}')"></i>

                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-sm-4 mt-2 mb-2">

            <a class="btn btn-primary w-100 filter-btn " :class="{'active':showFilter('lesson_type') === 'WingSup'}" wire:click.prevent="addFilter('WingSup')" href="">WingSup</a>

        </div>

        <div class="col-sm-4 mt-2 mb-2">

            <a class="btn btn-primary w-100 filter-btn " :class="{'active':showFilter('lesson_type') === 'Wingfoidivng'}" wire:click.prevent="addFilter('Wingfoidivng')" href="">Wingfoidivng</a>

        </div>

        <div class="col-sm-4 mt-2 mb-2">

            <a class="btn btn-primary w-100 filter-btn " :class="{'active':showFilter('lesson_type') === 'WingSurfing'}" wire:click.prevent="addFilter('WingSurfing')" href="">WingSurfing</a>

        </div>

        <div class="col-sm-4 mt-2 mb-2">

            <a class="btn btn-primary w-100 filter-btn " :class="{'active':showFilter('lesson_type') === 'Kitesurfing'}" wire:click.prevent="addFilter('Kitesurfing')" href="">Kitesurfing</a>

        </div>

        <div class="col-sm-4 mt-2 mb-2">

            <a class="btn btn-primary w-100 filter-btn " :class="{'active':showFilter('lesson_type') === 'Kitefoidivng'}" wire:click.prevent="addFilter('Kitefoidivng')" href="">Kitefoidivng</a>

        </div>

        <div class="col-sm-4 mt-2 mb-2">

            <a class="btn btn-primary w-100 filter-btn " :class="{'active':showFilter('lesson_type') === 'SnowKiteing'}" wire:click.prevent="addFilter('SnowKiteing')" href="">SnowKiteing</a>

        </div>

        <div class="col-sm-4 mt-2 mb-2">

            <a class="btn btn-primary w-100 filter-btn " :class="{'active':showFilter('lesson_type') === 'Windsurfing'}" wire:click.prevent="addFilter('Windsurfing')" href="">Windsurfing</a>

        </div>

        <div class="col-sm-4 mt-2 mb-2">

            <a class="btn btn-primary w-100 filter-btn " :class="{'active':showFilter('lesson_type') === 'Wingfoidivng'}" wire:click.prevent="addFilter('Wingfoidivng')" href="">Wingfoidivng</a>

        </div>

        <div class="col-sm-4 mt-2 mb-2">

            <a class="btn btn-primary w-100 filter-btn " :class="{'active':showFilter('lesson_type') === 'Sup'}" wire:click.prevent="addFilter('Sup')" href="">Sup</a>

        </div>

        <div class="col-sm-4 mt-2 mb-2">

            <a class="btn btn-primary w-100 filter-btn " :class="{'active':showFilter('lesson_type') === 'Yacht'}" wire:click.prevent="addFilter('Yacht')" href="">Yacht</a>

        </div>

        <div class="col-sm-4 mt-2 mb-2">

            <a class="btn btn-primary w-100 filter-btn " :class="{'active':showFilter('lesson_type') === 'Catamaran'}" wire:click.prevent="addFilter('Catamaran')" href="">Catamaran</a>

        </div>

        <div class="col-sm-4 mt-2 mb-2">

            <a class="btn btn-primary w-100 filter-btn " :class="{'active':showFilter('lesson_type') === 'Yawl'}" wire:click.prevent="addFilter('Yawl')" href="">Yawl</a>

        </div >

        <div class="col-sm-4 mt-2 mb-2">

            <a class="btn btn-primary w-100 filter-btn " :class="{'active':showFilter('lesson_type') === 'Surfing'}" wire:click.prevent="addFilter('Surfing')" href="">Surfing</a>

        </div>

        <div class="col-sm-4 mt-2 mb-2">

            <a class="btn btn-primary w-100 filter-btn " :class="{'active':showFilter('lesson_type') === 'Diving'}" wire:click.prevent="addFilter('Diving')" href="">Diving</a>

        </div>

        <div class="col-sm-4 mt-2 mb-2">

            <a class="btn btn-primary w-100 filter-btn reset-filter" wire:click.prevent="resetFilters" href="">Reset Filter</a>

        </div>

    </div>



    <div class="row">

        <div class="price-range-slider" wire:ignore>

            <p class="range-value">

                <b>Duration :</b>

                <input type="text" id="amount10" readonly style="border: none;width: 85%;">

            </p>

            <div id="slider-range10" class="range-bar"></div>

        </div>



    </div>

    {{-- <div class="row">



        <div class="price-range-slider">

            <p class="range-value">

                <b>Price :</b>

                <input type="text" id="amount11" readonly style="border: none;">

            </p>

            <div id="slider-range11" class="range-bar"></div>

        </div>

    </div> --}}

    {{-- <div class="row">

        <div class="price-range-slider">

            <p class="range-value">

                <b>Duration :</b>

                <input type="text" id="amount3" readonly style="border: none;width: 85%;">

            </p>

            <div id="slider-range3" class="range-bar"></div>

        </div>



    </div> --}}

    <div class="row">



        <div class="price-range-slider" wire:ignore>

            <p class="range-value">

                <b>Price :</b>

                <input type="text" id="amount" readonly style="border: none;">

            </p>

            <div id="slider-range" class="range-bar"></div>

        </div>

        <div class="price-range-slider" wire:ignore>

            <p class="range-value">

                <b>Student Teacher ratio :</b>

                <input type="text" id="amount12" readonly style="border: none;">

            </p>

            <div id="slider-range12" class="range-bar"></div>

        </div>

        <div class="price-range-slider" wire:ignore>

            <p class="range-value">

                <b>Price Per Hour :</b>

                <input type="text" id="amount1" readonly style="border: none;">

            </p>

            <div id="slider-range2" class="range-bar"></div>

        </div>

    </div>

    <div class="row my-row">

        <div class="col-md-12 text-center mb-4">

            <a class="btn btn-primary w-30 lesson" href="javascript:void(0);" data-toggle="modal" data-target="#lessonandcamp">Lesson</a>

            <a class="btn btn-primary w-30 camp" href="javascript:void(0);" data-toggle="modal" data-target="#lessonandcamp">Camp</a>

            <a class="btn btn-primary w-30 rental" href="javascript:void(0);" data-toggle="modal" data-target="#rental">Rental</a>

            <a class="btn btn-primary w-30 storage" href="javascript:void(0);" data-toggle="modal" data-target="#storage">Storage</a>

            <a class="btn btn-primary w-30 courselevel mt-2" href="javascript:void(0);" data-toggle="modal" data-target="#courselevel">Course level</a>

            <a class="btn btn-primary w-30 language mt-2" href="javascript:void(0);" data-toggle="modal" data-target="#language">Language</a>

        </div>

    </div>

    <div class="row my-row">

        <div class="col-md-12 text-center mb-4">

            <a class="btn btn-primary w-30 lesson" href="javascript:void(0);" data-toggle="modal" data-target="#Association">Association</a>

            <a class="btn btn-primary w-30 camp" href="javascript:void(0);" data-toggle="modal" data-target="#Handicap">Handicap</a>

            <a class="btn btn-primary w-30 rental" href="javascript:void(0);" data-toggle="modal" data-target="#Childern">Childern</a>

        </div>

    </div>



</div>

@push('scripts')

    <script>

        function filters(){

            return {

                persons: @entangle('persons'),

                activePerson: @entangle('activePerson'),

                ddToggle: @entangle('toggle'),

                showFilter(key) {

                    return this.persons[this.activePerson][key];

                },

                showToggle(key){

                    this.setPrice();
                    this.setDuration();
                    this.setStudentTeacherRatio();
                    this.setPricePerHour();
                    this.setCourseLevel();
                    this.setChildren();
                    this.setHandicap();
                    this.setAssociation();

                    return this.ddToggle[key]

                },

                setPrice(){

                    let price = this.persons[this.activePerson]['price'];

                    $("#amount").val(price);

                    price = price.split(" - ");

                    $("#slider-range").slider("values", 0, price[0].replace('$', ''));

                    $("#slider-range").slider("values", 1, price[1].replace('$', ''));

                },

                setPricePerHour(){

                    let pricePerHour = this.persons[this.activePerson]['pricePerHour'];

                    $("#amount1").val(pricePerHour);

                    pricePerHour = pricePerHour.split(" - ");

                    $("#slider-range2").slider("values", 0, pricePerHour[0].replace('$', ''));

                    $("#slider-range2").slider("values", 1, pricePerHour[1].replace('$', ''));

                },

                setDuration(){

                    let duration = this.persons[this.activePerson]['duration'];

                    $("#amount10").val(duration);

                    duration = duration.split("-");

                    $("#slider-range10").slider("values", 0, new Date("01 "+duration[0]).getTime());

                    $("#slider-range10").slider("values", 1, new Date("01 "+duration[1]).getTime());

                },

                setStudentTeacherRatio(){

                    let studentTeacherRatio = this.persons[this.activePerson]['studentTeacherRatio'];

                    $("#amount12").val(studentTeacherRatio);

                    studentTeacherRatio = studentTeacherRatio.split(" - ");

                    $("#slider-range12").slider("values", 0, studentTeacherRatio[0]);

                    $("#slider-range12").slider("values", 1, studentTeacherRatio[1]);

                },

                setCourseLevel(){
                    let courseLevel = this.persons[this.activePerson]["courseLevel"];
                    $("[name^=course_level]").prop("checked", false);
                    $("[name^=course_level][value='"+courseLevel+"']").prop("checked", true);
                },

                setChildren(){
                    let children = this.persons[this.activePerson]["children"];
                    $("[name^=child]").prop("checked", false);
                    children.forEach(child => {
                        $("[name^=child][value='"+child+"']").prop("checked",true);
                    });
                },

                setHandicap(){
                    let handicaps = this.persons[this.activePerson]["handicap"];
                    $("[name^=handicap]").prop("checked", false);
                    handicaps.forEach(handicap => {
                        $("[name^=handicap][value='"+handicap+"']").prop("checked", true);
                    });
                },

                setAssociation(){
                    let associations = this.persons[this.activePerson]["association"];
                    $("[name^=association]").prop("checked", false);
                    associations.forEach(association => {
                        $("[name^=association][value='"+association+"']").prop("checked", true);
                    });
                },

                showPersons() {
                    console.log(this.persons);
                }

            }

        }

    </script>

    <script>

        $("#slider-range").on("slidestop", (e, ui) => {

            let ele = $(e.target).siblings('.range-value').find('input');

            @this.set("persons."+@this.activePerson+".price", ele.val());

        });

        $("#slider-range10").on("slidestop", (e, ui) => {

            let ele = $(e.target).siblings('.range-value').find('input');

            @this.set("persons."+@this.activePerson+".duration", ele.val());

        });


        $("#slider-range12").on("slidestop", (e, ui) => {

            let ele = $(e.target).siblings('.range-value').find('input');

            @this.set("persons."+@this.activePerson+".studentTeacherRatio", ele.val());

        });

        $("#slider-range2").on("slidestop", (e, ui) => {

            let ele = $(e.target).siblings('.range-value').find('input');

            @this.set("persons."+@this.activePerson+".pricePerHour", ele.val());

        });

        $("[name^=course_level]").change((e) => {
            let ele = $(e.target);
            if(ele.is(":checked")){
                @this.set("persons."+@this.activePerson+".courseLevel", ele.val());
            }
        });

        $("[name^=child]").change((e) => {
            let ele = $(e.target);
            @this.setChildren(ele.val(), ele.is(":checked"));
        });

        $("[name^=association]").change((e) => {
            let ele = $(e.target);
            @this.setAssociation(ele.val(), ele.is(":checked"));
        });

        $("[name^=handicap]").change((e) => {
            let ele = $(e.target);
            @this.setHandicap(ele.val(), ele.is(":checked"));
        });

    </script>

@endpush

