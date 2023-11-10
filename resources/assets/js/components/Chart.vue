<template>
    <div :class="`col-span-${columnsComputed} col-start-0 md:col-span-${mdColumnsComputed} md:col-start-0 lg:col-span-${lgColumnsComputed} lg:col-start-0 xl:col-span-${xlColumnsComputed} xl:col-start-${columnsStart}`">
      <div class="chart-box" :class="{sparkboxes: chart.chart.sparkline.enabled}">
        <div ref="chart"></div>
      </div>
    <slot></slot>
  </div>
</template>

<script>
  import ApexCharts from 'apexcharts'

  export default {
    name: 'A17Chart',
    props: {
      chart: {
        type: [Object, Array]
      },
      columns: {
        type: Number
      },
      mdColumns: {
        type: [Number, Boolean]
      },
      lgColumns: {
        type: [Number, Boolean]
      },
      xlColumns: {
        type: [Number, Boolean]
      },
      columnsStart: {
        type: Number,
        default: 0
      }
    },
    computed: {
      xlColumnsComputed () {
        return this.xlColumns ? this.xlColumns : this.lgColumnsComputed
      },
      lgColumnsComputed () {
        return this.lgColumns ? this.lgColumns : this.mdColumnsComputed
      },
      mdColumnsComputed () {
        return this.mdColumns ? this.mdColumns : this.columns
      },
      columnsComputed () {
        return this.columns ? this.columns : 12
      }
    },

    methods: {
      resize () {
        if (this.schema.chart.type === 'donut') {
          this.mobileDonut()
        }

        if (!this.schema.chart.sparkline.enabled) {
          this.mobileGeneral()
        }
      },

      mobileGeneral () {
        if (window.innerWidth < 768) {
          this.apexChart.updateOptions({
            title: {
              style: {
                fontSize: '12px'
              }
            },
            chart: {
              toolbar: {
                show: false
              }
            }
          })
        } else {
          this.apexChart.updateOptions({
            title: {
              style: {
                fontSize: '18px'
              }
            },
            chart: {
              toolbar: {
                show: true
              }
            }
          })
        }
      },

      mobileDonut () {
        if (window.innerWidth < 768) {
          this.apexChart.updateOptions({
            dataLabels: {
              enabled: true,
              style: {
                fontSize: '8px'
              }
            },
            plotOptions: {
              pie: {
                offsetY: 80,
                customScale: 1.5,
                donut: {
                  size: '60%'
                }
              }
            },
            legend: {
              position: 'top',
              offsetY: 30
            }
          }, false, false)
        } else {
          this.apexChart.updateOptions({
            dataLabels: {
              enabled: true,
              style: {
                fontSize: '12px'
              }
            },
            plotOptions: {
              pie: {
                customScale: 1,
                offsetY: 20,
                donut: {
                  size: '60%'
                }
              }
            },
            legend: {
              position: 'left',
              offsetY: 50
            }
          }, false, false)
        }
      }
    },

    data () {
      return {
        schema: '',
        apexChart: null,
        chartLocaleEs: {
          name: 'es',
          options: {
            months: [
              'Enero',
              'Febrero',
              'Marzo',
              'Abril',
              'Mayo',
              'Junio',
              'Julio',
              'Agosto',
              'Septiembre',
              'Octubre',
              'Noviembre',
              'Diciembre'
            ],
            shortMonths: [
              'Ene',
              'Feb',
              'Mar',
              'Abr',
              'May',
              'Jun',
              'Jul',
              'Ago',
              'Sep',
              'Oct',
              'Nov',
              'Dic'
            ],
            days: [
              'Domingo',
              'Lunes',
              'Martes',
              'Miércoles',
              'Jueves',
              'Viernes',
              'Sábado'
            ],
            shortDays: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
            toolbar: {
              exportToSVG: 'Descargar SVG',
              exportToPNG: 'Descargar PNG',
              exportToCSV: 'Descargar CSV',
              menu: 'Menu',
              selection: 'Seleccionar',
              selectionZoom: 'Seleccionar Zoom',
              zoomIn: 'Aumentar',
              zoomOut: 'Disminuir',
              pan: 'Navegación',
              reset: 'Reiniciar Zoom'
            }
          }
        }
      }
    },

    mounted () {
      this.schema = this.chart
      this.schema.chart.locales = [this.chartLocaleEs]
      this.apexChart = new ApexCharts(this.$refs.chart, this.schema)
      this.apexChart.render()

      if (!this.schema.chart.sparkline.enabled) {
        this.mobileGeneral()
      }

      if (this.schema.chart.type === 'donut') {
        this.mobileDonut()
      }
    },

    created () {
      window.addEventListener('resize', this.resize)
    },

    destroyed () {
      window.removeEventListener('resize', this.resize)
    }

  }
</script>
