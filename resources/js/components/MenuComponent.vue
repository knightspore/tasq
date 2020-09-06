<template>
<div>
    <div class="md:hidden text-gray-300 bg-gray-900 px-8 py-4 text-xl font-bold flex flex-row">
      <h2 class="flex-1">tasq</h2>
      <div class="h-6 w-6 flex bg-gray-700 rounded-full hover:bg-gray-500 text-gray-900 transition-all duration-150">
          <svg viewBox="0 0 20 20" fill="currentColor" class="user w-4 h-4 m-auto"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
      </div>
    </div>

    <!-- SideBar -->
    <div class=" lg:w-64 bg-gray-800 lg:h-screen lg:fixed" v-if="shown">
        <!--  Top Bar -->
        <div class="hidden md:flex text-gray-300 bg-gray-900 px-8 py-4 text-xl font-bold flex-row">
          <h2 class="flex-1">tasq</h2>
          <div class="h-6 w-6 flex bg-gray-700 rounded-full hover:bg-gray-500 text-gray-900 transition-all duration-150">
              <svg viewBox="0 0 20 20" fill="currentColor" class="user w-4 h-4 m-auto"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
          </div>
        </div>
        <!-- Menu -->
        <div class="px-8 py-4 text-gray-600">
        <div class="flex flex-row justify-between">
            <ul class="router-menu flex flex-col gap-4">
              <li><router-link to="/">Home</router-link></li>
              <li><router-link to="/team">Team</router-link></li>
              <li><router-link to="/projects">Projects</router-link></li>
              <li class="text-green-500">+ Create</li>
            </ul>

            <div @click="$emit('hidemenu')" class="w-6 h-6 flex text-gray-500 m-0 hover:text-gray-700" v-if="shown">
              <svg viewBox="0 0 20 20" fill="currentColor" class="x w-6 h-6 m-auto"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </div>
        </div>

        </div>
    </div>

    <!-- Pseudo Sidebar -->
    <div class="lg:w-64" v-if="shown"></div>
</div>
</template>

<script>
export default {
    name: 'MenuComponent',
    props: [
        'shown'
    ],
}
</script>

<style scoped>
  .router-link-exact-active {
    @apply text-gray-100;
    @apply font-semibold;
  }

  .router-link-active {
    outline: 0 none !important;
    border: 0;
  }
</style>
