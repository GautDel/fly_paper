const token = document.head.querySelector('meta[name="csrf-token"]').content;

export function postLog() {
    const imageInput = document.querySelector('#imageInput');

    return {
        inputData: {
            fish: '',
            weight: '',
            mass_unit: 'kg',
            length: '',
            length_unit: 'cm',
            rod: '',
            rod_weight: '2',
            rod_length: "7'",
            reel: '',
            reel_weight: '1 - 3',
            line: '',
            line_type: 'Floating',
            line_weight: '00',
            tippet: '',
            tippet_weight: '0x',
            fly: '',
            fly_category: 'Dry Flies',
            hook_size: '1',
            location: '',
            weather: 'Sunny',
            day_time: 'Early Morning',
            precise_time: '',
            water_clarity: '',
            water_movement: '',
            visibility: 'false',
            note: '',
        },

        errors: '',

        async submit() {
            // Necessary for multipart data with PHP. Breaks if removed
            const formData = new FormData();

            for (const name in this.inputData) {
                formData.append(name, this.inputData[name]);
            }

            formData.append('image', imageInput.files[0])

            const res = await fetch('/journal/logs', {
                method: 'POST',
                headers: {
                    "X-CSRF-TOKEN": token
                },

                body: formData
            })

            const resData = await res.json()

            if (res.status === 422) {
                this.errors = await resData.errors
                JSON.parse(JSON.stringify(this.errors))
            }

            if (res.status === 200) {
                window.location.href = '/journal/' + resData.redirect;
            }
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

