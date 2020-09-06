<template>
    <div>
        <h1 class="text-center text-3xl mb-4 text-gray-800 font-medium">Home</h1>
        <div class="flex flex-row flex-wrap gap-x-2 gap-y-8 m-auto">
            <TaskCard
            v-for="task of tasks"
            :key="task.id"
            :progress="task.progress"
            :site="task.site"
            :title="task.name"
            :comment="task.comment"
            :type="task.type"
            :words="task.words"
            :due="task.due"/>
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
        }
    },
    mounted () {
        axios
        .get('http://10.0.0.12/api/tasks')
        .then(response => (this.tasks = response['data']['data']))

        console.log(this.tasks);
    }
}
</script>
