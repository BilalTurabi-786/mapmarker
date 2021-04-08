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
                                @if (is_array($value)) @continue @endif
                                @if (empty($value)) @continue @endif
                                @if ($value == $sample[$item]) @continue @endif
                                <li class="filter-item drop-down__item">
                                    <span class="filter-name">{{ $item.": ".$value }}</span><i class="fa fa-times ml-1 remove-filter cursor-pointer" wire:click="resetFilter('{{$item}}')"></i>
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
                                @if (is_array($value)) @continue @endif
                                @if (empty($value)) @continue @endif
                                @if ($value == $sample[$item]) @continue @endif
                                <li class="filter-item drop-down__item">
                                    <span class="filter-name">{{ $item.": ".$value }}</span><i class="fa fa-times ml-1 remove-filter cursor-pointer" wire:click="resetFilter('{{$item}}')"></i>
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

                    <div class="drop-down__menu-box">
                        <ul class="drop-down__menu filter-wrapper">
                            @foreach ($persons[2] as $item => $value)
                                @if (is_array($value)) @continue @endif
                                @if (empty($value)) @continue @endif
                                @if ($value == $sample[$item]) @continue @endif
                                <li class="filter-item drop-down__item">
                                    <span class="filter-name">{{ $item.": ".$value }}</span><i class="fa fa-times ml-1 remove-filter cursor-pointer" wire:click="resetFilter('{{$item}}')"></i>
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
                    return this.ddToggle[key]
                },
                setPrice(){
                    let price = this.persons[this.activePerson]['price'];
                    $("#amount").val(price);
                    price = price.split(" - ");
                    $("#slider-range").slider("values", 0, price[0].replace('$', ''));
                    $("#slider-range").slider("values", 1, price[1].replace('$', ''));
                },
                setDuration(){
                    let duration = this.persons[this.activePerson]['duration'];
                    $("#amount10").val(duration);
                    duration = duration.split("-");
                    $("#slider-range10").slider("values", 0, new Date("01 "+duration[0]).getTime());
                    $("#slider-range10").slider("values", 1, new Date("01 "+duration[1]).getTime());
                },
                showPersons() {
                    console.log(this.persons);
                }
            }
        }
    </script>
    <script>
        /** Sliders */
            //price
            $( "#slider-range" ).slider({
                range: true,
                min: 130,
                max: 500,
                values: [ 130, 250 ],
                slide: function( event, ui ) {
                    $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
            });
            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                " - $" + $( "#slider-range" ).slider( "values", 1 ) );

            //price per hour
            $( "#slider-range2" ).slider({
                range: true,
                min: 130,
                max: 500,
                values: [ 130, 250 ],
                slide: function( event, ui ) {
                    $( "#amount1" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
            });
            $( "#amount1" ).val( "$" + $( "#slider-range2" ).slider( "values", 0 ) +
                " - $" + $( "#slider-range2" ).slider( "values", 1 ) );

            //duration
            function formatDate(date) {
                var monthNames = [
                "January", "February", "March",
                "April", "May", "June", "July",
                "August", "September", "October",
                "November", "December"
                ];

                var monthIndex = date.getMonth();
                var year = date.getFullYear();

                return monthNames[monthIndex] + ' ' + year;
            }
            $( "#slider-range3" ).slider({
                range: true,
                min: new Date('2010-01-01T00:00:00').getTime(),
                max: new Date('2021-01-01T00:00:00').getTime(),
                step: 86400000,
                values: [ new Date('2010-03-01T00:00:00').getTime(), new Date('2021-01-01T00:00:00').getTime() ],
                slide: function( event, ui ) {
                    $( "#amount3" ).val( formatDate(new Date(ui.values[0])) + '-' + formatDate(new Date(ui.values[1])) );
                }
            });
            $( "#amount3" ).val( formatDate((new Date($( "#slider-range3" ).slider( "values", 0 )))) +
                " - " + formatDate((new Date($( "#slider-range3" ).slider( "values", 1 )))));

            // Ratio Student Teacher
            $( "#slider-range4" ).slider({
                range: true,
                min: 1,
                max: 10,
                values: [ 1, 10 ],
                slide: function( event, ui ) {
                    $( "#amount4" ).val( ui.values[ 0 ] +  ui.values[ 1 ] );
                }
            });
            $( "#amount4" ).val(  $( "#slider-range4" ).slider( "values", 0 ) +
                " - " + $( "#slider-range4" ).slider( "values", 1 ) );

            //Days Duration
            $( "#slider-range5" ).slider({
                range: true,
                min: 1,
                max: 10,
                values: [ 1, 10 ],
                slide: function( event, ui ) {
                    $( "#amount5" ).val( "Days" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                }
            });
            $( "#amount5" ).val( "Days" + $( "#slider-range5" ).slider( "values", 0 ) +
                " - Days" + $( "#slider-range5" ).slider( "values", 1 ) );

            // Hour Selection
            $( "#slider-range6" ).slider({
                range: true,
                min: 0,
                max: 40,
                values: [ 0, 40 ],
                slide: function( event, ui ) {
                    $( "#amount6" ).val(  ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                }
            });
            $( "#amount6" ).val(  $( "#slider-range6" ).slider( "values", 0 ) +
                " - Hour" + $( "#slider-range6" ).slider( "values", 1 ) );

            // price per teaching hour
            $( "#slider-range7" ).slider({
                range: true,
                min: 0,
                max: 200,
                values: [ 0, 200 ],
                slide: function( event, ui ) {
                    $( "#amount7" ).val(  ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                }
            });
            $( "#amount7" ).val(  $( "#slider-range7" ).slider( "values", 0 ) +
                " -" + $( "#slider-range7" ).slider( "values", 1 ) );

            //price per hour rental
            $( "#slider-range8" ).slider({
                range: true,
                min: 0,
                max: 200,
                values: [ 0, 200 ],
                slide: function( event, ui ) {
                    $( "#amount8" ).val(  ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                }
            });
            $( "#amount8" ).val(  $( "#slider-range8" ).slider( "values", 0 ) +
                " -" + $( "#slider-range8" ).slider( "values", 1 ) );


            // price per day last filter

            $( "#slider-range9" ).slider({
                range: true,
                min: 0,
                max: 200,
                values: [ 0, 200 ],
                slide: function( event, ui ) {
                    $( "#amount9" ).val(  ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                }
            });
            $( "#amount9" ).val(  $( "#slider-range9" ).slider( "values", 0 ) +
                " -" + $( "#slider-range9" ).slider( "values", 1 ) );

            //Brand Slider


            $('.customer-logos').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 3
                    }
                }]
            });



            function formatDate10(date) {
                var monthNames = [
                "January", "February", "March",
                "April", "May", "June", "July",
                "August", "September", "October",
                "November", "December"
                ];

                var monthIndex = date.getMonth();
                var year = date.getFullYear();

                return monthNames[monthIndex] + ' ' + year;
            }
            $( "#slider-range10" ).slider({
                range: true,
                min: new Date('2010-01-01T00:00:00').getTime(),
                max: new Date('2021-01-01T00:00:00').getTime(),
                step: 86400000,
                values: [ new Date('2010-03-01T00:00:00').getTime(), new Date('2021-01-01T00:00:00').getTime() ],
                slide: function( event, ui ) {
                    $( "#amount10" ).val( formatDate10(new Date(ui.values[0])) + '-' + formatDate10(new Date(ui.values[1])) );
                }
            });
            $( "#amount10" ).val( formatDate10((new Date($( "#slider-range10" ).slider( "values", 0 )))) +
                " - " + formatDate10((new Date($( "#slider-range10" ).slider( "values", 1 )))));


            $( "#slider-range11" ).slider({
                range: true,
                min: 130,
                max: 500,
                values: [ 130, 250 ],
                slide: function( event, ui ) {
                    $( "#amount11" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
            });
            $( "#amount11" ).val( "$" + $( "#slider-range11" ).slider( "values", 0 ) +
                " - $" + $( "#slider-range11" ).slider( "values", 1 ) );

            $( "#slider-range12" ).slider({
                range: true,
                min: 130,
                max: 500,
                values: [ 130, 250 ],
                slide: function( event, ui ) {
                    $( "#amount12" ).val(  ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                }
            });
            $( "#amount12" ).val(  $( "#slider-range12" ).slider( "values", 0 ) +
                " - " + $( "#slider-range12" ).slider( "values", 1 ) );
        /** Sliders */
    </script>
    <script>
        $("#slider-range").on("slidestop", (e, ui) => {
            let ele = $(e.target).siblings('.range-value').find('input');
            @this.set("persons."+@this.activePerson+".price", ele.val());
        });
    </script>
@endpush
