<script>
    const token = document.head.querySelector('meta[name="csrf-token"]').content;

    function vote() {
      return {
        formData: {
            slug: '',
            category: '',
            user_id: '',
            upvote: '',
            forum_post_id: '',
        },
        downFormData: {
            slug: '',
            category: '',
            user_id: '',
            upvote: '',
            forum_post_id: '',
        },

        data: '{{isset($post->likedByUser[0]) === true ? $post->countVotes($post->id) : 0}}',

		async submitVote($event) {
            $event.preventDefault()
            $event.stopPropagation()

			data = '{{isset($post->likedByUser[0]) === true ? $post->countVotes($post->id) : 0}}',

			res = await fetch('/discussions/upvote', {
				method: 'PUT',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },
                body: JSON.stringify(this.formData)
            })
            resData = await res.json()
            this.data = resData.votes;
        },
		async submitDownvote($event) {
            $event.preventDefault()
            $event.stopPropagation()

			this.data = '{{isset($post->likedByUser[0]) === true ? $post->countVotes($post->id) : 0}}',

			res = await fetch('/discussions/upvote', {
				method: 'PUT',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },
                body: JSON.stringify(this.downFormData)
            })
            resData = await res.json()
            this.data = resData.votes;
		}
      }
    }
</script>


@auth
<div class="flex flex-col justify-start items-end"
    x-data="{
        vote: vote(),
        upvoted: '{{isset($post->likedByUser[0]) === true ? $post->likedByUser[0]->upvote : false}}',
        downvoted: '{{isset($post->likedByUser[0]) === true ? !$post->likedByUser[0]->upvote : false}}',

    }">
    <form @submit="vote.submitVote($event)">
        <input type="hidden" x-init="vote.formData.slug = '{{$post->slug}}'"/>
        <input type="hidden" x-init="vote.formData.category = '{{$post->forumSection->slug}}'" />
        <input type="hidden" x-init="vote.formData.user_id = '{{Auth::user()->id}}'" />
        <input type="hidden" x-init="vote.formData.upvote = {{true}}" />
        <input type="hidden" x-init="vote.formData.forum_post_id = '{{$post->id}}'" />

        <button type="submit" :class="upvoted == 1 ? 'text-blue-900' : 'text-neutral-700'" class="rotate-90 font-bold text-lg hover-text" @click="[upvoted = 1, downvoted = 0]"> < </button>
    </form>

    <p class="font-semibold text-blue-900" x-text="vote.data">$post->countVotes($post->id)</p>

    <form id="downvote" @submit="vote.submitDownvote($event)">
        <input type="hidden" x-init="vote.downFormData.slug = '{{$post->slug}}'"/>
        <input type="hidden" x-init="vote.downFormData.category = '{{$post->forumSection->slug}}'" />
        <input type="hidden" x-init="vote.downFormData.user_id = '{{Auth::user()->id}}'" />
        <input type="hidden" x-init="vote.downFormData.upvote = 'testing'" />
        <input type="hidden" x-init="vote.downFormData.forum_post_id = '{{$post->id}}'" />
        <button type="submit" :class="downvoted == 1 ? 'text-blue-900' : 'text-neutral-700'" class="rotate-90 font-bold text-lg hover-text" @click="[upvoted = 0, downvoted = 1]"> > </button>
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
