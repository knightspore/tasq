<template>
    <div class="flex h-auto w-auto">
        <span class="h-3 w-3 m-auto rounded-full border border-gray-200" :class="colour"></span>
    </div>
</template>

<script>
export default {
    name: 'Indicator',
    props: [
        'colour'
    ]
}
</script>
