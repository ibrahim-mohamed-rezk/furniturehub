@extends('web.pages.account')

@section('profileContent')
    <div class="account-profile-content-container profile-container">
        <div class="inputs-container">
            <div class="input-content">
                <div class="input-field">
                    <input type="text">
                </div>
                <div class="label">
                    <span class="text">Full Name</span>
                    <span class="required">*</span>
                </div>
            </div> 
            <div class="input-content">
                <div class="input-field">
                    <input type="email">
                </div>
                <div class="label">
                    <span class="text">E-Mail </span>
                    <span class="required">*</span>
                </div>
            </div> 
            <div class="input-content">
                <div class="input-field">
                    <input type="tel">
                </div>
                <div class="label">
                    <span class="text">Phone Number </span>
                    <span class="required">*</span>
                </div>
            </div> 
            <div class="input-content">
                <div class="input-field">
                    <select>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>
                <div class="label">
                    <span class="text">Sex </span>
                    <span class="required">*</span>
                </div>
            </div> 
        </div>
        <div class="account-button">
            <button class="button-text">Apply</button>
        </div>
    </div>
@endsection