<template>
    <app-layout>
        <div class="m-auto flex flex-col justify-center lg:flex-row p-8 gap-x-8">

            <!-- Left (Bottom Mobile) -->
            <div class="lg:w-1/3 mb-8">
                <DashLeftBottom :tasks="tasks" :totals="totals"/>
            </div>

            <!-- Tasks (Top Mobile) -->
            <div class="lg:w-auto mb-8">
                <DashRightTop :tasks="tasks"/>
            </div>

        </div>
    </app-layout>
</template>

<script>
import AppLayout from './../Layouts/AppLayout'
import DashLeftBottom from './Dashboard/DashLeftBottom'
import DashRightTop from './Dashboard/DashRightTop'

export default {
    components: {
        AppLayout,
        DashLeftBottom,
        DashRightTop,
    },
    props: {
        tasks: Object,
        totals: Array,
    },
}
</script>
