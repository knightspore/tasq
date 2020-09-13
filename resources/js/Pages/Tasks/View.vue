<template>
    <app-layout>
    <div class="p-8 space-y-8">

            <TaskCard
            :task="task"
            :comment="true"
            :site="project"/>

            <div class="p-8 bg-white shadow-md">
                <TaskCardButtons :task="task"/>
            </div>

    </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import TaskCard from './../../Components/TaskCard'
    import TaskCardButtons from './../../Components/Parts/TaskCardButtons'

    export default {
        components: {
            AppLayout,
            TaskCard,
            TaskCardButtons,
        },
        props: {
            task: Object,
            user: Object,
            project: Object
     }
}
</script>
