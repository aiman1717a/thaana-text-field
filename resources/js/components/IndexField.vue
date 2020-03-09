<template>
    <span class="thaana">{{ field.value }}</span>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
}
</script>

<style lang="scss" scoped>
    .thaana {
        direction: rtl;
    }
</style>