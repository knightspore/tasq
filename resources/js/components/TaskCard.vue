<template>
  <div class="w-full lg:max-w-lg bg-white flex flex-col shadow-md mx-auto">
      <div v-if="progress === 'Not Picked Up'" class="h-1 bg-green-500"></div>
      <div v-if="progress === 'WIP'" class="h-1 bg-yellow-300"></div>
      <div v-if="progress !== 'Not Picked Up' && progress !== 'WIP'" class="h-1 bg-blue-500"></div>
      <div class="p-6">
      <p class="text-sm text-gray-500 font-bold">{{site}}</p>
      <h3 class="font-bold pb-4 pt-2">
          <a class="text-2xl text-gray-900 hover:text-gray-600 transition-colors duration-150">{{title}}</a>
      </h3>
      <p class="text-gray-800 flex-1">{{comment}}</p>
      <div class="mt-2 flex flex-row gap-2">
          <span class="pt-2 font-semibold text-gray-500 text-xs w-auto">{{type}}</span>
          <span class="pt-2 font-semibold text-gray-500 text-xs w-auto">{{words}} Words</span>
          <span class="pt-2 font-semibold text-gray-500 text-xs w-auto">Due {{ due }}</span>
      </div>
      </div>
  </div>
</template>
 
<script>

export default {
  name: 'TaskCard',
  props: [
    'site',
    'title',
    'comment',
    'type',
    'words',
    'progress',
    'due'
  ],
}
</script>
