<template>
    <table class="hidden lg:block w-auto">

        <thead>
            <tr class="text-center py-4 shadow-sm">
                <th class="text-left">
                    Tasks
                </th>
                <th>
                    <SimpleIcon>
                        <svg class="m-auto w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    </SimpleIcon>
                </th>
                <th>
                    <SimpleIcon>
                        <svg class="m-auto w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </SimpleIcon>
                </th>
            </tr>
        </thead>

        <tbody class="bg-gray-50 text-sm">
            <TaskTableRow
            v-for="task in tasks"
            :key="task.id"
            :task="task"/>
        </tbody>

    </table>
</template>

<script>
import SimpleIcon from './../../Components/Parts/SimpleIcon'
import TaskTableRow from './TaskTableRow'

export default {
    components: {
        SimpleIcon,
        TaskTableRow,
    },
    props: [
        'tasks'
    ]
}
</script>

<style scoped>
th {
    @apply p-4 bg-white;
}
</style>
