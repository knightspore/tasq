<template>
<div class="flex flex-col lg:flex-row h-screen overflow-y-hidden">

  <!-- Sidebar / Menu -->
  <transition name="slide">
    <MenuComponent :shown="shown" v-on:hidemenu="shown = false" />
  </transition>

  <!-- Main Window -->
  <div class="flex-1 p-8">
    <div class="w-full">

        <!-- Menu Open / Close -->
        <div @click="shown = true" class="w-8 h-8 flex inset-0 text-gray-500 m-auto lg:m-0 hover:text-gray-700 transform -translate-y-1/2" v-if="!shown">
          <svg viewBox="0 0 20 20" fill="currentColor" class="menu w-6 h-6 m-auto"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </div>

       <!-- Main View -->
       <div class="overflow-auto h-screen px-1">
          <div class="pb-48">
            <router-view />
          </div>
       </div>
    </div>
  </div>

</div>
</template>

<script>
import MenuComponent from './components/MenuComponent.vue'
import HomePage from './components/HomePage.vue'
import TeamPage from './components/TeamPage.vue'

export default {
  name: 'App',
  components: {
    MenuComponent,
    HomePage,
    TeamPage,
  },
  data () {
    return {
      shown: true
    }
  }
}
</script>
