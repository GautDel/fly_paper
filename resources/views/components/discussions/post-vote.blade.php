@auth
<div class="flex flex-col justify-start items-end"
    x-data="{
        postVote: postVote({{json_encode($post->likedByUser)}}, {{$post->countVotes($post->id)}}),
        upvoted: '{{isset($post->likedByUser[0]) === true ? $post->likedByUser[0]->upvote : false}}',
        downvoted: '{{isset($post->likedByUser[0]) === true ? !$post->likedByUser[0]->upvote : false}}',

    }">
    <form @submit="postVote.up($event)">
        <input type="hidden" x-init="postVote.upFormData.slug = '{{$post->slug}}'"/>
        <input type="hidden" x-init="postVote.upFormData.category = '{{$post->forumSection->slug}}'" />
        <input type="hidden" x-init="postVote.upFormData.user_id = '{{Auth::user()->id}}'" />
        <input type="hidden" x-init="postVote.upFormData.upvote = '{{true}}'" />
        <input type="hidden" x-init="postVote.upFormData.forum_post_id = '{{$post->id}}'" />

        <button type="submit"
            :class="upvoted == 1 ? 'text-blue-900' : 'text-neutral-700'"
            class="rotate-90 font-bold text-lg hover-text"
            @click="[upvoted = 1, downvoted = 0]"> < </button>
    </form>

    <p class="font-semibold text-blue-900" x-text="postVote.data"></p>


    <form @submit="postVote.down($event)">
        <input type="hidden" x-init="postVote.downFormData.slug = '{{$post->slug}}'"/>
        <input type="hidden" x-init="postVote.downFormData.category = '{{$post->forumSection->slug}}'" />
        <input type="hidden" x-init="postVote.downFormData.user_id = '{{Auth::user()->id}}'" />
        <input type="hidden" x-init="postVote.downFormData.upvote = '{{false}}'" />
        <input type="hidden" x-init="postVote.downFormData.forum_post_id = '{{$post->id}}'" />
        <button type="submit"
            :class="downvoted == 1 ? 'text-blue-900' : 'text-neutral-700'"
            class="rotate-90 font-bold text-lg hover-text"
            @click="[upvoted = 0, downvoted = 1]"> > </button>
    </form>
</div>
@endauth

@guest
    <div class="flex flex-col justify-start">
        <a href="/login">
            <button type="submit" class="rotate-90 font-bold text-lg hover-text"> < </button>
        </a>

        <p class="font-semibold text-blue-900">{{$post->countVotes($post->id)}}</p>

        <a href="/login">
            <button type="submit" class="rotate-90 font-bold text-lg hover-text"> > </button>
        </a>
    </div>
@endguest
