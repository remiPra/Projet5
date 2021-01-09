Vue.component('message-shop', {
        props:['messagesprops'],
        data(){
            return{
            router:{
                MessageNoReadList:false,
                MessageReadList:false,
                MessageNotAnswerList:false,
                MessageOpen:false
            },
            liveMessage:0    
            }
        },
        methods:{
            getAllMessages(){
                console.log('getallMessages')
                this.$emit("ongetallmessages")
            },
            routageMessageNoReadList(){
                this.router.MessageOpen = false
                this.router.MessageNoReadList = true
                this.router.MessageReadList = false
                this.router.MessageNotAnswerList = false
                this.scrolling("MessageNoReadList")
            },
            routageMessageReadList(){
                this.router.MessageOpen = false
                this.router.MessageReadList = true
                this.router.MessageNoReadList = false
                this.router.MessageNotAnswerList = false
                this.scrolling("MessageReadList")
            },
            routageMessageNotAnswerList(){
                this.router.MessageOpen = false
                this.router.MessageNotAnswerList = true
                this.router.MessageNoReadList = false
                this.router.MessageReadList = false
                this.scrolling("MessageNotAnswerList")
            },
            liveMessageContainer(data,id){
                this.router.MessageOpen = true 
                this.$emit('oncheckreadmessage',id)
                console.log(data)
                this.liveMessage = data;
                this.scrolling('messageOpen')
            },
            scrolling(element) {
                setTimeout(()=>{

                    const id = element;
                    const yOffset = -100; 
                    const elements = document.getElementById(id);
                    const y = elements.getBoundingClientRect().top + window.pageYOffset + yOffset;
                    
                    window.scrollTo({top: y, behavior: 'smooth'});
                },400)
            },    
            
        },    
        template: `
        <section id="routageMenu">
            <div>
                <div class="container-fluid row ">
                    <div @click="getAllMessages();routageMessageNoReadList()" class="col-md-4">
                        <div class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Messages Non Lu</h4>
                            <p>Voici la liste des messages non lu</p>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div @click="getAllMessages(),routageMessageReadList()" class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Messages Lu</h4>
                            <p>Voici la liste des messages lu</p>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div @click="getAllMessages();routageMessageNotAnswerList()" class="contentCategory buttonMain1 col-md-10 ml-auto mr-auto">
                            <h4>Message Non répondu</h4>
                            <p>Voici la liste des messages non répondus</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="MessageNoReadList">
            <transition name="fade">
            <template v-if="router.MessageNoReadList==true">
                <div class="col-md-8 m-auto tableAdministration" >
                    <h3> Liste des Messages Non lues </h3>
                    <table class="table table-bordere">
                        <thead>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Action</th>
                        </thead>
                        <!-- tableau des articles publiés -->
                        <tbody>

                            <tr v-for="(data,index) in messagesprops">
                                <template v-if="data.status == 'noRead' && data.answerStatus == 'notAnswer'  ">
                                <td>{{data.email}}</td>
                                <td>{{data.pseudo}}</td>
                                <td>{{data.id}}</td>

                                <td>
                                    <div class="actionTableau">
                                    <button @click="liveMessageContainer(index,data.id)"  class="buttonAdmin"> Lire </button>
                                       
                                    </div>
                                </td>
                                </template>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </template>
            </transition>
            </div>
            
            <div id="MessageReadList">
            <transition name="fade">
            <template v-if="router.MessageReadList==true">
                <div class="col-md-8 m-auto tableAdministration" >
                    <h3> Liste des Messages Lues et non répondues </h3>
                    <table class="table table-bordere">
                        <thead>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Action</th>
                        </thead>
                        <!-- tableau des articles publiés -->
                        <tbody>

                            <tr v-for="(data,index) in messagesprops">
                                <template v-if="data.status == 'read' && data.answerStatus == 'notAnswer'">
                                    <td>{{data.email}}</td>
                                    <td>{{data.pseudo}}</td>
                                    <td>{{data.id}}</td>
                                <td>
                                    <div class="actionTableau">
                                    <button @click="liveMessageContainer(index,data.id)"  class="buttonAdmin"> Lire </button>
                                        <form  class="formAdmin formWithNoBorder" action="index.php?action=deleteMessage" method="POST"> 
                                            <input name="id" :value="data.id" hidden>      
                                            <button  class="buttonAdmin " type="submit">Supprimer</button>
                                        </form>                                        
                                    </div>
                                </td>
                                </template>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </template>
            </transition>
            </div>

            <div id="MessageNotAnswerList">
            <transition name="fade">
            <template v-if="router.MessageNotAnswerList==true">
                <div class="col-md-8 m-auto tableAdministration" >
                    <h3> Liste des Messages lu et répondues </h3>
                    <table class="table table-bordere">
                        <thead>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Action</th>
                        </thead>
                        <!-- tableau des articles publiés -->
                        <tbody>

                            <tr v-for="(data,index) in messagesprops">
                                <template v-if="data.status == 'read' && data.answerStatus == 'answer'">
                                    <td>{{data.email}}</td>
                                    <td>{{data.pseudo}}</td>
                                    <td>{{data.id}}</td>
                                <td>
                                    <div class="actionTableau"> 
                                        <form  class="formAdmin formWithNoBorder" action="index.php?action=deleteMessage" method="POST"> 
                                            <input name="id" :value="data.id" hidden>      
                                            <button  class="buttonAdmin " type="submit">Supprimer</button>
                                        </form>                                            
                                    </div>
                                </td>
                                </template>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </template>
            </transition>
            </div>

        <div id="MessageOpen">
        <transition name="fade">
        <template v-if="router.MessageOpen">
            <div class="col-md-8 m-auto tableAdministration" >
                    <h3>Pseudo : {{messagesprops[liveMessage].pseudo}}</h3>
                    <p>Sujet : {{messagesprops[liveMessage].subject}}</p>
                    <p>Son message : {{messagesprops[liveMessage].message}}</p>

                    <form  class="formAdmin formWithNoBorder" action="index.php?action=sendAnswer" method="POST"> 
                        <input name="id" :value="messagesprops[liveMessage].id" hidden>      
                        <h4> Votre réponse : </h4>
                        <textarea class="pt-10 pb-10" name="myAnswer"></textarea>      
                        <button  class="buttonAdmin " type="submit">Envoyer</button>
                    </form>   

            </div>
        </template>
        </transition>
        </div>

        </section>`})