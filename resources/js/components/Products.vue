<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Products</div>

                    <Head message="Hi"/>

                    <div class="card-body">
                        Product {{ productid }} <br>

                        <a :href="'/home'">
                            <button class="btn btn-success">Return Home</button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import Head from './Head.vue'

    export default {
        data() {
            return {
                productid: ""
            }
        },
        components: {
            Head
        },
        methods: {
            getProducts() {
                let url = window.location.href;
                this.productid = url.split('/')[4];
            }
        },
        mounted() {
            this.getProducts();
        }
    }
</script>
