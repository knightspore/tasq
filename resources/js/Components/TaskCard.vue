<template>
    <CardBase :status="task.progress">
        <p class="mb-2 text-sm font-bold text-gray-500">{{$page.global.projectinfo[task.site-1].name}}</p>

        <a :href="'/tasks/' + task.id + '/view/'">
            <CardTitle
            :title='task.name'
            :info='task.comment'
            :comment="comment"/>
        </a>

        <div class="mt-4 flex flex-row flex-wrap justify-left gap-2">
            <CardTag v-if="task.user">{{$page.global.userinfo[task.user-1].name}}</CardTag>
            <CardTag v-if="task.editor">{{$page.global.userinfo[task.editor-1].name}}</CardTag>
            <CardTag>{{task.progress}}</CardTag>
            <CardTag>{{task.type}}</CardTag>
            <CardTag>{{task.due | moment('Do MMM YY')}}</CardTag>
        </div>
    </CardBase>
</template>

<script>
import CardBase from './Parts/CardBase'
import CardTitle from './Parts/CardTitle'
import CardTag from './Parts/CardTag'

export default {
  name: 'TaskCard',
  components: {
      CardBase,
      CardTitle,
      CardTag
  },
  props: {
    task: Object,
    comment: Boolean,
  },
}
</script>
