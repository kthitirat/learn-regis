<template>
    <div class="w-full">
        <div class="w-full bg-blue-600 h-10 flex items-center px-4 lg:px-32">
            <p class="text-white">Phranakhon Si Ayutthaya Rajabhat University</p>
        </div>
        <div class="w-full shadow-md h-20 flex items-center justify-between px-4 lg:px-32">
            <div class="flex items-center">
                <h1 class="text-4xl font-bold uppercase">ARU </h1>
                <h1 class="text-4xl font-bold text-blue-600"> REGISTER</h1>
            </div>
            <div class="flex items-center gap-3">
                <!-- <Link
                    :href="route('index')"
                    class="text-blue-600 px-1 py-0.5 border-blue-600 border-l-0 border-r-0 border-t-0 border-2 font-bold hidden lg:block">
                    Home
                </Link> -->
                 <!-- Login (ตอนยังไม่ login) -->
                <Link
                    v-if="!$page.props.user"
                    :href="route('login')"
                    class="btn btn-ghost btn-sm text-blue-600 hidden lg:inline-flex">
                    Login
                </Link>
                
                <!-- User dropdown (ตอน login แล้ว) -->
                <div v-else class="dropdown dropdown-end">
                    <!-- Trigger -->
                   <button
                        type="button"
                        tabindex="0"
                        class="flex items-center gap-2 px-2 py-1 rounded-lg hover:bg-transparent active:bg-transparent"
                        >
                    <div class="avatar">
                        <div class="w-9 h-9 rounded-full ring ring-base-200 ring-offset-2 ring-offset-base-100 overflow-hidden">
                        <img
                            :src="$page.props.user.profile_photo_url"
                            alt="User avatar"
                            class="w-full h-full object-cover"
                        />
                        </div>
                    </div>

                    <!-- ข้อความ: ซ่อนบนมือถือ, โชว์ตั้งแต่ sm ขึ้นไป -->
                    <div class="hidden sm:flex flex-col items-start leading-tight">
                        <span class="text-xs text-base-content/60">สวัสดี</span>
                        <span class="text-sm font-semibold max-w-[160px] truncate">
                        {{ $page.props.user.name }}
                        </span>
                    </div>

                    <!-- ลูกศร: ซ่อนบนมือถือ -->
                    <svg class="hidden sm:block w-4 h-4 opacity-60" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
                    </svg>
                    </button>

                    <!-- Menu -->
                    <ul
                        tabindex="0"
                        class="dropdown-content mt-2 z-50 menu menu-sm p-2 shadow bg-base-100 rounded-box w-56"
                        >
                    <!-- โชว์ชื่อในเมนูสำหรับมือถือ -->
                        <li class="sm:hidden">
                            <span class="text-xs text-base-content/60">Signed in as</span>
                            <span class="font-semibold truncate">{{ $page.props.user.name }}</span>
                        </li>
                        <li class="sm:hidden"><div class="divider my-1"></div></li>

                        <!-- <li>
                            <Link :href="route('profile.show')">Profile</Link>
                        </li> -->
                        <!-- <li><a href="#">Settings</a></li> -->
                        <li>
                        <button type="button" class="text-error" @click.prevent="logout">
                        Logout
                        </button>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {Link} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";

export default {
    name: "Nav",
    components: {Link},
    data() {
        return {};
    },
    methods: {
        logout() {
            Inertia.post(this.route('logout'));
        }
    }
};
</script>
