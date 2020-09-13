<template>
    <div class="shadow-inner bg-gray-300">
    <div class="w-full h-auto bg-white flex flex-row shadow-md m-auto">

        <CardStatusStripe status="etc"/>

        <div class="p-4 w-full flex">
            <div class="mr-4 image flex w-12 h-12 bg-gray-200 rounded-full">
                <img class="m-auto p-1 w-18 h-18 rounded-full" :src="user.profile_photo_url" :alt="user.name + ' profile picture.'"/>
            </div>

            <a class="flex" :href="'/user/' + user.id + '/view/'">
                <CardTitle
                class="m-auto text-lg"
                :title='user.name'
                :comment="false"/>
            </a>

            <div class="flex-1 flex justify-end gap-2">
                <div class="my-auto"  @click.prevent="show = !show">
                <SimpleIcon>
                    <svg v-if="!show" class="w-6 h-6" aria-label="View Tasks" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                    <svg v-if="show" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                </SimpleIcon>
                </div>
                <SimpleIcon>
                    <svg viewBox="0 0 20 20" fill="currentColor" class="mail w-6 h-6"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                </SimpleIcon>
            </div>
        </div>
    </div>

    <transition name="fade">
        <div class="p-8 space-y-4" v-if="show">
            <TaskCard
            v-for="task of tasks"
            v-if="task.user == user.id"
            :comment="true"
            :key="task.id"
            :task="task"/>
        </div>
     </transition>
    </div>
</template>

<script>
import CardStatusStripe from './Parts/CardStatusStripe'
import CardTitle from './Parts/CardTitle'
import TaskCard from './TaskCard'
import SimpleIcon from './Parts/SimpleIcon'


export default {
    name: 'UserCard',
    props: {
        user: Object,
        tasks: Array
    },
    components: {
        CardTitle,
        CardStatusStripe,
        TaskCard,
        SimpleIcon
    },
    data () {
        return {
            show: false,
            userTasks: [],
        }
    },
    mounted () {

    }
}
</script>

<style>
.fade-enter-active, .fade-leave-active {
  transition: all .25s ease-in;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
  transform: scale(0)
}
</style>
