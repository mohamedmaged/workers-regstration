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
                <p>  {{birthday}}</p>
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
                name:null
            }
        },

        methods: {
            setContent(worker) {

                axios.post('/profile/' + worker.id).then(response => {
                    this.status = !this.status;
                    console.log(response.data);
                    console.log(worker);
                    this.image = '/storage/'+response.data.image;

                    this.birthday = 'Age :'+getAge(response.data.birthday);
                    console.log();
                    this.jobTitle = response.data.jobTitle;
                    this.currentDescription = response.data.description;

                    console.log('/storage/'+response.data.image);
                }).catch(errors => {

                });
                console.log()
                this.name = worker.name;

            }
        }
    }
    function getAge(birthday) {

       return  ~~((Date.now()-Date.parse(birthday))/31557600000);
    }
</script>
