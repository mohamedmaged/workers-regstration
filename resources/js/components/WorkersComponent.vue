'
<template>
    <div class="container">
        <div class="row">
            <div class="list-group col-4">
                <a @click="setContent(user)" v-for="user in workers" class="list-group-item list-group-item-action">
                    {{user.name}}
                </a>
            </div>


            <div class="card col-8">
                <div class="d-flex justify-content-center pt-5 pb-2">
                    <img :src="image" alt="" class="rounded-circle w-100" style="max-width: 100px; max-height: 100px">
                </div>
                <div class="d-flex justify-content-center h2"><p>{{name}}</p>

                </div>
                <div class="d-flex justify-content-center "><p> {{jobTitle}}</p></div>
                <a :href="mailto"><div class="d-flex justify-content-center "><p> {{email}}</p></div></a>
                <div class="d-flex justify-content-center "><p>  {{birthday}}</p></div>
                <p>{{currentDescription}}</p>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['workers'],
        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                users: this.workers,
                image: null,
                currentDescription: null,
                birthday: null,
                jobTitle: null,
                name:null,
                email:null,
                mailto:null
            }
        },

        methods: {
            setContent(worker) {

                axios.post('/profile/' + worker.id).then(response => {
                    this.image = '/storage/'+response.data.image;
                    this.birthday = 'Age :'+getAge(response.data.birthday);
                    this.jobTitle = response.data.jobTitle;
                    this.currentDescription = response.data.description;

                }).catch(errors => {

                });
                this.name = worker.name;
                this.email= worker.email;
                this.mailto = 'mailto:'+ worker.email;
            }
        }
    }
    function getAge(birthday) {

       return  ~~((Date.now()-Date.parse(birthday))/31557600000);
    }
</script>
