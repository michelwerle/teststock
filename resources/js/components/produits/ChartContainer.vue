<template>
  <div class="container">
    <div class="form-group">
        <router-link to="/" class="btn btn-secondary">Retour</router-link>
    </div>

    <div class="panel">
            <line-chart
            v-if="loaded"
            :chartdata="chartdata"
            :options="options"/>
        </div>
  </div>
</template>

<script>
import LineChart from './Chart.vue'

export default {
  name: 'LineChartContainer',
  components: { LineChart },
  data: () => ({
    loaded: false,
    chartdata: null,
    options : {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                id: 'prix',
                type: 'linear',
                position: 'left',
            }, {
                id: 'quantite',
                type: 'linear',
                position: 'right',
            }],
            xAxes: [{
                type: 'time',
                distribution: 'series',
                bounds:'data',
                time: {
                    parser: 'YYYY-MM-DD HH:mm:SS',
                    minUnit : 'second'
                },
            }]
        }
    },
  }),
  async mounted () {
    let app = this;
    let id = app.$route.params.id;
    app.loaded = false
    axios.get('api/v1/produits/' + id +'/stats')
                .then(function (resp) {
                          app.chartdata = resp.data;
                            app.loaded = true;
                    })
                    .catch(function () {
                        alert("Impossible de charger les statistiques")
                    });

  }
}
</script>
