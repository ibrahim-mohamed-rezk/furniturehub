@extends('admin.layouts.container')

@section('content')



    <section class="content-main">
        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">{{$title}}</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <form method="post" enctype="multipart/form-data" action="{{$action}}">
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('settings.paginate_dashboard')}}</label>
                                    <input type="number" name="paginate_dashboard" class="form-control {{ $errors->has('paginate_dashboard') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('settings.paginate_dashboard')}}" value='{{ old("paginate_dashboard", $settings['paginate_dashboard'] ?? "") }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('settings.google_analytics_G')}}</label>
                                    <input type="text" name="google_analytics_G" class="form-control {{ $errors->has('google_analytics_G') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('settings.google_analytics_G')}}" value='{{ old("google_analytics_G", $settings['google_analytics_G'] ?? "") }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('settings.google_tag_manager_GTM')}}</label>
                                    <input type="text" name="google_tag_manager_GTM" class="form-control {{ $errors->has('google_tag_manager_GTM') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('settings.google_tag_manager_GTM')}}" value='{{ old("google_tag_manager_GTM", $settings['google_tag_manager_GTM'] ?? "") }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('settings.facebook_pixel')}}</label>
                                    <input type="text" name="facebook_pixel" class="form-control {{ $errors->has('facebook_pixel') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('settings.facebook_pixel')}}" value='{{ old("facebook_pixel", $settings['facebook_pixel'] ?? "") }}'>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <label for="validationServer">{{ __('settings.scheme_for_organization') }}</label>
                                    <textarea name="scheme_for_organization" class="form-control {{ $errors->has('scheme_for_organization') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{ __('settings.scheme_for_organization') }}">{{ old("scheme_for_organization", $settings['scheme_for_organization'] ?? "") }}</textarea>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="validationServer">{{ __('settings.scheme_for_website') }}</label>
                                    <textarea name="scheme_for_website" class="form-control {{ $errors->has('scheme_for_website') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{ __('settings.scheme_for_website') }}">{{ old("scheme_for_website", $settings['scheme_for_website'] ?? "") }}</textarea>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="validationServer">{{ __('settings.schema_for_product') }}</label>
                                    <textarea name="schema_for_product" class="form-control {{ $errors->has('schema_for_product') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{ __('settings.schema_for_product') }}">{{ old("schema_for_product", $settings['schema_for_product'] ?? "") }}</textarea>
                                </div>
                

                            </div>
                            <button class="btn btn-md rounded font-sm hover-up">{{__('dashboard.submit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


@section('inner_js')

@endsection

@endsection
