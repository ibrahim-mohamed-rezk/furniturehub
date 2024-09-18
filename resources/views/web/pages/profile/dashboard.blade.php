@extends('web.pages.account')

@section('profileContent')
<div class="account-profile-content-container dashboard-container">
    <a href="{{route('web.profile')}}">
        <div class="card account-details">
            <div class="icon account-icon">
                <svg width="18" height="19" viewBox="0 0 18 19"  xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_3_119)">
                        <path d="M9 9.12049C9.89002 9.12049 10.76 8.85656 11.5001 8.3621C12.2401 7.86763 12.8169 7.16483 13.1575 6.34256C13.4981 5.52029 13.5872 4.61549 13.4135 3.74258C13.2399 2.86966 12.8113 2.06784 12.182 1.4385C11.5526 0.809169 10.7508 0.380585 9.87791 0.206952C9.00499 0.0333182 8.10019 0.122433 7.27792 0.463028C6.45566 0.803622 5.75285 1.3804 5.25839 2.12042C4.76392 2.86044 4.5 3.73047 4.5 4.62049C4.50119 5.81359 4.97568 6.95749 5.81934 7.80115C6.66299 8.64481 7.80689 9.11929 9 9.12049ZM9 1.62049C9.59334 1.62049 10.1734 1.79643 10.6667 2.12608C11.1601 2.45572 11.5446 2.92426 11.7716 3.47244C11.9987 4.02061 12.0581 4.62381 11.9424 5.20576C11.8266 5.7877 11.5409 6.32225 11.1213 6.74181C10.7018 7.16136 10.1672 7.44709 9.58527 7.56284C9.00333 7.6786 8.40013 7.61919 7.85195 7.39212C7.30377 7.16506 6.83524 6.78054 6.50559 6.2872C6.17595 5.79385 6 5.21383 6 4.62049C6 3.82484 6.31607 3.06177 6.87868 2.49917C7.44129 1.93656 8.20435 1.62049 9 1.62049Z" />
                        <path d="M9 10.621C7.2104 10.623 5.49466 11.3348 4.22922 12.6002C2.96378 13.8657 2.25199 15.5814 2.25 17.371C2.25 17.5699 2.32902 17.7607 2.46967 17.9013C2.61032 18.042 2.80109 18.121 3 18.121C3.19891 18.121 3.38968 18.042 3.53033 17.9013C3.67098 17.7607 3.75 17.5699 3.75 17.371C3.75 15.9786 4.30312 14.6433 5.28769 13.6587C6.27226 12.6741 7.60761 12.121 9 12.121C10.3924 12.121 11.7277 12.6741 12.7123 13.6587C13.6969 14.6433 14.25 15.9786 14.25 17.371C14.25 17.5699 14.329 17.7607 14.4697 17.9013C14.6103 18.042 14.8011 18.121 15 18.121C15.1989 18.121 15.3897 18.042 15.5303 17.9013C15.671 17.7607 15.75 17.5699 15.75 17.371C15.748 15.5814 15.0362 13.8657 13.7708 12.6002C12.5053 11.3348 10.7896 10.623 9 10.621Z" />
                    </g>
                    <defs>
                        <clipPath id="clip0_3_119">
                        <rect width="18" height="18"  transform="translate(0 0.120544)"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="title">{{ __('web.account_details') }}</div>
        </div>
    </a>
    <a href="{{route('web.orders')}}">
        <div class="card orders">
            <div class="icon orders-icon">
                <svg width="18" height="19" viewBox="0 0 18 19"  xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_3_132)">
                    <path d="M14.25 0.120544H3.75C2.7558 0.121735 1.80267 0.517206 1.09966 1.22021C0.396661 1.92321 0.00119089 2.87635 0 3.87054L0 14.3705C0.00119089 15.3647 0.396661 16.3179 1.09966 17.0209C1.80267 17.7239 2.7558 18.1194 3.75 18.1205H14.25C15.2442 18.1194 16.1973 17.7239 16.9003 17.0209C17.6033 16.3179 17.9988 15.3647 18 14.3705V3.87054C17.9988 2.87635 17.6033 1.92321 16.9003 1.22021C16.1973 0.517206 15.2442 0.121735 14.25 0.120544V0.120544ZM16.5 3.87054H11.25V1.62054H14.25C14.8467 1.62054 15.419 1.8576 15.841 2.27955C16.2629 2.70151 16.5 3.27381 16.5 3.87054ZM8.25 1.62054H9.75V5.37054C9.75 5.56946 9.67098 5.76022 9.53033 5.90087C9.38968 6.04153 9.19891 6.12054 9 6.12054C8.80109 6.12054 8.61032 6.04153 8.46967 5.90087C8.32902 5.76022 8.25 5.56946 8.25 5.37054V1.62054ZM3.75 1.62054H6.75V3.87054H1.5C1.5 3.27381 1.73705 2.70151 2.15901 2.27955C2.58097 1.8576 3.15326 1.62054 3.75 1.62054ZM14.25 16.6205H3.75C3.15326 16.6205 2.58097 16.3835 2.15901 15.9615C1.73705 15.5396 1.5 14.9673 1.5 14.3705V5.37054H6.75C6.75 5.96728 6.98705 6.53958 7.40901 6.96153C7.83097 7.38349 8.40326 7.62054 9 7.62054C9.59674 7.62054 10.169 7.38349 10.591 6.96153C11.0129 6.53958 11.25 5.96728 11.25 5.37054H16.5V14.3705C16.5 14.9673 16.2629 15.5396 15.841 15.9615C15.419 16.3835 14.8467 16.6205 14.25 16.6205ZM15 14.3705C15 14.5695 14.921 14.7602 14.7803 14.9009C14.6397 15.0415 14.4489 15.1205 14.25 15.1205H12C11.8011 15.1205 11.6103 15.0415 11.4697 14.9009C11.329 14.7602 11.25 14.5695 11.25 14.3705C11.25 14.1716 11.329 13.9809 11.4697 13.8402C11.6103 13.6996 11.8011 13.6205 12 13.6205H14.25C14.4489 13.6205 14.6397 13.6996 14.7803 13.8402C14.921 13.9809 15 14.1716 15 14.3705Z" />
                    </g>
                    <defs>
                    <clipPath id="clip0_3_132">
                    <rect width="18" height="18"  transform="translate(0 0.120544)"/>
                    </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="title">{{ __('web.orders') }}</div>
        </div>
    </a>
    {{-- <a href="{{route('web.download')}}">
        <div class="card downloads">
            <div class="icon downloads-icon">
                <svg width="18" height="19" viewBox="0 0 18 19"  xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_3_127)">
                    <path d="M13.9013 14.1199L14.9618 15.1804L12.5618 17.5804C12.2138 17.9271 11.7427 18.1218 11.2515 18.1218C10.7603 18.1218 10.2892 17.9271 9.94125 17.5804L7.54125 15.1804L8.60175 14.1199L10.5 16.0204V9.87039H12V16.0204L13.9013 14.1199ZM13.3425 5.52714C13.0079 4.09536 12.1591 2.83631 10.9574 1.98902C9.75572 1.14173 8.28474 0.765196 6.82374 0.930912C5.36274 1.09663 4.01345 1.79305 3.03205 2.88796C2.05065 3.98287 1.50546 5.40003 1.5 6.87039C1.49926 7.8292 1.73087 8.7739 2.175 9.62364C1.36585 10.0572 0.724801 10.7488 0.353715 11.5885C-0.0173701 12.4282 -0.0972103 13.3677 0.12688 14.258C0.35097 15.1482 0.866136 15.9381 1.59053 16.502C2.31492 17.0659 3.20699 17.3715 4.125 17.3704H7.6065L6.1065 15.8704H4.125C3.48632 15.8723 2.86896 15.6407 2.38914 15.2192C1.90931 14.7976 1.60011 14.2153 1.51974 13.5816C1.43936 12.948 1.59335 12.3069 1.95273 11.7789C2.3121 11.2509 2.85207 10.8725 3.471 10.7149L4.54875 10.4366L3.8865 9.54264C3.30985 8.77116 2.99881 7.83356 3 6.87039C3.0098 5.73575 3.44788 4.6467 4.22651 3.82133C5.00514 2.99595 6.06683 2.4952 7.19898 2.41933C8.33112 2.34347 9.45013 2.69811 10.3319 3.41222C11.2137 4.12633 11.7932 5.1472 11.9543 6.27039L12.0293 6.83889L12.5985 6.91389C13.3537 7.01406 14.0711 7.30472 14.6831 7.75852C15.295 8.21232 15.7815 8.81434 16.0967 9.50794C16.4118 10.2015 16.5454 10.9639 16.4847 11.7234C16.4241 12.4828 16.1713 13.2143 15.75 13.8491L16.8225 14.9216C17.4146 14.1225 17.7982 13.1884 17.9384 12.2037C18.0786 11.2191 17.9712 10.215 17.6257 9.28232C17.2802 8.34967 16.7076 7.51787 15.9597 6.86219C15.2119 6.20652 14.3123 5.74766 13.3425 5.52714Z" />
                    </g>
                    <defs>
                    <clipPath id="clip0_3_127">
                    <rect width="18" height="18"  transform="translate(0 0.120544)"/>
                    </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="title">DOWNLOADS</div>
        </div>
    </a> --}}
    <a href="{{route('web.addresses')}}">
        <div class="card addresses">
            <div class="icon addresses-icon"> 
                <svg width="18" height="19" viewBox="0 0 18 19"  xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_3_123)">
                    <path d="M8.99987 12.1206C9.34911 12.1213 9.69368 12.0406 10.0064 11.8851L11.5064 11.1351C12.2709 10.7555 12.7532 9.97419 12.7499 9.1206V6.89535C12.7525 6.04249 12.2703 5.26223 11.5064 4.88311L10.0064 4.13312C9.37259 3.81812 8.62788 3.81812 7.99412 4.13312L6.49411 4.88311C5.72988 5.26202 5.24736 6.04235 5.24986 6.89535V9.1206C5.24711 9.97366 5.72928 10.7542 6.49337 11.1336L7.99338 11.8836C8.30592 12.0397 8.65052 12.1208 8.99987 12.1206ZM6.74987 9.1206V6.89535C6.75106 6.81885 6.76397 6.74295 6.78812 6.67035L8.42313 7.48784C8.78622 7.66931 9.21355 7.66931 9.57664 7.48784L11.2117 6.67035C11.2358 6.74295 11.2487 6.81885 11.2499 6.89535V9.1206C11.2511 9.40515 11.0902 9.66559 10.8352 9.79183L9.33515 10.5418C9.12365 10.6465 8.87541 10.6465 8.66391 10.5418L7.1639 9.79183C6.90912 9.66538 6.74853 9.40501 6.74987 9.1206ZM14.2499 16.6206H12.2181L14.8333 14.2041C18.0552 10.9823 18.0553 5.75871 14.8335 2.53682C11.6117 -0.685077 6.38818 -0.685112 3.16629 2.53664C-0.0556083 5.75839 -0.0556788 10.9821 3.16611 14.2039C3.17318 14.211 5.78163 16.6206 5.78163 16.6206H3.74988C3.33567 16.6206 2.99989 16.9564 2.99989 17.3706C2.99989 17.7848 3.33567 18.1206 3.74988 18.1206H14.2499C14.6641 18.1206 14.9999 17.7848 14.9999 17.3706C14.9999 16.9564 14.6641 16.6206 14.2499 16.6206ZM4.22688 3.59759C6.85713 0.955524 11.1312 0.945962 13.7732 3.57621C16.4153 6.20646 16.4249 10.4805 13.7946 13.1226L10.8059 15.8833C9.78578 16.8448 8.19145 16.8392 7.17814 15.8706L4.22688 13.1436C1.59491 10.5058 1.59494 6.23536 4.22688 3.59759Z" />
                    </g>
                    <defs>
                    <clipPath id="clip0_3_123">
                    <rect width="18" height="18"  transform="translate(0 0.120544)"/>
                    </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="title">{{ __('web.addresses') }}</div>
        </div>
    </a>
</div>

@endsection