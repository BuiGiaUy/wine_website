@if ($comments->isNotEmpty())
    <div class="uk-comment-list">
        @foreach ($comments as $reply)
            <div class="uk-comment uk-comment-primary">
                <div class="uk-comment-header uk-flex uk-flex-between uk-flex-middle">
                    <div class="uk-flex uk-flex-middle">
                        <img src="{{ $reply->user->avatar ?? 'https://static.vecteezy.com/system/resources/previews/011/483/813/original/guy-anime-avatar-free-vector.jpg' }}"
                             alt="{{ $reply->user->name }}'s avatar"
                             class="uk-border-circle"
                             width="40" height="40">
                        <div class="uk-margin-left">
                            <h5 class="uk-comment-title uk-margin-remove">
                                <a href="/@{{ $reply->user->username }}">{{ $reply->user->name }}</a>
                            </h5>
                            <p class="uk-text-meta uk-margin-remove">
                                @php
                                    $now = \Carbon\Carbon::now();
                                    $createdAt = \Carbon\Carbon::parse($reply->created_at);
                                    $diffInMinutes = $now->diffInMinutes($createdAt);
                                    $diffInHours = $now->diffInHours($createdAt);
                                @endphp

                                @if ($diffInHours > 0)
                                    {{ $diffInHours }} hours ago
                                @elseif ($diffInMinutes > 0)
                                    {{ $diffInMinutes }} minutes ago
                                @else
                                    Just now
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="uk-comment-body">
                    <p>{{ $reply->content }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endif

