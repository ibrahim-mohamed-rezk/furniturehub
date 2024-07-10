<div class="sidebar-left"><a class="btn btn-open" href="#"></a>
    <ul class="menu-icons hidden">
        @foreach($allcategories as $row)
            <li>
                <a href="javascript:void(0)">
                    <img src="{{asset($row->image_url)}}" loading="lazy" alt="Furniture Hub">
                </a>
            </li>
        @endforeach
    </ul>
    <ul class="menu-texts menu-close">
        @foreach($allcategories as $row)
            <li class="has-children">
                <a href="{{route('web.shop')}}?category_id={{$row->id}}">
                    <span class="img-link">
                        <img src="{{asset($row->image_url)}}" loading="lazy" alt="Furniture Hub">
                    </span>
                    <span class="text-link">{{$row->title}}</span>
                </a>
                @if(count($row->models))
                    <ul class="sub-menu">
                        <li>
                            <a href="{{route('web.shop')}}?category_id={{$row->id}}"><strong>{{__('web.view_all_products')}}</strong></a>
                        </li>
                        @foreach($row->models as $model)
                            <li>
                                <a href="{{route('web.shop')}}?category_id={{$row->id}}&model_id={{$model->id}}">{{$model->details->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <ul class="sub-menu">
                            <li>
                                <a href="{{route('web.shop')}}?category_id={{$row->id}}"><strong>{{__('web.view_all_products')}}</strong></a>
                            </li>
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>


