<section class="sign">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="sign__area">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
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
