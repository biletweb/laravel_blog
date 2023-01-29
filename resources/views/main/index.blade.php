@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            @if(isset($postCategory))
                <h1 class="edica-page-title" data-aos="fade-up">{{ $postCategory->title }}</h1>
            @else
                <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
            @endif
            @if($posts->count() > 0)
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up" style="margin-bottom: 30px">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset('storage/' . $post->preview_image) }}" alt="blog post">
                            </div>
                            <p class="blog-post-category">{{ $post->category->title }}</p>
                            <a href="{{ route('main.post', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="pagination justify-content-center mb-3">
                        {{ $posts->links() }}
                    </div>
                </div>
            </section>
            @else
                <div class="alert alert-info text-center" role="alert" style="margin-bottom: 90px">
                    Uuups, здесь ничего нет!
                </div>
            @endif
            <div class="row">
                <hr class="mb-5">
                <div class="col-md-8">
                    @if($postsRandom->count() > 0)
                    <section>
                        <h5 class="widget-title" data-aos="fade-up">Случайные</h5>
                        <div class="row blog-post-row">
                            @foreach($postsRandom as $post)
                                <div class="col-md-6 blog-post" data-aos="fade-up" style="margin-bottom: 30px">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{ asset('storage/' . $post->preview_image) }}" alt="blog post">
                                    </div>
                                    <p class="blog-post-category">{{ $post->category->title }}</p>
                                    <a href="{{ route('main.post', $post->id) }}" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{ $post->title }}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    @else
                        <div class="alert alert-info text-center" role="alert" style="margin-bottom: 90px">
                            Uuups, здесь ничего нет!
                        </div>
                    @endif
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    @if($likedPosts->count() > 0)
                    <div class="widget widget-post-list">
                        <h5 class="widget-title" style="margin-bottom: 1px">Популярные</h5>
                        <ul class="post-list">
                            @foreach($likedPosts as $post)
                                <li class="post">
                                    <a href="{{ route('main.post', $post->id) }}" class="post-permalink media">
                                        <img src="{{ asset('storage/' . $post->preview_image) }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{ $post->title }}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @else
                        <div class="alert alert-info text-center" role="alert" style="margin-bottom: 90px">
                            Uuups, здесь ничего нет!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
