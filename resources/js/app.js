import './bootstrap';
import { createApp } from 'vue';
import { createPinia } from 'pinia';
import router from './router';
import { 
    Input,
    InputPassword,
    Select, 
    Avatar, 
    Table, 
    Card, 
    Drawer, 
    Button, 
    message, 
    List, 
    Menu
    } 
from 'ant-design-vue';
import App from './App.vue';
import axios from 'axios';
window.axios = axios;

import './static/fontawesome/css/all.min.css';
import 'ant-design-vue/dist/reset.css';
import 'bootstrap/dist/css/bootstrap-grid.min.css';
import 'bootstrap/dist/css/bootstrap-utilities.min.css';

const app = createApp(App);
app.use(createPinia());
app.use(router);
app.use(Input);
app.use(InputPassword);
app.use(Select);
app.use(Avatar);
app.use(Table);
app.use(Card);
app.use(Button);
app.use(Drawer);
app.use(List);
app.use(Menu);
app.mount('#app');

app.config.globalProperties.$message = message;