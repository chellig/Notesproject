<script setup>
import Menu from "./Menu.vue"
</script>

<template>
    <Menu class="sticky-header"/>
    </template>
    <style scoped>
.sticky-header {
position: fixed;
top: 0;
left: 0;
width: 100%;
background-color: #fff;
padding: 10px;
z-index: 1000;
/* Ajoutez d'autres styles selon vos besoins */
}
.container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    max-width: 1440px;
}
</style>