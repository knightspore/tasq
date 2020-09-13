<template>
  <div class="w-full mx-auto flex flex-col text-left bg-white shadow-md">
      <CardStatusStripe :status="task.progress"/>
      <div class="p-6">
      <p class="mb-2 text-sm font-bold text-gray-500" v-if="site">{{site.name}}</p>
      <a :href="'/tasks/' + task.id + '/view/'">
        <CardTitle
        :title='task.name'
        :info='task.comment'
        :comment="comment"/>
      </a>
      <div class="mt-4 flex flex-row gap-2">
          <CardTag>{{task.type}}</CardTag>
          <CardTag>{{task.words}}</CardTag>
          <CardTag>Due {{task.due | moment("from")}}</CardTag>
      </div>
      </div>
  </div>
</template>

<script>
import CardStatusStripe from './Parts/CardStatusStripe'
import CardTitle from './Parts/CardTitle'
import CardTag from './Parts/CardTag'

export default {
  name: 'TaskCard',
  components: {
      CardStatusStripe,
      CardTitle,
      CardTag
  },
  props: {
    task: Object,
    comment: Boolean,
    site: Object,
  },
}
</script>
