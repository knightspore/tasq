<template>
    <textarea class="form-input rounded-none shadow-sm h-48" :value="value" @input="$emit('input', $event.target.value)" ref="input"/>
</template>

<script>
    export default {
        props: ['value'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>

