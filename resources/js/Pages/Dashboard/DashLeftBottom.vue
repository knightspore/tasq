<template>
    <div class="space-y-8">

        <!-- Users -->
        <div class="space-y-4">
        <h2>Team</h2>
        <UserCard v-for="user of $page.users" :user="user" :key="user.id"/>
        </div>

        <!-- Stats Dashboard -->
        <div class="space-y-4">
            <h2>Stats</h2>
            <div class="p-4 h-auto bg-white shadow-md flex">
            <ChartTaskProgress class="m-auto w-1/2"/>
            </div>
        </div>

    </div>
</template>

<script>
import UserCard from './../../Components/UserCard'
import ChartTaskProgress from './ChartTaskProgress'

export default {
    components: {
        UserCard,
        ChartTaskProgress,
    },
}
</script>
