<template>
  <div class="row employeeRow" @click="hrefToEmployee">
    <div class="col-md-4">{{employee.surname}}</div>
    <div class="col-md-4">{{employee.name}}</div>
    <div class="col-md-4">{{employee.patronymic}}</div>

  </div>
</template>

<script>
export default {
  props:['employee'],
  methods:{
    hrefToEmployee(){
      window.location.href = this.$store.state.host+"/employee/"+this.employee.id;
    }
  }
}
</script>

<style>
.employeeRow{
  padding: 6px 0px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.2s;
}
.employeeRow:hover{
  background: rgb(170, 224, 245);
}
</style>