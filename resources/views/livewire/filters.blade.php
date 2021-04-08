<div class="" x-data="filters()">
    <div class="row">
        <div class="col-12 px-5 mb-2">
            <div class="row">
                <div class="col-md-4">
                    <div class="table_center">
                        <div class="drop-down active">
                            <div id="dropDown" class="dropDown drop-down__button" wire:click="$set('activePerson', 1)">
                                <span class="drop-down__name">Person 1</span>
                            </div>
                            <div class="drop-down__menu-box">
                                <ul class="drop-down__menu filter-wrapper">
                                    <li data-type="" class="filter-item d-none drop-down__item"><span class="filter-name"></span><i class="fa fa-times ml-1 remove-filter cursor-pointer"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="table_center">
                        <div class="drop-down">
                            <div id="dropDown" class="dropDown drop-down__button" wire:click="$set('activePerson', 1)">
                            <span class="drop-down__name">Person 2</span>
                            </div>

                            <div class="drop-down__menu-box">
                                <ul class="drop-down__menu filter-wrapper">
                                    <li data-type="" class="filter-item d-none drop-down__item"><span class="filter-name"></span><i class="fa fa-times ml-1 remove-filter cursor-pointer"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="table_center">
                        <div class="drop-down">
                            <div id="dropDown" class="dropDown drop-down__button" wire:click="$set('activePerson', 1)">
                                <span class="drop-down__name">Person 3</span>
                            </div>

                            <div class="drop-down__menu-box">
                                <ul class="drop-down__menu filter-wrapper">
                                    <li data-type="" class="filter-item d-none drop-down__item"><span class="filter-name"></span><i class="fa fa-times ml-1 remove-filter cursor-pointer"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        button
        <div class="row">
            <div class="col-sm-4 mt-2 mb-2">
                <a class="btn btn-primary w-100 filter-btn " :class="'active'?filter=='WingSup'" wire:click.prevent="addFilter('WingSup')" href="">WingSup</a>
            </div>
            <div class="col-sm-4 mt-2 mb-2">
                <a class="btn btn-primary w-100 filter-btn " :class="'active'?filter=='Wingfoidivng'" wire:click.prevent="addFilter('Wingfoidivng')" href="">Wingfoidivng</a>
            </div>
            <div class="col-sm-4 mt-2 mb-2">
                <a class="btn btn-primary w-100 filter-btn " :class="'active'?filter=='WingSurfing'" wire:click.prevent="addFilter('WingSurfing')" href="">WingSurfing</a>
            </div>
            <div class="col-sm-4 mt-2 mb-2">
                <a class="btn btn-primary w-100 filter-btn " :class="'active'?filter=='Kitesurfing'" wire:click.prevent="addFilter('Kitesurfing')" href="">Kitesurfing</a>
            </div>
            <div class="col-sm-4 mt-2 mb-2">
                <a class="btn btn-primary w-100 filter-btn " :class="'active'?filter=='Kitefoidivng'" wire:click.prevent="addFilter('Kitefoidivng')" href="">Kitefoidivng</a>
            </div>
            <div class="col-sm-4 mt-2 mb-2">
                <a class="btn btn-primary w-100 filter-btn " :class="'active'?filter=='SnowKiteing'" wire:click.prevent="addFilter('SnowKiteing')" href="">SnowKiteing</a>
            </div>
            <div class="col-sm-4 mt-2 mb-2">
                <a class="btn btn-primary w-100 filter-btn " :class="'active'?filter=='Windsurfing'" wire:click.prevent="addFilter('Windsurfing')" href="">Windsurfing</a>
            </div>
            <div class="col-sm-4 mt-2 mb-2">
                <a class="btn btn-primary w-100 filter-btn " :class="'active'?filter=='Wingfoidivng'" wire:click.prevent="addFilter('Wingfoidivng')" href="">Wingfoidivng</a>
            </div>
            <div class="col-sm-4 mt-2 mb-2">
                <a class="btn btn-primary w-100 filter-btn " :class="'active'?filter=='Sup'" wire:click.prevent="addFilter('Sup')" href="">Sup</a>
            </div>
            <div class="col-sm-4 mt-2 mb-2">
                <a class="btn btn-primary w-100 filter-btn " :class="'active'?filter=='Yacht'" wire:click.prevent="addFilter('Yacht')" href="">Yacht</a>
            </div>
            <div class="col-sm-4 mt-2 mb-2">
                <a class="btn btn-primary w-100 filter-btn " :class="'active'?filter=='Catamaran'" wire:click.prevent="addFilter('Catamaran')" href="">Catamaran</a>
            </div>
            <div class="col-sm-4 mt-2 mb-2">
                <a class="btn btn-primary w-100 filter-btn " :class="'active'?filter=='Yawl'" wire:click.prevent="addFilter('Yawl')" href="">Yawl</a>
            </div >
            <div class="col-sm-4 mt-2 mb-2">
                <a class="btn btn-primary w-100 filter-btn " :class="'active'?filter=='Surfing'" wire:click.prevent="addFilter('Surfing')" href="">Surfing</a>
            </div>
            <div class="col-sm-4 mt-2 mb-2">
                <a class="btn btn-primary w-100 filter-btn " :class="'active'?filter=='Diving'" wire:click.prevent="addFilter('Diving')" href="">Diving</a>
            </div>
            <div class="col-sm-4 mt-2 mb-2">
                <a class="btn btn-primary w-100 filter-btn reset-filter" wire:click.prevent="resetFilters" href="">Reset Filter</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="price-range-slider">
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

        <div class="price-range-slider">
            <p class="range-value">
                <b>Price :</b>
                <input type="text" id="amount" readonly style="border: none;">
            </p>
            <div id="slider-range" class="range-bar"></div>
        </div>
        <div class="price-range-slider">
            <p class="range-value">
                <b>Student Teacher ratio :</b>
                <input type="text" id="amount12" readonly style="border: none;">
            </p>
            <div id="slider-range12" class="range-bar"></div>
        </div>
        <div class="price-range-slider">
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
                filter: "",
                activePerson: @entangle('activePerson'),
                showActivePerson() {
                    console.log(this.activePerson);
                },
                showPersons() {
                    console.log(this.persons);
                }
            }
        }
    </script>
@endpush
