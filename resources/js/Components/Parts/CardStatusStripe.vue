<template>
      <div v-if="status" class="h-1" :class="taskColor"></div>
</template>

<script>
export default {
    name: 'CardStatusStripe',
    props: [
        'status'
    ],
    data () {
        return {
            taskColor: '',
        }
    },
    mounted () {
        if (this.status === 'Not Picked Up') {
            this.taskColor = 'bg-green-400';
        } else if (this.status === 'WIP') {
            this.taskColor = 'bg-yellow-200';
        } else if (this.status == 'Complete') {
            this.taskColor = 'bg-gray-400'
        } else {
            this.taskColor = 'bg-blue-300';
        };
    }
}
</script>

<style>

</style>
