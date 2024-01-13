const token = document.head.querySelector('meta[name="csrf-token"]').content;

export default function postNote() {
    return {
        formData: {
            title: '',
            body: '',
        },

        notes: '',
        errors: '',

        async submit($event) {
            $event.preventDefault()
            $event.stopPropagation()

            const res = await fetch('/journal/notes', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },

                body: JSON.stringify(this.formData)
            })

            const resData = await res.json()

            if(res.status === 422) {
                this.errors = await resData.errors
                JSON.parse(JSON.stringify(this.errors))
            }

            if(res.status === 200) {
                this.notes = resData.notes
                this.errors = ''
                this.formData.title = ''
                this.formData.body = ''
                JSON.parse(JSON.stringify(this.notes))
            }
        },
    }
}

