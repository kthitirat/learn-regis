<template>
  <Layout>
    <form @submit.prevent="submit" class="w-full">
      <div class="rounded-2xl border border-gray-200 bg-white p-4 sm:p-6 lg:p-8 shadow-sm">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
          <div>
            <div class="label pb-1">
              <span class="label-text text-sm font-semibold text-gray-700">สิทธิ์</span>
            </div>
            <select
              v-model="form.role_id"
              class="select select-bordered w-full uppercase bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
            >
              <option value="">เลือกสิทธิ์</option>
              <option v-for="role in roles" :key="role.id" :value="role.id">
                {{ role.name }}
              </option>
            </select>
          </div>

          <div>
            <label class="form-control w-full">
              <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">ชื่อผู้ติดต่อ</span>
              </div>
              <input
                v-model="form.name"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
                placeholder="ชื่อผู้ติดต่อ"
                type="text"
              />
            </label>
            <div v-if="$page.props.errors.name" class="mt-2 text-sm text-red-600">
              {{ $page.props.errors.name }}
            </div>
          </div>

          <div>
            <label class="form-control w-full">
              <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">หน่วยงาน</span>
              </div>
              <input
                v-model="form.institution"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
                placeholder="หน่วยงาน"
                type="text"
              />
            </label>
            <div v-if="$page.props.errors.institution" class="mt-2 text-sm text-red-600">
              {{ $page.props.errors.institution }}
            </div>
          </div>

          <div>
            <label class="form-control w-full">
              <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">Email</span>
              </div>
              <input
                v-model="form.email"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
                placeholder="อีเมล"
                type="email"
              />
            </label>
            <div v-if="$page.props.errors.email" class="mt-2 text-sm text-red-600">
              {{ $page.props.errors.email }}
            </div>
          </div>

          <div>
            <label class="form-control w-full">
              <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">เบอร์โทรติดต่อ</span>
              </div>
              <input
                v-model="form.tel"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
                placeholder="เบอร์โทรติดต่อ"
                type="text"
              />
            </label>
            <div v-if="$page.props.errors.tel" class="mt-2 text-sm text-red-600">
              {{ $page.props.errors.tel }}
            </div>
          </div>

          <div>
            <label class="form-control w-full">
              <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">รหัสผ่าน</span>
              </div>
              <input
                v-model="form.password"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
                placeholder="password"
                type="password"
              />
            </label>
            <div v-if="$page.props.errors.password" class="mt-2 text-sm text-red-600">
              {{ $page.props.errors.password }}
            </div>
          </div>
        </div>

        <div class="mt-6 flex flex-col sm:flex-row sm:justify-end gap-3">
          <button
            :disabled="submitting"
            class="btn btn-primary uppercase w-full sm:w-auto min-w-[140px] shadow-sm disabled:opacity-60"
            type="submit"
          >
            Submit
          </button>
        </div>
      </div>
    </form>
  </Layout>
</template>

<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import {Inertia} from "@inertiajs/inertia";
import {Link, router} from "@inertiajs/vue3";
import {useForm} from '@inertiajs/inertia-vue3';


export default {
    name: "UserEdit",
    components: {Layout, Link},
    props: {
        user: {
            type: Object,
            required: true
        },
        roles: {
            type: Array,
            required: true
        },       
    },
    mounted() {
    },
    data() {
        return {
            submitting:false,
            form: useForm({
                name: this.user.name,
                institution: this.user.institution,
                email: this.user.email,
                tel: this.user.tel,
                role_id: this.user.role_id ,
                password: null       
               
            }),
            
        };
    },
    methods: {
        async submit() {
            this.submitting = true;
            const url = this.route('dashboard.users.update', this.user.id);            
            await router.post(url, {
                    _method: 'patch',
                    user_id: this.user.id,
                    name: this.form.name,
                    institution: this.form.institution,
                    email: this.form.email,
                    tel: this.form.tel,
                    role_id: this.form.role_id,
                    password: this.form.password            
            });
        },
    },
    watch: {}
};
</script>
