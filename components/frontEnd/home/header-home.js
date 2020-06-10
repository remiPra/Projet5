
        Vue.component('main-container', {
            props:['namesession'],
            data() {
                return {
                    data:"fade-down",
                    header: {
                        h1Welcome: "Bienvenue",     
                        h1Sentence : "chez ma ferme Bio",
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
                    
                    <h1 class="text-light">{{header.h1Welcome}}
                    <span id='nameSessionStyle'>{{namesession}}</span>
                    {{header.h1Sentence}}
                    </h1>
                    <h2>{{header.h2}} </h2>
                    
                    <button class="box-shadow" id="headerButton" @click="scrollingY(2000)">Commencez vos courses</button>
                </div>
            </div>`
        })