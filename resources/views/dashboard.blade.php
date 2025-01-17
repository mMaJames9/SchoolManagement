<x-app-layout>
    <div class="container-fluid mt-4 padding-25 sm-padding-10">
        <div class="row">
            <div class="col-lg-6 col-xlg-5">
                <div class="row">
                    <div class="col-md-12 m-b-10">
                        <div class="ar-3-2 widget-1-wrapper">

                            <div class="widget-1 card no-border bg-complete no-margin widget-loader-circle-lg">
                                <div class="card-header  top-right ">
                                    <div class="card-controls">
                                        <ul>
                                            <li>
                                                <a data-toggle="refresh" class="card-refresh text-black" href="#">
                                                    <i class="card-icon card-icon-refresh-lg-master"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="pull-bottom bottom-left bottom-right ">
                                        <h2 class="text-white bold">Bienvenue, {{ Auth::user()->personnel->nom_personnel }}</h2>
                                        {{-- <div class="row stock-rates m-t-15">
                                            <div class="company col-4">
                                                <div>
                                                    <p class="font-montserrat text-success no-margin fs-16">
                                                        <i class="fa fa-caret-up"></i> +0.95%
                                                        <span class="font-arial text-white fs-12 hint-text m-l-5">546.45</span>
                                                    </p>
                                                    <p class="bold text-white no-margin fs-11 font-montserrat lh-normal">
                                                        AAPL
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="company col-4">
                                                <div>
                                                    <p class="font-montserrat text-danger no-margin fs-16">
                                                        <i class="fa fa-caret-up"></i> -0.34%
                                                        <span class="font-arial text-white fs-12 hint-text m-l-5">345.34</span>
                                                    </p>
                                                    <p class="bold text-white no-margin fs-11 font-montserrat lh-normal">
                                                        YAHW
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="company col-4">
                                                <div class="pull-right">
                                                    <p class="font-montserrat text-success no-margin fs-16">
                                                        <i class="fa fa-caret-up"></i> +0.95%
                                                        <span class="font-arial text-white fs-12 hint-text m-l-5">278.87</span>
                                                    </p>
                                                    <p class="bold text-white no-margin fs-11 font-montserrat lh-normal">
                                                        PAGES
                                                    </p>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 m-b-10">
                        <div class="ar-2-1">

                            <div class="widget-4 card no-border  no-margin widget-loader-bar">
                                <div class="container-sm-height full-height d-flex flex-column">
                                    {{-- <div class="card-header  ">
                                        <div class="card-title text-black hint-text">
                                            <span class="font-montserrat fs-11 all-caps">
                                                Product revenue
                                                <i class="fa fa-chevron-right"></i>
                                            </span>
                                        </div>
                                        <div class="card-controls">
                                            <ul>
                                                <li>
                                                    <a href="#" class="card-refresh text-black" data-toggle="refresh">
                                                        <i class="card-icon card-icon-refresh"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-l-20 p-r-20">
                                        <h5 class="no-margin p-b-5 pull-left hint-text">Pages</h5>
                                        <p class="pull-right no-margin bold hint-text">2,563</p>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="widget-4-chart line-chart mt-auto" data-line-color="success" data-area-color="success-light" data-y-grid="false" data-points="false" data-stroke-width="2">
                                        <svg></svg>
                                    </div> --}}
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 m-b-10">
                        <div class="ar-2-1">

                            <div class="widget-5 card no-border  widget-loader-bar">

                                <div class="card-header  pull-top top-right">
                                    <div class="card-controls">
                                        <ul>
                                            <li>
                                                <a data-toggle="refresh" class="card-refresh text-black" href="#">
                                                    <i class="card-icon card-icon-refresh"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="container-xs-height full-height">
                                    <div class="row row-xs-height">
                                        {{-- <div class="col-xs-5 col-xs-height col-middle relative">
                                            <div class="padding-15 top-left bottom-left">
                                                <h5 class="hint-text no-margin p-l-10">France, Florence</h5>
                                                <p class=" bold font-montserrat p-l-10">2,345,789
                                                    <br>USD
                                                </p>
                                                <p class=" hint-text visible-xlg p-l-10">Today's sales</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-7 col-xs-height col-bottom relative widget-5-chart-container">
                                            <div class="widget-5-chart"></div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xlg-4">
                <div class="row">
                    <div class="col-sm-6 m-b-10">
                        <div class="ar-1-1">

                            <div class="widget-2 card no-border bg-primary widget widget-loader-circle-lg no-margin">
                                <div class="card-header ">
                                    <div class="card-controls">
                                        <ul>
                                            <li>
                                                <a href="#" class="card-refresh" data-toggle="refresh">
                                                    <i class="card-icon card-icon-refresh-lg-white"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="pull-bottom bottom-left bottom-right padding-25">
                                        {{-- <span class="label font-montserrat fs-11">NEWS</span>
                                        <br>
                                        <h3 class="text-white">So much more to see at a glance.</h3>
                                        <p class="text-white hint-text d-none d-lg-block d-xl-block d-none d-lg-block d-xl-block">Learn More at Project Pages</p> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-6 m-b-10">
                        <div class="ar-1-1">

                            <div class="widget-3 card no-border bg-complete no-margin widget-loader-bar">
                                <div class="card-body no-padding full-height">
                                    <div class="metro live-tile" data-mode="carousel" data-start-now="true" data-delay="3000">
                                        <div class="slide-front tiles slide active">
                                            <div class="padding-30">
                                                <div class="pull-top">
                                                    <div class="pull-left visible-lg visible-xlg">
                                                        {{-- <i class="pg-map"></i> --}}
                                                    </div>
                                                    <div class="pull-right">
                                                        {{-- <ul class="list-inline ">
                                                            <li>
                                                                <a href="#" class="no-decoration">
                                                                    <i class="pg-comment"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="widget-3-fav no-decoration">
                                                                    <i class="pg-like"></i>
                                                                </a>
                                                            </li>
                                                        </ul> --}}
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="pull-bottom p-b-30">
                                                    {{-- <p class="p-t-10 fs-12 p-b-5 hint-text">21 Jan</p>
                                                    <h3 class="no-margin text-white p-b-10">Carefully
                                                        <br>designed for a
                                                        <br>great
                                                        <span class="semi-bold">experience</span>
                                                    </h3> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-back tiles">
                                            <div class="padding-30">
                                                <div class="pull-top">
                                                    <div class="pull-left visible-lg visible-xlg">
                                                        {{-- <i class="pg-map"></i> --}}
                                                    </div>
                                                    <div class="pull-right">
                                                        {{-- <ul class="list-inline ">
                                                            <li>
                                                                <a href="#" class="no-decoration">
                                                                    <i class="pg-comment"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="widget-3-fav no-decoration">
                                                                    <i class="pg-like"></i>
                                                                </a>
                                                            </li>
                                                        </ul> --}}
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="pull-bottom p-b-30">
                                                    {{-- <p class="p-t-10 fs-12 p-b-5 hint-text">21 Jan</p>
                                                    <h3 class="no-margin text-white p-b-10">A whole new
                                                        <br>
                                                        <span class="semi-bold">page</span>
                                                    </h3> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 m-b-10">
                        <div class="ar-1-1">

                            <div class="card no-border bg-master widget widget-6 widget-loader-circle-lg no-margin">
                                <div class="card-header ">
                                    <div class="card-controls">
                                        <ul>
                                            <li>
                                                <a data-toggle="refresh" class="card-refresh" href="#">
                                                    <i class="card-icon card-icon-refresh-lg-white"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="pull-bottom bottom-left bottom-right padding-25">
                                        {{-- <h1 class="text-white semi-bold">30&#176;</h1>
                                        <span class="label font-montserrat fs-11">TODAY</span>
                                        <p class="text-white m-t-20">Feels like rainy</p>
                                        <p class="text-white hint-text m-t-30">November 2014, 5 Thusday </p> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 m-b-10">
                        <div class="ar-1-1">

                            <div class="widget-7 card no-border bg-success no-margin">
                                <div class="card-body no-padding full-height">
                                    <div class="metro live-tile " data-delay="3500" data-mode="carousel">
                                        <div class="slide-front tiles slide active">
                                            <div class="padding-30">
                                                <div class="pull-bottom p-b-30 bottom-right bottom-left p-l-30 p-r-30">
                                                    {{-- <h5 class="no-margin semi-bold p-b-5">Apple Inc.</h5>
                                                    <p class="no-margin text-black hint-text">NASDAQ : AAPL - NOV 01 8:40 AM ET</p>
                                                    <h3 class="semi-bold text-white">
                                                        <i class="fa fa-sort-up small text-white"></i> 0.15 (0.13%)
                                                    </h3>
                                                    <p>
                                                        <span class="text-black">Open</span>
                                                        <span class="m-l-20 hint-text">117.52</span>
                                                    </p> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-back tiles">
                                            <div class="container-sm-height full-height">
                                                <div class="row-sm-height">
                                                    {{-- <div class="col-sm-height padding-25">
                                                        <p class="hint-text text-black">Pre-market: 116.850.50 (0.43%)
                                                        </p>
                                                        <p class="p-t-10 text-black">AAPL - Apple inc.</p>
                                                        <div class="p-t-10">
                                                            <p class="hint-text inline">+0.42%
                                                                <span class="m-l-20">217.51</span>
                                                            </p>
                                                            <div class="inline">
                                                                <i class="fa fa-sort-up small text-white fs-16 col-bottom"></i>
                                                            </div>
                                                        </div>
                                                        <p class="p-t-10 text-black">GOOG - Google inc.</p>
                                                        <div class="p-t-10">
                                                            <p class="hint-text inline">+0.22%
                                                                <span class="m-l-20">-2.28</span>
                                                            </p>
                                                            <div class="inline"><i class="fa fa-sort-down small text-white fs-16 col-top"></i>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <div class="row-sm-height">
                                                    <div class="col-sm-height relative">
                                                        <div class='widget-7-chart line-chart' data-line-color="white" data-points="true" data-point-color="white" data-stroke-width="3">
                                                            <svg></svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="visible-xlg col-xlg-3">
                <div class="ar-2-3">

                    <div class="widget-11 card no-border  no-margin widget-loader-bar">
                        <div class="card-header  ">
                            {{-- <div class="card-title">Today's Table</div> --}}
                            <div class="card-controls">
                                <ul>
                                    <li>
                                        <a data-toggle="refresh" class="card-refresh text-black" href="#">
                                            <i class="card-icon card-icon-refresh"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="p-l-25 p-r-25 p-b-20">
                            <div class="pull-left">
                                {{-- <h2 class="text-success no-margin">webarch</h2> --}}
                            </div>
                            <h3 class="pull-right semi-bold">
                                {{-- <sup>
                                    <small class="semi-bold">$</small>
                                </sup> 102,967 --}}
                            </h3>
                            <div class="clearfix"></div>
                        </div>

                        <div class="widget-11-table auto-overflow">
                            {{-- <table class="table table-condensed table-hover">
                                <tbody>
                                    <tr>
                                        <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                        <td class="text-right">
                                            <span class="hint-text small">dewdrops</span>
                                        </td>
                                        <td class="text-right b-r b-dashed b-grey">
                                            <span class="hint-text small">Qty 1</span>
                                        </td>
                                        <td>
                                            <span class="font-montserrat fs-18">$27</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                        <td class="text-right">
                                            <span class="hint-text small">johnsmith</span>
                                        </td>
                                        <td class="text-right b-r b-dashed b-grey">
                                            <span class="hint-text small">Qty 1</span>
                                        </td>
                                        <td>
                                            <span class="font-montserrat fs-18 text-primary">$1000</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                        <td class="text-right">
                                            <span class="hint-text small">janedrooler</span>
                                        </td>
                                        <td class="text-right b-r b-dashed b-grey">
                                            <span class="hint-text small">Qty 1</span>
                                        </td>
                                        <td>
                                            <span class="font-montserrat fs-18">$27</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                        <td class="text-right">
                                            <span class="hint-text small">johnsmith</span>
                                        </td>
                                        <td class="text-right b-r b-dashed b-grey">
                                            <span class="hint-text small">Qty 1</span>
                                        </td>
                                        <td>
                                            <span class="font-montserrat fs-18 text-primary">$1000</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                        <td class="text-right">
                                            <span class="hint-text small">dewdrops</span>
                                        </td>
                                        <td class="text-right b-r b-dashed b-grey">
                                            <span class="hint-text small">Qty 1</span>
                                        </td>
                                        <td>
                                            <span class="font-montserrat fs-18">$27</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                        <td class="text-right">
                                            <span class="hint-text small">johnsmith</span>
                                        </td>
                                        <td class="text-right b-r b-dashed b-grey">
                                            <span class="hint-text small">Qty 1</span>
                                        </td>
                                        <td>
                                            <span class="font-montserrat fs-18 text-primary">$1000</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                        <td class="text-right">
                                            <span class="hint-text small">dewdrops</span>
                                        </td>
                                        <td class="text-right b-r b-dashed b-grey">
                                            <span class="hint-text small">Qty 1</span>
                                        </td>
                                        <td>
                                            <span class="font-montserrat fs-18">$27</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                        <td class="text-right">
                                            <span class="hint-text small">johnsmith</span>
                                        </td>
                                        <td class="text-right b-r b-dashed b-grey">
                                            <span class="hint-text small">Qty 1</span>
                                        </td>
                                        <td>
                                            <span class="font-montserrat fs-18 text-primary">$1000</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                        <td class="text-right">
                                            <span class="hint-text small">dewdrops</span>
                                        </td>
                                        <td class="text-right b-r b-dashed b-grey">
                                            <span class="hint-text small">Qty 1</span>
                                        </td>
                                        <td>
                                            <span class="font-montserrat fs-18">$27</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                        <td class="text-right">
                                            <span class="hint-text small">johnsmith</span>
                                        </td>
                                        <td class="text-right b-r b-dashed b-grey">
                                            <span class="hint-text small">Qty 1</span>
                                        </td>
                                        <td>
                                            <span class="font-montserrat fs-18 text-primary">$1000</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> --}}
                        </div>

                        <div class="padding-25">
                            <p class="small no-margin">
                                {{-- <a href="#">
                                    <i class="fa fs-16 fa-arrow-circle-o-down text-success m-r-10"></i>
                                </a>
                                <span class="hint-text ">Show more details of APPLE . INC</span> --}}
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>
