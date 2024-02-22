<template>
    <a-card title="Account" style="width: 100%">
        <div class="row">
            <div class="col-12">
                <a-table :dataSource="users" :columns="columns">
                    <template #bodyCell="{ column, index, record }">
                        <template v-if="column.key === 'index'">
                            <span>{{ index + 1 }}</span>
                        </template>

                        <template v-if="column.key === 'status'">
                            <span v-if="record.status_id == 1" class="text-primary">{{ record.status }}</span>
                            <span v-else-if="record.status_id == 2" class="text-danger">{{ record.status }}</span>
                        </template>
                    </template>
                </a-table>
            </div>
        </div> 
    </a-card>
</template>
<script>
import { defineComponent, ref } from 'vue';
import { useMenu } from '../../../stores/use-menu.js';

export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-users"]);

        const users = ref([]);
        const columns = [
            {
                title: '#',
                key: 'index',
            },
            {
                title: 'Avatar',
                dataIndex: 'avatar',
                key: 'avatar',
            },
            {
                title: 'Account',
                dataIndex: 'username',
                key: 'username',
            },
            {
                title: 'Name',
                dataIndex: 'name',
                key: 'name',
            },
            {
                title: 'Department',
                dataIndex: 'department',
                key: 'department',
            },
            {
                title: 'Role',
                key: 'role',
            },
            {
                title: 'Status',
                dataIndex: 'status',
                key: 'status',
            },
            {
                title: 'Actions',
                key: 'actions',
            },
        ]

        const getUsers = () => {
            axios
                .get('http://127.0.0.1:8000/api/users')
                .then(function (response) {
                    users.value = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        };

        getUsers();

        return {
            users,
            columns
        }
    },
});
</script>