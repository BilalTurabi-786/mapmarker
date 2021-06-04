<section class="sign">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="sign__area">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-register-tab" data-toggle="tab" href="#nav-register" role="tab" aria-controls="nav-register" aria-selected="false">School Information</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
                <div class="user-detail__scroll-menu-box">
                    <div class="container">
                        <ul class="user-detail__scroll-menu navigate-section">
                            <li>
                                <a class="active" href="#general-info">General Information</a>
                            </li>
                            <li>
                                <a href="#location-box">Location</a>
                            </li>
                            <li>
                                <a href="#opening-box">Opening Hours</a>
                            </li>
                            <li>
                                <a href="#gallery-box">Gallery</a>
                            </li>
                            <li>
                                <a href="#social-box">Social Networks</a>
                            </li>
                            <li>
                                <a href="#add-sports">Sports</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- form listing -->
                <form class="add-listing__form" action="{{route('list-process')}}" wire:submit.prevent="saveChanges" method="post">
                    <div class="container">
                        <!-- form box -->
                        <div class="add-listing__form-box" id="general-info">

                            <h2 class="add-listing__form-title">
                                General Information:
                            </h2>

                            <div class="add-listing__form-content">
                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <label class="add-listing__label" for="list-title">
                                            Company Name:
                                        </label>
                                        <input class="add-listing__input" type="text" wire:model.lazy="title" id="list-title" placeholder="Company Name" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="add-listing__label" for="list-title">
                                            Owner Name:
                                        </label>
                                        <input class="add-listing__input" type="text" wire:model.lazy="title" id="list-title" placeholder="Owner Name" />
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="add-listing__label" for="list-title">
                                            School Name:
                                        </label>
                                        <input class="add-listing__input" type="text" wire:model.lazy="name" id="list-title" placeholder="School Name" />
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="add-listing__label" for="website">
                                            Website:
                                        </label>
                                        <input class="add-listing__input" type="text" wire:model.lazy="website" id="website" placeholder="Enter website address" />
                                        @error('website') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="add-listing__label" for="phone">
                                            Phone:
                                        </label>
                                        <input class="add-listing__input" type="text" wire:model.lazy="phone" id="phone" placeholder="Enter phone number" />
                                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="add-listing__label" for="email">
                                            Email:
                                        </label>
                                        <input class="add-listing__input" type="text" wire:model.lazy="email" id="email" placeholder="Enter email address" />
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- form box -->
                        <div class="add-listing__form-box" id="location-box">

                            <h2 class="add-listing__form-title">
                                Location:
                            </h2>

                            <div class="add-listing__form-content">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="add-listing__label" for="country">
                                            Country:
                                        </label>
                                        <input class="add-listing__input" type="text" wire:model.lazy="country" id="country" placeholder="Enter your country" />
                                        @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="add-listing__label" for="city">
                                            City:
                                        </label>
                                        <select class="add-listing__input js-example-basic-multiple" wire:model.lazy="city" id="city">
                                            <option value="">Select City: </option>
                                            <option>London</option>
                                            <option>Liverpool</option>
                                            <option>Amsterdal</option>
                                            <option>Berlin</option>
                                            <option>Hamburg</option>
                                            <option>Viena</option>
                                            <option>Istanbul</option>
                                            <option>New Yourk</option>
                                            <option>Madrid</option>
                                        </select>
                                        @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="add-listing__label" for="address">
                                            Address:
                                        </label>
                                        <input class="add-listing__input" type="text" wire:model.lazy="address" id="address" placeholder="Enter address" />
                                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="add-listing__label" for="address">
                                            Longitute:
                                        </label>
                                        <input class="add-listing__input" type="text" wire:model.lazy="longitude" id="address" placeholder="Enter Longitute" />
                                        @error('longitude') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="add-listing__label" for="address">
                                            Lattitude:
                                        </label>
                                        <input class="add-listing__input" type="text" wire:model.lazy="latitude" id="address" placeholder="Enter Lattitude" />
                                        @error('latitude') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- form box -->
                        <div class="add-listing__form-box" id="opening-box">

                            <h2 class="add-listing__form-title">
                                Description:
                            </h2>

                            <div class="add-listing__form-content pb-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea wire:model.lazy="description" class="form-control"></textarea>
                                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- form box -->
                        <div class="add-listing__form-box" id="gallery-box">

                            <h2 class="add-listing__form-title">
                                Gallery:
                            </h2>

                            <div class="add-listing__form-content">
                                <div class="add-listing__input-file-box">
                                    <input class="add-listing__input-file" type="file" wire:model.lazy="file" id="file"/>
                                    <div class="add-listing__input-file-wrap">
                                        <i class="la la-cloud-upload"></i>
                                        <p>Click here to upload your images</p>
                                    </div>
                                </div>
                                @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>

                        <!-- form box -->
                        <div class="add-listing__form-box" id="social-box">

                            <h2 class="add-listing__form-title">
                                Social Networks:
                            </h2>

                            <div class="add-listing__form-content">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6">
                                        <label class="add-listing__label" for="facebook">
                                            Facebook <span>(optional)</span>:
                                        </label>
                                        <input class="add-listing__input" type="text" wire:model.lazy="facebook" id="facebook" placeholder="Facebook URL" />
                                        @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label class="add-listing__label" for="twitter">
                                            Twitter <span>(optional)</span>:
                                        </label>
                                        <input class="add-listing__input" type="text" wire:model.lazy="twitter" id="twitter" placeholder="Twitter URL" />
                                        @error('twitter') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label class="add-listing__label" for="youtube">
                                            YouTube <span>(optional)</span>:
                                        </label>
                                        <input class="add-listing__input" type="text" wire:model.lazy="youtube" id="youtube" placeholder="YouTube URL" />
                                        @error('youtube') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label class="add-listing__label" for="pinterest">
                                            Pinterest <span>(optional)</span>:
                                        </label>
                                        <input class="add-listing__input" type="text" wire:model.lazy="pinterest" id="pinterest" placeholder="Pinterest URL" />
                                        @error('pinterest') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label class="add-listing__label" for="pinterest">
                                            Whatsapp <span>(optional)</span>:
                                        </label>
                                        <input class="add-listing__input" type="text" wire:model.lazy="pinterest" id="whatsapp" placeholder="Whatsapp" />
                                        @error('whatsapp') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label class="add-listing__label" for="pinterest">
                                            Skype <span>(optional)</span>:
                                        </label>
                                        <input class="add-listing__input" type="text" wire:model.lazy="pinterest" id="Skype" placeholder="Skype" />
                                        @error('skype') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- form box -->
                        {{-- <div class="add-listing__form-box" id="add-sports">
                            <h2 class="add-listing__form-title">
                                Sports (optional):
                            </h2>
                            <div class="add-listing__form-content">
                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12">
                                        <label class="add-listing__label" for="facebook">
                                            Sports Facility <span>(optional)</span>:
                                        </label>
                                        <select wire:model.lazy="sports[]" id="" class="add-listing__label multipleChosen" multiple="true" >
                                            @if($filters->count()>0)
                                                @foreach($filters as $filter)
                                                    <option value="{{$filter->id}}">{{$filter->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
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
