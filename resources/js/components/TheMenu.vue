<template>
    <a-menu
    v-model:openKeys="openKeys"
    v-model:selectedKeys="selectedKeys"
    mode="inline">
        <a-menu-item key="admin-users">
            <router-link :to="{ name: 'admin-users' }">
                <span><UserOutlined class="me-1" />Users</span>
            </router-link>
        </a-menu-item>
        <a-menu-item key="admin-roles">
            <router-link :to="{ name: 'admin-roles' }">
                <span><TagOutlined class="me-1" />Roles</span>
            </router-link>
        </a-menu-item>
        <a-menu-item key="admin-settings">
            <router-link :to="{ name: 'admin-settings' }">
                <span><SettingOutlined class="me-1" />Settings</span>
            </router-link>
        </a-menu-item>
    </a-menu>
</template>
<script>
    import { UserOutlined, TagOutlined, SettingOutlined } from '@ant-design/icons-vue';
    import { reactive, h, defineComponent } from 'vue';
    import { storeToRefs } from 'pinia';
    import { useMenu } from '../stores/use-menu';
    const state = reactive({
        selectedKeys: ['admin-users'],
        openKeys: [''],
    });

    export default defineComponent({
        components: {
            UserOutlined,
            TagOutlined,
            SettingOutlined,
        },
        setup() {
            const store = useMenu();
            const { selectedKeys, openKeys } = store;

            return {
                ...storeToRefs(store)
            };
        },
    });
</script>