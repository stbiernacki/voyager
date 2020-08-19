<template>
  <div class="container" style="margin-top: 5%">
    <div class="card">
      <div class="card-header">
        <h1 class="text-center">Film Web Api</h1>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-xs-12 col-md-6 px-5">
            <h2 class="text-center mb-5 pt-5 text-primary">Login</h2>
            <loginForm
                v-on:user-authenticated="onUserAuthenticated"
            ></loginForm>
          </div>
          <div class="col-xs-12 col-md-6 px-5">
            <h2 class="text-center mb-5 pt-5 text-primary">API</h2>
            <p class="text-info">
              You are currently
              <span v-if="user" class="text-info">
                authenticated as:<br>
                <span style="font-size: 1.1em; font-weight: bold">{{ user.username }}</span><br>
                <a href="/logout" class="btn btn-warning btn-sm">⇀ Log out</a>
              </span>
              <span v-else  class="text-info">not authenticated.</span>
            </p>
            <p class="text-info">
              Check out the API Docs: <a v-bind:href="entrypoint" class="text-primary"><u>{{ entrypoint }}</u></a>
            </p>
          </div>
        </div>
      </div>

      <div class="card-footer">
        <p class="text-muted text-center">Author St. Biernacki</p>
      </div>

    </div>
  </div>
</template>

<script>
import axios from 'axios';
import loginForm from './LoginForm';

export default {
  components: {
    loginForm
  },
  props: ['entrypoint'],
  methods: {
    onUserAuthenticated(userUri) {
      axios
          .get(userUri)
          .then(response => (this.user = response.data))
    }
  },
  data() {
    return {
      user: null
    }
  },
  mounted() {
    if (window.user) {
      this.user = window.user;
    }
  }
}
</script>

<style scoped lang="scss">
</style>
