<template>
    <app-layout>
        <div class="m-auto lg:w-5/12 p-8 space-y-4">
            <h2>Projects</h2>

            <ProjectCard 
            v-for="project of projects" 
            :project="project" 
            :key="project.id"/>

        </div>
    </app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout'
import ProjectCard from './../../Components/ProjectCard'

export default {
    components: {
        AppLayout,
        ProjectCard,
    },
    props: {
        projects: Array,
    }
}
</script>
