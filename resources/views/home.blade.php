@extends('layouts.app')

@section('title')
    @if (Request::is('/')) Home @else {{ $userName }} @endif |
    GitHubGist
@endsection

@section('content')
    <div class="container list">
        <div class="row">
            <div class="col-md-12">
                <div class="py-4">
                    <i class="fa fa-code"></i> <b>Discover Gists</b>
                </div>
            </div>
            <hr />
        </div>
        @if (count($responseBody) > 0)
            @foreach ($responseBody as $response)
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex">
                            <img class="user-image mr-2" src="{{ $response->owner->avatar_url }}"
                                alt="{{ $response->owner->login }}" />
                            <p class="name mb-0">
                                <a href="{{ $response->owner->html_url }}"> {{ $response->owner->login }}</a>
                                <br />
                                <small>Created {{ \Carbon\Carbon::parse($response->created_at)->diffForHumans() }}</small>
                                <br />
                                <small>{{ $response->description }}</small>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <ul class="name">
                            <a class="comment mx-1" href="{{ $response->comments_url }}">
                                <i class="fa fa-comment-o mr-1"></i>
                                {{ $response->comments }} Comments
                            </a>
                            <span id="{{ $response->id }}">
                                Favourite
                            </span>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a class="code-link" href="{{ $response->html_url }}">
                            @foreach ($response->files as $file)
                                <p class="mb-0 mt-2">{{ $file->filename }}</p>
                                <pre>
                                    <code>
                                        {!! Illuminate\Mail\Markdown::parse(file_get_contents($file->raw_url)) !!}
                                    </code>
                                </pre>
                            @endforeach
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="row">
                <div class="col-md-12">
                    <h5><b>You don’t have any gists yet.</b></h5>
                    <p>Your public gists will show up here on your profile. <a href="https://gist.github.com/"
                            target="_blank">Create a gist</a> to get started.</p>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('script')
    <script>
        // Get local storage items
        var favourites = JSON.parse(localStorage.getItem(
            '<?php echo Auth::id() . '_' . Auth::user()->login; ?>_Favourites')) || [];
        favourites.forEach(function(favourite) {
            if (document.getElementById(favourite)) {
                document.getElementById(favourite).className = 'fav';
            }
        });

        // Store or Remove items to local storage
        document.querySelector('.list').addEventListener('click', function(e) {
            var id = e.target.id,
                item = e.target,
                index = favourites.indexOf(id);
            if (!id) return;
            if (index == -1) {
                favourites.push(id);
                item.className = 'fav';
            } else {
                favourites.splice(index, 1);
                item.className = '';
            }
            localStorage.setItem('<?php echo Auth::id() . '_' . Auth::user()->login; ?>_Favourites', JSON.stringify(
                favourites));
        });
    </script>
@endsection
