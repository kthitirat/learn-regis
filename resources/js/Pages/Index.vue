<template>
    <Layout>
        <div>
            <div v-if="$page.props.user" class="card bg-base-100 w-96 shadow-sm">
                <figure>
                    <img
                    src="https://picsum.photos/500/400"
                    alt="Shoes" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">งานศิลปวัฒนธรรมอุดมศึกษา</h2>
                    <p>{{ $page.props.user.institution }}</p>
                    <div class="card-actions justify-end">
                        <Link v-if="performance && !performance.is_published" class="btn btn-primary" :href="route('form')">แก้ไข</Link>

                        <div v-if="performance && performance.is_published" class="px-4 py-2 bg-green-700 rounded-md text-white opacity-50">ส่งเรียบร้อย</div> 
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
            type: Object || null,
            default: null
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
