<template>
    <div class="container-fuild">
        <div class="row text-white" style="background-color:#0c713d; padding:1rem">
            <div class="col-1 d-flex d-sm-none align-items-center justify-content-center">
                <span @click="showDrawer()">X</span>
            </div>

            <div class="col-10 col-sm-9 d-flex align-items-center justify-content-center justify-content-sm-start">
                <img src="assets/img/logo.png" alt="logo" height="32" width="34" class="ms-3 me-3">
                <span class="d-none d-sm-flex">Hieu Nguyen</span>
            </div>

            <div class="col-sm-3 d-none d-sm-flex align-items-center justify-content-center-sm-end">
                <span>Admin</span>
            </div>

            <div class="col-1 d-flex d-sm-none align-items-center justify-content-center-sm-end">
                <span @click="showDrawerUser()">X</span>
            </div>
        </div>
    </div>

    <a-drawer
    v-model:open="open"
    class="custom-class"
    root-class-name="root-class-name"
    :root-style="{ color: 'blue' }"
    style="color: red"
    title="List"
    placement="left">
        <TheMenu />
    </a-drawer>

    <a-drawer
    v-model:open="open_user"
    class="custom-class"
    root-class-name="root-class-name"
    :root-style="{ color: 'blue' }"
    style="color: green"
    title="Admin"
    placement="right">
        <p>Some contents...</p>
        <p>Some contents...</p>
        <p>Some contents...</p>
    </a-drawer>
</template>
<script>
import TheMenu from "../components/TheMenu.vue";
import { defineComponent, ref } from "vue";
export default defineComponent({
  components: {
    TheMenu,
  },
  setup() {
    const open = ref(false);
    const open_user = ref(false);

    const showDrawer = () => {
        open.value = true;
    };
    const showDrawerUser = () => {
        open_user.value = true;
    };

    return {
      open,
      open_user,
      showDrawer,
      showDrawerUser,
    };
  },
});
</script>