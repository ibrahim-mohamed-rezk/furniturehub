<style>
    .popup-layout {
        /* position: fixed; */
        width: 100%;
        height: 100vh;
        background-color: #00000033;
        z-index: 99999;
        align-items: center;
        justify-content: center;
        display: none;
    }

    .show{
        display: flex;
    }
</style>
@yield('popup-content')
