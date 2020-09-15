<template>
    <app-layout>
        <div class="p-8 space-y-4">
            <h2>Create a new Task</h2>
            <div class="p-4 bg-white shadow-md">

            <form @submit.prevent="submitted()" class="space-y-4">
                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="name" value="Task Name" />
                    <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                </div>

                <!-- Due -->
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="due" value="Due Date" />
                    <jet-input id="due" type="date" class="mt-1 block w-full" v-model="form.due" autocomplete="due" />
                </div>

                <!-- Site -->
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="site" value="Project" />
                    <select name="site" id="site" v-model="form.site" class="mt-1 block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-3 px-4 pr-8 focus:bg-white focus:border-gray-500">
                        <option>Choose one...</option>
                        <option v-for="project in $page.global.projectinfo" :value="project.id" :key="project.id">{{project.name}}</option>
                    </select>
                </div>

                <!-- Comment -->
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="comment" value="Comment" />
                    <jet-text-area id="comment" class="mt-1 block w-full" v-model="form.comment" autocomplete="comment" placeholder="Information or instructions about the task..."/>
                </div>

                <!-- Words -->
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="words" value="Words" />
                    <jet-input id="words" type="text" class="mt-1 block w-full" v-model="form.words" autocomplete="words" />
                </div>

                <!-- Type -->
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="type" value="Task Type"/>
                    <jet-input id="type" type="text" class="mt-1 block w-full" v-model="form.type" autocomplete="type" placeholder="Blog Content"/>
                </div>

                <!-- Form Actions -->
                <div class="pt-4">
                <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                    Created.
                </jet-action-message>
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Create
                </jet-button>
                </div>

            </form>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout'
import JetButton from './../../Jetstream/Button'
import JetActionMessage from './../../Jetstream/ActionMessage'
import JetInput from './../../Jetstream/Input'
import JetTextArea from './../../Jetstream/TextArea'
import JetLabel from './../../Jetstream/Label'

export default {
    components: {
        AppLayout,
        JetActionMessage,
        JetButton,
        JetInput,
        JetTextArea,
        JetLabel,
    },
    data() {
        return {
            form: {
                name: null,
                priority: 10,
                due: null,
                site: null,
                type: null,
                words: null,
                is__client: 1,
                progress: 'Not Picked Up',
                comment: null,
            }
        }
    },
    methods: {
        submitted() {
            this.$inertia.post('/tasks/create', this.form)
        }
    }
}
</script>
