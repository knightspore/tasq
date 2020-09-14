<template>
    <div class= "flex gap-x-2 justify-center">

        <!-- Progress: Not Picked Up -->
        <div class="flex flex-col md:flex-row gap-2" v-if="task.progress == 'Not Picked Up'">
        <card-button color="blue" :route="'/task/'+task.id+'/pickup/'">
            <SimpleIcon>
            <svg class="m-auto text-white w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
            </SimpleIcon>
            Pickup Task
        </card-button>
        </div>

        <!-- Progress: WIP -->
        <div class="flex flex-col md:flex-row gap-2" v-if="task.progress == 'WIP'">
        <card-button color="blue" :route="'/user/'+user.id+'/view/'">
            <SimpleIcon>
            <svg class="m-auto text-white w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
            </SimpleIcon>
            {{user.name}}
        </card-button>
        <card-button color="yellow" :route="'/task/'+task.id+'/editing/'">
            <SimpleIcon>
            <svg class="m-auto text-white w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
            </SimpleIcon>
            Edit Task
        </card-button>
        </div>

        <!-- Progress: Editing -->
        <div class="flex flex-col md:flex-row gap-2" v-if="task.progress == 'Editing'">
        <card-button color="blue" :route="'/user/'+user.id+'/view/'">
            <SimpleIcon>
            <svg class="m-auto text-white w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
            </SimpleIcon>
            {{user.name}}
        </card-button>
        <card-button color="yellow" :route="'/user/'+editor[0].id+'/view/'">
            <SimpleIcon>
            <svg class="m-auto text-white w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
            </SimpleIcon>
            {{editor[0].name}}
        </card-button>
        <card-button color="green" :route="'/task/'+task.id+'/complete/'">
            <SimpleIcon>
            <svg class="m-auto text-white w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </SimpleIcon>
            Complete?
        </card-button>
        </div>

        <!-- Progress: Complete -->
        <div class="flex flex-col md:flex-row gap-2" v-if="task.progress == 'Complete'">
        <card-button color="blue" :route="'/user/'+user.id+'/view/'">
            <SimpleIcon>
            <svg class="m-auto text-white w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
            </SimpleIcon>
            {{user.name}}
        </card-button>
        <card-button color="yellow" :route="'/user/'+editor[0].id+'/view/'">
            <SimpleIcon>
            <svg class="m-auto text-white w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
            </SimpleIcon>
            {{editor[0].name}}
        </card-button>
        <card-button color="green" :route="'/task/'+task.id+'/complete/'">
            <SimpleIcon>
            <svg class="m-auto text-white w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </SimpleIcon>
            Complete
        </card-button>
        </div>

    </div>
</template>

<script>
import CardButton from './CardButton'
import SimpleIcon from './SimpleIcon'

export default {
    props: {
        task: Object,
        user: Object,
        editor: Array,
        project: Object,
    },
    components: {
        CardButton,
        SimpleIcon
    }
}
</script>
