<template>
    <div class="flex h-auto w-auto">
        <span class="h-3 w-3 m-auto rounded-full border border-gray-200" :class="this.priorityColour"></span>
    </div>
</template>

<script>
export default {
    props: [
        'status'
    ],
    data () {
        return {
            priorityColour: '',
        }
    },
    mounted () {
        if (this.status === 'Not Picked Up') {
            this.priorityColour = 'bg-green-400';
        } else if (this.status === 'WIP') {
            this.priorityColour = 'bg-yellow-200';
        } else if (this.status === 'Editing') {
            this.priorityColour = 'bg-blue-300';
        } else {
            this.priorityColour = 'bg-gray-300';
        }
    }
}
</script>
