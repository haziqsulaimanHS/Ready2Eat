@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || About
@endsection

@section('content')
    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>contact us</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">contact us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        CONTACT PAGE START
    ==============================-->
    <section id="wsus__contact">
        <div class="container custom-container">
            <div class="wsus__contact_area">
                <div class="row justify-content-center">
                    <div class="col-xl-4">
                        @if ($settings->contact_email || $settings->contact_phone)
                            <div class="row">
                                @if ($settings->contact_email)
                                    <div class="col-xl-12 col-md-12">
                                        <div class="wsus__contact_single">
                                            <i class="fal fa-envelope"></i>
                                            <h5>Email address</h5>
                                            <a href="mailto:{{ @$settings->contact_email }}">{{ @$settings->contact_email }}</a>
                                            <span><i class="fal fa-envelope"></i></span>
                                        </div>
                                    </div>
                                @endif
                                @if ($settings->contact_phone)
                                    <div class="col-xl-12 col-md-12">
                                        <div class="wsus__contact_single">
                                            <i class="far fa-phone-alt"></i>
                                            <h5>Phone number</h5>
                                            <a href="tel:{{ @$settings->contact_phone }}">{{ @$settings->contact_phone }}</a>
                                            <span><i class="far fa-phone-alt"></i></span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif

                        @if ($settings->contact_address)
                            <div class="row">
                                <div class="col-xl-12 mt-4">
                                    <div class="wsus__contact_single">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <h5>Contact address</h5>
                                        <a href="javascript:;">{{ @$settings->contact_address }}</a>
                                        <span><i class="fal fa-map-marker-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        CONTACT PAGE END
    ==============================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#contact-form').on('submit', function(e){
                e.preventDefault();
                let data = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: "{{route('handle-contact-form')}}",
                    data: data,
                    beforeSend: function(){
                        $('#form-submit').text('sending..');
                        $('#form-submit').attr('disabled', true);
                    },
                    success: function(data){
                        if(data.status == 'success'){
                            toastr.success(data.message);
                            $('#contact-form')[0].reset();
                            $('#form-submit').text('send now')
                            $('#form-submit').attr('disabled', false);
                        }
                    },
                    error: function(data){
                        let errors = data.responseJSON.errors;

                        $.each(errors, function(key, value){
                            toastr.error(value);
                        })

                        $('#form-submit').text('send now');
                        $('#form-submit').attr('disabled', false);
                    }
                })
            })
        })
    </script>
@endpush
