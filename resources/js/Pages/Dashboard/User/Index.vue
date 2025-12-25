<template>
  <Layout>
    <div class="relative mt-4 overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-sm">
      <table class="min-w-[900px] w-full text-sm text-left text-gray-700">
        <thead class="sticky top-0 z-10 bg-gray-50 text-xs uppercase text-gray-600">
          <tr class="border-b border-gray-200">
            <th class="w-16 px-3 py-3 sm:px-6 sm:py-4 font-semibold text-center whitespace-nowrap">#</th>

            <th class="px-3 py-3 sm:px-6 sm:py-4 font-semibold whitespace-nowrap">
              ชื่อ - นามสกุล
            </th>

            <!-- ซ่อนบนมือถือ เพื่อไม่ให้แน่นเกิน -->
            <th class="hidden md:table-cell px-3 py-3 sm:px-6 sm:py-4 font-semibold whitespace-nowrap">
              ชื่อหน่วยงาน
            </th>

            <!-- ซ่อนบนจอเล็กมาก, โผล่ตั้งแต่ sm -->
            <th class="hidden sm:table-cell px-3 py-3 sm:px-6 sm:py-4 font-semibold whitespace-nowrap">
              อีเมล
            </th>

            <!-- ซ่อนบนมือถือ, โผล่ตั้งแต่ lg -->
            <th class="hidden lg:table-cell px-3 py-3 sm:px-6 sm:py-4 font-semibold whitespace-nowrap">
              เบอร์โทร
            </th>

            <th class="w-28 px-3 py-3 sm:px-6 sm:py-4 font-semibold whitespace-nowrap">
              สิทธิ์
            </th>

            <th class="w-28 sm:w-36 px-3 py-3 sm:px-6 sm:py-4 font-semibold text-right whitespace-nowrap">
              Action
            </th>
          </tr>
        </thead>

        <tbody v-if="userData != null" class="divide-y divide-gray-100">
          <tr
            v-for="(user, index) in userData"
            :key="index"
            class="bg-white hover:bg-gray-50 transition-colors"
          >
            <th class="px-3 py-3 sm:px-6 sm:py-4 text-center font-medium text-gray-900 whitespace-nowrap">
              {{ user.id }}
            </th>

            <td class="px-3 py-3 sm:px-6 sm:py-4">
              <div class="font-medium text-gray-900">
                <Link
                  :href="route('dashboard.users.edit', user.id)"
                  class="hover:text-blue-600 hover:underline"
                >
                  {{ user.name }}
                </Link>
              </div>
              <div class="text-xs text-gray-500 whitespace-nowrap">User ID: {{ user.id }}</div>
            </td>

            <td class="hidden md:table-cell px-3 py-3 sm:px-6 sm:py-4">
              <span class="text-gray-700 break-words">
                {{ user.institution }}
              </span>
            </td>

            <td class="hidden sm:table-cell px-3 py-3 sm:px-6 sm:py-4">
              <span class="text-gray-700 truncate max-w-[220px] md:max-w-[280px] lg:max-w-[360px] inline-block align-middle">
                {{ user.email }}
              </span>
            </td>

            <td class="hidden lg:table-cell px-3 py-3 sm:px-6 sm:py-4">
              <span class="text-gray-700 whitespace-nowrap">
                {{ user.tel }}
              </span>
            </td>

            <td class="px-3 py-3 sm:px-6 sm:py-4">
              <span
                class="inline-flex items-center rounded-full border px-2.5 py-1 text-xs font-semibold whitespace-nowrap"
                :class="user.role?.name === 'admin'
                  ? 'border-red-200 bg-red-50 text-red-700'
                  : 'border-blue-200 bg-blue-50 text-blue-700'"
              >
                {{ user.role?.name }}
              </span>
            </td>

            <td class="px-3 py-3 sm:px-6 sm:py-4 text-right">
              <button
                @click="handleDeleteUser(user)"
                type="button"
                class="group inline-flex items-center justify-center rounded-lg border border-gray-200 bg-white p-2 hover:bg-gray-50 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-red-300"
                title="ลบ"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-5 h-5 text-gray-600 transition-colors group-hover:text-red-600"
                >
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
              </button>
            </td>
          </tr>
        </tbody>

        <!-- empty state -->
        <tbody v-else>
          <tr>
            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
              ยังไม่มีข้อมูลให้แสดง
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div
      v-if="pagination != null"
      id="pagination"
      class="mt-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
    >
      <div class="text-sm text-gray-600">
        แสดง {{ pagination.from }} ถึง {{ pagination.to }} จาก {{ pagination.total }} แถว
      </div>

      <div class="inline-flex flex-wrap items-center gap-2">
        <button
          v-for="(pag, index) in pagination.links"
          :key="index"
          @click="selectPage(pag)"
          :disabled="!pag.url"
          class="px-3 py-2 rounded-lg border text-sm font-medium transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-200"
          :class="[
            pag.active
              ? 'border-blue-600 bg-blue-600 text-white'
              : 'border-gray-200 bg-white text-gray-700 hover:bg-gray-50',
            !pag.url ? 'opacity-50 cursor-not-allowed' : ''
          ]"
          v-html="pag.label"
        />
      </div>
    </div>
  </Layout>
</template>

<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import {Link} from "@inertiajs/vue3";
import {Inertia} from "@inertiajs/inertia";

export default {
    name: "DashboardIndex",
    components: {Layout, Link},
    props: {
        users: {
            type: Object,
            required: true
        },
        number: {
            type: Number,
            default: 0
        },
        date: {
            type: String,
            default: "" 
        }
    },
    methods: {
        handleDeleteUser(user) {
            this.$swal.fire({
                title: "คุณต้องการที่จะลบผู้ใช้ " + user.name + '?',
                showDenyButton: true,
                showCancelButton: true,
                showConfirmButton: false,
                denyButtonText: 'ลบ'
            }).then((result) => {
                if (result.isDenied) {
                    Inertia.delete(this.route('dashboard.users.destroy', user.id));
                    nextTick(() => {
                        window.location.reload();
                    })
                }
            });
        },
        selectPage(pag) {
            Inertia.get(pag.url);
        },
    },
    mounted() {
        this.userData = this.users.data;
        this.pagination = this.users.meta.pagination;
        //console.log(this.users)
    },
    data() {
        return {
            userData:null,
            pagination:null,
        };
    }
};
</script>
