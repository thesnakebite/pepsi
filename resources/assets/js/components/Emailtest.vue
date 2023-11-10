<template>
    <div class="email-test">
        <div class="email-test--content">
          <slot></slot>
          <a17-button :disabled="loading" variant="validate" @click="sendEmailTest">
            <span>Enviar</span>
          </a17-button>
      </div>
    </div>
</template>

<script>
  import { mapState, mapGetters } from 'vuex'
  import { NOTIFICATION } from '@/store/mutations'
  import { globalError } from '@/utils/errors'
  import axios from 'axios'

  export default {
    name: 'A17Emailtest',

    data () {
      return {
        loading: false
      }
    },

    computed: {
      ...mapGetters([
        'fieldValueByName'
      ]),

      ...mapState({
        fields: state => state.form.fields,
        saveUrl: state => state.form.saveUrl

      })
    },

    methods: {
      sendEmailTest () {
        const self = this
        self.loading = true
        console.log(this.fieldValueByName('test_email'))
        axios.post(`${this.saveUrl}/test`, {
          email: this.fieldValueByName('test_email')
        }).then(function (resp) {
          self.loading = false
          self.$store.commit(NOTIFICATION.SET_NOTIF, { message: resp.data.message, variant: resp.data.variant })
        }, function (resp) {
          self.loading = false
          const error = {
            message: 'Test email error.',
            value: resp
          }
          globalError('CONTENT', error)
        })
      }
    }
  }
</script>

<style scoped>

  .email-test .email-test--content {
    display: flex;
    align-items: flex-end;
    width: 30rem;
  }

  .email-test .email-test--content .input {
    flex: 1 1 0%;
  }

  .email-test .email-test--content button {
    height: 45px;
    margin-left: 20px;
  }

</style>
