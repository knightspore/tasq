<template>
      <div v-if="status" :class="taskColor"></div>
</template>

<script>
export default {
    name: 'CardStatusStripe',
    props: {
        status: String
    },
    data () {
        return {
            taskColor: '',
        }
    },
    mounted () {
        if (this.status === 'Not Picked Up') {
            this.taskColor = 'bg-green-400 h-1';
        } else if (this.status === 'WIP') {
            this.taskColor = 'bg-yellow-200 h-1';
        } else if (this.status === 'etc') {
            this.taskColor = 'bg-purple-700 w-1';
        } else {
            this.taskColor = 'bg-blue-300 h-1';
        };
    }
}
</script>

<style>

</style>
