<script>
import { Pie } from 'vue-chartjs'

export default {
  extends: Pie,
  mounted() {
   this.renderChart({
      labels: ['New: ' + this.$page.totals[0] , 'In Progress: ' + this.$page.totals[1], 'Editing: ' + this.$page.totals[2]], // Reference our new labelsArray
      datasets: [
        {
          label: 'Task Progress',
          backgroundColor: ['#48BB78', '#F6E05E', '#4FD1C5'],
          data: this.$page.totals, // And our new totalsArray
        }
      ],
        options: {
        responsive: true,
        maintainAspectRatio: false
        }
    })
  }
}
</script>
