<template>
    <div>
    <div class="w-full h-auto bg-white flex flex-row shadow-md m-auto">

        <CardStatusStripe status="etc"/>

        <div class="p-2 w-full flex">
            <div class="mr-2 image flex w-12 h-12 bg-gray-200 rounded-full">
                <img class="m-auto w-18 h-18 rounded-full" :src="user.profile_photo_url" :alt="user.name + ' profile picture.'"/>
            </div>

            <a class="flex" :href="'/user/' + user.id">
                <CardTitle
                class="m-auto text-lg"
                :title='user.name'
                :comment="false"/>
            </a>

            <div class="flex-1 flex justify-end gap-2">
                <div v-if="!show" @click.prevent="show = !show" class="my-auto h-6 text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                </div>
                <div v-if="show" @click.prevent="show = !show" class="my-auto h-6 text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                </div>
                <div class="my-auto h-6 text-gray-500 hover:text-gray-700">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="globe-alt w-6 h-6"><path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd"></path></svg>
                </div>
                <div class="my-auto h-6 text-gray-500 hover:text-gray-700">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="mail w-6 h-6"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="p-2 shadow-inner bg-gray-300" v-if="show">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto quae ut magni earum quia dolore! Blanditiis fugiat quia provident reiciendis harum illo error ipsam consequuntur. Incidunt quod quisquam assumenda quis.</p>
    </div>
    </div>
</template>

<script>
import CardStatusStripe from './Parts/CardStatusStripe'
import CardTitle from './Parts/CardTitle'


export default {
    name: 'UserCard',
    props: {
        user: Object
    },
    components: {
        CardTitle,
        CardStatusStripe
    },
    data () {
        return {
            show: false,
        }
    }
}
</script>

<style>
.fade-enter-active {
  animation: fade .5s ease-in;
}
.fade-leave-active {
  animation: fade .5s ease-out reverse;
}
@keyframes fade {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
</style>
