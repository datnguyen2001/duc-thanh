<div class="row">
    @php
        $dataMap = App\Models\SettingModel::first();
    @endphp
    <div class="contact-map col-lg-6 col-12">
        <div class="box-map">
            {!! $dataMap->map!!}
        </div>
    </div>
    <div class="contact-form col-lg-6 col-12">
        <h5>
            {{ __('home.contact_note') }}
        </h5>
        <form id="contact-form">
            <label>{{ __('home.contact_name') }} *</label>
            <input type="text" placeholder="{{ __('home.contact_name_placeholder') }}" name="name"/>
            <label>{{ __('home.contact_phone') }} *</label>
            <input type="text" placeholder="{{ __('home.contact_phone_placeholder') }}" name="phone"/>
            <label>Email *</label>
            <input type="text" placeholder="{{ __('home.contact_email_placeholder') }}" name="email"/>
            <label>{{ __('home.contact_message') }}</label>
            <input type="text" placeholder="{{ __('home.contact_message_placeholder') }}" name="content"/>
            <div class="position-relative">
                <button type="submit" class="btn-save-contact">{{ __('home.contact_button') }}</button>
                <div class="loading"></div>
            </div>
        </form>
    </div>
</div>
