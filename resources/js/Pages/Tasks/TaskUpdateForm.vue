<template>
    <JetFormSection show="show">
        <template #title>
            <div class="my-auto"  @click.prevent="show = !show">
                Edit Task Details
            </div>
        </template>

        <template #form>
        <div class="flex flex-col gap-y-4 col-span-6">

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="name" value="Name" />
            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
            <jet-input-error :message="form.error('name')" class="mt-2" />
        </div>

        <!-- Comment -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="comment" value="Comment" />
            <jet-text-area id="comment" type="text" class="mt-1 block w-full" v-model="form.comment" autocomplete="comment" />
            <jet-input-error :message="form.error('comment')" class="mt-2" />
        </div>

        <!-- Priority -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="priority" value="Priority" />
            <jet-input id="priority" type="text" class="mt-1 block w-full" v-model="form.priority" autocomplete="priority" />
            <jet-input-error :message="form.error('priority')" class="mt-2" />
        </div>

        <!-- Due -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="due" value="Due" />
            <jet-input id="due" type="date" class="mt-1 block w-full" v-model="form.due" autocomplete="due" />
            <jet-input-error :message="form.error('due')" class="mt-2" />
        </div>

        <!-- User -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="user" value="User" />
            <jet-input id="user" type="text" class="mt-1 block w-full" v-model="form.user" autocomplete="user" />
            <jet-input-error :message="form.error('user')" class="mt-2" />
        </div>

        <!-- Site -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="site" value="Site" />
            <jet-input id="site" type="text" class="mt-1 block w-full" v-model="form.site" autocomplete="site" />
            <jet-input-error :message="form.error('site')" class="mt-2" />
        </div>

        <!-- Type -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="type" value="Type" />
            <jet-input id="type" type="text" class="mt-1 block w-full" v-model="form.type" autocomplete="type" />
            <jet-input-error :message="form.error('type')" class="mt-2" />
        </div>

        <!-- Words -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="words" value="Words" />
            <jet-input id="words" type="text" class="mt-1 block w-full" v-model="form.words" autocomplete="words" />
            <jet-input-error :message="form.error('words')" class="mt-2" />
        </div>

        <!-- Progress -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="progress" value="Progress" />
            <jet-input id="progress" type="text" class="mt-1 block w-full" v-model="form.progress" autocomplete="progress" />
            <jet-input-error :message="form.error('progress')" class="mt-2" />
        </div>

        <!-- Editor -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="editor" value="Editor" />
            <jet-input id="editor" type="text" class="mt-1 block w-full" v-model="form.editor" autocomplete="editor" />
            <jet-input-error :message="form.error('editor')" class="mt-2" />
        </div>


        <!-- Folder -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="folder" value="Folder" />
            <jet-input id="folder" type="text" class="mt-1 block w-full" v-model="form.folder" autocomplete="folder" />
            <jet-input-error :message="form.error('folder')" class="mt-2" />
        </div>

        <!-- Live Link -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="live_link" value="Live link" />
            <jet-input id="live_link" type="text" class="mt-1 block w-full" v-model="form.live_link" autocomplete="live_link" />
            <jet-input-error :message="form.error('live_link')" class="mt-2" />
        </div>

        </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>
            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>
    </JetFormSection>
</template>

<script>
import JetButton from './../../Jetstream/Button'
import JetSecondaryButton from './../../Jetstream/SecondaryButton'
import JetFormSection from './../../Jetstream/FormSection'
import JetActionMessage from './../../Jetstream/ActionMessage'
import JetInput from './../../Jetstream/Input'
import JetTextArea from './../../Jetstream/TextArea'
import JetInputError from './../../Jetstream/InputError'
import JetLabel from './../../Jetstream/Label'

export default {
    name: 'TaskUpdateForm',
    components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetTextArea,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
    },
    data () {
        return {
            form: {
                name: this.$page.task.name,
                priority: this.$page.task.priority,
                due: this.$page.task.due,
                user: this.$page.user.name,
                site: this.$page.task.site,
                type: this.$page.task.type,
                words: this.$page.task.words,
                progress: this.$page.task.progress,
                comment: this.$page.task.comment,
                editor: this.$page.task.edited,
                folder: this.$page.task.folder,
                live_link: this.$page.task.live_link,
                completed: this.$page.task.completed,
                archived: this.$page.task.archived,
            },
        }
    }
}
</script>
