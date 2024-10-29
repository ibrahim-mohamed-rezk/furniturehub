<style>
    /* reset container */
    @media (min-width: 1400px) {

        .container,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl,
        .container-xxl {
            max-width: 1540px !important;
            padding: 0 !important;
        }
    }

    .features-section-wrapper {
        margin: 48px 5px;
        padding: 16px;
        border: 1px solid #E4E7E9;
        border-radius: 6px;
        overflow: hidden;

        .swiper-wrapper {
            .swiper-slide {
                width: 100%;
                border-right: 1px solid #E4E7E9;
                padding-inline-start: clamp(5px, 1.0416vw, 20px);
                display: flex;
                align-items: center;
                justify-content: start;

                .item-list {
                    display: flex;
                    gap: clamp(5px, 0.833vw, 16px);

                    .info-right {
                        display: flex;
                        flex-direction: column;

                        h5 {
                            font-family: Alexandria;
                            font-size: clamp(10px, 0.72916vw, 14px);
                            font-weight: 500;
                            line-height: 20px;
                            color: #000;
                        }

                        p {
                            font-family: Alexandria;
                            font-size: clamp(8px, 0.625vw, 12px);
                            font-weight: 400;
                            line-height: 20px;
                            color: #5F6C72;
                        }
                    }
                }
            }
        }

    }

    @media (max-width: 768px) {
        .features-container {
            padding: 0;
        }

        .features-section-wrapper {
            margin: 40px 0;
            padding: 5px;
            border-radius: 0px;
        }

        .icon-left{
            svg{
                width: 30px;
                height: 30px;
            }
        }
    }
</style>

<section class="container features-container">
    <div class="features-section-wrapper">
        <div class="features-slider">
            <div class="swiper-wrapper">
                @foreach ($footer_cards as $row) <div class="swiper-slide">
                    <div class="item-list">
                        <div class="icon-left">
                            {{-- <img src="{{ asset($row->image) }}" loading="lazy" alt="Furniture Hub"> --}}
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M31.25 13.75H27.3325C28.1989 12.9601 28.8854 11.9933 29.3456 10.915C29.8058 9.83665 30.029 8.67205 30 7.5H27.5C27.5 11.1013 25.0362 12.8837 22.31 13.5C23.1286 12.0397 23.6199 10.419 23.75 8.75C23.75 7.75544 23.3549 6.80161 22.6517 6.09835C21.9484 5.39509 20.9946 5 20 5C19.0054 5 18.0516 5.39509 17.3483 6.09835C16.6451 6.80161 16.25 7.75544 16.25 8.75C16.3801 10.419 16.8714 12.0397 17.69 13.5C14.9638 12.8837 12.5 11.1013 12.5 7.5H10C9.97099 8.67205 10.1942 9.83665 10.6544 10.915C11.1146 11.9933 11.8011 12.9601 12.6675 13.75H8.75C7.75544 13.75 6.80161 14.1451 6.09835 14.8483C5.39509 15.5516 5 16.5054 5 17.5L5 22.5H7.5V35H32.5V22.5H35V17.5C35 16.5054 34.6049 15.5516 33.9017 14.8483C33.1984 14.1451 32.2446 13.75 31.25 13.75ZM20 7.5C20.3315 7.5 20.6495 7.6317 20.8839 7.86612C21.1183 8.10054 21.25 8.41848 21.25 8.75C21.0991 10.0785 20.6734 11.3611 20 12.5163C19.3266 11.3611 18.9009 10.0785 18.75 8.75C18.75 8.41848 18.8817 8.10054 19.1161 7.86612C19.3505 7.6317 19.6685 7.5 20 7.5ZM7.5 17.5C7.5 17.1685 7.6317 16.8505 7.86612 16.6161C8.10054 16.3817 8.41848 16.25 8.75 16.25H18.75V20H7.5V17.5ZM10 22.5H18.75V32.5H10V22.5ZM30 32.5H21.25V22.5H30V32.5ZM32.5 20H21.25V16.25H31.25C31.5815 16.25 31.8995 16.3817 32.1339 16.6161C32.3683 16.8505 32.5 17.1685 32.5 17.5V20Z"
                                    fill="#FD9636" />
                            </svg>

                        </div>
                        <div class="info-right">
                            <h5>{{ $row->title }}</h5>
                            <p>{{ $row->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</section>