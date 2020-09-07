<template>
    <div>
        <h1 class="text-center text-3xl mb-4 text-gray-800 font-medium">Home</h1>
        <div>
            <!-- <TaskCard
            v-for="task of tasks"
            :key="task.id"
            :progress="task.progress"
            :site="task.site"
            :title="task.name"
            :comment="task.comment"
            :type="task.type"
            :words="task.words"
            :due="task.due"/> -->

        <table id="tasqTable" class="order-table table w-full table-auto lg:m-auto text-xl">
            <thead class="mb-4 bg-gray-100 shadow-sm text-gray-800">
                <tr>
                    <th class="bg-gray-100">Priority</th>
                    <th>Due</th>
                    <th>User</th>
                    <th>Site</th>
                    <th>Name</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody class="text-center text-xl">
                <tr v-for="task in tasks" :key="task.id">
                    <td class="bg-gray-100">{{task.priority}}</td>
                    <td>{{task.due}}</td>

                    <td v-if="task.user">{{task.user["name"]}}</td>
                    <td v-else></td>

                    <td>{{task.site}}</td>
                    <td class="text-left">{{task.name}} <span class="text-gray-600 text-md">| {{task.type}}</span></td>
                    <td>{{task.editor}}</td>
                </tr>
            </tbody>
        </table>

        </div>
    </div>
</template>

<script>
import TaskCard from './TaskCard.vue'
import axios from 'axios'

export default {
    name: 'HomePage',
    components: {
        TaskCard
    },
    data () {
        return {
        tasks: null,
        loading: true,
        }
    },
    mounted () {
        axios
        .get('/api/tasks')
        .then(response => (this.tasks = response.data.data))
    }
}
</script>

<style scoped>
th, td {
    @apply py-4;
}
</style>
