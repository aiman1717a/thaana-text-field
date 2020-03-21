<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <input
                    :id="field.name"
                    type="text"
                    class="w-full form-control form-input form-input-bordered"
                    :class="errorClasses"
                    :placeholder="field.name"
                    v-model="value"
                    @keypress="value = $event.target.value"
                    @keyup="value = $event.target.value"
                    @keydown="value = $event.target.value"
                    @input="value = $event.target.value"
            />
        </template>
    </default-field>
</template>

<script>
    import { FormField, HandlesValidationErrors } from 'laravel-nova'
    export default {
        data(){
            return{
                // letters: {
                //     'q': 'ް',
                //     'w': 'އ',
                //     'e': 'ެ',
                //     'r': 'ރ',
                //     't': 'ތ',
                //     'y': 'ޔ',
                //     'u': 'ު',
                //     'i': 'ި',
                //     'o': 'ޮ',
                //     'p': 'ޕ',
                //     'a': 'ަ',
                //     's': 'ސ',
                //     'd': 'ދ',
                //     'f': 'ފ',
                //     'g': 'ގ',
                //     'h': 'ހ',
                //     'j': 'ޖ',
                //     'k': 'ކ',
                //     'l': 'ލ',
                //     'z': 'ޒ',
                //     'x': '×',
                //     'c': 'ޗ',
                //     'v': 'ވ',
                //     'b': 'ބ',
                //     'n': 'ނ',
                //     'm': 'މ',
                //     'Q': 'ޤ',
                //     'W': 'ޢ',
                //     'E': 'ޭ',
                //     'R': 'ޜ',
                //     'T': 'ޓ',
                //     'Y': 'ޠ',
                //     'U': 'ޫ',
                //     'I': 'ީ',
                //     'O': 'ޯ',
                //     'P': '÷',
                //     'A': 'ާ',
                //     'S': 'ށ',
                //     'D': 'ޑ',
                //     'F': 'ﷲ',
                //     'G': 'ޣ',
                //     'H': 'ޙ',
                //     'J': 'ޛ',
                //     'K': 'ޚ',
                //     'L': 'ޅ',
                //     'Z': 'ޡ',
                //     'X': 'ޘ',
                //     'C': 'ޝ',
                //     'V': 'ޥ',
                //     'B': 'ޞ',
                //     'N': 'ޏ',
                //     'M': 'ޟ',
                //     ',': '،',
                //     ';': '؛',
                //     '?': '؟',
                //     '<': '>',
                //     '>': '<',
                //     '[': ']',
                //     ']': '[',
                //     '(': ')',
                //     ')': '(',
                //     '{': '}',
                //     '}': '{',
                // }
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
                // var ref = this;
                // var my_value = this.value;
                // var temp = [];
                // for (var i = 0; i < my_value.length; i++) {
                //     temp.push(ref.match(my_value.charAt(i)));
                // }
                // console.log('text', temp.join(''));
                // formData.append(this.field.attribute, temp.join('') || '')

                formData.append(this.field.attribute, this.value || '')
            },

            /**
             * Update the field's internal value.
             */
            handleChange(value) {
                this.value = value;
            },
            match: function (letter) {
                var ref = this;
                for (let [key, value] of Object.entries(ref.letters)) {
                    if(letter === key){
                        return value;
                    }
                }
                return letter;
            }
        },
        computed: {
            keyboardDirection: function () {
                console.log(this.field.status);
                if(this.field.status === 'enable'){
                    return {
                        'direction': 'ltr',
                    }
                }
                return {
                    'direction': 'rtl',
                }
            }
        },
        // watch: {
        //     value: function (val) {
        //        console.log(val);
        //     }
        // },
        mounted() {
            thaanaKeyboard.defaultKeyboard = this.field.type;
            thaanaKeyboard.setHandlerById(this.field.name, this.field.status);
            if(this.field.status === 'enable'){
                $('#' + this.field.name).css({'direction': 'rtl'})
            }else{
                $('#' + this.field.name).css({'direction': 'ltr'})
            }
            // $('.thaana-keyboard').thaana({keyboard: 'phonetic'});
        }
    }
</script>
