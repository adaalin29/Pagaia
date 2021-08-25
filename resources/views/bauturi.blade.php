@extends('parts.template') @section('content')
<div class = "container">
    <div class = "logo"><img src = "images/logo.svg" class = "full-width"></div>
    <div class = "recomandations">
        @foreach($categories as $category)
            @foreach($category['drinks'] as $product)
                @if($product->recomanded ==1 && $product->restaurant == 1)
                    <div class = "index-title">{{__('site.recomandations')}}</div>
                    @break
                @endif
            @endforeach
            
        @endforeach
        <div class = "recomandations-swiper">
            <div class="swiper-container recomendations">
                <div class="swiper-wrapper">
                @foreach($categories as $category)
                    @foreach($category['drinks'] as $product)
                        @if($product->recomanded ==1 && $product->hide !=1 && $product->restaurant == 1)
                        <div class="swiper-slide">
                            <div class= "recomandations-item">
                                @if($product->image)
                                <a href="{{ thumb('width:1000', $product->image) }}" data-fancybox="images" class = "recomandations-image"><img src = "{{ thumb('width:700', $product->image) }}" class = "full-width-cover"></a>
                                @endif
                                <div class = "recomandations-description">
                                    <div class= "recomandations-description-title">{{$product->name}}</div>
                                    <div class = "recomandations-informations">
                                        <div class = "recomandations-informations-item-container left">
                                            <div class = "recomandations-informations-title">{{$product->price}}</div>
                                            <div class = "recomandations-informations-description">lei</div>
                                        </div>
                                        <div class = "recomandations-informations-item-container are-borders drinks-right">
                                            <div class = "recomandations-informations-title">{{$product->weight}}</div>
                                            <div class = "recomandations-informations-description">ml</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                  @endforeach

                </div>
              </div>
        </div>
    </div>

    @if(count($categories)>0)
    @foreach($categories as $category)
    <div class = "index-title">{{$category->name}}</div>
    <div class = "product-container">
    @foreach($category['drinks'] as $product)
        @if($product->hide !=1 && $product->restaurant == 1)
             <div class = "product-item">
        @if($product->image)
        <a href="{{ thumb('width:1000', $product->image) }}" data-fancybox="images" class = "product-item-image"><img src = "{{ thumb('width:700', $product->image) }}" class ="full-width-cover"></a>
        @endif
        <div class=  "product-item-description-container product-item-description-container-drinks">
            <div class=  "product-item-title product-item-ttle-drinks">{{$product->name}}</div>
            @if($product->ingredients)
                <div class=  "product-item-ingredients-title">{{__('site.description')}}:</div>
                <div class=  "product-item-ingredients product-item-ingredients-drinks">{{$product->ingredients}}</div>
            @endif
            <div class = "product-item-informations product-item-informations-drinks">
                <div class = "product-item-informations-pret-container">
                    <div class = "product-item-pret">{{$product->price}}</div>
                    <div class = "product-item-lei">lei</div>
                </div>
                <div class= "product-item-informations-right">
                    <div class = "product-item-informations-pret-container grams">
                        <div class = "product-item-pret">{{$product->weight}}</div>
                        <div class = "product-item-lei">ml</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endif
    @endforeach
</div>
@endforeach
@endif


</div>
@endsection