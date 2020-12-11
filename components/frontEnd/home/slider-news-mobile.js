Vue.component('slider-new-mobile', {
    props:['newsprops'],
    data() {
        return {
            liveSlide: 0,
            marginLeft: ""
        }
    },
    template: `
    <div class="col-md-6" id="sliderNewsMobile">
        <div class="carroussel">
            <div class="carrousselcontainer" :style="{marginLeft : marginLeft}">
                <div class="slideNews" v-for="slide in newsprops.news">
                    <h3 class="maxWidth200">{{slide.title}}</h3>
                    <p class="maxWidth200">{{slide.description}}</p>
                </div>
            </div>
        </div>
        <div class="buttoncontainer">
            <button v-on:click="previous()"><i class="fas fa-chevron-circle-left"></i>News</button>
            <button v-on:click="next()"><i class="fas fa-chevron-circle-right"></i>News</button>
        </div>
    </div>`,
    methods: {
        next() {
            if (this.liveSlide === this.newsprops.count[0][0] - 1) {
                this.liveSlide = 0
            } else { this.liveSlide++; }
            console.log(this.liveSlide);
            console.log(this.newsprops.count[0])

            this.marginLeft = - this.liveSlide * 300 + "px";
        },
        previous() {
            if (this.liveSlide === 0) {
                this.liveSlide = this.newsprops.count[0][0] - 1
            } else { this.liveSlide--; }
            console.log(this.liveSlide);

            this.marginLeft = - this.liveSlide * 300 + "px";
        }
    },
    computed: {
        slideLength: function () {
            return this.slides.length
        }
    },

})