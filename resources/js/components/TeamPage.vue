<template>
<div>
    <h1 class="text-center text-3xl mb-4 text-gray-800 font-medium">Team</h1>
    <div class="flex flex-row flex-wrap gap-x-2 gap-y-8 m-auto">
        <UserCard
        v-for="user of users"
        :key="user.id"
        :name="user.name"
        :role="user.role"
        :avatar="user.avatar"
        />
    </div>
</div>
</template>

<script>
import UserCard from './UserCard.vue'
import axios from 'axios'

export default {
    name: 'HomePage',
    components: {
        UserCard
    },
    data () {
        return {
        users: null,
        }
    },
    mounted () {
        axios
        .get('http://10.0.0.12/api/users')
        .then(response => (this.users = response['data']['data']))
    }
}
</script>
