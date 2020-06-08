
        Vue.component('main-container', {
            data() {
                return {
                    data:"fade-down",
                    header: {
                        h1: "Bienvenue chez ma ferme Bio",
                        h2: "Votre magasin de fruits et legumes avec la possibilité de commander en ligne",

                    },
                }
            },
            methods: {
                scrolling(element) {
                    document.getElementById(element).scrollIntoView(
                        {
                            block: 'start',
                            behavior: 'smooth',
                        }
                    )
                },
                scrollingY(data){
                    window.scrollTo({top:2000,behavior: 'smooth'})
                }
               
            },
            //function a tester
            
            template: `
            <div :data-aos="data" class="col-sm-6 container text-center" id="presentationShop">
                <div class="container px-md-3 shopTitle">
                    <h1 class="text-light">{{header.h1}}</h1>
                    <h2>{{header.h2}} </h2>
                    
                    <button id="headerButton" @click="scrollingY(2000)">Commencez vos courses</button>
                </div>
            </div>`
        })