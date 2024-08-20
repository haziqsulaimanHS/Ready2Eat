@php
    $footerInfo = Cache::rememberForever('footer_info', function(){
        return \App\Models\FooterInfo::first();
    });
@endphp
<footer class="footer_2">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-3 col-md-3">
                <div class="wsus__footer_content">
                    <a class="wsus__footer_2_logo" href="{{url('/')}}">
                        <img src="{{asset(@$footerInfo->logo)}}" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-3 text-center">
                <div class="wsus__footer_content">
                    <h4 style="color: white;">Contact Number:</h4>
                    <div style="color: white;">
                        <i class="fas fa-phone-alt"></i> {{@$footerInfo->phone}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-3 text-center">
                <div class="wsus__footer_content">
                    <h4 style="color: white;">Email:</h4>
                    <div style="color: white;">
                        <i class="far fa-envelope"></i> {{@$footerInfo->email}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-3 text-center">
                <div class="wsus__footer_content">
                    <h4 style="color: white;">Address:</h4>
                    <div style="color: white;">
                        <i class="fal fa-map-marker-alt"></i> {{@$footerInfo->address}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wsus__footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__copyright d-flex justify-content-center">
                        <p> {{@$footerInfo->copyright}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>



