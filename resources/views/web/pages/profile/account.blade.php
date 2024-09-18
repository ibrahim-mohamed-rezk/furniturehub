@extends('web.pages.account')

@section('profileContent')
    <form class="account-profile-content-container profile-container" action="{{ $action }}" method="POST"
        onsubmit="formAction(this)">
        @if ($user ?? '' && $user->id)
            {{ method_field('patch') }}
        @endif
        @CSRF
        <div class="inputs-container">
            <div class="input-content">
                <div class="input-field">
                    <input type="text" name="name" value="{{ $user->name }}">
                </div>
                <div class="label">
                    <span class="text">{{ __('web.full_name') }}</span>
                    <span class="required">*</span>
                </div>
            </div>
            <div class="input-content">
                <div class="input-field">
                    <input type="email" name="email" value="{{ $user->email }}">
                </div>
                <div class="label">
                    <span class="text">{{ __('web.email') }} </span>
                    <span class="required">*</span>
                </div>
            </div>
            <div class="input-content">
                <div class="input-field">
                    <input type="tel" name="phone" value="{{ $user->phone }}">
                </div>
                <div class="label">
                    <span class="text">{{ __('web.phone') }}</span>
                    <span class="required">*</span>
                </div>
            </div>
            <div class="input-content">
                <div class="input-field">
                    <select name="gevernorate_id">
                        @foreach ($governorates as $row)
                            <option value="{{ $row->id }}"{{ $row->id == $user->gevernorate_id ? 'selected' : '' }}>
                                {{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="label">
                    <span class="text">{{ __('web.city') }} </span>
                    <span class="required">*</span>
                </div>
            </div>
        </div>
        <div class="account-button">
            <button type="submit" class="button-text">{{ __('web.apply') }}</button>
        </div>
    </form>
@endsection
