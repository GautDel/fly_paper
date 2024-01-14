const token = document.head.querySelector('meta[name="csrf-token"]').content;

async function getNotes() {
    const res = await fetch('/journal/notes', {
        method: 'GET',
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": token
        },
    })

    const data = await res.json()
    return data
}

export function postNote() {
    return {
        formData: {
            title: '',
            body: '',
        },

        notes: [],
        errors: '',

        async submit() {

            const res = await fetch('/journal/notes', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },

                body: JSON.stringify(this.formData)
            })
            const resData = await res.json()

            if (res.status === 422) {
                this.errors = await resData.errors
                JSON.parse(JSON.stringify(this.errors))
            }

            if (res.status === 200) {

                const newNotes = await getNotes();

                this.notes = newNotes.notes
                this.errors = ''
                this.formData.title = ''
                this.formData.body = ''

                JSON.parse(JSON.stringify(this.notes))
            }
        },
    }
}

export function deleteNote() {
    return {
        formData: {
            id: ''
        },

        message: '',

        async submit() {
            const res = await fetch('/journal/notes', {
                method: 'DELETE',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },

                body: JSON.stringify(this.formData)
            });

            const resData = await res.json()

            if (resData.status === 200) {
                this.message = resData.message
            }
        }
    }
}

