<template>
    <div>
        <h3 class="font-bold ">
          <a class="text-xl hover:text-gray-600 transition-colors duration-150" :href="link">{{title}}</a>
        </h3>
      <p v-if='comment' class="text-sm text-gray-700 flex-1">{{info}}</p>
    </div>
</template>

<script>
export default {
    name: 'CardTitle',
    props: [
        'title',
        'info',
        'link',
        'comment'
    ]
}
</script>
