@extends('web.layouts.container')

@section('styles')
<link rel="stylesheet" href="{{ url('') }}/assets/web/ASSets/css/about-installments.css">
@endsection


@section('content')
<div class="container">
    <div class="banner">
        <img src="{{ url('') }}/storage/methods-banner.png">
    </div>
    <div class="about-methods">
        <div class="about-method">
            <button class="about-method-collapse collapsed" type="button" data-toggle="collapse"
                data-target="#about-method-collapse-1" aria-expanded="false" aria-controls="about-method-collapse-1">
                <div class="method-image">
                    <img src="{{ url('') }}/storage/method.png">
                    <span>نظام تقسيط فرصة</span>
                </div>
                <div class="method-arrow">
                    <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.28882e-05 1.81909C-0.00107956 1.63253 0.0355015 1.44759 0.107676 1.27487C0.179848 1.10216 0.286192 0.945071 0.420605 0.812612C0.692331 0.548588 1.05991 0.400391 1.44305 0.400391C1.82619 0.400391 2.19377 0.548588 2.46549 0.812612L10.0359 8.19818L17.6064 0.812612C17.8838 0.580376 18.2407 0.459022 18.6057 0.472803C18.9707 0.486583 19.3169 0.634483 19.5752 0.886946C19.8335 1.13941 19.9848 1.47784 19.9989 1.83461C20.013 2.19138 19.8889 2.54021 19.6513 2.81139L11.0656 11.1893C10.9301 11.3207 10.7694 11.4246 10.5927 11.4951C10.416 11.5657 10.2268 11.6014 10.0359 11.6004C9.65195 11.5951 9.28416 11.4483 9.00624 11.1893L0.420605 2.78304C0.15959 2.52603 0.00910187 2.18112 2.28882e-05 1.81909Z"
                            fill="black" />
                    </svg>
                </div>
            </button>
            <div class="collapse" id="about-method-collapse-1">
                <div class="method-body">
                    قدامك فرصة تستفيد بعرض الـتريبل زيرو مع فرصة!
                    على 3 شهور.. عرض مع جميع تجارنا من فئات الملابس و الأحذية، مستلزمات التجميل و نضارات
                    0% فوائد
                    0% مصاريف شراء
                    0% مقدم مع فرصة
                    عرض لفترة محدودة
                    تطبق الشروط والأحكام
                    #فرصة_وجاتلك
                    رقم التسجيل الضريبي ٤٥٧-٧٨٦-٤٠٧
                </div>
            </div>
        </div>
        <div class="about-method">
            <button class="about-method-collapse collapsed" type="button" data-toggle="collapse"
                data-target="#about-method-collapse-2" aria-expanded="false" aria-controls="about-method-collapse-2">
                <div class="method-image">
                    <img src="{{ url('') }}/storage/method.png">
                    <span>نظام تقسيط فرصة</span>
                </div>
                <div class="method-arrow">
                    <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.28882e-05 1.81909C-0.00107956 1.63253 0.0355015 1.44759 0.107676 1.27487C0.179848 1.10216 0.286192 0.945071 0.420605 0.812612C0.692331 0.548588 1.05991 0.400391 1.44305 0.400391C1.82619 0.400391 2.19377 0.548588 2.46549 0.812612L10.0359 8.19818L17.6064 0.812612C17.8838 0.580376 18.2407 0.459022 18.6057 0.472803C18.9707 0.486583 19.3169 0.634483 19.5752 0.886946C19.8335 1.13941 19.9848 1.47784 19.9989 1.83461C20.013 2.19138 19.8889 2.54021 19.6513 2.81139L11.0656 11.1893C10.9301 11.3207 10.7694 11.4246 10.5927 11.4951C10.416 11.5657 10.2268 11.6014 10.0359 11.6004C9.65195 11.5951 9.28416 11.4483 9.00624 11.1893L0.420605 2.78304C0.15959 2.52603 0.00910187 2.18112 2.28882e-05 1.81909Z"
                            fill="black" />
                    </svg>
                </div>
            </button>
            <div class="collapse" id="about-method-collapse-2">
                <div class="method-body">
                    قدامك فرصة تستفيد بعرض الـتريبل زيرو مع فرصة!
                    على 3 شهور.. عرض مع جميع تجارنا من فئات الملابس و الأحذية، مستلزمات التجميل و نضارات
                    0% فوائد
                    0% مصاريف شراء
                    0% مقدم مع فرصة
                    عرض لفترة محدودة
                    تطبق الشروط والأحكام
                    #فرصة_وجاتلك
                    رقم التسجيل الضريبي ٤٥٧-٧٨٦-٤٠٧
                </div>
            </div>
        </div>
    </div>
</div>
@endsection