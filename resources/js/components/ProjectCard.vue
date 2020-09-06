<template>
<div>
    <div class="w-full bg-white shadow-md lg:max-w-lg mb-4 flex flex-row">
        <div class="flex flex-col px-5 py-6 w-full">

            <div class="flex gap-5">

                <div class="image w-24 h-24 flex bg-gray-200 rounded-full">
                    <img class="m-auto rounded-full shadow-sm" :src="logo" alt="">
                </div>
                <div class="w-auto my-auto">
                    <h3 class="font-bold flex text-gray-800">
                        <a class="text-xl lg:text-2xl  transition-colors duration-150">{{name}}</a>
                    </h3>
                    <span class="text-sm font-semibold text-blue-500 mb-1">{{niche}}</span>
                    <p class="text-sm text-gray-500 font-bold mb-4">{{site}}</p>
                </div>

            </div>

            <div @click="toggleInfo()" class="w-6 h-6 mx-auto text-gray-500 hover:text-gray-700 transition-color duration-150">
                <svg v-if="!info" viewBox="0 0 20 20" class=" fill-current plus w-6 h-6 m-auto"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                <svg v-if="info" viewBox="0 0 20 20" class=" fill-current plus w-6 h-6 m-auto"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
            </div>

            <div v-if="info" class="m-2">
                <p class="text-gray-700">{{comment}}</p>
            </div>

        </div>
    </div>
</div>
</template>

<script>
export default {
    name: 'ProjectCard',
    props: [
        'name',
        'niche',
        'site',
        'comment',
        'logo'
    ],
    data () {
        return {
            info: false
        }
    },
    methods: {
        toggleInfo: function () {
            if (this.info === false) {
                this.info = true
            } else {
                this.info = false
            };
        }
    }
}
</script>

<style>

</style>
