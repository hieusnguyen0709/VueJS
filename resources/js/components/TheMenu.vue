<template>
    <a-menu
    v-model:openKeys="openKeys"
    v-model:selectedKeys="selectedKeys"
    mode="inline">
        <a-menu-item key="admin-users">
            <router-link :to="{ name: 'admin-users' }">
                <span>Users</span>
            </router-link>
        </a-menu-item>
        <a-menu-item key="admin-roles">
            <router-link :to="{ name: 'admin-roles' }">
                <span>Roles</span>
            </router-link>
        </a-menu-item>
        <a-menu-item key="admin-settings">
            <router-link :to="{ name: 'admin-settings' }">
                <span>Settings</span>
            </router-link>
        </a-menu-item>
    </a-menu>
</template>
<script>
    import { reactive, h } from 'vue';
    const state = reactive({
        selectedKeys: ['admin-users'],
        openKeys: [''],
    });
</script>