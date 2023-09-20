<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <Head message="Hi"/>

                    <div class="card-body">
                        I'm an example component.

                        <ul>
                            <li v-for="user in users">
                                {{ user.name }}
                                <a :href="'/products/' + id">
                                    <button class="btn btn-success">Click Me</button>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import axios from 'axios'
    import Head from './Head.vue'

    export default {
        data() {
            return {
                id: 1,
                users: []
            }
        },
        components: {
            Head
        },
        created() {
            Echo.channel('notification')
            .listen('MessageNotification', e =>{
                console.log('Broadcast Success');
                axios.get('/api/users').then(res => {
                    console.log(res.data);
                })
            })
        },
        methods: {
            getUsers() {
                axios.get('/api/users').then(res => {
                    this.users = res.data;
                })
            }
        },
        mounted() {
            this.getUsers();
            console.log('Component mounted.')
        }
    }
</script>
