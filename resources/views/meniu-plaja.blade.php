@extends('parts.template') @section('content')
<div class = "container">
    <div class = "logo"><img src = "images/logo.svg" class = "full-width"></div>
    <div class = "recomandations">
        <div class = "index-title">{{__('site.recomandations')}}</div>
        <div class = "recomandations-swiper">
            <div class="swiper-container recomendations">
                <div class="swiper-wrapper">
                @foreach($categories as $category)
                    @foreach($category['products'] as $product)
                        @if($product->recomanded ==1 && $product->hide!=1 && $product->beach == 1)
                        <div class="swiper-slide">
                            <div class= "recomandations-item">
                                <a href="{{ thumb('width:1000', $product->image) }}" data-fancybox="images" class = "recomandations-image"><img src = "{{ thumb('width:700', $product->image) }}" loading = "lazy" class = "full-width-cover"></a>
                                <div class = "recomandations-description">
                                    <div class= "recomandations-description-title">{{$product->name}}
                                     
                                    </div>
                                    <div class = "recomandations-informations">
                                        <div class = "recomandations-informations-item-container left">
                                            <div class = "recomandations-informations-title">{{$product->price}}</div>
                                            <div class = "recomandations-informations-description">lei</div>
                                        </div>
                                        <div class = "recomandations-informations-item-container are-borders">
                                            <div class = "recomandations-informations-title">{{$product->weight}}</div>
                                            <div class = "recomandations-informations-description">{{__('site.grams')}}</div>
                                        </div>
                                        @if($product->allergens_text)
                                            <a data-fancybox data-modal="true" data-src="#popup_{{$product->id}}" href="javascript:;" class = "recomandations-informations-item-container right">
                                                <div class = "recomandations-informations-image"><img src = "images/allergens.svg" class = "full-width"></div>
                                                <div class = "recomandations-informations-description">{{__('site.allergens')}}</div>
                                            </a>
                                        @endif
                                        @if($product->hot && $product->hot==1)
                                            <div class = "recomandations-informations-item-container right">
                                                <div class = "recomandations-informations-image"><img src = "images/chili.svg" class = "full-width"></div>
                                                <div class = "recomandations-informations-description">{{__('site.spicy')}}</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                  @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    @if(count($categories)>0)
        @foreach($categories as $category)
            <div class = "index-title">{{$category->name}}</div>
            <div class = "product-container">
                @foreach($category['products'] as $product)
        @if($product->hide !=1 && $product->beach ==1)
            <div class = "product-item">
        <a href="{{ thumb('width:1000', $product->image) }}" data-fancybox="images"  class = "product-item-image"><img src = "{{ thumb('width:700', $product->image) }}" loading = "lazy" class ="full-width-cover"></a>
        <div class=  "product-item-description-container">
            <div class=  "product-item-title">@if(strlen($product->name)>=80) {{substr($product->name,0,80)}}..  @else {{$product->name}} @endif</div>
            <div class=  "product-item-ingredients-title">{{__('site.ingredients')}}:</div>
            <div class=  "product-item-ingredients">@if(strlen($product->ingredients)>=142){{substr($product->ingredients,0,142)}}...@else {{$product->ingredients}} @endif</div>
            <div class = "product-item-informations">
                <div class = "product-item-informations-pret-container">
                    <div class = "product-item-pret">{{$product->price}}</div>
                    <div class = "product-item-lei">lei</div>
                </div>
                <div class= "product-item-informations-right">
                    <div class = "product-item-informations-pret-container grams">
                        <div class = "product-item-pret">{{$product->weight}}</div>
                        <div class = "product-item-lei">{{__('site.grams')}}</div>
                    </div>
                    @if($product->allergens_text)
                        <a data-fancybox data-modal="true" data-src="#popup_{{$product->id}}" href="javascript:;" class = "allergens-container">
                            <div class = "allergens-image"><img src = "images/allergens.svg" class = "full-width"></div>
                            <div class = "allergens-text">{{__('site.allergens')}}</div>
                        </a>
                    @endif
                    @if($product->hot && $product->hot==1)
                    <div class = "allergens-container">
                        <div class = "allergens-image"><img src = "images/chili.svg" class = "full-width"></div>
                        <div class = "allergens-text">{{__('site.spicy')}}</div>
                    </div>
                    @endif
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
@if(count($categories)>0)
    @foreach($categories as $category)
        @foreach($category['products'] as $product)
        @if($product->allergens_text && $product->hide!=1 && $product->beach == 1)
            <div class = "pop-up-da" id = "popup_{{$product->id}}">
                <button class = "close-fancy" data-fancybox-close><img src = "images/cancel.svg" loading = "lazy" class = "full-width"></button>
                <div class = "pop-up-image"><img src = "{{ thumb('width:700', $product->image) }}" class = "full-width-cover"></div>
                <div class = "pop-up-text-contaienr">
                    <div class = "pop-up-title">{{__('site.allergens')}}</div>
                    <div class = "pop-up-text">{{$product->allergens_text}}</div>
                </div>
            </div>
        @endif
        @endforeach
    @endforeach
@endif

@endsection