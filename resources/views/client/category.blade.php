@extends('client.master')


@section('title')
    Danh mục {{$cate->ten_danh_muc}}
@endsection


@section('content')
    @include('client.components.heroSection')

    @include('client.components.BreadcrumbSection')

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                @foreach ($listCate as $item)
                                    <li><a
                                            href="{{ route('client_category', ['id' => $item->id]) }}">{{ $item->ten_danh_muc }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    @foreach ($latestProducts as $item)
                                        <div class="latest-prdouct__slider__item">
                                            <a href="{{ route('pro_detail', ['id' => $item[0]['id']]) }}"
                                                class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ Storage::url($item[0]['hinh_anh']) }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $item[0]['ten_san_pham'] }}</h6>
                                                    <span>{{ number_format($item[0]['gia'], 0, ',', '.') }} VND</span>
                                                </div>
                                            </a>
                                            <a href="{{ route('pro_detail', ['id' => $item[1]['id']]) }}"
                                                class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ Storage::url($item[1]['hinh_anh']) }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $item[1]['ten_san_pham'] }}</h6>
                                                    <span>{{ number_format($item[1]['gia'], 0, ',', '.') }} VND</span>
                                                </div>
                                            </a>
                                            <a href="{{ route('pro_detail', ['id' => $item[2]['id']]) }}"
                                                class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ Storage::url($item[2]['hinh_anh']) }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $item[2]['ten_san_pham'] }}</h6>
                                                    <span>{{ number_format($item[2]['gia'], 0, ',', '.') }} VND</span>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">

                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    {{-- <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select> --}}
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    {{-- <h6><span>16</span> Products found</h6> --}}
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    {{-- <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($listPro as $item)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg"
                                        data-setbg="{{ Storage::url($item->hinh_anh) }}">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="{{ route('pro_detail', ['id' => $item->id]) }}"><i
                                                        class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#">{{ $item->ten_san_pham }}</a></a></h6>
                                        <h5>{{ number_format($item->gia, 0, ',', '.') }} VND</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="product__pagination">
                        {{-- <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a> --}}
                        {{ $listPro->links('client.components.pageLink') }}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection
