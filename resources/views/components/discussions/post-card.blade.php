<a href="/discussions/general/{{$post->slug}}">
    <div class="border-2 border-dashed border-neutral-700 hover-border mb-10
            px-2 pt-2 pb-1 cursor-pointer flex justify-between ">
        <div class="flex flex-col justify-between pb-1">

            <p class="font-semibold my-1">{{Str::upper($post->title)}}</p>

            <p class="mt-1 mb-4 text-sm mr-2">{{Str::limit($post->body, 100)}}</p>

            <p class="text-xs">
                <span class="text-blue-900 font-normal">{{$post->user->name}}</span>
                -
                <span>{{TimeAgo::getTime(strtotime($post->updated_at))}}</span>
                -
                <span>{{count($post->forumPostComments)}} comments</span>
            </p>

        </div>
        <div class="flex flex-col mr-4 justify-center">

            <button class="rotate-90 font-bold text-lg hover-text"> < </button>

                    <p class="font-semibold text-blue-900">{{$post->countVotes($post->id)}}</p>

            <button class="rotate-90 font-bold text-lg hover-text"> > </button>
        </div>
    </div>
</a>
