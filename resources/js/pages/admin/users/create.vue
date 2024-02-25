<template>
    <a-card title="Create" style="witdt: 100%">
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center mb-3">
                        <a-avatar shape="square" :size="200">
                            <template #icon>
                                <img src="">
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

            </div>
        </div>
    </a-card>
</template>
<script>
import { defineComponent } from 'vue'
import { useMenu } from '../../../stores/use-menu.js';

export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-users"]);
    },
})
</script>
