const token = document.head.querySelector('meta[name="csrf-token"]').content;

export function getProductsByCategory() {
    return {

        products: '',

        async submit(id) {

            const res = await fetch('/market/category', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },

                body: JSON.stringify({'id': id})
            })

            const resData = await res.json()

            return resData.products
        },
    }
}

export function deleteLog() {
    return {
        formData: {
            id: ''
        },

        message: '',

        async submit() {
            const res = await fetch('/journal/logs', {
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

