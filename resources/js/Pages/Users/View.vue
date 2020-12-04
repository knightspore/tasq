<template>
    <app-layout>
        <div class="m-auto lg:w-5/12 p-8 space-y-4">
            <UserCard :user="user" :tasks="userTasks" forceshow="true"/>
            <div class="bg-white p-4 text-sm space-y-2 shadow-md">
                <p class="text-light"><strong class="pr-2">Email:</strong> {{user.email}}</p>
                <p class="text-light"><strong class="pr-2">Role:</strong> {{user.role}}</p>
                <p class="text-light"><strong class="pr-2">Personal Link:</strong> {{user.personallink}}</p>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout'
import UserCard from './../../Components/UserCard'

export default {
    name: 'View',
    components: {
        AppLayout,
        UserCard
    },
    props: {
        user: Object,
        userTasks: Array,
    }
}
</script>
