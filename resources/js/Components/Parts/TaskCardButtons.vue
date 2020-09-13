<template>
    <div class= "flex gap-x-2 justify-center lg:justify-end">
        <!-- Pickup / User -->
        <card-button color="blue" :route="'/task/'+task.id+'/pickup/'" v-if="task.progress == 'Not Picked Up'">
            Pickup
        </card-button>

        <!-- Edit / Editor -->
        <card-button color="yellow" :route="'/task/'+task.id+'/editing/'" v-if="task.progress == 'WIP'">
            Edit
        </card-button>

        <!-- Complete / Complete -->
        <card-button color="green" :route="'/task/'+task.id+'/complete/'" v-if="task.progress == 'Editing'">
            Complete
        </card-button>
    </div>
</template>

<script>
import CardButton from './CardButton'
export default {
    props: {
        task: Object,
    },
    components: {
        CardButton
    }
}
</script>
