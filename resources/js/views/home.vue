<template>
  <div>
    <pre>{{series}}</pre>
    <pre>{{chartOptions}}</pre>
    <VueApexCharts
      slot-scope=""
      type="bar"
      height="350"
      :options="chartOptions"
      :series="series"
    ></VueApexCharts>
  </div>
</template>

<script>
import VueApexCharts from "vue-apexcharts";
export default {
  components: {
    VueApexCharts,
  },
  data() {
    return {
      series: [
        {
          name: "Categoria",
          data: [],
        },
      ],

      chartOptions: {

        annotations: {
          points: [
            {
              x: "Bananas",
              seriesIndex: 0,
              label: {
                borderColor: "#775DD0",
                offsetY: 0,
                style: {
                  color: "#fff",
                  background: "#775DD0",
                },
                text: "Bananas are good",
              },
            },
          ],
        },
        chart: {
          height: 350,
          type: "bar",
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            columnWidth: "50%",
          },
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          width: 2,
        },

        grid: {
          row: {
            colors: ["#fff", "#f2f2f2"],
          },
        },
        xaxis: {
          labels: {
            rotate: -45,
          },
          categories: [],
          tickPlacement: "on",
        },
        yaxis: {
          title: {
            text: "Servings",
          },
        },
        fill: {
          type: "gradient",
          gradient: {
            shade: "light",
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 0.85,
            opacityTo: 0.85,
            stops: [50, 0, 100],
          },
        },
      },
    };
  },
  mounted() {
    this.grafico();
  },
  methods: {
    grafico() {
      //clientes-records
      let me = this;
      let url = "/grafico";
      axios({
        method: "GET",
        url: url,
      })
        .then(function (response) {
          console.log(response);
          if (response.data.status == 200) {
            let result =response.data.result;
            result.forEach(element => {
                me.chartOptions.xaxis.categories.push(element.descripcion);
                me.series[0].data.push(element.cantidad)
            });
                
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style>
</style>