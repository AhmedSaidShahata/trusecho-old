@extends('user.layouts.fixed_layout')
@section('content')
<div class="search-section">
    <h1 class="search-section__header">{{__('messages.organizations')}}</h1>
    <!-- <div class="search-section__info">
            <form action="#" class="landing-section__info-selections">
                <div class="selection-div u-margin-right-medium">
                  <label for="cars" class="landing-section__info-selections-label"
                    >Cost</label
                  >
                  <div class="custom-select">
                    <select name="cost" id="cost">
                      <option value="Fully Funded">Fully Funded</option>
                      <option value="Partialy Funded">Partialy Funded</option>
                    </select>
                  </div>
                </div>
                <div class="selection-div u-margin-right-medium">
                  <label for="type" class="landing-section__info-selections-label"
                    >Type</label
                  >
                  <div class="custom-select">
                    <select name="type" id="type" class="select-for-label">
                      <option value="Fully Funded">Fully Funded</option>
                      <option value="Partialy Funded">Partialy Funded</option>
                    </select>
                  </div>
                </div>
                <div class="selection-div u-margin-right-medium">
                  <label
                    for="speicialization"
                    class="landing-section__info-selections-label"
                    >speicialization</label
                  >
                  <div class="custom-select">
                    <select name="speicialization" id="speicialization">
                      <option value="Fully Funded">Fully Funded</option>
                      <option value="Partialy Funded">Partialy Funded</option>
                    </select>
                  </div>
                </div>
                <div class="selection-div">
                  <label for="language" class="landing-section__info-selections-label"
                    >Langauge</label
                  >
                  <div class="custom-select">
                    <select name="language" id="language">
                      <option value="Fully Funded">Fully Funded</option>
                      <option value="Partialy Funded">Partialy Funded</option>
                    </select>
                  </div>
                </div>
            </form>
            <div class="search-section__illustration-box">
                <img src="img/org-illustration.svg" alt="organization" class="search-section__illustrations">
            </div>
        </div>
        <div class="landing-section__info-buttons-section">
            <button class="landing-section__info-buttons">
                <img src="img/Search icon.svg" alt="Search icon" class="search-icon">
                <p>search</p>
            </button>
            <button class="landing-section__info-buttons">RESET</button>
        </div> -->
</div>
<div class="search-results">
    <div class="search-results__content-box">
        @forelse($organizations as $organization)
        {{!$follower = App\Followersorg::where('user_id', '=', Auth::user()->id)->where('org_id', '=', $organization->id)->get()}};
        {{!$followerCount = App\Followersorg::where('org_id', '=', $organization->id)->get()->count()}};
        <div class="organizations-card u-margin-top-small">
            <div class="colored-container"></div>
            <div class="logo-box" style="overflow: hidden;">
                <img src="{{asset('storage/'.$organization->picture_org) }}" alt="Logo" class="best-jobs-section__logo">
            </div>
            <h1 class="best-organizations-section-signed__sub-header"> <a href="{{route('user.organizations.show',$organization->id)}}">{{$organization->name}}</a></h1>

            @auth <p class="best-organizations-section-signed__followers"><span class="follow-count" style="color: green;">{{$followerCount}}</span> {{__('messages.followers')}}</p>
            <a data-orgid="{{$organization->id}}" type="button" class="best-organizations-section-signed__btn-follow add-follower" style="cursor:pointer">@if($follower->count()>0) {{__('messages.following')}} @else {{__('messages.follow')}} @endif</a>
            @endauth
        </div>


        @empty
        <div class="alert alert-primary d-flex align-items-center" role="alert" style="transform: scale(4);height:600px;justify-content: center;align-items: center;display: flex;">
            {{__('messages.no_org')}}
        </div>

        @endforelse


    </div>
    {{$organizations->links()}}





    <div class="popup" id="apply-for-job">
        <form action="{{route('user.jobs.store')}}" method="post" enctype="multipart/form-data">
            <div class="popup__content">
                <div class="popup__left">
                    <h1 class="popup__header">{{__('messages.apply_job')}}</h1>
                    <div class="header__underline"></div>

                    @csrf

                    <input type="hidden" name="lang" value="{{$lang}}">

                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <!-- class="add-cv-input" -->
                    <h3 class="add-cv__title" style="font-size: 20px; color:black">{{__('messages.picture')}}</h3>
                    <input type="file" id="" name="picture" />
                    <!-- <div class="add-cv">

                    <div class="add-cv__title-box">
                        <img src="{{asset('img/adding icon.svg')}}" alt="add icon" class="add-cv-icon" />

                    </div>
                </div> -->

                    <div class="applying-for-job-illustration-box">
                        <img src="{{asset('img/applying-for-a-job.svg')}}" alt="apply for job" class="applying-for-job-illustration" />
                    </div>
                </div>
                <div class="popup__right">
                    <a href="#tours_section" class="popup__closing">×</a>

                    <div class="input">
                        <label for="fullname" class="popup__label-style">{{__('messages.job_name')}}</label>
                        <input type="text" id="title" name="title" class="popup__input-style" placeholder="{{__('messages.full_name')}}..." />
                    </div>
                    <div class="input">
                        <label for="email" class="popup__label-style">{{__('messages.the_company')}}</label>
                        <input type="text" id="company" name="company" class="popup__input-style" placeholder="{{__('messages.email')}}..." />
                    </div>

                    <div class="input">
                        <label for="message" class="popup__label-style">{{__('messages.short_desc')}}</label>
                        <textarea id="message" name="description" rows="3" cols="60" class="input-message" placeholder="{{__('messages.message')}}...."></textarea>
                    </div>
                    <div class="input">
                        <label for="email" class="popup__label-style">{{__('messages.deadline')}}</label>
                        <input type="date" id="email" name="deadline" class="popup__input-style" placeholder="{{__('messages.email')}}..." />
                    </div>
                    <div class="input">
                        <label for="email" class="popup__label-style">{{__('messages.the_contact')}}</label>
                        <input type="email" id="email" name="email" class="popup__input-style" placeholder="{{__('messages.email')}}..." />
                    </div>


                    <input class="input-btn" type="submit" value="{{__('messages.submit')}}">

                </div>
            </div>
        </form>
    </div>
</div>
@endsection
