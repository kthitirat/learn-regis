<template>
    <Layout>
       
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-gray-700 uppercase bg-gray-50 ">
                <tr class="bg-white border-b">
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">ชื่อหน่วยงาน</th>
                    <th class="px-6 py-3">ชื่อผู้ประสานงาน</th>
                    <th class="px-6 py-3">อีเมล</th>
                    <th class="px-6 py-3">เบอร์โทร</th>
                    <th class="px-6 py-3">สถานะ</th>
                    
                </tr>
                </thead>
                <tbody v-if="performanceData!=null">
                <tr v-for="(performance,index) in performanceData" :key="index"
                    class="bg-white border-b">
                    <th class="text-center">{{ performance.id }}</th>
                    <td class="px-6 py-4">                       
                        <a target="_blank" :href="route('dashboard.performances.edit', performance.id)" class="underline"> {{ performance.owner.institution }} </a>
                    </td>
                    <td>
                        {{ performance.owner.name }}
                    </td>
                    <td>
                        {{ performance.owner.email }}
                    </td>
                    <td>
                        {{ performance.owner.tel }}
                    </td>
                    <td>
                        <div class="flex w-full items-center justify-center">
                            <input @change="handlePublish(performance)" type="checkbox" class="toggle toggle-success" :checked="performance.is_published " />
                        </div>                        
                    </td>                   
                </tr>
                </tbody>
            </table>
        </div>
        <div v-if="pagination != null" id="pagination" class="mt-4 flex justify-between items-center">
            <div>แสดง {{ pagination.from }} ถึง {{ pagination.to }} จาก {{ pagination.total }} แถว</div>
            <div class="join">
                <button v-for="(pag,index) in pagination.links" :key="index"
                        :class="pag.active ?'btn-active':''"
                        class="join-item btn btn-md" @click="selectPage(pag)">
                    {{ pag.label }}
                </button>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import {Link} from "@inertiajs/vue3";
import {Inertia} from "@inertiajs/inertia";
import {nextTick} from "vue";
import axios from "axios";

export default {
    name: "performanceIndex",
    components: {
        Link,
        Layout
    },
    props: {
        performances: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            performanceData: null,
            pagination: null
        }
    },
    mounted() {
        this.performanceData = this.performances.data;
        this.pagination = this.performances.meta.pagination;
    },
    methods: {
        async handlePublish(performance)
        {
            try{
                const response = await axios.post(this.route('dashboard.performances.toggle_publish', performance.id));
            }catch (e) {
                console.log(e);
            }
            
          
        },
        selectPage(pag) {
            Inertia.get(pag.url);
        },
    }
}
</script>

<style scoped>

</style>
