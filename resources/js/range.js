export function reset(el1, el2, el3) {
    el1.checked = false
    el2.checked = false
    el3.checked = false
}

export function range() {
    return {
        minprice: 0,
        maxprice: 100,
        min: 0,
        max: 100,
        minthumb: 0,
        maxthumb: 0,

        reset() {
            this.minprice = 0
            this.maxprice = 100
            this.min = 0
            this.max = 100
            this.minthumb = 0
            this.maxthumb = 0
        },

        mintrigger() {
            this.minprice = Math.min(this.minprice, this.maxprice - 12);
            this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
        },

        maxtrigger() {
            this.maxprice = Math.max(this.maxprice , this.minprice + 12);
            this.maxthumb = 100 - ((this.maxprice - this.min) / (this.max - this.min)) * 100;
        },
    }
}

