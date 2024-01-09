@auth

<div class="flex flex-row justify-start items-center w-fit px-2"
    x-data="{
        postCommentVote: postCommentVote({{$comment->likedByUser}}, {{$comment->countVotes($comment->id)}}),
        upvoted: '{{isset($comment->likedByUser[0]) === true ? $comment->likedByUser[0]->upvote : false}}',
        downvoted: '{{isset($comment->likedByUser[0]) === true ? !$comment->likedByUser[0]->upvote : false}}',

    }">

    <form @submit="postCommentVote.up($event)">

        <input type="hidden" x-init="postCommentVote.upFormData.slug = '{{$comment->forumPost->slug}}'" />
        <input type="hidden" x-init="postCommentVote.upFormData.category = '{{$comment->forumPost->forumSection->slug}}'" />
        <input type="hidden" x-init="postCommentVote.upFormData.user_id = '{{Auth::user()->id}}'" />
        <input type="hidden" x-init="postCommentVote.upFormData.upvote = '{{true}}'"/>
        <input type="hidden" x-init="postCommentVote.upFormData.forum_post_comment_id = '{{$comment->id}}'" />
        <button type="submit"
            :class="upvoted == 1 ? 'text-blue-900' : 'text-neutral-700'"
            class="rotate-90 font-bold text-lg hover-text"
            @click="[upvoted = 1, downvoted = 0]"> < </button>
    </form>

    <p class="font-semibold text-blue-900 mx-2 text-xs" x-text="postCommentVote.data"></p>

    <form @submit="postCommentVote.down($event)">
        <input type="hidden" x-init="postCommentVote.downFormData.slug = '{{$comment->forumPost->slug}}'" />
        <input type="hidden" x-init="postCommentVote.downFormData.category = '{{$comment->forumPost->forumSection->slug}}'" />
        <input type="hidden" x-init="postCommentVote.downFormData.user_id = '{{Auth::user()->id}}'" />
        <input type="hidden" x-init="postCommentVote.downFormData.upvote = '{{false}}'"/>
        <input type="hidden" x-init="postCommentVote.downFormData.forum_post_comment_id = '{{$comment->id}}'" />
        <button type="submit"
            :class="downvoted == 1 ? 'text-blue-900' : 'text-neutral-700'"
            class="rotate-90 font-bold text-lg hover-text"
            @click="[upvoted = 0, downvoted = 1]"> > </button>
    </form>
</div>
@endauth

@guest
<div class="flex justify-start items-center">
    <a href="/login">
        <button type="submit" class="rotate-90 font-bold text-sm hover-text"> < </button>
    </a>

    <p class="font-semibold text-xs text-blue-900 mx-2">{{$comment->countVotes($comment->id)}}</p>

    <a href="/login">
        <button type="submit" class="rotate-90 font-bold text-sm hover-text"> > </button>
    </a>
</div>
@endguest


