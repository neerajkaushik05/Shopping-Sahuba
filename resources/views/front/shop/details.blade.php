@extends('layouts.app-front')

@section('title')
{{$shop->name}}
@endsection


@section('css')
<link href="{{url('css/company-profile.css')}}" rel="stylesheet">
@if(1==2)
<script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "LocalBusiness",
      "image": [
        "https://example.com/photos/1x1/photo.jpg",
        "https://example.com/photos/4x3/photo.jpg",
        "https://example.com/photos/16x9/photo.jpg"
       ],
      "@id": "http://davessteakhouse.example.com",
      "name": "Dave's Steak House",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "148 W 51st St",
        "addressLocality": "New York",
        "addressRegion": "NY",
        "postalCode": "10019",
        "addressCountry": "US"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 40.761293,
        "longitude": -73.982294
      },
      "url": "http://www.example.com/restaurant-locations/manhattan",
      "telephone": "+12122459600",
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            "Monday",
            "Tuesday"
          ],
          "opens": "11:30",
          "closes": "22:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            "Wednesday",
            "Thursday",
            "Friday"
          ],
          "opens": "11:30",
          "closes": "23:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": "Saturday",
          "opens": "16:00",
          "closes": "23:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": "Sunday",
          "opens": "16:00",
          "closes": "22:00"
        }
      ]
    }
</script>
@endif
@endsection



@section('content')
<div id="jobs">
    <div class="container mt-2">
        @include('front.shop.company-profile-cover')
        <div class="row mt-1 mb-4">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <strong class="section_title">Info</strong>
                        <p class="section_info">
                            <p class="section_info">
                                {{optional($shop->profile)->info ?? '' }}
                            </p>
                        </p>
                    </div>
                    <div class="col-md-12 mt-1">
                        <strong class="section_title">Listed Product </strong>
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($shop->products as $product)
                                <a href="{{url($product->product_link())}}">
                                    <div class="media mt-2 border p-3 text-muted">
                                        <div class="col-md-3 j-p-i" style="background: url('{{url(optional($product->medias->first())->link() ?? '')}}')"></div>
                                        <div class="media-body pl-md-4 pl-2">
                                            <h2 class="mt-0"><strong style="color: #2964a0;">{{$product->name}}</strong></h2>
                                            <h6><i class="far fa-money-bill-alt pr-2 text-muted"></i> Rs. {{$product->price->min}}</h6>
                                            <h6><i class="fas fa-map-marker-alt pl-1 pr-2 text-muted"></i>  Kathmandu </h6>
                                            {{-- <h6><i class="fas fa-clock pl-1 pr-2 text-muted"></i>    7 Days Left </h6> --}}
                                            {{-- <h6 class="float-right"><span class="badge badge-primary pl-2 pr-2">php</span> <span class="badge badge-danger pl-2 pr-2">java</span>&nbsp;<span class="badge badge-success pl-2 pr-2">Laravel</span></h6> --}}
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item bg-secondary font-weight-bold text-white text-center">Shop Overview</li>
                    <li class="list-group-item">
                        <div class="pl-3 d-flex justify-content-start">
                            <div><i class="far fa-clock"></i></div>
                            <div class="pl-3">
                                Opening H. :{{optional($shop->profile)->opening_hours ?? 'Not Available'}}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="pl-3 d-flex justify-content-start">
                            <div><i class="far fa-bookmark"></i></div>
                            <div class="pl-3">
                                Address : {{optional($shop->profile)->address ?? 'Not Available'}}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="pl-3 d-flex justify-content-start">
                            <div><i class="fas fa-chalkboard-teacher"></i></div>
                            <div class="pl-3">
                                Established at: {{optional($shop->profile)->established_at ? '20'.optional($shop->profile)->established_at->format('y-m-d'):'Not Available'}}
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="list-group mt-2">
                    <li class="list-group-item bg-secondary font-weight-bold text-white text-center">Advertisement</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection