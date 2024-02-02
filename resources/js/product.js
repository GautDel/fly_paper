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

                body: JSON.stringify({'id': id})
            })

            const resData = await res.json()

            return resData.products
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

            })

            const resData = await res.json()

            return resData.products
        },
    }
}

export function countProducts() {
    return {

        async submit(categoryId) {
            const res = await fetch('/market/count', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },

                body: JSON.stringify({'id': categoryId})
            })
            const resData = await res.json()

            return resData.totals
        }
    }
}

export function getByAvailability() {
    return {
        formData: {
            in_stock: false,
            new: false,
            sale: false,
            category: ''
        },
        async submit() {

            const res = await fetch('/market/availability', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },

                body: JSON.stringify(this.formData)
            })

            const resData = await res.json()

            return resData.products
        },
    }
}

export function getProductsByPrice() {
    return {
        async submit(minPrice, maxPrice, category) {

            const res = await fetch('/market/price', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },

                body: JSON.stringify({
                    'minPrice': minPrice,
                    'maxPrice': maxPrice,
                    'category': category,
                })
            })

            const resData = await res.json()

            return resData.products
        }
    }
}

export function getProductsBySearch() {

    return {
        formData: {
            search: '',
            category: ''
        },

        async submit() {

            const res = await fetch('/market/search', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },

                body: JSON.stringify(this.formData)
            })

            const resData = await res.json()

            return resData.products
        }
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

