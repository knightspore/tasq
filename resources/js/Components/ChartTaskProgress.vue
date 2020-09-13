<script>
import { Pie } from 'vue-chartjs'

export default {
  extends: Pie,
  props: ['totals'],
  mounted() {
   this.renderChart({
      labels: ['New: ' + this.totals[0] , 'In Progress: ' + this.totals[1], 'Editing: ' + this.totals[2]], // Reference our new labelsArray
      datasets: [
        {
          label: 'Ratio',
          backgroundColor: ['#68D391', '#FEFCBF', '#81E6D9'],
          data: this.totals, // And our new totalsArray
        }
      ]
    })
  }
}
</script>
