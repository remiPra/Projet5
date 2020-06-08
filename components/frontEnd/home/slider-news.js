Vue.component('slider-news', {
    data() {
        return {
            liveSlide: 0,
            marginLeft: "",
            slides: [
                {
                    title: "Promotion de 50%",
                    paragraphe: "du lundi 30 Janvier au samedi 27 Janvier , nous vous proposons un grand stock de cerises a 50%"
                },
                { title: "title2", paragraphe: "title2" },
                { title: "title3", paragraphe: "title2" },
                { title: "title4", paragraphe: "title2" },
            ]
        }
    },
    template: `<div data-aos="zoom-in" class="col-sm-6" id="sliderNews">
        <div class="carroussel">
            <div class="carrousselcontainer" :style="{marginLeft : marginLeft}">
                <div class="slideNews" v-for="slide in slides">
                    <h3>{{slide.title}}</h3>
                    <p>{{slide.paragraphe}}</p>

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
            if (this.liveSlide === 3) {
                this.liveSlide = 0
            } else { this.liveSlide++; }
            console.log(this.liveSlide);

            this.marginLeft = - this.liveSlide * 300 + "px";
        },
        previous() {
            if (this.liveSlide === 0) {
                this.liveSlide = this.slides.length - 1
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

