<template>
    <panel-item :field="field" class="thaana"/>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>

<style lang="scss" scoped>
    .thaana {
        direction: rtl;
    }
</style>