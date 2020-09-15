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
                <TaskCardButtons :task="task"/>
            </div>

            <!-- Edit Details -->
            <div class="p-8 bg-white shadow-md">
                <TaskUpdateForm :task="task" :user="user" :editor="editor" :project="project"/>
            </div>

            <div class="text-right mb-8">
                <jet-danger-button @click.native="confirmTaskDeletion">
                    Delete Task
                </jet-danger-button>
                <jet-dialog-modal :show="confirmingTaskDeletion" @close="confirmingTaskDeletion = false">
                    <template #title>
                        Delete Task
                    </template>

                    <template #content>
                        <div class="p-4 antialiased text-center space-y-4">
                            <p>Be careful - you will not be able to recover this task. If you want to hide the task, instead try to <strong class="text-blue-400">complete</strong> and then <strong class="text-blue-400">archive</strong> it.</p>
                            <jet-danger-button>
                                <a :href="'/tasks/'+task.id+'/delete/'">
                                    Confirm Deletion
                                </a>
                            </jet-danger-button>
                        </div>
                    </template>
                </jet-dialog-modal>
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
    import JetDangerButton from './../../Jetstream/DangerButton'
    import JetDialogModal from './../../Jetstream/DialogModal'

    export default {
        components: {
            AppLayout,
            TaskCard,
            TaskCardButtons,
            TaskUpdateForm,
            SimpleIcon,
            JetDangerButton,
            JetDialogModal
        },
        props: {
            task: Object,
            user: Object,
            editor: Array,
            project: Object
        },
        data () {
            return {
                confirmingTaskDeletion: false,
            }
        },
        methods: {
            confirmTaskDeletion() {
                this.confirmingTaskDeletion = true;

                setTimeout(() => {}, 250)
            },

            deleteTask() {

            },

        }
}
</script>
