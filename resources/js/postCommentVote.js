const token = document.head.querySelector('meta[name="csrf-token"]').content;

export default function postCommentVote(comment, count) {
    return {
        upFormData: {
            slug: '',
            category: '',
            user_id: '',
            upvote: '',
            forum_post_comment_id: '',
        },
        downFormData: {
            slug: '',
            category: '',
            user_id: '',
            upvote: '',
            forum_post_comment_id: '',
        },

        data: comment !== undefined ? count : '0',

        async up($event) {
            $event.preventDefault()
            $event.stopPropagation()

            this.data =  comment !== undefined ? count : '0'

            const res = await fetch('/discussions/postcomment/upvote', {
                method: 'PUT',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },
                body: JSON.stringify(this.upFormData)
            })

            const resData = await res.json()
            this.data = resData.votes;
        },
        async down($event) {
            $event.preventDefault()
            $event.stopPropagation()

            this.data =  comment !== undefined ? count : '0'

            const res = await fetch('/discussions/postcomment/upvote', {
                method: 'PUT',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },
                body: JSON.stringify(this.downFormData)
            })

            const resData = await res.json()
            this.data = resData.votes;
        }
    }
}
