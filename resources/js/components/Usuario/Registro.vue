<template>
  <Layout></Layout>
  <div class="row justify-content-md-center">
  <div class="col-lg-5" style="margin-left:auto;position: fixed; top: 20%; z-index: 99;"> 
  <b-form @submit="registrarse" @reset="onReset" v-if="show">
      <b-form-group
        id="input-group-1"
        label="Email address:"
        label-for="input-1"
        description="We'll never share your email with anyone else."
      >
        <b-form-input
          id="input-1"
          v-model="form.email"
          type="email"
          placeholder="Enter email"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Your nombre:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.nombre"
          placeholder="Enter nombre"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-4" v-slot="{ ariaDescribedby }">
        <b-form-checkbox-group
          v-model="form.checked"
          id="checkboxes-4"
          :aria-describedby="ariaDescribedby"
        >
          <b-form-checkbox value="me">Check me out</b-form-checkbox>
        </b-form-checkbox-group>
      </b-form-group>

      <b-form-group id="input-group-4">
          <b-form-input
            id="input-3"
            v-model="form.password"
            placeholder="Entre password XD"
            type="password"
            required
          ></b-form-input>

          <b-form-input
            id="input-4"
            v-model="form.password_confirmation"
            placeholder="Entre password XD x2"
            type="password"
            required
          ></b-form-input>
      </b-form-group>

      <b-button type="submit" variant="primary">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>
  </div>
</div>
</template>
<script>
import Layout from "../Layouts/AppDashboardLayout"
  export default {
    components: {
      Layout,
    },
    data() {
      return {
        form: {
          email: '',
          nombre: '',
          checked: [],
          password: '',
          password_confirmation: '',
        },
        show: true
      }
    },
    methods: {
      registrarse: function(event) {
        event.preventDefault()
        console.log(this.form);
        axios.post('register', this.form)
        .then(response => {console.log(response)})
        .catch(error=>{
                console.log(error.response)
        })
      },
      onReset(event) {
        event.preventDefault()
        this.form.email = ''
        this.form.nombre = ''
        this.form.checked = []
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    }
  }
</script>