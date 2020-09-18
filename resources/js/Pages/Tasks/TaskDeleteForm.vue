<template>
    <div class="mb-8">

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
                        <a :href="'/tasks/'+$page.task.id+'/delete/'">
                            Confirm Deletion
                        </a>
                    </jet-danger-button>
                </div>
            </template>

        </jet-dialog-modal>
    </div>
</template>

<script>
import JetDangerButton from './../../Jetstream/DangerButton'
import JetDialogModal from './../../Jetstream/DialogModal'

export default {
    components: {
        JetDangerButton,
        JetDialogModal,
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

<style>

</style>
