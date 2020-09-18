<template>
    <div class= "flex gap-x-2">
        <div class="flex flex-col md:flex-row gap-2">

        <!-- Pickup / User -->
        <card-button v-if="$page.task.progress == 'Not Picked Up'" color="blue" :route="'/tasks/'+$page.task.id+'/pickup/'">
            <SimpleIcon>
            <svg class="m-auto text-white w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
            </SimpleIcon>
            Pickup Task
        </card-button>

        <card-button v-if="$page.task.progress != 'Not Picked Up'" color="blue" :route="'/user/'+$page.task.user+'/view/'">
            <SimpleIcon>
            <svg class="m-auto text-white w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
            </SimpleIcon>
            {{$page.global.userinfo[$page.task.user-1].name}}
        </card-button>


        <!-- Edit / Editor -->
        <card-button v-if="$page.task.progress == 'WIP'" color="yellow" :route="'/tasks/'+$page.task.id+'/edit/'">
            <SimpleIcon>
            <svg class="m-auto text-white w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
            </SimpleIcon>
            Edit Task
        </card-button>

        <card-button v-if="$page.task.progress != 'Not Picked Up' && $page.task.progress != 'WIP'" color="yellow" :route="'/user/'+$page.task.editor+'/view/'">
            <SimpleIcon>
            <svg class="m-auto text-white w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
            </SimpleIcon>
            {{$page.global.userinfo[$page.task.editor-1].name}}
        </card-button>


        <!-- Completed / Complete -->
        <card-button v-if="$page.task.progress == 'Editing'" color="green" :route="'/tasks/'+$page.task.id+'/complete/'">
            <SimpleIcon>
            <svg class="m-auto text-white w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </SimpleIcon>
            Complete?
        </card-button>

        <card-button color="green" v-if="$page.task.progress == 'Complete'">
            <SimpleIcon>
            <svg class="m-auto text-white w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </SimpleIcon>
            Task Complete
        </card-button>


        <!-- Archive -->
        <card-button v-if="$page.task.archived == 0 " color="gray" :route="'/tasks/'+$page.task.id+'/archive/'">
            <SimpleIcon>
            <svg class="m-auto text-white w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd"></path><path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z"></path></svg>
            </SimpleIcon>
            Archive Task
        </card-button>

        </div>
    </div>
</template>

<script>
import CardButton from './../../Components/Parts/CardButton'
import SimpleIcon from './../../Components/Parts/SimpleIcon'
import JetButton from './../../Jetstream/Button'

export default {
    components: {
        CardButton,
        SimpleIcon,
        JetButton
    },
}
</script>
