<template>
    <app-layout>

        <!-- Layout -->
        <div class="w-auto m-auto flex flex-col-reverse lg:flex-row p-8 gap-x-8">
            <!-- Left (Bottom Mobile) -->
            <div class="lg:w-1/3 mb-8 space-y-8">

                <!-- Users -->
                <div class="space-y-4">
                <UserCard v-for="user of users" :key="user.id" :user="user" :tasks="tasks"/>
                </div>

                <!-- Stats Dashboard -->
                <div class="p-4 h-auto bg-white shadow-md">
                    <CardTitle
                    title="Tasq Monitor"
                        />
                    <div class="flex p-4">
                    <ChartTaskProgress class="m-auto" :totals="totals" />
                    </div>
                </div>
            </div>

            <!-- Tasks (Top Mobile) -->
            <div class="lg:w-auto mb-8 text-center">
                <div class="mb-4 bg-purple-100 shadow-md flex flex-row">
                    <div class="my-auto h-full p-4 text-gray-500 hover:text-gray-700">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input v-model="filter" class="px-4 text-gray-500 w-full" type="text" name="search">
                </div>

                <table class="hidden lg:block w-auto">
                    <thead>
                        <tr class="text-center py-4 shadow-sm">
                            <th>
                                <SimpleIcon>
                                    <svg class="m-auto w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                                </SimpleIcon>
                            </th>
                            <th>
                                <SimpleIcon>
                                    <svg class="m-auto w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                </SimpleIcon>
                            </th>
                            <th>
                                <SimpleIcon>
                                    <svg class="m-auto w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                </SimpleIcon>
                            </th>
                            <th>
                                <SimpleIcon>
                                    <svg class="m-auto w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"></path></svg>
                                </SimpleIcon>
                            </th>
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
                <div class="space-y-4 block lg:hidden">
                    <TaskCard
                    v-for="task of tasks"
                    :comment="true"
                    :key="task.id"
                    :task="task"/>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout'
    import UserCard from './../Components/UserCard'
    import TaskTableRow from './../Components/TaskTableRow'
    import TaskCard from './../Components/TaskCard'
    import CardTitle from './../Components/Parts/CardTitle'
    import ChartTaskProgress from './../Components/ChartTaskProgress'
    import SimpleIcon from './../Components/Parts/SimpleIcon'

    export default {
        components: {
            AppLayout,
            UserCard,
            TaskTableRow,
            TaskCard,
            CardTitle,
            ChartTaskProgress,
            SimpleIcon
        },
        props: {
            tasks: Array,
            users: Array,
            projects: Array,
            totals: Array,
        },
        data () {
            return {
                filter: ''
            }
        }
    }
</script>

<style scoped>
th {
    @apply p-4 bg-white font-extrabold;
}
</style>

