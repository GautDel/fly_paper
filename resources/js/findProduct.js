const token = document.head.querySelector('meta[name="csrf-token"]').content;

export function generateSku(input) {
    console.log(input)
}

export function findProduct() {

    return {
        inputData: {
            sku: 'sku',
        },

        errors: '',

        async submit() {
            const res = await fetch('/market/checkAvailability', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },

                body: JSON.stringify(this.inputData)
            })

            const resData = await res.json()

            console.log(resData);

            if (res.status === 422) {
                this.errors = await resData.errors
                JSON.parse(JSON.stringify(this.errors))
            }

        },
    }
}
