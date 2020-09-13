<template>
    <app-layout>

        <!-- Layout -->
        <div class="flex flex-col lg:flex-row p-8 gap-x-8">
            <!-- Left (Bottom Mobile) -->
            <div class="lg:w-2/3 mb-8 space-y-4">
                <UserCard v-for="user of users" :key="user.id" :user="user"/>
            </div>

            <!-- Right (Top Mobile) -->
            <div class="lg:w-1/3  text-center space-y-4">

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

    export default {
        components: {
            AppLayout,
            UserCard,
            TaskCard,
        },
        props: {
            tasks: Array,
            users: Array,
            projects: Array,
        },
        mounted () {
            console.log('tasks ' + this.tasks.length)
        }
    }
</script>
