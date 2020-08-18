@extends('user.layouts.fixed_layout')
@section('content')
<div class="best-scolarships-section-signed">
    <h1 class="best-scolarships-section-signed__header">Best scholarships</h1>
    <div class="best-scolarships-section-signed__cards-info">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="best-scolarships-section-signed__card swiper-slide">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">Fully funded</span>
                        <img src="img/card-picutre-1.png" alt="Picutre 1" class="card-picture">
                    </div>
                    <h1 class="best-scolarships-section-signed__card-header">Study business at Yale</h1>
                    <p class="best-scolarships-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                    <div class="best-scolarships-section-signed__card-deadline-box">
                        <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-scolarships-section-signed__card-deadline">
                        <div class="deadline-number">
                            <h2 class="deadline-header">Hours:Days:Months</h2>
                            <h3 class="deadline-value">23:23:23</h3>
                        </div>
                        <a href="#" class="details-button">Details</a href="#">
                    </div>
                </div>
                <div class="best-scolarships-section-signed__card swiper-slide">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">Fully funded</span>
                        <img src="img/card-picutre-1.png" alt="Picutre 1" class="card-picture">
                    </div>
                    <h1 class="best-scolarships-section-signed__card-header">Study business at Yale</h1>
                    <p class="best-scolarships-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                    <div class="best-scolarships-section-signed__card-deadline-box">
                        <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-scolarships-section-signed__card-deadline">
                        <div class="deadline-number">
                            <h2 class="deadline-header">Hours:Days:Months</h2>
                            <h3 class="deadline-value">23:23:23</h3>
                        </div>
                        <a href="#" class="details-button">Details</a href="#">
                    </div>
                </div>
                <div class="best-scolarships-section-signed__card swiper-slide">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">Fully funded</span>
                        <img src="img/card-picutre-1.png" alt="Picutre 1" class="card-picture">
                    </div>
                    <h1 class="best-scolarships-section-signed__card-header">Study business at Yale</h1>
                    <p class="best-scolarships-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                    <div class="best-scolarships-section-signed__card-deadline-box">
                        <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-scolarships-section-signed__card-deadline">
                        <div class="deadline-number">
                            <h2 class="deadline-header">Hours:Days:Months</h2>
                            <h3 class="deadline-value">23:23:23</h3>
                        </div>
                        <a href="#" class="details-button">Details</a href="#">
                    </div>
                </div>
                <div class="best-scolarships-section-signed__card swiper-slide">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">Fully funded</span>
                        <img src="img/card-picutre-1.png" alt="Picutre 1" class="card-picture">
                    </div>
                    <h1 class="best-scolarships-section-signed__card-header">Study business at Yale</h1>
                    <p class="best-scolarships-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                    <div class="best-scolarships-section-signed__card-deadline-box">
                        <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-scolarships-section-signed__card-deadline">
                        <div class="deadline-number">
                            <h2 class="deadline-header">Hours:Days:Months</h2>
                            <h3 class="deadline-value">23:23:23</h3>
                        </div>
                        <a href="#" class="details-button">Details</a href="#">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="opportunities-signed.html" class="btn-view-more">View More</a>
</div>
<div class="best-jobs-section-signed">
    <h1 class="best-jobs-section-signed__header">Best Jobs</h1>
    <div class="best-jobs-section-signed__cards-info">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                @forelse($jobs as $job)
                <div class="best-jobs-section-signed__card swiper-slide" style="overflow: hidden;">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">
                            {{!$cost = app\Cost::find($job->cost_id)}}
                            {{$cost->name}}
                        </span>
                        <img src="/storage/{{$job->picture}}" alt="Picutre 1" class="card-picture" style="height: 162px;">
                    </div>
                    <h1 class="best-jobs-section-signed__card-header">{{$job->title}}</h1>
                    <p class="best-jobs-section-signed__card-paragraph">{{$job->description}}</p>
                    <div class="best-jobs-section-signed__card-deadline-box">
                        <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-jobs-section-signed__card-deadline">
                        <div class="deadline-number">
                            <h2 class="deadline-header">Hours:Days:Months</h2>
                            <h3 class="deadline-value">23:23:23</h3>
                        </div>
                        <a href="{{route('user.jobs.show',$job->id)}}" class="details-button">Details</a href="#">
                    </div>
                </div>
                @empty

                @endforelse


            </div>
        </div>
    </div>
    <a href="jobs-signed.html" class="btn-view-more">View More</a>
</div>
<div class="best-services-section-signed">
    <h1 class="best-services-section-signed__header">Best Services</h1>
    <div class="best-services-section-signed__cards-info">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="best-services-section-signed__card swiper-slide">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">Fully funded</span>
                        <img src="img/card-picutre-1.png" alt="Picutre 1" class="card-picture">
                    </div>
                    <h1 class="best-services-section-signed__card-header">Study business at Yale</h1>
                    <p class="best-services-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                    <div class="best-services-section-signed__card-rating-box">
                        <img src="img/star-rating.svg" alt="Rating" class="best-services-section-signed__card-rating">
                        <span class="rating-number">5</span>
                        <a href="#" class="details-button">Details</a href="#">
                    </div>
                </div>
                <div class="best-services-section-signed__card swiper-slide">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">Fully funded</span>
                        <img src="img/card-picutre-1.png" alt="Picutre 1" class="card-picture">
                    </div>
                    <h1 class="best-services-section-signed__card-header">Study business at Yale</h1>
                    <p class="best-services-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                    <div class="best-services-section-signed__card-rating-box">
                        <img src="img/star-rating.svg" alt="Rating" class="best-services-section-signed__card-rating">
                        <span class="rating-number">5</span>
                        <a href="#" class="details-button">Details</a href="#">
                    </div>
                </div>
                <div class="best-services-section-signed__card swiper-slide">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">Fully funded</span>
                        <img src="img/card-picutre-1.png" alt="Picutre 1" class="card-picture">
                    </div>
                    <h1 class="best-services-section-signed__card-header">Study business at Yale</h1>
                    <p class="best-services-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                    <div class="best-services-section-signed__card-rating-box">
                        <img src="img/star-rating.svg" alt="Rating" class="best-services-section-signed__card-rating">
                        <span class="rating-number">5</span>
                        <a href="#" class="details-button">Details</a href="#">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="services-signed.html" class="btn-view-more">View More</a>
</div>
<div class="best-organizations-section-signed">
    <h1 class="best-organizations-section-signed__header">Best Organization</h1>
    <div class="best-organizations-section-signed__cards-info">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="best-organizations-section-signed__card swiper-slide">
                    <div class="colored-container"></div>
                    <div class="logo-box">
                        <img src="img/Cargomatic_(Company)_Logo.png" alt="Logo" class="best-jobs-section__logo">
                    </div>
                    <h1 class="best-organizations-section-signed__sub-header"> Cargomatic</h1>
                    <p class="best-organizations-section-signed__followers"> 6,494,456 followers</p>
                    <a href="#" class="best-organizations-section-signed__btn-follow">Follow</a>
                </div>
                <div class="best-organizations-section-signed__card swiper-slide">
                    <div class="colored-container"></div>
                    <div class="logo-box">
                        <img src="img/Cargomatic_(Company)_Logo.png" alt="Logo" class="best-jobs-section__logo">
                    </div>
                    <h1 class="best-organizations-section-signed__sub-header"> Cargomatic</h1>
                    <p class="best-organizations-section-signed__followers"> 6,494,456 followers</p>
                    <a href="#" class="best-organizations-section-signed__btn-follow">Follow</a>
                </div>
                <div class="best-organizations-section-signed__card swiper-slide">
                    <div class="colored-container"></div>
                    <div class="logo-box">
                        <img src="img/Cargomatic_(Company)_Logo.png" alt="Logo" class="best-jobs-section__logo">
                    </div>
                    <h1 class="best-organizations-section-signed__sub-header"> Cargomatic</h1>
                    <p class="best-organizations-section-signed__followers"> 6,494,456 followers</p>
                    <a href="#" class="best-organizations-section-signed__btn-follow">Follow</a>
                </div>
                <div class="best-organizations-section-signed__card swiper-slide">
                    <div class="colored-container"></div>
                    <div class="logo-box">
                        <img src="img/Cargomatic_(Company)_Logo.png" alt="Logo" class="best-jobs-section__logo">
                    </div>
                    <h1 class="best-organizations-section-signed__sub-header"> Cargomatic</h1>
                    <p class="best-organizations-section-signed__followers"> 6,494,456 followers</p>
                    <a href="#" class="best-organizations-section-signed__btn-follow">Follow</a>
                </div>
            </div>
        </div>
    </div>
    <a href="organizations-signed.html" class="btn-view-more">View More</a>
</div>
<div class="blog-section">
    <h1 class="blog-section__header">Blogs</h1>
    <div class="blog-section__cards-info">
        <div class="blog-section__card">
            <div class="blog-section__pic-box">
                <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
            </div>
            <div class="blog-card-content">
                <h1 class="blog-card-content__header">Events and conferences</h1>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Comments:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Participants:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
            </div>
            <a href="#" class="blog-section__btn">visit</a>
        </div>
        <div class="blog-section__card">
            <div class="blog-section__pic-box">
                <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
            </div>
            <div class="blog-card-content">
                <h1 class="blog-card-content__header">Events and conferences</h1>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Comments:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Participants:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
            </div>
            <a href="#" class="blog-section__btn">visit</a>
        </div>
        <div class="blog-section__card">
            <div class="blog-section__pic-box">
                <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
            </div>
            <div class="blog-card-content">
                <h1 class="blog-card-content__header">Events and conferences</h1>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Comments:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Participants:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
            </div>
            <a href="#" class="blog-section__btn">visit</a>
        </div>
        <div class="blog-section__card">
            <div class="blog-section__pic-box">
                <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
            </div>
            <div class="blog-card-content">
                <h1 class="blog-card-content__header">Events and conferences</h1>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Comments:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Participants:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
            </div>
            <a href="#" class="blog-section__btn">visit</a>
        </div>
        <div class="blog-section__card">
            <div class="blog-section__pic-box">
                <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
            </div>
            <div class="blog-card-content">
                <h1 class="blog-card-content__header">Events and conferences</h1>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Comments:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Participants:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
            </div>
            <a href="#" class="blog-section__btn">visit</a>
        </div>
        <div class="blog-section__card">
            <div class="blog-section__pic-box">
                <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
            </div>
            <div class="blog-card-content">
                <h1 class="blog-card-content__header">Events and conferences</h1>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Comments:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Participants:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
            </div>
            <a href="#" class="blog-section__btn">visit</a>
        </div>
        <div class="blog-section__card">
            <div class="blog-section__pic-box">
                <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
            </div>
            <div class="blog-card-content">
                <h1 class="blog-card-content__header">Events and conferences</h1>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Comments:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Participants:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
            </div>
            <a href="#" class="blog-section__btn">visit</a>
        </div>
        <div class="blog-section__card">
            <div class="blog-section__pic-box">
                <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
            </div>
            <div class="blog-card-content">
                <h1 class="blog-card-content__header">Events and conferences</h1>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Comments:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Participants:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
            </div>
            <a href="#" class="blog-section__btn">visit</a>
        </div>
        <div class="blog-section__card">
            <div class="blog-section__pic-box">
                <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
            </div>
            <div class="blog-card-content">
                <h1 class="blog-card-content__header">Events and conferences</h1>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Comments:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Participants:</p>
                    <p class="blog-card-content__subtitle-value">539</p>
                </div>
            </div>
            <a href="#" class="blog-section__btn">visit</a>
        </div>
    </div>
    <a href="blogs.html" class="btn-view-more">View More</a>
</div>
@endsection
