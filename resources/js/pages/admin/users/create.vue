<template>
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
                            <span>Status:</span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-5">
                        <a-select 
                            show-search 
                            placeholder="Status" 
                            style="width: 100%"
                            :options="users_status" 
                            :filter-option="filterOption">
                        </a-select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-sm-3 text-start text-sm-end">
                        <label>
                            <span class="text-danger me-1">*</span>
                            <span>UserName:</span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-5">
                        <a-input placeholder="UserName" allow-clear/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-sm-3 text-start text-sm-end">
                        <label>
                            <span class="text-danger me-1">*</span>
                            <span>Name:</span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-5">
                        <a-input placeholder="Name" allow-clear/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-sm-3 text-start text-sm-end">
                        <label>
                            <span class="text-danger me-1">*</span>
                            <span>Email:</span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-5">
                        <a-input placeholder="Email" allow-clear/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-sm-3 text-start text-sm-end">
                        <label>
                            <span class="text-danger me-1">*</span>
                            <span>Department:</span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-5">
                        <a-select 
                            show-search 
                            placeholder="Department" 
                            style="width: 100%"
                            :options="departments" 
                            :filter-option="filterOption">
                        </a-select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-sm-3 text-start text-sm-end">
                        <label>
                            <span class="text-danger me-1">*</span>
                            <span>Password:</span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-5">
                        <a-input-password placeholder="Password" allow-clear/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-sm-3 text-start text-sm-end">
                        <label>
                            <span class="text-danger me-1">*</span>
                            <span>Confirm Password:</span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-5">
                        <a-input-password placeholder="Confirm Password" allow-clear/>
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

                <a-button type="primary">
                    <span>Save</span>
                </a-button>
            </div>
        </div>
    </a-card>
</template>
<script>
import { defineComponent, ref } from 'vue'
import { useMenu } from '../../../stores/use-menu.js';

export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-users"]);

        const users_status = ref([]);
        const departments = ref([]);

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

        getUsersCreate();

        return {
            users_status,
            departments,
            filterOption
        }
    },
})
</script>
