<?php

namespace App\View\Components\Discussions;

use App\Models\ForumPostVote;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Http\Request;


class PostVote extends Component
{
    public $post;

    public function __construct($post)
    {

        $this->post = $post;
    }

    public function render(): View|Closure|string
    {
        return view('components.discussions.post-vote', ['post' => $this->post]);
    }

    public static function upvotePost(Request $request) {


        $vote = ForumPostVote::updateOrInsert([
            'forum_post_id' => $request->forum_post_id,
            'user_id' => $request->user_id
        ],
        [
            'upvote' => filter_var($request->upvote, FILTER_VALIDATE_BOOLEAN),
            'forum_post_id' => $request->forum_post_id,
            'user_id' => $request->user_id
        ]);

        dd($vote);

        return redirect("/discussions/$request->category/$request->slug");
    }

}
