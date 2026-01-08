<template>
    <Layout>
        <div>
            <div v-if="$page.props.user" class="card bg-base-100 w-96 shadow-sm">
                <figure>
                    <img
                    src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                    alt="Shoes" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">งานศิลปวัฒนธรรมอุดมศึกษา</h2>
                    <p>{{ $page.props.user.institution }}</p>
                    <div class="card-actions justify-end">
                        <Link class="btn btn-primary" :href="route('form')">แก้ไข</Link>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Layout/Layout.vue";
import axios from 'axios';
import {Link} from "@inertiajs/vue3";
import {router} from "@inertiajs/vue3";


export default {
    name: "Index",
    components: {Layout,  Link},
    props: {
       performance:{
            type: Object,
            required: true
       }
    },
    data() {
        
    },
    mounted() {
       
    },
    methods: {
        
    },
    watch: {
        
    },
    computed: {}
};
</script>

<style scoped>
</style>
