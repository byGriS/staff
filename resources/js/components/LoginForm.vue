<template>
  <div class="container login-container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 login-form-1">
        <h3>Вход</h3>
        <form method="POST" :action="hrefLogin" @submit="sendForm">
          <input type="hidden" name="_token" :value="csrftoken" />
          <input type="hidden" name="remember" value="" >
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              :class="{'is-invalid' : emailIsError}"
              name="email"
              placeholder="Логин"
              required
              autocomplete="email"
              autofocus
              v-model="inputEmail"
            />
            <span class="invalid-feedback" role="alert" v-if="emailIsError">
              <strong>{{ emailErrorText }}</strong>
            </span>
          </div>
          <div class="form-group">
            <input
              type="password"
              class="form-control"
              name="password"
              placeholder="Пароль"
              value
              required
              v-model="inputPass"
            />
          </div>
          <div class="form-group">
            <input type="submit" class="btnSubmit" value="Войти" />
          </div>
          <!--<div class="form-group">
            <a :href="hrefPassRequest" class="ForgetPwd">Забыли пароль?</a>
          </div>-->
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['csrftoken', 'hrefLogin', 'hrefPassRequest', 'old', 'errors'],
  data() {
    return {
      emailIsError: false,
      emailErrorText: '',
      passwordIsError: false,
      passwordErrorText: '',
      inputEmail: '',
      inputPass: ''
    }
  },
  methods: {
    sendForm(e) {
      localStorage.removeItem('token');
      this.$http
        .post('/api/login', {
          'email': this.inputEmail,
          'password': this.inputPass
        })
        .then(function (response) {
          console.log(response);
          localStorage.setItem('token', response.data.access_token);
          return true;
        })
       // e.preventDefault();
      
    }
  },
  mounted() {
    if (this.old.email) {
      this.inputEmail = this.old.email;
      this.emailErrorText = this.errors[0];
      this.emailIsError = true;
    }
  }
}
</script>