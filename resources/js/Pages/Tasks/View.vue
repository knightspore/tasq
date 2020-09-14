<template>
    <app-layout>
    <div class="p-8 space-y-8">

            <!-- Task Summary -->
            <TaskCard
            :task="task"
            :comment="true"
            :site="project"/>

            <!-- Task Buttons -->
            <div class="p-8 bg-white shadow-md">
                <TaskCardButtons :task="task" :user="user" :editor="editor"/>
            </div>

            <!-- Edit Details -->
            <div class="p-8 bg-white shadow-md">
                <TaskUpdateForm :task="task" :user="user" :editor="editor" :project="project"/>
            </div>

    </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import TaskCard from './../../Components/TaskCard'
    import TaskCardButtons from './../../Components/Parts/TaskCardButtons'
    import TaskUpdateForm from './../../Components/TaskUpdateForm'
    import SimpleIcon from './../../Components/Parts/SimpleIcon'

    export default {
        components: {
            AppLayout,
            TaskCard,
            TaskCardButtons,
            TaskUpdateForm,
            SimpleIcon
        },
        props: {
            task: Object,
            user: Object,
            editor: Array,
            project: Object
        },
}
</script>
