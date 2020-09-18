<template>
    <CardBase>
        <CardTitle 
        :title='project.name'
        :info='project.site'
        :comment="true"/>

        <div class="flex font-bold text-gray-700">
            <div class="w-1/3">
                <h3 class="text-2xl">23</h3>
                <p class="text-xs uppercase">New tasks</p>
            </div>
            <div class="w-1/3">
                <h3 class="text-2xl">12</h3>
                <p class="text-xs uppercase">In progress</p>            
            </div>
            <div class="w-1/3">

            </div>
        </div>
    </CardBase>
</template>

<script>
import CardBase from './Parts/CardBase'
import CardTitle from './Parts/CardTitle'
import SimpleIcon from './Parts/SimpleIcon'

export default {
    props: [
        'project'
    ],
    components: {
        CardBase,
        CardTitle,
        SimpleIcon,
    },
    data () {
        return {
            show: false,
            projecttasks: [],
        }
    },
}
</script>