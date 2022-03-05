<template>
    <div id="app">
        <a style="color: #1DA1F2; text-decoration: none;" class="fw-bold" href="#" @click="followUser" v-text="linkText">Follow</a>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser() {
                axios.post('/follow/' + this.userId)
                .then(response => {
                    this.status = !this.status;
                    console.log(response.data);
                })
                .catch(errors => {
                    if(errors.response.status == 401){
                        window.location = '/login';
                    }
                });
            }
        },

        computed: {
            linkText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        },
    }
</script>
