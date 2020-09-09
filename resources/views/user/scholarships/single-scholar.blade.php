@extends('user.layouts.fixed_layout')
@section('content')
{{!$lang='_'.LaravelLocalization::getCurrentLocale()}}
<div class="blog-summary">
    <div class="blog-summary__info" style="width: auto;">
        <div class="blog-summary__details">
            <h1 class="blog-summary__details-header">{{$scholarship->title }}</h1>
            <p class="blog-summary__details-brief">
                {{$scholarship->description }}
            </p>
            <p class="blog-summary__details-quick-summary">
                {{$scholarship->content }}
            </p>
            <div class="blog-summary__details-comments">
                <h1 class="comments">{{__('messages.comments')}}:</h1>
                <p class="comments__values">0</p>
            </div>
            <div class="blog-summary__details-views">
                <h1 class="views">{{__('messages.views')}}:</h1>
                <p class="views__values">{{$views_count}}</p>
            </div>

            <div class="blog-summary__details-views">
                <h1 class="views">{{__('messages.location')}}:</h1>
                <p class="views__values">
                    {{ $scholarship->location }}
                </p>
            </div>

            <div class="blog-summary__details-views">
                <h1 class="views">{{__('messages.email')}}:</h1>
                <p class="views__values">{{ $scholarship->email}} </p>
            </div>


            <div class="blog-summary__details-views">
                <h1 class="views">{{__('messages.deadline')}}:</h1>
                <p class="views__values"> {{ $scholarship->deadline}}</p>
            </div>
            <ul class="right-panel__job-requirements-list">
                <?php $requirments_exp = explode("-", $scholarship->requirements) ?>
                @foreach($requirments_exp as $requirment)
                <li class="right-panel__job-requirements-item">
                    {{$requirment}}
                </li>
                @endforeach

            </ul>


            <div class="blog-summary__details-rate">
                <h1 class="rate">{{__('messages.rate')}}:</h1>
                <div class="rate-total-scholar">
                    <div hidden>{{!$count_rate_of_scholar=App\Scholarshiprate::where('scholarship_id', '=', $scholarship->id)->get()->count()}} </div>

                    @if($count_rate_of_scholar ==0)

                    @for($i=1; $i<=5; $i++) <i data-value="{{$i}}" class="far fa-star fa-2x"></i>

                        @endfor

                        @else

                        {{!$sum_values_rate = App\Scholarshiprate::where('scholarship_id', '=', $scholarship->id)->get()->avg('value_rate')}}

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

                                        <div class="rate_div"> total rated is <span class="rate_numbers"> {{ $decimal_total_rate }}</span> from <span class="rate_numbers"> {{$count_rate_of_scholar }}</span> Users </div>


                                        @endif
                </div>

            </div>
        </div>
    </div>

    <div class="blog-summary__picutre-box">
        <div class="blog-summary__favourite">
        {{!$favourite = App\Favscholar::where('user_id', '=', Auth::user()->id)->where('scholarship_id', '=', $scholarship->id)->get()}};
            <div class="blog-summary__favourite-icon-box">

            <i data-scholarid="{{$scholarship->id}}" class="fas fa-heart fa-2x  add-fav-scholar {{$favourite->count()>0?'red':''}}"></i>
            </div>
            <h1 class="blog-summary__favourite-word">{{__('messages.add_fav')}}</h1>
        </div>
        <img src="{{asset('storage/'.$scholarship->picture)}}" alt="single post pic" class="blog-summary__picture" style="width:582px;height:490px;border-radius:20px;margin:0 10px;" />
    </div>
</div>
</div>
<div class="blog-details">
    <div class="blog-details__content-box" style="padding: 10px;">
        <h1 class="blog-details__header">{{__('messages.description')}}</h1>
        <p class="blog-details__paragraph">
            {{$scholarship->content }}
        </p>
        <div class="blog-details__buttons">
        {{!$like = App\Likescholar::where('user_id', '=', Auth::user()->id)->where('scholarship_id', '=', $scholarship->id)->get()}};
            <button class=" like_scholar {{$like->count()>0?'blue':''}}" data-scholarid="{{$scholarship->id}}">
            <span class="like-title  ">
                {{__('messages.like')}} <i class="fas fa-thumbs-up"></i>
                </span>

            </button>
            <button class="blog-details__buttons-share" style="margin: 0  10px;">
                <img src="img/share-icon.svg" alt="share icon" class="share-button" />
                <span class="share-title">{{__('messages.share')}}</span>
            </button>
        </div>
        <!-- <div class="blog-details__social-media">
                <div class="social-media">
                    <div class="social-media__logo-box">
                        <img src="img/facebook.png" alt="facebook" class="social-media__logo" />
                    </div>
                    <span class="social-media__number">+1,001,564</span>
                </div>
                <div class="social-media">
                    <div class="social-media__logo-box">
                        <img src="img/instagram.png" alt="instagram" class="social-media__logo" />
                    </div>
                    <span class="social-media__number">+1,001,564</span>
                </div>
                <div class="social-media">
                    <div class="social-media__logo-box">
                        <img src="img/telegram.png" alt="telegram" class="social-media__logo" />
                    </div>
                    <span class="social-media__number">+1,001,564</span>
                </div>
                <div class="social-media">
                    <div class="social-media__logo-box">
                        <img src="img/twitter.png" alt="twitter" class="social-media__logo" />
                    </div>
                    <span class="social-media__number">+1,001,564</span>
                </div>
                <div class="social-media">
                    <div class="social-media__logo-box">
                        <img src="img/linkedin.png" alt="linkedin" class="social-media__logo" />
                    </div>
                    <span class="social-media__number">+1,001,564</span>
                </div>
                <div class="social-media">
                    <div class="social-media__logo-box">
                        <img src="img/Truescho logo-edit.png" alt="truescho" class="social-media__logo" />
                    </div>
                    <span class="social-media__number">+1,001,564</span>
                </div>
            </div> -->
        <div class="blog-details__rating">
            <h1 class="blog-details__rating-header">{{__('messages.rate_scholar')}}</h1>
            <div class="blog-details__rating-stars-box">
                <div class="rating">
                    <div class="rate_user-scholar" scholar_id="{{$scholarship->id}}">
                        @auth

                        {{!$rate_user=App\Scholarshiprate::where('user_id', '=',Auth::user()->id)->where('scholarship_id', '=', $scholarship->id)->get()}}

                        @if($rate_user->count() ==0)

                        @for($i=1; $i<=5; $i++) <i data-value="{{$i}}" class="far fa-star rate-blog fa-2x"></i>
                            @endfor

                            @else

                            @foreach($rate_user as $r)
                            {{!$rate_val=$r->value_rate}}
                            @endforeach

                            @for ($i = 1; $i <= $rate_val; $i++) <i data-value="{{$i}}" class="fas fa-star rate-blog fa-2x"></i>

                                @endfor

                                @for ($i = $rate_val+1; $i <=5; $i++) <i data-value="{{$i}}" class="far fa-star rate-blog fa-2x"></i>

                                    @endfor

                                    @endif
                                    @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="comments-section">
    <div class="comments-section__content-box" style="padding: 20px;">
        <div class="comments-section__header">
            <span class="comments-section__word">{{__('messages.comments')}}</span>
            <hr class="horizontal-line" />
        </div>
        <div class="comments-section__send-box">
            <textarea name="comment" id="blog-comment" cols="30" rows="7" class="comments-section__content comment-scholar"></textarea>
            <a type="button" class="comments-section__send-icon add-comment-scholar">
                <img src="{{asset('img/Send blue icon.png')}}" alt="send " class="send-icon" />
            </a>
        </div>
        <div class="comments-section__reviews-scholar">
            @auth
            <span hidden class="commentor-id">{{ Auth::user()->id }}</span>
            <span hidden class="commentor-name">{{ Auth::user()->name }}</span>
            <span hidden class="commentor-image">{{Auth::user()->profile->picture}}</span>
            <span hidden class="scholar-id">{{$scholarship->id}}</span>
            @endauth
            <div class="user-comment">
                <div class="user-pic-box">
                    <img src="{{asset('img/user-comment-pic.png')}}" alt="user pic" class="user-pic" />
                </div>
                <div class="user-details">
                    <h1 class="user-name">Taylor Adams</h1>
                    <p class="user-comment-paragraph">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste
                        in beatae praesentium dolores porro, nobis labore ut omnis, nam
                        temporibus neque inventore culpa dolore reiciendis molestias
                        optio libero? Velit debitis eligendi necessitatibus enim ratione
                        cupiditate, veritatis facere? Sapiente iure quos tempora quasi
                        quo fugit suscipit consequuntur qui neque dolorem voluptate
                        temporibus, fugiat provident corporis delectus. Explicabo magnam
                        culpa amet modi facere exercitationem deleniti fugit ab minima
                        reiciendis numquam rerum officiis, nemo dolorem natus ipsa!
                        Repudiandae, veniam? Eligendi molestias debitis culpa iure
                        harum, esse id qui fuga reiciendis nobis dolorem repellat
                        perspiciatis neque amet vero itaque odit ipsum dolores eveniet
                        accusamus.
                    </p>
                </div>
            </div>
            <hr>
            @foreach($comment_scholarships as $comment_scholarship)
            <div class="user-comment">
                <div class="user-pic-box">
                    <img src="{{asset('storage/'.$comment_scholarship->user->profile->picture)}}" alt="user pic" class="user-job-pic" style="width: 60px; height:60px" />
                </div>
                <div class="user-details">
                    <h1 class="user-name">{{$comment_scholarship->user->name }}</h1>
                    <p class="user-comment-paragraph">
                        {{$comment_scholarship->body}}
                    </p>
                </div>
            </div>
            <hr>
            @endforeach

            <hr />
        </div>
        <h1 class="related-topics__header">Related Topics</h1>
        <div class="related-topics__cards">
            <div class="blogs-detailed-results__card responsive">
                <div class="blogs-detailed-results__pic-box">
                    <img src="img/education.svg" alt="blogs pic" class="blogs-detailed-results__pic responsive-pic" />
                </div>
                <div class="blogs-card-content">
                    <h1 class="blogs-card-content__header">Events and conferences</h1>
                    <div class="blogs-card-content-info">
                        <p class="blogs-card-content__subtitle">Comments:</p>
                        <p class="blogs-card-content__subtitle-value">539</p>
                    </div>
                    <div class="blogs-card-content-info">
                        <p class="blogs-card-content__subtitle">Participants:</p>
                        <p class="blogs-card-content__subtitle-value">539</p>
                    </div>
                </div>
                <a href="#" class="blogs-detailed-results__btn">view</a>
            </div>
            <div class="blogs-detailed-results__card responsive">
                <div class="blogs-detailed-results__pic-box">
                    <img src="img/education.svg" alt="blogs pic" class="blogs-detailed-results__pic responsive-pic" />
                </div>
                <div class="blogs-card-content">
                    <h1 class="blogs-card-content__header">Events and conferences</h1>
                    <div class="blogs-card-content-info">
                        <p class="blogs-card-content__subtitle">Comments:</p>
                        <p class="blogs-card-content__subtitle-value">539</p>
                    </div>
                    <div class="blogs-card-content-info">
                        <p class="blogs-card-content__subtitle">Participants:</p>
                        <p class="blogs-card-content__subtitle-value">539</p>
                    </div>
                </div>
                <a href="#" class="blogs-detailed-results__btn">view</a>
            </div>
            <div class="blogs-detailed-results__card responsive">
                <div class="blogs-detailed-results__pic-box">
                    <img src="img/education.svg" alt="blogs pic" class="blogs-detailed-results__pic responsive-pic" />
                </div>
                <div class="blogs-card-content">
                    <h1 class="blogs-card-content__header">Events and conferences</h1>
                    <div class="blogs-card-content-info">
                        <p class="blogs-card-content__subtitle">Comments:</p>
                        <p class="blogs-card-content__subtitle-value">539</p>
                    </div>
                    <div class="blogs-card-content-info">
                        <p class="blogs-card-content__subtitle">Participants:</p>
                        <p class="blogs-card-content__subtitle-value">539</p>
                    </div>
                </div>
                <a href="#" class="blogs-detailed-results__btn">view</a>
            </div>
        </div>
    </div>
</div>

@endsection
