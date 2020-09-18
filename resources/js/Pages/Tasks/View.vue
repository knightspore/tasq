<template>
    <app-layout>
    <div class="m-auto lg:w-5/12 p-8 space-y-8">

            <!-- Task Card (Head) -->
            <TaskCard
            :task="task"
            :comment="true"/>

            <!-- Task Action Buttons -->
            <div class="p-8 bg-white shadow-md">
                <TaskActionButtons/>
            </div>

            <!-- Task Update Form -->
            <div>
            <a @click.prevent="editingDetails = !editingDetails" v-if="!editingDetails"><JetButton>Edit Task Details...</JetButton></a>
            <div class="p-8 bg-white shadow-md" v-if="editingDetails">
                <TaskUpdateForm/>
            </div>
            </div>

            <!-- Task Delete Form -->
            <TaskDeleteForm/>
    </div>
    </app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout'
import TaskCard from './../../Components/TaskCard'
import TaskActionButtons from './TaskActionButtons'
import JetButton from './../../Jetstream/Button'
import TaskUpdateForm from './TaskUpdateForm'
import TaskDeleteForm from './TaskDeleteForm'

export default {
    components: {
        AppLayout,
        TaskCard,
        TaskActionButtons,
        JetButton,
        TaskUpdateForm,
        TaskDeleteForm,
    },
    props: {
        task: Object,
        user: Object,
        editor: Array,
    },
    data () {
        return {
            editingDetails: false
        }
    }
}
</script>
