<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <input
                :id="field.name"
                type="text"
                class="w-full form-control form-input form-input-bordered thaana-keyboard"
                :class="errorClasses"
                :placeholder="field.name"
                v-model="value"
            />
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'
// import 'jtk.min.js'
export default {
    data(){
        return{
            my_field: null
        }
    },
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
            this.value = value
        },
    },
    watch: {
        value: function (val) {
           console.log(val)
        }
    },
    mounted() {
        console.log('Home mounted');
        $('.thaana-keyboard').thaana({keyboard: 'phonetic'});
    }
}
</script>

<style lang="scss" scoped>
    .thaana-keyboard {
        direction: rtl;
    }
</style>
