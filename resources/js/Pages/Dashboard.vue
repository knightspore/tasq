<template>
    <app-layout>

        <!-- Layout -->
        <div class="flex flex-col lg:flex-row p-8 gap-x-8">
            <!-- Left (Bottom Mobile) -->
            <div class="lg:w-2/3 mb-8 space-y-8">

                <!-- Users -->
                <div class="space-y-8">
                <UserCard v-for="user of users" :key="user.id" :user="user"/>
                </div>

                <!-- Stats Dashboard -->
                <div class="p-4 h-auto bg-white shadow-md">
                    <CardTitle
                    class="text-gray-500"
                    title="Tasq Monitor"/>
                    <div class="flex p-4">
                    <ChartTaskProgress :totals="totals" />
                    </div>
                </div>
            </div>

            <!-- Tasks (Top Mobile) -->
            <div class="lg:w-1/3 text-center space-y-4">
                <TaskCard
                v-for="task of tasks"
                :comment="true"
                :key="task.id"
                :task="task"
                :site="projects[task.site - 1]"/>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout'
    import UserCard from './../Components/UserCard'
    import TaskCard from './../Components/TaskCard'
    import CardTitle from './../Components/Parts/CardTitle'
    import ChartTaskProgress from './../Components/ChartTaskProgress'

    export default {
        components: {
            AppLayout,
            UserCard,
            TaskCard,
            CardTitle,
            ChartTaskProgress,
        },
        props: {
            tasks: Array,
            users: Array,
            projects: Array,
            totals: Array,
        },
    }
</script>
