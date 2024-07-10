@for($i=0 ; $i < 5;$i++)
    @if ($i<$rate)
        
        <img src="{{ url('') }}/public/assets/web/ASSETS_En/imgs/template/icons/star.svg" alt="Furniture Hub" loading="lazy">
    @else
        <img src="{{ url('') }}/public/assets/web/ASSETS_En/imgs/template/icons/star-gray.svg" alt="Furniture Hub" loading="lazy">
        
    @endif
@endfor