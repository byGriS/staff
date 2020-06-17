<template>
  <nav class="headerWrap navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" :href="host">Staff</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav ml-auto">
          <li class="d-flex align-items-center">
            <a :href="host + '/employee/create'" class="btn btn-info btn-sm">Добавить сотрудника</a>
          </li>
          <li class="nav-item dropdown">
            <a
              id="navbarDropdown"
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              
            >
              {{ userName }}
              <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a
                class="dropdown-item"
                :href="hrefLogout"
                onclick="event.preventDefault();localStorage.removeItem('token');document.getElementById('logout-form').submit();"
              >Выход</a>

              <form id="logout-form" :action="hrefLogout" method="POST" style="display: none;">
                <input type="hidden" name="_token" :value="csrftoken" />
              </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  props: ['csrftoken', 'userName', 'hrefLogout'],
  computed:{
    host(){
      return this.$store.state.host;
    }
  },
  mounted() {
  }
}
</script>

<style>
.headerWrap{
  margin-bottom: 10px;
}
</style>