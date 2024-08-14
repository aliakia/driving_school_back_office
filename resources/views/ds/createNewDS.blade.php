@php
    $ds = 'Driving School';
@endphp

<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create New Driving School</h5> <small class="text-muted float-end">Default
                    label</small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ Route('submitDS') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="ds_code">{{ $ds }} Code</label>
                        <input name="ds_code" type="text" id="ds_code" class="form-control phone-mask"
                            placeholder="658 799 8941" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ds_name">{{ $ds }} Name</label>
                        <input type="text" class="form-control" id="ds_name" name="ds_name"
                            placeholder="Hello Driving School" />
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label" for="basic-default-message">{{ $ds }} Address</label>
                        <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">{{ $ds }} Phone Number</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask"
                            placeholder="658 799 8941" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Business Type</label>
                        <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc." />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">DTI Accreditation Number</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">LTO Accreditation Number</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">date_it_started</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">date_it_accredited</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">date_it_renewal</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">is_active</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">date_it_renewal</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">date_it_renewal</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">description</label>
                        <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">province</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">region</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">town_city</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">logo_big</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">logo_small</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">ds_pic1</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">ds_pic2</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">ds_pic3</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">ds_pic4</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">ds_pic5</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">ds_fee_theoretical</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">ds_fee_practical</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">ds_fee_dep_cde</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">server_location</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">is_live</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">is_with_pos</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">url_lto_itp1_live</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">url_lto_itp1_test</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">url_lto_itp2_live</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">url_lto_itp2_test</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">url_cdbs_live</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">url_cdbs_test</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">url_itp_live</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">url_itp_test</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">date_it_accreditation_renewal</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">date_it_authorization_renewal</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" <div
                            class="mb-3">
                    </div> --}}


                    {{-- Extras --}}
                    {{-- <label class="form-label" for="basic-default-email">Email</label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="basic-default-email" class="form-control" placeholder="john.doe"
                            aria-label="john.doe" aria-describedby="basic-default-email2" />
                        <span class="input-group-text" id="basic-default-email2">@example.com</span>
                    </div> --}}
                    {{-- <div class="form-text"> You can use letters, numbers & periods </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">Phone No</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask"
                            placeholder="658 799 8941" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">Message</label>
                        <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
