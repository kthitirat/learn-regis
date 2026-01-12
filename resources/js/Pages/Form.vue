<template>
  <Layout>
    <div class="mx-auto w-full max-w-6xl px-4 sm:px-6 lg:px-8 py-6">
      <h1 class="text-center font-bold tracking-tight text-lg sm:text-2xl lg:text-3xl text-gray-900">
        การลงทะเบียนเข้าร่วมงานศิลปวัฒนธรรมอุดมศึกษาครั้งที่ 23
      </h1>
      <p class="mt-2 text-center text-sm sm:text-base text-gray-500">
        กรุณากรอกข้อมูลให้ครบถ้วน เพื่อความถูกต้องในการประสานงาน
      </p>

      <div class="mt-6 rounded-2xl border border-gray-200 bg-white shadow-sm ring-1 ring-black/5">
        <form class="p-4 sm:p-6 lg:p-8">
          <!-- ปรับเป็น grid responsive -->
            <div class="flex w-full justify-end pr-4"> 

                <div class="" v-if="!isSaved" >
                    <span class="loading loading-spinner"></span>
                </div>

                <div v-if="isSaved" class="badge badge-accent badge-outline uppercase">saved</div>

            </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">

            <div class="md:col-span-2">
              <label class="form-control w-full">
                <div class="label pb-1">
                  <span class="label-text text-sm font-semibold text-gray-700">อีเมล</span>
                </div>
                <input
                  v-model="form.email"
                  class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                  placeholder="กรอกอีเมล"
                  type="text"
                />
              </label>
              <div v-if="$page.props.errors.email" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.email }}
              </div>
            </div>

            <div class="md:col-span-2">
              <label class="form-control w-full">
                <div class="label pb-1">
                  <span class="label-text text-sm font-semibold text-gray-700">หน่วยงาน</span>
                </div>
                <input
                  disabled
                  v-model="form.institution"
                  class="input input-bordered w-full bg-gray-50 border-gray-200 text-gray-700 cursor-not-allowed focus:outline-none transition"
                  placeholder="หน่วยงาน"
                  type="text"
                />
              </label>
              <div v-if="$page.props.errors.institution" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.institution }}
              </div>
            </div>

           <!-- institution_head_name -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">ชื่อหัวหน้าหน่วยงาน</span>
                </div>
                <input
                v-model="form.institution_head_name"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="ชื่อหัวหน้าหน่วยงาน"
                type="text"
                />
            </label>
            <div v-if="$page.props.errors.institution_head_name" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.institution_head_name }}
            </div>
            </div>

            <!-- institution_head_position -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">ตำแหน่งหัวหน้าหน่วยงาน</span>
                </div>
                <input
                v-model="form.institution_head_position"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="ตำแหน่งหัวหน้าหน่วยงาน"
                type="text"
                />
            </label>
            <div v-if="$page.props.errors.institution_head_position" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.institution_head_position }}
            </div>
            </div>

            <!-- coordinator_position -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">ตำแหน่งผู้ประสานงาน</span>
                </div>
                <input
                v-model="form.coordinator_position"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="ตำแหน่งผู้ประสานงาน"
                type="text"
                />
            </label>
            <div v-if="$page.props.errors.coordinator_position" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.coordinator_position }}
            </div>
            </div>

            <!-- name -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">ชื่อการแสดง/กิจกรรม</span>
                </div>
                <input
                v-model="form.name"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="ชื่อการแสดง/กิจกรรม"
                type="text"
                />
            </label>
            <div v-if="$page.props.errors.name" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.name }}
            </div>
            </div>

            <!-- type -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">ประเภท</span>
                </div>

                <div class="rounded-xl border border-gray-200 bg-white p-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                    <!-- ตัวอย่างตัวเลือก: ปรับรายการตามที่ต้องการ -->
                    <label class="inline-flex items-center gap-3 rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 hover:bg-gray-100 transition cursor-pointer">
                    <input
                        type="checkbox"
                        class="checkbox checkbox-sm"
                        v-model="form.type"
                        value="ดนตรี"
                    />
                    <span class="text-sm font-medium text-gray-700">ดนตรี</span>
                    </label>

                    <label class="inline-flex items-center gap-3 rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 hover:bg-gray-100 transition cursor-pointer">
                    <input
                        type="checkbox"
                        class="checkbox checkbox-sm"
                        v-model="form.type"
                        value="นาฏศิลป์"
                    />
                    <span class="text-sm font-medium text-gray-700">นาฏศิลป์</span>
                    </label>

                    <label class="inline-flex items-center gap-3 rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 hover:bg-gray-100 transition cursor-pointer">
                    <input
                        type="checkbox"
                        class="checkbox checkbox-sm"
                        v-model="form.type"
                        value="การแสดง"
                    />
                    <span class="text-sm font-medium text-gray-700">การแสดง</span>
                    </label>

                
                </div>

                <!-- แสดงค่าที่เลือก (ถ้าอยากให้เห็น) -->
                <div v-if="form.type?.length" class="mt-3 text-xs text-gray-500">
                    เลือกแล้ว: <span class="font-medium text-gray-700">{{ form.type.join(', ') }}</span>
                </div>
                </div>
            </label>

            <div v-if="$page.props.errors.type" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.type }}
            </div>
            </div>

            <!-- description -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">รายละเอียด</span>
                </div>
                <textarea
                v-model="form.description"
                class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="รายละเอียด"
                rows="4"
                ></textarea>
            </label>
            <div v-if="$page.props.errors.description" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.description }}
            </div>
            </div>

            <!-- duration -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">ระยะเวลา</span>
                </div>
                <input
                v-model="form.duration"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="ระยะเวลา (เช่น 60 นาที)"
                type="text"
                />
            </label>
            <div v-if="$page.props.errors.duration" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.duration }}
            </div>
            </div>

            <!-- number_of_performers -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">จำนวนผู้แสดง</span>
                </div>
                <input
                v-model="form.number_of_performers"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="จำนวนผู้แสดง"
                type="number"
                min="0"
                />
            </label>
            <div v-if="$page.props.errors.number_of_performers" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.number_of_performers }}
            </div>
            </div>

            <!-- directors -->
            <div>
                <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">รายชื่อผู้ควบคุมการแสดง</span>
                </div>
                <textarea
                v-model="form.directors"
                class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="ผู้กำกับ (สามารถพิมพ์หลายบรรทัดได้)"
                rows="4"
                ></textarea>
            </label>
            <div v-if="$page.props.errors.directors" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.directors }}
            </div>
            </div>

            <!-- performers -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">ผู้แสดง</span>
                </div>
                <textarea
                v-model="form.performers"
                class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="ผู้แสดง (สามารถพิมพ์หลายบรรทัดได้)"
                rows="4"
                ></textarea>
            </label>
            <div v-if="$page.props.errors.performers" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.performers }}
            </div>
            </div>
            <!-- musicians_or_narrators -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">นักดนตรี/ผู้บรรยาย</span>
                </div>
                <textarea
                v-model="form.musicians_or_narrators"
                class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="นักดนตรี/ผู้บรรยาย (สามารถพิมพ์หลายบรรทัดได้)"
                rows="4"
                ></textarea>
            </label>
            <div v-if="$page.props.errors.musicians_or_narrators" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.musicians_or_narrators }}
            </div>
            </div>

            <!-- number_of_musicians -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">จำนวนนักดนตรี</span>
                </div>
                <input
                v-model="form.number_of_musicians"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="จำนวนนักดนตรี"
                type="number"
                min="0"
                />
            </label>
            <div v-if="$page.props.errors.number_of_musicians" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.number_of_musicians }}
            </div>
            </div>

            <!-- opening_scene -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">ฉากเปิด</span>
                </div>
                <textarea
                v-model="form.opening_scene"
                class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="ฉากเปิด"
                rows="4"
                ></textarea>
            </label>
            <div v-if="$page.props.errors.opening_scene" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.opening_scene }}
            </div>
            </div>

            <!-- stage_performance -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">การแสดงบนเวที</span>
                </div>
                <textarea
                v-model="form.stage_performance"
                class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="การแสดงบนเวที"
                rows="4"
                ></textarea>
            </label>
            <div v-if="$page.props.errors.stage_performance" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.stage_performance }}
            </div>
            </div>

            <!-- ending_scene -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">ฉากจบ</span>
                </div>
                <textarea
                v-model="form.ending_scene"
                class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="ฉากจบ"
                rows="4"
                ></textarea>
            </label>
            <div v-if="$page.props.errors.ending_scene" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.ending_scene }}
            </div>
            </div>

            <!-- costume_and_props -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">เครื่องแต่งกาย/อุปกรณ์ประกอบ</span>
                </div>
                <textarea
                v-model="form.costume_and_props"
                class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="เครื่องแต่งกาย/อุปกรณ์ประกอบ"
                rows="4"
                ></textarea>
            </label>
            <div v-if="$page.props.errors.costume_and_props" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.costume_and_props }}
            </div>
            </div>

            <!-- stage_lighting -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">ไฟเวที</span>
                </div>
                <textarea
                v-model="form.stage_lighting"
                class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="ไฟเวที"
                rows="4"
                ></textarea>
            </label>
            <div v-if="$page.props.errors.stage_lighting" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.stage_lighting }}
            </div>
            </div>

            <!-- sound_type -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">ประเภทระบบเสียง</span>
                </div>
                <textarea
                v-model="form.sound_type"
                class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="ประเภทระบบเสียง (สามารถพิมพ์หลายบรรทัดได้)"
                rows="4"
                ></textarea>
            </label>
            <div v-if="$page.props.errors.sound_type" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.sound_type }}
            </div>
            </div>

            <!-- number_of_microphones -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">จำนวนไมโครโฟน</span>
                </div>
                <input
                v-model="form.number_of_microphones"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="จำนวนไมโครโฟน"
                type="number"
                min="0"
                />
            </label>
            <div v-if="$page.props.errors.number_of_microphones" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.number_of_microphones }}
            </div>
            </div>

            <!-- number_of_amplifiers -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">จำนวนแอมป์</span>
                </div>
                <input
                v-model="form.number_of_amplifiers"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="จำนวนแอมป์"
                type="number"
                min="0"
                />
            </label>
            <div v-if="$page.props.errors.number_of_amplifiers" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.number_of_amplifiers }}
            </div>
            </div>

            <!-- other_specifications -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">ข้อกำหนดอื่น ๆ</span>
                </div>
                <textarea
                v-model="form.other_specifications"
                class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="ข้อกำหนดอื่น ๆ"
                rows="4"
                ></textarea>
            </label>
            <div v-if="$page.props.errors.other_specifications" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.other_specifications }}
            </div>
            </div>

            <!-- sound_control -->
            <div>
                <label class="form-control w-full">
                    <div class="label pb-1">
                        <span class="label-text text-sm font-semibold text-gray-700">ผู้ควบคุมเสียง</span>
                    </div>
                    <textarea
                        v-model="form.sound_control"
                        class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300 min-h-[100px]"
                        placeholder="กรอกรายละเอียดผู้ควบคุมเสียง"
                        rows="4"
                    ></textarea>
                </label>
                
                <div v-if="$page.props.errors.sound_control" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                    {{ $page.props.errors.sound_control }}
                </div>
            </div>

            <!-- institution_representatives -->
            <!-- institution_representatives -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">ผู้แทนหน่วยงาน</span>
                </div>
                <textarea
                v-model="form.institution_representatives"
                class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="ผู้แทนหน่วยงาน (สามารถพิมพ์หลายบรรทัดได้)"
                rows="4"
                ></textarea>
            </label>
            <div v-if="$page.props.errors.institution_representatives" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.institution_representatives }}
            </div>
            </div>

            <!-- faculty_and_staff -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">คณาจารย์และบุคลากร</span>
                </div>
                <textarea
                v-model="form.faculty_and_staff"
                class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="คณาจารย์และบุคลากร (สามารถพิมพ์หลายบรรทัดได้)"
                rows="4"
                ></textarea>
            </label>
            <div v-if="$page.props.errors.faculty_and_staff" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.faculty_and_staff }}
            </div>
            </div>

            <!-- students -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">นักศึกษา</span>
                </div>
                <textarea
                v-model="form.students"
                class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="นักศึกษา (สามารถพิมพ์หลายบรรทัดได้)"
                rows="4"
                ></textarea>
            </label>
            <div v-if="$page.props.errors.students" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.students }}
            </div>
            </div>

            <!-- vehicles -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">ยานพาหนะ</span>
                </div>
                <textarea
                v-model="form.vehicles"
                class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="ยานพาหนะ (สามารถพิมพ์หลายบรรทัดได้)"
                rows="4"
                ></textarea>
            </label>
            <div v-if="$page.props.errors.vehicles" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.vehicles }}
            </div>
            </div>


            <!-- arrival_date -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">วันที่เดินทางมาถึง</span>
                </div>
                <input
                v-model="form.arrival_date"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="วันที่เดินทางมาถึง"
                type="date"
                />
            </label>
            <p v-if="arrivalDateTh" class="mt-1 text-xs text-gray-500">
                แสดงผล: {{ arrivalDateTh }}
            </p>

            <div v-if="$page.props.errors.arrival_date" class="text-red-500 text-sm">
                {{ $page.props.errors.arrival_date }}
            </div>
            </div>

            <!-- arrival_time -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">เวลาเดินทางมาถึง</span>
                </div>
                <input
                v-model="form.arrival_time"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="เวลาเดินทางมาถึง"
                type="time"
                />
            </label>
            <div v-if="$page.props.errors.arrival_time" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.arrival_time }}
            </div>
            </div>

            <!-- departure_date -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">วันที่เดินทางกลับ</span>
                </div>
                <input
                v-model="form.departure_date"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="วันที่เดินทางกลับ"
                type="date"
                />
            </label>
              <p v-if="departureDateTh" class="mt-1 text-xs text-gray-500">
                แสดงผล: {{ departureDateTh }}
            </p>
            <div v-if="$page.props.errors.departure_date" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.departure_date }}
            </div>
            </div>

            <!-- departure_time -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">เวลาเดินทางกลับ</span>
                </div>
                <input
                v-model="form.departure_time"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="เวลาเดินทางกลับ"
                type="time"
                />
            </label>
            <div v-if="$page.props.errors.departure_time" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.departure_time }}
            </div>
            </div>

            <!-- accommodation -->
         

            <!-- ceremony_and_reception_details -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">รายละเอียดพิธีการ/การต้อนรับ</span>
                </div>
                <textarea
                v-model="form.ceremony_and_reception_details"
                class="textarea textarea-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="รายละเอียดพิธีการ/การต้อนรับ"
                rows="4"
                ></textarea>
            </label>
            <div v-if="$page.props.errors.ceremony_and_reception_details" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.ceremony_and_reception_details }}
            </div>
            </div>

            <!-- number_of_institution_heads -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">จำนวนผู้บริหารหน่วยงาน</span>
                </div>
                <input
                v-model="form.number_of_institution_heads"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="จำนวนผู้บริหารหน่วยงาน"
                type="number"
                min="0"
                />
            </label>
            <div v-if="$page.props.errors.number_of_institution_heads" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.number_of_institution_heads }}
            </div>
            </div>

            <!-- number_of_faculty_and_staff -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">จำนวนคณาจารย์และบุคลากร</span>
                </div>
                <input
                v-model="form.number_of_faculty_and_staff"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="จำนวนคณาจารย์และบุคลากร"
                type="number"
                min="0"
                />
            </label>
            <div v-if="$page.props.errors.number_of_faculty_and_staff" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.number_of_faculty_and_staff }}
            </div>
            </div>

            <!-- number_of_students -->
            <div>
            <label class="form-control w-full">
                <div class="label pb-1">
                <span class="label-text text-sm font-semibold text-gray-700">จำนวนนักศึกษา</span>
                </div>
                <input
                v-model="form.number_of_students"
                class="input input-bordered w-full bg-white border-gray-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition hover:border-gray-300"
                placeholder="จำนวนนักศึกษา"
                type="number"
                min="0"
                />
            </label>
            <div v-if="$page.props.errors.number_of_students" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700 border border-red-100">
                {{ $page.props.errors.number_of_students }}
            </div>
            </div>
        </div> 
        <div class="mt-8 w-full border-t border-gray-100 pt-6">
        <div class="flex w-full justify-end items-center gap-3">
            <!-- <button
            :disabled="isSubmitting"
            type="button"
            @click="saveDraft"
            class="btn btn-outline border-gray-300 hover:bg-gray-400 text-gray-700 min-w-[140px] shadow-sm"
            >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
            </svg>
            บันทึกฉบับร่าง
            </button> -->

            <button
            @click.prevent="submit"
            :disabled="isSubmitting"
            type="button"
            class="btn btn-primary min-w-[140px] shadow-sm text-white bg-[#6366F1] border-none"
            >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
            </svg>
            ยืนยันส่งข้อมูล
            </button>
        </div>
        </div>

        </form>
      </div>
    </div>
  </Layout>
</template>


<script>
import Layout from "@/Pages/Layout/Layout.vue";
import axios from 'axios';
import {Link} from "@inertiajs/vue3";
import {router} from "@inertiajs/vue3";
import {useForm} from '@inertiajs/inertia-vue3';

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
        return {
            isSubmitting: false,
            dirtyForm: false,
            debounce: null,
           
            form: useForm({
                institution: this.$page.props.user?.institution ?? "",
                email: this.$page.props.user?.email,

                institution_head_name: this.performance?.institution_head_name ?? "",
                institution_head_position: this.performance?.institution_head_position ?? "",
                coordinator_position: this.performance?.coordinator_position ?? "",
                name: this.performance?.name ?? "",
                type: this.performance?.type ?? [],
                description: this.performance?.description ?? "",
                duration: this.performance?.duration ?? "",
                number_of_performers: this.performance?.number_of_performers ?? "",
                directors: this.performance?.directors ?? "",
                performers: this.performance?.performers ?? "",
                musicians_or_narrators: this.performance?.musicians_or_narrators ?? "",
                number_of_musicians: this.performance?.number_of_musicians ?? "",
                opening_scene: this.performance?.opening_scene ?? "",
                stage_performance: this.performance?.stage_performance ?? "",
                ending_scene: this.performance?.ending_scene ?? "",
                costume_and_props: this.performance?.costume_and_props ?? "",
                stage_lighting: this.performance?.stage_lighting ?? "",
                sound_type: this.performance?.sound_type ?? "",
                number_of_microphones: this.performance?.number_of_microphones ?? "",
                number_of_amplifiers: this.performance?.number_of_amplifiers ?? "",
                other_specifications: this.performance?.other_specifications ?? "",
                sound_control: this.performance?.sound_control ?? "",
                institution_representatives: this.performance?.institution_representatives ?? "",
                faculty_and_staff: this.performance?.faculty_and_staff ?? "",
                students: this.performance?.students ?? "",
                vehicles: this.performance?.vehicles ?? "",
                arrival_date: this.performance?.arrival_date ?? "",
                arrival_time: this.performance?.arrival_time ?? "",
                departure_date: this.performance?.departure_date ?? "",
                departure_time: this.performance?.departure_time ?? "",
                accommodation: this.performance?.accommodation ?? "",
                ceremony_and_reception_details: this.performance?.ceremony_and_reception_details ?? "",
                number_of_institution_heads: this.performance?.number_of_institution_heads ?? "",
                number_of_faculty_and_staff: this.performance?.number_of_faculty_and_staff ?? "",
                number_of_students: this.performance?.number_of_students
            })
        }        
    },
    mounted() {
       
    },
    methods: {       
        async saveDraft() {
            this.isSubmitting = true;
            const url = this.route('save_draft');
            const res = await axios.post(url, this.form);
            if (res.status === 200) {
                this.isSubmitting = false;
                this.dirtyForm = false;
                return
            }
        },
        async submit(){
            const result = await this.$swal({
                title: "คุณต้องการจะส่งข้อมูล?",
                text: "โปรดระวัง! เมื่อส่งข้อมูลแล้วท่านจะไม่สามารถแก้ไขได้",
                showCancelButton: true,
                confirmButtonText: "ยืนยัน",
                confirmButtonColor: "#f43f5e",
            });
            if (!result.isConfirmed) {
                return;
            }
            this.isSending = true;
            const url = this.route('submit_form', this.performance.id);
            const res = await axios.patch(url, {});
            if (res.status === 200) {
                this.isSending = false;
                setTimeout(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'ท่านได้ยื่นรายละเอียดการแสดงเรียบร้อยแล้ว',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = this.route('index');
                    })
                }, 500);
            } else {
                this.isSending = false;
            }
        },
        formatThaiDate(dateStr) {
            if (!dateStr) return null;

            // dateStr ควรเป็น "YYYY-MM-DD"
            const d = new Date(dateStr);
            if (isNaN(d.getTime())) return null;

            const months = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.',
                            'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];

            const day = d.getDate();
            const month = months[d.getMonth()];
            const yearBE = d.getFullYear() + 543;

            // ตัวอย่าง: "19 ต.ค.2568" (มีช่องว่างหลังวัน แต่ไม่มีช่องว่างก่อนปี)
            return `${day} ${month}${yearBE}`;
        },

        
    },
    watch: {
        form: {
           handler() {
            this.dirtyForm = true;
            clearTimeout(this.debounce) 
                this.debounce = setTimeout( () => {
                    this.saveDraft();               
                }, 3000);
           },
           deep: true
           
      }
    },
    computed: {
        
          isSaved() {
            if (this.dirtyForm) {
                return false;
            }
            return true;
        },

        arrivalDateTh() {
            return this.formatThaiDate(this.form.arrival_date);
        },

        departureDateTh() {
            return this.formatThaiDate(this.form.departure_date);
        },
    }
};
</script>

<style scoped>
</style>
