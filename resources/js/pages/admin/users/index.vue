<template>Manage Users</template>

<script>
import { useMenu } from '../../../stores/use-menu.js';

export default {
    setup() {
        useMenu().onSelectedKeys(["admin-users"]);
    }
}
</script>