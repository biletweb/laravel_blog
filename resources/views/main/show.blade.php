@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{ $date->translatedFormat('d F') }}, {{ $date->year }} • {{ $date->translatedFormat('H:i') }}</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
                <div class="row">
                    <div class="text-right">
                        @auth()
                            <form action="{{ route('main.like.store', $post->id) }}" method="post">
                                @csrf
                                <span>{{ $post->liked_users_count }}</span>
                                <button type="submit" class="border-0 bg-transparent">
                                    @if(auth()->user()->likedPosts->contains($post->id))
                                        <i class="fas fa-heart"></i>
                                    @else
                                        <i class="far fa-heart"></i>
                                    @endif
                                </button>
                            </form>
                        @endauth
                        @guest()
                            <div>
                                <span>{{ $post->liked_users_count }}</span>
                                <i class="far fa-heart"></i>
                            </div>
                        @endguest
                    </div>
                </div>
                @if($comments->count() > 0)
                <div class="row">
                    <div class="col-lg-9 mx-auto related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Комментарии ({{ $comments->count() }})</h2>
                        @foreach($comments as $comment)
                            <blockquote data-aos="fade-up">
                                <p>{{ $comment->comment }}</p>
                                <footer class="blockquote-footer">{{ $comment->user->name }} | {{ $comment->DateAsCarbon->diffForHumans() }}</footer>
                                @auth()
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#{{ $comment->id }}">
                                    Ответить
                                </button>
                                <!-- Modal -->
                                <form action="{{ route('main.answer.store', $post->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <div class="modal fade" id="{{ $comment->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="{{ $comment->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="{{ $comment->id }}">Ответ на комментарий</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <textarea name="answer_comment" class="form-control" placeholder="Введите ответ" rows="10"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-light">Ответить</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @endauth
                                @foreach ($comment->answers->sortByDesc('id') as $answer)
                                    <blockquote data-aos="fade-left" class="mt-5">
                                        <p>{{ $answer->answer_comment }}</p>
                                        <footer class="blockquote-footer">{{ $answer->user->name }} | {{ $answer->DateAsCarbon->diffForHumans() }}</footer>
                                    </blockquote>
                                @endforeach
                            </blockquote>
                        @endforeach
                    </div>
                </div>
                @endif
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($relatedPosts->count() > 0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{ asset('storage/' . $relatedPost->preview_image) }}" alt="related post" class="post-thumbnail">
                                <p class="post-category">{{ $relatedPost->category->title }}</p>
                                <a href="{{ route('main.post', $relatedPost->id) }}" style="text-decoration: none;"><h5 class="post-title">{{ $relatedPost->title }}</h5></a>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                    @auth()
                    <section class="comment-section related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Оставить комментарий</h2>
                        <form action="{{ route('main.comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="comment" id="comment" class="form-control" placeholder="Комментарий" rows="10">{{ old('comment') }}</textarea>
                                    @error('comment')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Добавить" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
