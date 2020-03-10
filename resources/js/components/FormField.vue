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
            letters: {
                'q': 'ް',
                'w': 'އ',
                'e': 'ެ',
                'r': 'ރ',
                't': 'ތ',
                'y': 'ޔ',
                'u': 'ު',
                'i': 'ި',
                'o': 'ޮ',
                'p': 'ޕ',
                'a': 'ަ',
                's': 'ސ',
                'd': 'ދ',
                'f': 'ފ',
                'g': 'ގ',
                'h': 'ހ',
                'j': 'ޖ',
                'k': 'ކ',
                'l': 'ލ',
                'z': 'ޒ',
                'x': '×',
                'c': 'ޗ',
                'v': 'ވ',
                'b': 'ބ',
                'n': 'ނ',
                'm': 'މ',
                'Q': 'ޤ',
                'W': 'ޢ',
                'E': 'ޭ',
                'R': 'ޜ',
                'T': 'ޓ',
                'Y': 'ޠ',
                'U': 'ޫ',
                'I': 'ީ',
                'O': 'ޯ',
                'P': '÷',
                'A': 'ާ',
                'S': 'ށ',
                'D': 'ޑ',
                'F': 'ﷲ',
                'G': 'ޣ',
                'H': 'ޙ',
                'J': 'ޛ',
                'K': 'ޚ',
                'L': 'ޅ',
                'Z': 'ޡ',
                'X': 'ޘ',
                'C': 'ޝ',
                'V': 'ޥ',
                'B': 'ޞ',
                'N': 'ޏ',
                'M': 'ޟ',
                ',': '،',
                ';': '؛',
                '?': '؟',
                '<': '>',
                '>': '<',
                '[': ']',
                ']': '[',
                '(': ')',
                ')': '(',
                '{': '}',
                '}': '{',
            }
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
            this.value = value;
        },
    },
    watch: {
        value: function (val) {
           console.log(val);

            var ref = this;
            var text  = [];
            for (var i = 0; i < this.value.length; i++) {
                for(var letter in ref.letters){
                    if (ref.letters.hasOwnProperty(letter)) {
                        if(this.value.charAt(i) === letter){
                            text.push(ref.letters[letter])
                        }
                    }
                }
            }
            console.log('text', text);
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
