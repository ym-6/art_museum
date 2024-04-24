<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\SearchPost;
use App\User;
use App\Review;
use App\History;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
class PostCreatedListener
{
    protected $listen = [
        'App\Events\PostCreated' => [
            'App\Listeners\PostCreatedListener',
        ],
    ];

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $post = $event->post;

        // Userモデルからデータを取得
        $user = User::findOrFail($post->user_id);

        // Reviewモデルからデータを取得
        $review = Review::findOrFail($post->review_id);

        // Historyモデルからデータを取得
        $history = History::findOrFail($post->history_id);

        // SearchPostモデルにデータを挿入
        SearchPost::create([
            'review_id' => $review->id,
            'history_id' => $history->id,
            'user_id' => $user->id,
            'user_name' => $user->name,
            'posted_at' => $post->posted_at,
            'review_like_flg' => $review->like_count,
        ]);
    }
}
