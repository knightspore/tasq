<template>
    <div class="space-y-8">

        <!-- Search & Tasks -->
        <div class="space-y-4">

            <h2>Tasks</h2>
            <SearchBar />
            <TaskTable/>
            <div class="space-y-4 block lg:hidden">
                <TaskCard
                v-for="task of $page.tasks"
                :comment="true"
                :key="task.id"
                :task="task"/>
            </div>

        </div>

    </div>
</template>

<script>
import SearchBar from './../../Components/SearchBar'
import TaskTable from './TaskTable'
import TaskCard from './../../Components/TaskCard'

export default {
    components: {
        SearchBar,
        TaskTable,
        TaskCard,
    },
}
</script>
