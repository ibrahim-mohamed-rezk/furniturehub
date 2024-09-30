<style>
    .popup-layout {
        position: fixed;
        width: 100%;
        height: 100vh;
        background-color: #00000033;
        z-index: 99999;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="popup-layout">
        @yield('popup-content')
</div>