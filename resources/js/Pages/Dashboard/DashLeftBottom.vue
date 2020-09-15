<template>
    <div class="space-y-8">

        <!-- Users -->
        <div class="space-y-4">
        <h2>Team</h2>
        <UserCard v-for="user of $page.global.userinfo" :key="user.id" :user="user" :tasks="tasks"/>
        </div>

        <!-- Stats Dashboard -->
        <div class="space-y-4">
            <h2>Stats</h2>
            <div class="p-4 h-auto bg-white shadow-md flex">
            <ChartTaskProgress class="m-auto w-1/2" :totals="totals" />
            </div>
        </div>

    </div>
</template>

<script>
import UserCard from './../../Components/UserCard'
import ChartTaskProgress from './../../Components/ChartTaskProgress'

export default {
    components: {
        UserCard,
        ChartTaskProgress,
    },
    props: [
        'tasks',
        'totals'
    ]
}
</script>
