<template>
  <div>
    <div class="filterWrap">
      <!-- Юр лицо и объект -->
      <div class="row">
        <div class="col-md-6 row">
          <label class="col-sm-4 col-form-label marginVauto">Юр. лицо</label>
          <div class="col-sm-8 marginVauto">
            <input autocomplete="off" class="form-control form-control-sm" v-model="filter.entity" />
          </div>
        </div>
        <div class="col-md-6 row">
          <label class="col-sm-4 col-form-label marginVauto">Объект</label>
          <div class="col-sm-8 marginVauto">
            <input autocomplete="off" class="form-control form-control-sm" v-model="filter.object" />
          </div>
        </div>
      </div>

      <!-- ФИО -->
      <div class="row">
        <div class="col-md-6 row">
          <label class="col-sm-4 col-form-label marginVauto">ФИО</label>
          <div class="col-sm-8 marginVauto">
            <input autocomplete="off" class="form-control form-control-sm" v-model="filter.fio" />
          </div>
        </div>
        <div class="col-md-6 row">
          <label class="col-sm-4 col-form-label marginVauto">Адрес проживания</label>
          <div class="col-sm-8 marginVauto">
            <input autocomplete="off" class="form-control form-control-sm" v-model="filter.address" />
          </div>
        </div>
      </div>

      <!-- учеба работа -->
      <div class="row">
        <div class="col-md-6 row">
          <label class="col-sm-4 col-form-label marginVauto">Образование</label>
          <div class="col-sm-8 marginVauto">
            <input
              autocomplete="off"
              class="form-control form-control-sm"
              v-model="filter.education"
            />
          </div>
        </div>
        <div class="col-md-6 row">
          <label class="col-sm-4 col-form-label marginVauto">Места работы и должности</label>
          <div class="col-sm-8 marginVauto">
            <input autocomplete="off" class="form-control form-control-sm" v-model="filter.work" />
          </div>
        </div>
      </div>

      <!-- Прочее-->
      <div class="row">
        <div class="col-md-6 row">
          <label class="col-sm-4 col-form-label marginVauto">Прочие сведения</label>
          <div class="col-sm-8 marginVauto">
            <input autocomplete="off" class="form-control form-control-sm" v-model="filter.other" />
          </div>
        </div>
        <div class="col-md-6 row"></div>
      </div>
      <div class="text-right">
        <button class="btn btn-info btn-sm" @click="search">Поиск</button>
        <button class="btn btn-light btn-sm" @click="resetSearch">Сбросить поиск</button>
      </div>
    </div>
    <div class="empList">
      <div v-for="employee in employees" :key="employee.id">
        <employee :employee="employee"></employee>
      </div>
    </div>
    <paginate
      :page-count="paginateData.count"
      :page-range="paginateData.range"
      :margin-pages="paginateData.margin"
      :click-handler="clickCallback"
      :prev-text="'Пред.'"
      :next-text="'След.'"
      :container-class="'pagination'"
      :page-class="'page-item'"
    ></paginate>
  </div>
</template>

<script>
import Employee from "./Employee"
import Paginate from 'vuejs-paginate'

export default {
  components: { Employee, Paginate },
  data() {
    return {
      employees: [],
      paginateData: {
        page: 1,
        count: 10,
        range: 3,
        margin: 1
      },
      filter: {}
    }
  },
  computed:{
    emptyFilter(){      
      return Object.keys(this.filter).length === 0;
    }
  },
  methods: {
    getEmployees() {
      this.$http
        .get(this.$store.state.host + "/api/employee",
          {
            params: {
              page: this.paginateData.page
            }
          })
        .then(function (response) {
          this.employees = [];
          this.employees = response.data.data;
          this.paginateData.count = response.data.last_page;
        })
    },
    clickCallback(pageNum) {
      this.paginateData.page = pageNum;
      this.search();
    },
    search() {
      if (this.emptyFilter ){
        this.getEmployees();
      }else{
      this.$http
        .get(this.$store.state.host + "/api/search",
          {params:
            {
              filter: this.filter,
              page: this.paginateData.page
            }
          })
        .then(function (response) {
          console.log(response.data);
          this.employees = [];
          this.employees = response.data.data;
          this.paginateData.count = response.data.last_page;
        })
      }
    },
    resetSearch(){
      this.filter = {};
      this.getEmployees();
    }
  },
  mounted() {
    this.getEmployees();
  }
}
</script>

<style>
.pagination {
  justify-content: center;
}
.pagination li {
  margin: auto 5px;
}
.page-item {
  border: 1px solid rgb(117, 117, 117);
  border-radius: 3px;
  margin: 2px !important;
  width: 30px;
  height: 25px;
  text-align: center;
  position: relative;
}
.page-item a {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  text-decoration: none;
}
.filterWrap {
  background: rgb(241, 241, 241);
  padding: 7px;
  border: 1px solid rgb(207, 207, 207);
  border-radius: 3px;
  margin-bottom: 15px;
}
.empList {
  margin-bottom: 20px;
}
.marginVauto {
  margin: auto 0;
}
</style>