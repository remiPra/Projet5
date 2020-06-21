
Vue.component('main-container', {
    props: ['namesession'],
    data() {
        return {
            data: "fade-down",
            header: {
                h1Welcome: "Bienvenue",
                h1Sentence: "chez ma ferme Bio",
                h2: "Votre magasin de fruits et legumes avec la possibilité de commander en ligne",

            },
        }
    },
    methods: {
        scrolling(element) {
            const id = element;
            const yOffset = -100;
            const elements = document.getElementById(id);
            const y = elements.getBoundingClientRect().top + window.pageYOffset + yOffset;

            window.scrollTo({ top: y, behavior: 'smooth' });
        },
        scrollingY(data) {
            window.scrollTo({ top: 2000, behavior: 'smooth' })
        }

    },
    //function a tester

    template: `
            <div :data-aos="data" class="col-sm-6 container text-center" id="presentationShop">
                <div class="container px-md-3 shopTitle">
                    
                    <h1 class="text-light">{{header.h1Welcome}}
                    <span id='nameSessionStyle'>{{namesession}}</span>
                    {{header.h1Sentence}}
                    </h1>
                    <h2>{{header.h2}} </h2>
                    
                    <button class="box-shadow" id="headerButton" @click="scrolling('productsList')">Commencez vos courses</button>
                </div>
            </div>`
})