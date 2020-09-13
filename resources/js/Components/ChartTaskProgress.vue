<template>
    <div>
        {{ this.chartdata['datasets'][0]['data'] }}
    </div>
</template>

<script>
import { Pie } from 'vue-chartjs'

export default {
  extends: Pie,
  data: () => ({
    chartdata: {
      labels: ['Not Picked Up', 'In Progress', 'Editing'],
      datasets: [
        {
          label: 'Tasks by Status',
          backgroundColor: ['#31c48d', '#fce96a', '#90CDF4'],
          data: [0, 0, 0]
        },
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  }),
  props: [
      'totals'
  ],
  mounted () {
    this.chartdata['datasets']['data'] = totals;
    this.renderChart(this.chartdata, this.options)
  }
}
</script>
