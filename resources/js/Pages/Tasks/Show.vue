<template>
    <app-layout>
        <template #header>
            <h2>
                All Tasks
            </h2>
        </template>

        <div class="p-8">
        <table class="w-auto m-auto table-auto overflow-x-">
            <thead>
                <tr class="text-left py-4 shadow-sm">
                    <th>Name</th>
                    <th>Due</th>
                    <th>User</th>
                    <th>Site<br></th>
                </tr>
            </thead>
            <tbody class="bg-gray-50 text-sm">
                <TaskTableRow
                v-for="task in tasks"
                :key="task.id"
                :task="task"
                :project="projects[task.site - 1]"
                :user='users[task.user - 1]'/>
            </tbody>
        </table>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import TaskTableRow from './../../Components/TaskTableRow'

    export default {
        name: 'Tasks',
        components: {
            AppLayout,
            TaskTableRow
        },
        props: {
            tasks: Array,
            users: Array,
            projects: Array,
        }
    }
</script>

<style scoped>
th {
    @apply p-4 bg-white font-extrabold;
}

</style>
