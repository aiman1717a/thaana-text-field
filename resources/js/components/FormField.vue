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
            <input type="hidden" :name="field.name + '_thaanaKeyboardState'" value="phonetic">
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'
// import 'jtk.min.js'
export default {
    data(){
        return{
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
    watch: {
        value: function (val) {
           console.log(val);
        }
    },
    mounted() {
        console.log('Home mounted');
        // thaanaKeyboard.defaultKeyboard = 'phonetic';
        // console.log(thaanaKeyboard.defaultKeyboard);
        // $('.thaana-keyboard').thaana({keyboard: 'phonetic'});
    }
}
</script>

<style lang="scss" scoped>
    .thaana-keyboard {
        font-family: faruma, 'mv iyyu nala', 'mv elaaf normal';
        direction: rtl;
    }
</style>
