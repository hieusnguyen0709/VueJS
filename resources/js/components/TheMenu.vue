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
    import { reactive, h, defineComponent } from 'vue';
    import { storeToRefs } from 'pinia';
    import { useMenu } from '../stores/use-menu';
    const state = reactive({
        selectedKeys: ['admin-users'],
        openKeys: [''],
    });

    export default defineComponent({
        setup() {
            const store = useMenu();
            const { selectedKeys, openKeys } = store;

            return {
                ...storeToRefs(store)
            };
        },
    });
</script>