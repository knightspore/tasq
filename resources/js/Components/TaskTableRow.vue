<template>
    <tr class="text-left border-t border-gray-200 text-gray-600 hover:bg-gray-100 transition-color duration-150">

        <!-- Task Name -->
        <a :href="'/tasks/'+task.id+/view/"><td class="font-bold flex gap-x-4 text-gray-900"><Indicator :colour="priorityColour"/> {{ task.name }}</td></a>

        <!-- Due -->
        <td>{{task.due | moment("from")}}</td>

        <!-- Task User -->
        <td v-if="user" class="text-center">{{user.name}}</td>
        <td v-else></td>

        <!-- Site -->
        <td v-if="project" class="text-center">{{project.name}}</td>
        <td v-else></td>

    </tr>
</template>

<script>
import Indicator from './Parts/Indicator'

export default {
    name: 'TaskTableRow',
    components: {
        Indicator
    },
    props: {
        task: Object,
        user: Object,
        project: Object,
    },
    data () {
        return {
            priorityColour: '',
        }
    },
    mounted () {
        if (this.task.progress === 'Not Picked Up') {
            this.priorityColour = 'bg-green-400';
        } else if (this.task.progress === 'WIP') {
            this.priorityColour = 'bg-yellow-200';
        } else if (this.task.progress === 'Editing') {
            this.priorityColour = 'bg-orange-200';
        } else {
            this.priorityColour = 'bg-gray-300';
        }
    }
}
</script>

<style scoped>
td {
    @apply p-6;
}
</style>
