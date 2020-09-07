<template>
<div>
    <h1 class="text-center text-3xl mb-4 text-gray-800 font-medium">Projects</h1>
    <div class="flex flex-wrap gap-x-4 gap-y-8 m-auto">
        <ProjectCard
            v-for="project in projects"
            :key="project.id"
            :name="project.name"
            :niche="project.niche"
            :site="project.site"
            :comment="project.comment"
            :logo="project.logo" />
    </div>
</div>
</template>

<script>
import ProjectCard from './ProjectCard.vue'
import axios from 'axios'

export default {
    name: 'ProjectsPage',
    components: {
        ProjectCard
    },
    data () {
        return {
            projects: null,
            shown: false,
            apiUrl: process.env.MIX_API_URL,
        }
    },
    mounted () {
        axios
        .get(apiUrl + '/api/projects')
        .then(response => (this.projects = response['data']['data']))
    }
}
</script>
