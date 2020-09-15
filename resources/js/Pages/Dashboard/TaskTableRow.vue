<template>
    <tr class="text-left border-t border-gray-200 text-gray-600 hover:bg-gray-100 transition-color duration-150">

        <!-- Task Name -->
        <a :href="'/tasks/'+task.id+/view/"><td class="font-bold flex gap-x-4 text-gray-900"><StatusIndicator :status="task.progress"/> {{ task.name }} <span class="text-gray-400 text-sm">{{$page.global.projectinfo[task.site - 1].name}}</span></td></a>

        <!-- Task User -->
        <td v-if="task.user" class="text-center">{{$page.global.userinfo[task.user - 1].name}}</td>
        <td v-else></td>

        <!-- Due -->
        <td>{{task.due | moment("from")}}</td>

    </tr>
</template>

<script>
import StatusIndicator from './../../Components/StatusIndicator'

export default {
    name: 'TaskTableRow',
    components: {
        StatusIndicator
    },
    props: {
        task: Object,
    },
}
</script>

<style scoped>
td {
    @apply p-6;
}
</style>
