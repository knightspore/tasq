<template>
    <div>
        <a :href="route" :class="this[color]" class="max-h-10 my-auto inline-flex items-center px-4 py-2 border border-transparent font-semibold text-xs text-white uppercase tracking-widest transition ease-in-out duration-150">
            <slot></slot>
        </a>
    </div>
</template>

<script>
export default {
    props: {
        route: {
            type: String,
            default: '',
        },
        color: {
            type: String,
            default: 'blue'
        }
    },
    data () {
        return {
            buttonColor: '',
            blue: ' bg-blue-400 hover:bg-blue-500 active:bg-blue-500 focus:outline-none focus:border-blue-500 focus:shadow-outline-blue',
            green: 'bg-green-400 border hover:bg-green-500 active:bg-green-500 focus:outline-none focus:border-green-500 focus:shadow-outline-green',
            yellow: 'bg-yellow-300 border hover:bg-yellow-400 active:bg-yellow-300 focus:outline-none focus:border-yellow-300 focus:shadow-outline-yellow',
        }
    },
    mounted () {
        this.buttonColor = this.colors[color]
    }

}
</script>
