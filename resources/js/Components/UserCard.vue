<template>
    <div>
    <CardBase class="z-50">
    <div class="flex flex-row">

            <!-- Avatar -->
            <div class="mr-4 image flex w-12 h-12 bg-gray-200 rounded-full">
                <img class="m-auto p-1 w-18 h-18 rounded-full" :src="user.profile_photo_url" :alt="user.name + ' profile picture.'"/>
            </div>

            <!-- Name -->
            <a class="flex" :href="'/user/' + user.id + '/view/'">
                <CardTitle
                class="m-auto text-lg"
                :title='user.name'
                :comment="false"/>
            </a>

            <!-- User Tasks Toggle -->
            <div class="flex-1 flex justify-end gap-2">
                <div class="my-auto"  @click.prevent="show = !show" v-if="user.tasks.length >= 1">
                <SimpleIcon>
                    <svg v-if="!show" class="w-6 h-6" aria-label="View Tasks" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                    <svg v-if="show" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                </SimpleIcon>
                </div>
            </div>

    </div>
    </CardBase>
    <transition name="fade">
        <div class="py-8 space-y-4" v-if="show">
            <TaskCard
            v-for="task of user.tasks"
            :comment="true"
            :key="task.id"
            :task="task"/>
        </div>
    </transition>
    </div>
</template>

<script>
import CardBase from './Parts/CardBase'
import CardTitle from './Parts/CardTitle'
import TaskCard from './TaskCard'
import SimpleIcon from './Parts/SimpleIcon'


export default {
    name: 'UserCard',
    props: {
        user: Object,
    },
    components: {
        CardBase,
        CardTitle,
        TaskCard,
        SimpleIcon
    },
    data () {
        return {
            show: false,
        }
    },
}
</script>

<style>
.fade-enter-active, .fade-leave-active {
  transition: all .3s ease;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>
