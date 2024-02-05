const token = document.head.querySelector('meta[name="csrf-token"]').content;

export function getProductsByCategory() {
    return {

        async submit(id) {

            const res = await fetch('/market/category', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },

                body: JSON.stringify({ 'id': id })
            })

            const resData = await res.json()

            return resData
        },
    }
}

export function getProducts() {
    return {

        async submit() {

            const res = await fetch('/market', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },

                body: JSON.stringify({ 'id': 'all' })
            })

            const resData = await res.json()

            return resData
        },
    }
}

export function getByFilter() {
    return {
        formData: {
            in_stock: false,
            new: false,
            sale: false,
            category: '',
            minPrice: '',
            maxPrice: '',
            minRating: '',
            maxRating: '',
            search: ''
        },

        async submit() {

            const res = await fetch('/market/filter', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },

                body: JSON.stringify(this.formData)
            })

            const resData = await res.json()

            return resData
        },
    }
}
