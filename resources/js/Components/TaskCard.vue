<template>
  <div class="w-full mx-auto flex flex-col text-left bg-white shadow-md">
      <div class="h-1" :class="this.taskColour"></div>
      <div class="p-6">
      <p class="mb-2 text-sm font-bold text-gray-500" v-if="site">{{site.name}}</p>
        <CardTitle
        :title='task.name'
        :info='task.comment'
        :comment="false"/>
      <div class="mt-4 flex flex-row gap-2">
          <CardTag>{{task.type}}</CardTag>
          <CardTag>{{task.words}}</CardTag>
          <CardTag>Due {{task.due | moment("from")}}</CardTag>
      </div>
      </div>
  </div>
</template>

<script>
import CardTitle from './Parts/CardTitle'
import CardTag from './Parts/CardTag'

export default {
  name: 'TaskCard',
  components: {
      CardTitle,
      CardTag
  },
  props: {
    task: Object,
    comment: Boolean,
    site: Object,
  },
  data () {
      return {
          taskColour: '',
      }
  },
  mounted () {
      if (this.task.progress === 'Not Picked Up') {
          this.taskColour = 'bg-green-400';
      } else if (this.task.progress === 'WIP') {
          this.taskColour = 'bg-yellow-200';
      } else {
          this.taskColour = 'bg-blue-300';
      };
  }
}
</script>
