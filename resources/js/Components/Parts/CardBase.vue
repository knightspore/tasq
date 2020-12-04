<template>
    <div class="z-0 w-full mx-auto flex flex-col text-left bg-white shadow-md rounded">
      <CardStatusStripe :status="status"/>
      <div class="p-6">

        <slot/>

      </div>
  </div>
</template>

<script>
import CardStatusStripe from './../Parts/CardStatusStripe'
export default {
    components: {
        CardStatusStripe,
    },
    props: [
        'status'
    ]
}
</script>
