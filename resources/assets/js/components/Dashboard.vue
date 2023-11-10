<template>
  <div class="dashboard-master">
    <div class="dashboard-header">
      <div class="dashboard-header__left">
        <h2 class="dashboard-header-title">
         {{name}}
        </h2>
        <div class="dashboard-header__subtitle">
          <div class="dashboard-header_items first-item">
            <svg class="dashboard-header__icons" x-description="Heroicon name: solid/calendar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
            </svg>
              Del {{dates.start}} al {{dates.end}}
          </div>
          <div class="dashboard-header_items">
            <svg xmlns="http://www.w3.org/2000/svg" class="dashboard-header__icons" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{dates.doneDays}} días de promoción. Quedan {{dates.pendingDays}} día(s).
          </div>
        </div>
      </div>
    </div>
    <div
      :class="`mb-50 grid grid-cols-12 gap-x-2 gap-y-0 lg:gap-x-${schema.columns.gap} lg:gap-y-${schema.columns.gap}`">
       <template v-if="showCharts">
          <a17-chart
          v-for="(chart, index) in schema.charts.sparklines"
          :key="'chart-'+ index"
          :columns="chart.columns"
          :md-columns="chart.mdColumns"
          :lg-columns="chart.lgColumns"
          :xl-columns="chart.xlColumns"
          :chart="chart.chart"
        />
       </template>
    </div>
    <div
      :class="`grid grid-cols-${schema.columns.field} gap-x-2 gap-y-0 lg:gap-x-${schema.columns.gap} lg:gap-y-${schema.columns.gap}`">
      <template v-if="showCharts">
        <a17-chart
          v-for="(chart, index) in schema.charts.default"
          :key="'chart-'+ index"
          :columns="chart.columns"
          :md-columns="chart.mdColumns"
          :xl-columns="chart.xlColumns"
          :chart="chart.chart"
        />
      </template>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'A17Dashboard',
    props: [
      'schema',
      'name',
      'dates'
    ],
    data () {
      return {
        showCharts: false
      }
    },
    mounted () {
      // create css styles
      var css = document.createElement('style')
      css.setAttributeNode(document.createAttribute('scopped'))
      var styles =
        `.dashboard-header {
          justify-content: space-between;
          align-items: center;
          display: flex;
          margin-bottom: 20px; 
        }

        .dashboard-header__left {
          flex: 1 1 0%;
          min-width: 0;
        }

        .dashboard-header__right {
          margin-top: 0;
          margin-left: 1rem;
          display: flex;
        }

        .dashboard-header-title {
          font-size: 1.5rem;
          line-height: 2.25rem;

          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap;

          --tw-text-opacity: 1;
          color: rgba(17,24,39,var(--tw-text-opacity));
          font-weight: 700;
        }

        .dashboard-header__subtitle {
          flex-wrap: wrap;
          flex-direction: row;
          margin-top: 0;
        }

        .dashboard-header_items {
          --tw-text-opacity: 1;
          color: rgba(107,114,128,var(--tw-text-opacity));
          font-size: 0.75rem;
          line-height: 1.25rem;
          margin-right: 25px;
          margin-top: 0.5rem;
          align-items: center;
          display: flex;
        }

        .dashboard-header__icons {
          width: 1.25rem;
          height: 1.25rem;
          margin-right: 0.35rem;
          --tw-text-opacity: 1;
          color: rgba(156,163,175,var(--tw-text-opacity));
          flex-shrink: 0;
        }

        .chart-box {
          max-height: 444px;
          box-shadow: 0px 1px 22px -12px #607D8B;
          background-color: #fff;
          padding: 25px 10px 25px 10px;
          height: 100%;
        }

        .sparkboxes.chart-box {
          padding: 25px 0 0;
          margin: 0;
          position: relative;
        }

        .mb-10 {
          margin-bottom: 10px;
        }

        .mb-30 {
          margin-bottom: 30px;
        }

        .mb-50 {
          margin-bottom: 50px;
        }

        .gap-y-4 {
          row-gap: 1rem;
        }

        .gap-x-0 {
          -moz-column-gap: 0;
          column-gap: 0;
        }

        .gap-x-1 {
          -moz-column-gap: 0.25rem;
          column-gap: 0.25rem;
        }

        .gap-x-2 {
          -moz-column-gap: 0.5rem;
          column-gap: 0.5rem;
        }

        .grid-cols-12 {
          grid-template-columns: repeat(12,minmax(0,1fr));
        }

        .grid {
            display: grid;
        }

        .col-span-3 {
          grid-column: span 3/span 3;
        }

        .col-span-4 {
          grid-column: span 4/span 4;
        }

        .col-span-6 {
          grid-column: span 6/span 6;
        }

        .col-span-12 {
          grid-column: span 12/span 12;
        }

        .col-start-1 {
          grid-column-start: 1;
        }

        @media (min-width: 640px) {
          .sm\\:gap-y-4 {
              row-gap: 1rem;
          }

          .sm\\:gap-x-4{
            -moz-column-gap:1rem;
            column-gap:1rem
          }
        }

         @media (min-width:768px) {
  
          .md\\:col-span-3 {
            grid-column:span 3/span 3
          }

          .md\\:col-span-4 {
            grid-column:span 4/span 4
          }

          .md\\:col-span-6 {
            grid-column:span 6/span 6
          }

          .md\\:col-span-12 {
            grid-column:span 12/span 12
          }

          .md\\:col-start-2 {
            grid-column-start:2
          }

          .md\\:col-start-4 {
            grid-column-start:4
          }

          .md\\:col-end-2 {
            grid-column-end:2
          }

          .md\\:col-end-4 {
            grid-column-end:4
          }
        }

        @media (min-width: 1024px) {
          .dashboard-header__subtitle {
            display: flex;
          }

          .dashboard-header-title {
            font-size: 1.875rem;
          }

          .dashboard-header_items {
            font-size: 0.875rem;
          }

          .chart-box {
            padding: 25px 35px 25px 30px;
          }

          .lg\\:gap-y-4 {
              row-gap: 1rem;
          }

          .lg\\:gap-x-4{
            -moz-column-gap:1rem;
            column-gap:1rem
          }

          .lg\\:gap-y-5 {
              row-gap: 1.25rem;
          }

          .lg\\:gap-x-5{
            -moz-column-gap:1.25rem;
            column-gap:1.25rem
          }

          .lg\\:gap-y-6 {
              row-gap: 1.5rem;
          }

          .lg\\:gap-x-6 {
            -moz-column-gap:1rem;
            column-gap:1.5rem
          }

          .lg\\:gap-y-8 {
              row-gap: 2rem;
          }

          .lg\\:gap-x-8 {
            -moz-column-gap:2rem;
            column-gap:2rem
          }

          .lg\\:col-span-3 {
            grid-column:span 3/span 3
          }

          .lg\\:col-span-4 {
            grid-column:span 4/span 4
          }

          .lg\\:col-span-6 {
            grid-column:span 6/span 6
          }

          .lg\\:col-span-12 {
            grid-column:span 12/span 12
          }
        }

        @media (min-width:1280px) {
        
          .xl\\:col-span-3 {
            grid-column:span 3/span 3
          }

          .xl\\:col-span-4 {
            grid-column:span 4/span 4
          }

          .xl\\:col-span-6 {
            grid-column:span 6/span 6
          }

          .xl\\:col-span-12 {
            grid-column:span 12/span 12
          }

          .xl\\:col-start-2 {
            grid-column-start:2
          }

          .xl\\:col-start-4 {
            grid-column-start:4
          }

          .xl\\:col-end-2 {
            grid-column-end:2
          }

          .xl\\:col-end-4 {
            grid-column-end:4
          }
        }`

      css.appendChild(document.createTextNode(styles))
      this.$el.appendChild(css)
      this.showCharts = true
    }
  }
</script>
