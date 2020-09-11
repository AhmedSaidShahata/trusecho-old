@extends('user.layouts.fixed_layout')
@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}



<div class="search-section">
    <h1 class="search-section__header">{{__('messages.services')}}</h1>
    <div class="search-section__info">
        <form action="{{ route('user.servicesearch')}}" class="landing-section__info-selections">



            <div class="selection-div u-margin-right-medium">
                <label for="speicialization" class="landing-section__info-selections-label">{{__('messages.types')}}</label>
                <div class="custom-select">
                    <select name="specialize_id" id="speicialization">
                        <option disabled selected value="">{{__('messages.types')}}</option>
                        @foreach($types as $type)
                        <option <?php if (isset($_GET['specialize_id']) and $type->id == $_GET['specialize_id']) echo 'selected' ?> value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="search-section__illustration-box">
                <img src="{{asset('img/jobs-illustration.svg')}}" alt="jobs" class="search-section__illustrations">
            </div>
    </div>
    <div class="landing-section__info-buttons-section ">
        <button class="landing-section__info-buttons" type="submit">
            <img src="{{asset('img/Search icon.svg')}}" alt="Search icon" class="search-icon">
            <p>{{__('messages.search')}}</p>
        </button>

        <a href="{{route('user.services.index')}}" class="landing-section__info-buttons">{{__('messages.reset')}}</a>
    </div>
    </form>
</div>


<div class="search-results">
    <a href="#apply-for-job" class="my-btn">
        <i class="fas fa-plus"></i>
        {{__('messages.add_service')}}
    </a>
    <div class="search-results__content-box">

        @forelse($services as $service)
        <div class="search-results__card">
            <div class="card-picture-box">
                <span class="opportunity-type-label">{{$service->type->name}}</span>
                <img src="{{asset('storage/'.$service->picture)}}" alt="Picutre 1" class="card-picture" />
            </div>
            <h1 class="search-results__card-header">{{$service->title}}</h1>
            <p class="search-results__card-paragraph">
                {{$service->description}}
            </p>
            <div class="search-results__card-rating-box">

                <div hidden> {{!$count_rate_of_ser=App\Rateser::where('ser_id', '=', $service->id)->get()->count()}}</div> @if($count_rate_of_ser==0) @for($i=1; $i<=5; $i++) <i data-value="{{$i}}" class="far fa-star fa-2x"></i>

                    @endfor

                    @else

                    {{!$sum_values_rate = App\Rateser::where('ser_id', '=', $service->id)->get()->avg('value_rate')}}

                    {{!$decimal_total_rate = substr($sum_values_rate, 0, 3)}}

                    {{!$integer_total_rate = substr($sum_values_rate, 0, 1)}}

                    <div hidden>
                        {{!$is_desimal = $decimal_total_rate - $integer_total_rate}}
                    </div>

                    @for ($i = 1; $i <= $integer_total_rate; $i++) <i data-value="{{$i}}" class="fas fa-star fa-2x"></i>

                        @endfor

                        @if ($is_desimal >= .3 && $is_desimal <= 8) <i data-value="{{$i}}" class="fas fa-star-half-alt fa-2x"></i>

                            @for ($i = $integer_total_rate + 2; $i <= 5; $i++) <i data-value="{{$i}}" class="far fa-star fa-2x"></i>
                                @endfor

                                @else

                                @for ($i = $integer_total_rate + 1; $i <= 5; $i++) <i data-value={{$i}} class="far fa-star fa-2x"></i>

                                    @endfor


                                    @endif




                                    @endif

                                    <span class="rating-number">{{$sum_values_rate ?? 0  }}</span>
                                    <a href="{{route('user.services.show',$service->id)}}" class="details-button">Details</a>
            </div>
        </div>
        @empty
        <div class="alert alert-primary d-flex align-items-center" role="alert" style="transform: scale(4);height:600px;justify-content: center;align-items: center;display: flex;">
            No Services Yet
        </div>

        @endforelse

    </div>
    {{$services->links()}}
</div>


<div class="popup" id="apply-for-job" style="overflow: auto;">
    <form action="{{route('user.services.store')}}" method="post" enctype="multipart/form-data">
        <div class="popup__content" style="padding-top: 160px;">
            <div class="popup__left">
                <h1 class="popup__header">{{__('messages.add_service')}}</h1>
                <div class="header__underline"></div>

                @csrf

                <input required type="hidden" name="lang" value="{{$lang}}">
                <input required type="hidden" name="status" value="0">
                <input required type="hidden" name="user_id" value="{{Auth::user()->id}}">

                <h3 class="add-cv__title" style="font-size: 20px; color:black">{{__('messages.picture')}}</h3>
                <input required type="file" name="picture" />

                <!-- <div class="add-cv">

                    <div class="add-cv__title-box">
                        <img src="{{asset('img/adding icon.svg')}}" alt="add icon" class="add-cv-icon" />

                    </div>
                </div> -->

                <div class="applying-for-job-illustration-box">
                    <img src="{{asset('img/applying-for-a-job.svg')}}" alt="apply for job" class="applying-for-job-illustration" />
                </div>
            </div>
            <div class="popup__right" style="position: relative;">
                <a href="#tours_section" class="popup__closing">×</a>

                <div class="input">
                    <label class="popup__label-style">{{__('messages.service_name')}}</label>
                    <input required type="text" name="title" class="popup__input-style" />
                </div>

                <div class="input">
                    <label for="fullname" class="popup__label-style">{{__('messages.service_type')}}</label>
                    <input required type="text" name="type" class="popup__input-style" />
                </div>



                <div class="input">
                    <label for="fullname" class="popup__label-style">{{__('messages.price')}}</label>
                    <input required type="number" name="price" class="popup__input-style" />
                </div>

                <div class="input">
                    <label for="fullname" class="popup__label-style">{{__('messages.deliver_time')}}</label>
                    <input required type="date" name="delivery_time" class="popup__input-style" />
                </div>

                <div class="input">
                    <label class="popup__label-style">{{__('messages.service_description')}}</label>
                    <input required type="text" name="description" class="popup__input-style" />
                </div>

                <div class="input">
                    <label class="popup__label-style">{{__('messages.instruction_buyer')}}</label>
                    <textarea name="content" rows="3" cols="60" class="input-message"></textarea>
                </div>

                <input required class="input-btn" type="submit" value="{{__('messages.submit')}}">

            </div>
        </div>
    </form>
</div>
@endsection
