<template>
    <form @submit.prevent="createUsers()">
        <a-card title="Create" style="witdt: 100%">
            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center mb-3">
                            <a-avatar shape="square" :size="200">
                                <template #icon>
                                    <img src="/assets/img/user.png">
                                </template>
                            </a-avatar>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <a-button type="primary">
                            <i class="fa-solid fa-plus me-2"></i>
                            <span>Choose Picture</span>
                        </a-button>
                    </div>
                </div>

                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.status_id
                                }">
                                    Status:
                                </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-select 
                                show-search 
                                placeholder="Status" 
                                style="width: 100%"
                                :options="users_status" 
                                :filter-option="filterOption"
                                v-model:value="status_id"
                                :class="{
                                    'select-danger': errors.status_id
                                }"
                                >
                            </a-select>
                            <div class="w-100"></div>
                            <small v-if="errors.status_id" class="text-danger">{{ errors.status_id[0] }}</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.username
                                }">
                                    UserName:</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input placeholder="UserName" 
                            allow-clear
                            v-model:value="username"
                            :class="{
                                'input-danger': errors.username
                            }"
                            />
                            <div class="w-100"></div>
                            <small v-if="errors.username" class="text-danger">{{ errors.username[0] }}</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.name
                                }">Name:</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input placeholder="Name" 
                            allow-clear
                            v-model:value="name"
                            :class="{
                                'input-danger': errors.name
                            }"
                            />
                            <div class="w-100"></div>
                            <small v-if="errors.name" class="text-danger">{{ errors.name[0] }}</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.email
                                }">Email:</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input placeholder="Email" 
                            allow-clear
                            v-model:value="email"
                            :class="{
                                'input-danger': errors.name
                            }"
                            />
                            <div class="w-100"></div>
                            <small v-if="errors.email" class="text-danger">{{ errors.email[0] }}</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.department_id
                                }">Department:</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-select 
                                show-search 
                                placeholder="Department" 
                                style="width: 100%"
                                :options="departments" 
                                :filter-option="filterOption"
                                allow-clear
                                v-model:value="department_id"
                                :class="{
                                'select-danger': errors.department_id
                                }"
                                >
                            </a-select>
                            <div class="w-100"></div>
                            <small v-if="errors.department_id" class="text-danger">{{ errors.department_id[0] }}</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.password
                                }">Password:</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input-password 
                                placeholder="Password" 
                                allow-clear
                                v-model:value="password"
                                :class="{
                                'input-danger': errors.password
                                }"
                            />
                            <div class="w-100"></div>
                            <small v-if="errors.password" class="text-danger">{{ errors.password[0] }}</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.password
                                }">Confirm Password:</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input-password 
                                placeholder="Confirm Password" 
                                allow-clear
                                v-model:value="password_confirmation"
                                :class="{
                                'input-danger': errors.password
                                }"
                            />
                            <div class="w-100"></div>
                            <small v-if="errors.password" class="text-danger">{{ errors.password[0] }}</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto">
                    <a-button class="me-0 me-sm-2 mb-3 mb-sm-0">
                        <router-link :to="{ name: 'admin-users'}">
                            <span>Cancel</span>
                        </router-link>
                    </a-button>

                    <a-button type="primary" html-type="submit">
                        <span>Save</span>
                    </a-button>
                </div>
            </div>
        </a-card>
    </form>
</template>
<script>
import { defineComponent, ref, reactive, toRefs } from 'vue'
import { useMenu } from '../../../stores/use-menu.js';

export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-users"]);

        const users_status = ref([]);
        const departments = ref([]);
        const users = reactive({
            username: '',
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            department_id: [],
            status_id: []
        });
        const errors = ref([]);

        const getUsersCreate = () => {
            axios
                .get('http://127.0.0.1:8000/api/users/create')
                .then(function (response) {
                    users_status.value = response.data.users_status;
                    departments.value = response.data.departments;
                })
                .catch(function (error) {
                    console.log(error);
                });
        };

        const filterOption = (input, options) => {
            return options.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };

        const createUsers = () => {
            axios
                .post('http://127.0.0.1:8000/api/users', users)
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                    errors.value = error.response.data.errors;
                });
        }

        getUsersCreate();

        return {
            users_status,
            departments,
            filterOption,
            createUsers,
            ...toRefs(users),
            errors
        }
    },
})
</script>
<style>
.select-danger {
    border: 1px solid red;
}
.input-danger {
    border-color: red;
}
</style>
